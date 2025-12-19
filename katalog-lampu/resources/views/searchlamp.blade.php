<!doctype html>
<html lang="en">
    <head>
        <title>Search Lamp | Professional Lighting</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        
        <style>
            /* --- Global Styles --- */
            :root {
                --primary-dark: #001F3D;
                --primary-light: #003366;
                --accent-gold: #FFC107;
                --bg-light: #f8f9fa;
            }

            body {
                font-family: 'Poppins', sans-serif;
                background-color: var(--bg-light);
                color: #333;
                overflow-x: hidden;
            }

            /* --- Navbar --- */
            .navbar-custom {
                background-color: var(--primary-dark) !important;
                padding: 1rem 0;
            }
            .navbar-brand { font-size: 1.5rem; letter-spacing: 0.5px; }

            /* --- Hero Carousel Section --- */
            .hero-section {
                position: relative;
                margin-bottom: 0; 
                z-index: 1;
            }
            .carousel-item {
                height: 450px; 
                background-color: #000;
                border-radius: 0 0 30px 30px; 
                overflow: hidden;
            }
            .carousel-item img {
                object-fit: cover;
                height: 100%;
                width: 100%;
                opacity: 0.7; 
            }
            .carousel-caption {
                bottom: 80px;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
            }

            /* --- Search Card (Floating Logic) --- */
            .search-container-floating {
                position: relative;
                z-index: 10;
                margin-top: -60px; 
                padding-bottom: 20px;
            }
            .search-card {
                border: none;
                border-radius: 20px;
                background: white;
                box-shadow: 0 15px 35px rgba(0, 31, 61, 0.15);
                padding: 2.5rem 2rem;
            }

            /* --- Form Elements --- */
            .btn-primary-custom {
                background-color: var(--primary-dark);
                border: none;
                color: white;
                border-radius: 50px;
                padding: 12px 30px;
                font-weight: 600;
                transition: all 0.3s;
            }
            .btn-primary-custom:hover {
                background-color: var(--accent-gold);
                color: var(--primary-dark);
                transform: translateY(-2px);
            }
            .form-control-custom {
                border-radius: 50px;
                border: 2px solid #e9ecef;
                padding: 25px 20px;
                font-size: 1rem;
            }
            .form-control-custom:focus {
                border-color: var(--primary-dark);
                box-shadow: none;
            }

            /* --- Horizontal Scrolling (Netflix Style) --- */
            .scrolling-wrapper {
                overflow-x: auto;
                overflow-y: hidden;
                white-space: nowrap;
                padding-bottom: 20px;
                padding-left: 5px;
                -webkit-overflow-scrolling: touch; 
                cursor: grab;
                scrollbar-width: thin;
            }
            .scrolling-wrapper.active {
                cursor: grabbing;
                transform: scale(1); 
            }
            .scrolling-wrapper::-webkit-scrollbar { height: 6px; }
            .scrolling-wrapper::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 4px; }
            .scrolling-wrapper::-webkit-scrollbar-thumb { background: #ccc; border-radius: 4px; }
            .scrolling-wrapper::-webkit-scrollbar-thumb:hover { background: var(--primary-dark); }

            .card-block {
                display: inline-block;
                width: 280px;
                margin-right: 20px;
                white-space: normal; 
                vertical-align: top;
                user-select: none; 
            }

            /* --- Product Card Styling --- */
            .product-card {
                border: none;
                border-radius: 15px;
                background: white;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                overflow: hidden;
                height: 100%;
            }
            .product-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 31, 61, 0.15);
            }
            .card-img-wrapper {
                height: 200px;
                overflow: hidden;
                position: relative;
                border-bottom: 1px solid #f0f0f0;
                background-color: #f8f9fa;
            }
            .card-img-top {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }
            .product-card:hover .card-img-top {
                transform: scale(1.08);
            }
            .price-tag {
                color: var(--primary-dark);
                font-weight: 800;
                font-size: 1.2rem;
            }
            .currency-symbol { color: var(--accent-gold); }

            /* --- Section Title --- */
            .section-title {
                font-weight: 700;
                color: var(--primary-dark);
                position: relative;
                display: inline-block;
                margin-bottom: 1.5rem;
            }
            .section-title::after {
                content: '';
                display: block;
                width: 50%;
                height: 4px;
                background-color: var(--accent-gold);
                border-radius: 2px;
                margin-top: 5px;
            }

            /* --- Footer --- */
            footer {
                background-color: var(--primary-dark);
                color: rgba(255,255,255,0.6);
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top shadow-sm">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="#">
                    <i class="fas fa-lightbulb text-warning mr-2"></i> Search Lamp
                </a>
                <a href="/login" class="btn btn-outline-light btn-sm ml-auto px-4 rounded-pill">Login</a>
            </div>
        </nav>

        {{-- LOGIKA UTAMA BLADE --}}
        
        @if(!request('name'))
            
            <div id="heroCarousel" class="carousel slide carousel-fade hero-section" data-ride="carousel" data-interval="3500">
                <ol class="carousel-indicators">
                    <li data-target="#heroCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#heroCarousel" data-slide-to="1"></li>
                    <li data-target="#heroCarousel" data-slide-to="2"></li>
                    <li data-target="#heroCarousel" data-slide-to="3"></li>
                    <li data-target="#heroCarousel" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://t4.ftcdn.net/jpg/06/00/62/77/360_F_600627754_uKAUfEHyXUdPHlZWldI47Z5TqZpGKhB7.jpg" class="d-block w-100" alt="Stage">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <h1 class="font-weight-bold display-4">Professional Lighting</h1>
                            <p class="lead">Solusi pencahayaan terbaik untuk panggung Anda.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://assets.unileversolutions.com/v1/985812.jpg" class="d-block w-100" alt="Crowd">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <h1 class="font-weight-bold display-4">Feel the Energy</h1>
                            <p class="lead">Hidupkan suasana dengan efek cahaya dramatis.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.movinghead.net/Uploads/202003/5e7d99046bd7b.jpg" class="d-block w-100" alt="Beam">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <h1 class="font-weight-bold display-4">Spectacular Beams</h1>
                            <p class="lead">Teknologi Beam terbaru untuk sorotan tajam.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.dbackdrop.com/cdn/shop/files/LXX59-12.jpg?v=1756799495" class="d-block w-100" alt="Neon">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <h1 class="font-weight-bold display-4">Artistic Neon</h1>
                            <p class="lead">Kreasikan dekorasi visual artistik.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://betopperdj.com/cdn/shop/articles/neumann-mueller-event-technology_e142204d-300c-4000-8bd2-eeafcd4eeba6.jpg?v=1743063120&width=1500" class="d-block w-100" alt="Night">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <h1 class="font-weight-bold display-4">Outdoor Events</h1>
                            <p class="lead">Pencahayaan tahan cuaca yang memukau.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container search-container-floating">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="card search-card text-center">
                            <h3 class="font-weight-bold text-primary-custom mb-3">Cari Lampu Impian Anda</h3>
                            <form action="actsearchlamp" method="GET"> 
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control form-control-lg form-control-custom" placeholder="Cari: Beam 230, Par LED...">
                                    <div class="input-group-append ml-2">
                                        <button class="btn btn-primary-custom" type="submit">
                                            <i class="fas fa-search mr-2"></i> Cari
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5 mb-5">
                <h4 class="section-title">Rekomendasi Pilihan</h4>
                <p class="text-muted mb-4">Top 10 Produk Populer (Geser untuk melihat).</p>

                <div class="scrolling-wrapper" id="scrollContainer">
                    @foreach($data->take(10) as $lamp) 
                    <div class="card-block">
                        <div class="card product-card">
                            <div class="card-img-wrapper">
                                @if($lamp->poster)
                                    <img src="{{ asset('storage/poster/'.$lamp->poster) }}" class="card-img-top" alt="{{ $lamp->name }}">
                                @else
                                    <div class="d-flex align-items-center justify-content-center h-100 bg-light text-muted">
                                        <i class="fas fa-image fa-2x"></i>
                                    </div>
                                @endif
                                <div class="badge badge-warning text-white position-absolute" style="top:10px; right:10px;">Hot</div>
                            </div>
                            <div class="card-body p-3">
                                <h6 class="card-title text-truncate font-weight-bold mb-1">{{ $lamp->name }}</h6>
                                <small class="text-muted d-block mb-2">{{ $lamp->brand }}</small>
                                <div class="price-tag">
                                    <span class="currency-symbol">Rp</span> {{ number_format($lamp->price, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        @else
            
            <div class="container mt-5">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-10">
                        <div class="card border-0 shadow-sm p-3" style="border-radius: 15px;">
                            <form action="actsearchlamp" method="GET" class="d-flex align-items-center"> 
                                <a href="searchlamp" class="btn btn-light rounded-circle mr-3" title="Reset / Home"><i class="fas fa-arrow-left"></i></a>
                                <input type="text" name="name" value="{{ request('name') }}" class="form-control border-0 bg-light rounded-pill px-4" placeholder="Cari lagi...">
                                <button class="btn btn-primary-custom ml-3 rounded-pill" type="submit">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <h4 class="section-title mb-0">Hasil Pencarian: "{{ request('name') }}"</h4>
                </div>

                <div class="row">
                    @forelse($data->take(10) as $lamp)
                        <div class="col-md-6 col-lg-4 d-flex mb-4">
                            <div class="card product-card w-100">
                                <div class="card-img-wrapper">
                                    @if($lamp->poster)
                                        <img src="{{ asset('storage/poster/'.$lamp->poster) }}" class="card-img-top" alt="{{ $lamp->name }}">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center h-100 bg-light text-muted">
                                            <i class="fas fa-image fa-3x"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body p-4 d-flex flex-column">
                                    <h5 class="card-title font-weight-bold">{{ $lamp->name }}</h5>
                                    <div class="mb-3">
                                        <small class="badge badge-light text-uppercase p-2">{{ $lamp->brand }}</small>
                                        <small class="badge badge-light text-uppercase p-2">{{ $lamp->type }}</small>
                                    </div>
                                    <div class="mt-auto pt-3 border-top">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="price-tag">
                                                <span class="currency-symbol">Rp</span>{{ number_format($lamp->price, 0, ',', '.') }}
                                            </div>
                                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle" style="width:35px;height:35px;display:flex;align-items:center;justify-content:center;">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-light text-center shadow-sm p-5" style="border-radius: 15px;">
                                <i class="fas fa-search fa-3x mb-3 text-muted"></i>
                                <h4 class="font-weight-bold text-dark">Oops!</h4>
                                <p class="text-muted">Produk "<strong>{{ request('name') }}</strong>" tidak ditemukan.</p>
                                <a href="searchlamp" class="btn btn-primary-custom mt-2">Lihat Semua Produk</a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        @endif
        
        <footer class="py-4 mt-5 text-center">
            <div class="container">
                <small>&copy; {{ date('Y') }} Search Lamp. Professional Lighting Solution.</small>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <script>
            const slider = document.querySelector('.scrolling-wrapper');
            if(slider) {
                let isDown = false;
                let startX;
                let scrollLeft;

                slider.addEventListener('mousedown', (e) => {
                    isDown = true;
                    slider.classList.add('active');
                    startX = e.pageX - slider.offsetLeft;
                    scrollLeft = slider.scrollLeft;
                });
                slider.addEventListener('mouseleave', () => {
                    isDown = false;
                    slider.classList.remove('active');
                });
                slider.addEventListener('mouseup', () => {
                    isDown = false;
                    slider.classList.remove('active');
                });
                slider.addEventListener('mousemove', (e) => {
                    if(!isDown) return;
                    e.preventDefault();
                    const x = e.pageX - slider.offsetLeft;
                    const walk = (x - startX) * 2; 
                    slider.scrollLeft = scrollLeft - walk;
                });
            }
        </script>
    </body>
</html>