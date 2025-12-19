<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css">
        
        <title>@yield('title')</title>

        <style>
            /* --- Global Styles --- */
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #001F3D; /* Navy Blue Background */
                color: #fff;
                overflow-x: hidden;
            }

            /* --- Sidebar Styling --- */
            .sidebar-custom {
                background-color: #00162b;
                border-right: 1px solid rgba(255, 255, 255, 0.05) !important;
                padding-top: 20px;
            }

            /* Nav Pills (Sidebar Links) */
            .nav-pills .nav-link {
                color: rgba(255, 255, 255, 0.6);
                padding: 12px 20px;
                margin-bottom: 8px;
                border-radius: 50px;
                transition: all 0.3s ease;
                font-weight: 500;
            }
            .nav-pills .nav-link:hover {
                background-color: rgba(255, 255, 255, 0.1);
                color: #fff;
                padding-left: 25px;
            }
            .nav-pills .nav-link.active {
                background-color: #FFC107 !important;
                color: #001F3D !important;
                font-weight: 700;
                box-shadow: 0 4px 15px rgba(255, 193, 7, 0.4);
            }

            /* --- Header / Top Bar --- */
            .header-bar {
                background-color: #001F3D;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                padding: 10px 0;
            }
            
            /* User Dropdown Button */
            .btn-user-custom {
                background-color: rgba(255, 255, 255, 0.1);
                color: white;
                border: none;
                border-radius: 50px;
                padding: 5px 20px;
                transition: all 0.3s;
            }
            .btn-user-custom:hover, .btn-user-custom:focus {
                background-color: rgba(255, 255, 255, 0.2);
                color: #FFC107;
                box-shadow: none;
            }
            .dropdown-menu {
                border: none;
                box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                border-radius: 15px;
                margin-top: 10px;
            }

            /* --- Main Content Area --- */
            .main-card {
                background-color: #fff;
                border: none;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
                color: #333;
                min-height: 80vh;
            }
            .card-header {
                background-color: transparent;
                border-bottom: 1px dashed #e0e0e0;
                padding: 1.5rem 1.5rem 0.5rem 1.5rem;
            }
            .card-body {
                padding: 2rem;
            }

            /* Datatables Customization */
            .dataTables_wrapper .dataTables_length, 
            .dataTables_wrapper .dataTables_filter, 
            .dataTables_wrapper .dataTables_info, 
            .dataTables_wrapper .dataTables_processing, 
            .dataTables_wrapper .dataTables_paginate {
                color: #333 !important;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            
            <div class="row header-bar align-items-center">
                <div class="col-md-12">
                    <span class="float-left text-white font-weight-bold ml-3 mt-1" style="font-size: 1.2rem;">
                        <i class="bi bi-lightbulb-fill text-warning mr-2"></i> WEB LAMP
                    </span>

                    <div class="dropdown float-right mr-3">
                        <button class="btn btn-user-custom dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person-circle mr-1"></i> {{ Auth::user()->name ?? 'User' }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="dropdownMenuButton" style="min-width: 280px;">
                            <div class="dropdown-item p-0 mb-3 bg-transparent">
                                <div class="media align-items-center">
                                    
                                    {{-- LOGIKA FOTO PROFIL DINAMIS --}}
                                    @if(Auth::user()->foto)
                                        <img src="{{ asset('storage/foto/'.Auth::user()->foto) }}" width="50" height="50" class="rounded-circle mr-3" alt="Foto Profil" style="object-fit: cover; border: 2px solid #001F3D;">
                                    @else
                                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mr-3" style="width: 50px; height: 50px; border: 2px solid #dee2e6;">
                                            <i class="bi bi-person-fill text-muted" style="font-size: 1.5rem;"></i>
                                        </div>
                                    @endif

                                    <div class="media-body">
                                        {{-- NAMA DINAMIS --}}
                                        <h6 class="mt-0 mb-0 font-weight-bold text-dark">{{ Auth::user()->name }}</h6>
                                        
                                        {{-- JAM REAL-TIME --}}
                                        <small class="text-muted" id="live-clock">
                                            <i class="bi bi-clock"></i> Memuat waktu...
                                        </small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="dropdown-divider"></div>
                            
                            {{-- Menu Ganti Password (Arahkan ke route yang sudah kita buat) --}}
                            <a class="dropdown-item rounded py-2" href="/changepass">
                                <i class="bi bi-key mr-2 text-muted"></i> Ganti Password
                            </a>
                            
                            <a class="dropdown-item rounded py-2 text-danger" href="/logout">
                                <i class="bi bi-box-arrow-left mr-2"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 sidebar-custom vh-100">
                    <div class="nav flex-column nav-pills mt-3 px-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link {{ ($key == 'home') ? 'active':'' }}" href="/home" role="tab">
                            <i class="bi bi-house-door mr-2"></i> Home
                        </a>
                        <a class="nav-link {{ ($key == 'lamp') ? 'active':'' }}" href="/lamp" role="tab">
                            <i class="bi bi-lightbulb mr-2"></i> Lamp
                        </a>
                        <a class="nav-link {{ ($key == 'users') ? 'active':'' }}" href="/users" role="tab">
                            <i class="bi bi-people mr-2"></i> User
                        </a>
                    </div>
                </div>

                <div class="col-md-10 py-4" style="background-color: #001F3D;">
                    <div class="card main-card">
                        <div class="card-header">
                            <h5 class="text-primary font-weight-bold mb-0 text-uppercase">@yield('title')</h5>
                        </div>
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
        
        <script>
            new DataTable('#example');

            // --- SCRIPT JAM DIGITAL (Real-time) ---
            function updateClock() {
                var now = new Date();
                
                // Format jam (HH:MM:SS)
                var hours = String(now.getHours()).padStart(2, '0');
                var minutes = String(now.getMinutes()).padStart(2, '0');
                var seconds = String(now.getSeconds()).padStart(2, '0');
                
                var timeString = 'Pkl ' + hours + ':' + minutes + ':' + seconds + ' WIB';
                
                // Masukkan ke elemen dengan id="live-clock"
                var clockElement = document.getElementById('live-clock');
                if (clockElement) {
                    clockElement.innerHTML = '<i class="bi bi-clock"></i> ' + timeString;
                }
            }

            // Jalankan fungsi setiap 1000ms (1 detik)
            setInterval(updateClock, 1000);
            
            // Jalankan sekali saat halaman pertama kali load
            updateClock();
        </script>
    </body>
</html>