<!doctype html>
<html lang="en">
    <head>
        <title>Hasil Pencarian | Search Lamp</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        :root {
            --primary-dark: #001F3D;
            --primary-light: #003366;
            --accent-gold: #FFC107;
            --bg-light: #f8f9fa;
            --text-dark: #2d3748;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* --- Navbar --- */
        .navbar-custom {
            background-color: var(--primary-dark) !important;
            padding: 0.8rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        /* --- Hero Header Section (DIPERBAIKI) --- */
        .hero-header {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-light) 100%);
            padding: 3rem 0;
            color: white;
            position: relative;
            margin-bottom: 2rem;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 4px 20px rgba(0,31,61,0.2);
        }
        
        .search-input-group {
            background: white;
            border-radius: 50px;
            padding: 5px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.2);
        }
        .search-input-group input {
            border: none;
            padding-left: 20px;
            border-radius: 50px;
            box-shadow: none !important;
        }
        .search-input-group button {
            border-radius: 50px;
            padding: 8px 25px;
            font-weight: 600;
        }

        /* --- Product Card Styling --- */
        .product-card {
            border: none;
            border-radius: 15px;
            background: white;
            /* Bayangan diperhalus */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05); 
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 31, 61, 0.1);
        }

        .card-img-container {
            position: relative;
            height: 200px;
            background-color: #f1f3f5;
            overflow: hidden;
            border-bottom: 1px solid #f0f0f0;
        }

        .card-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .card-img-container img {
            transform: scale(1.08);
        }

        /* Badge/Tag Styles */
        .badge-custom {
            background-color: rgba(0, 31, 61, 0.08);
            color: var(--primary-dark);
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-right: 5px;
            display: inline-block;
        }

        .card-body {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-weight: 700;
            color: var(--primary-dark);
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .spec-row {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 1.2rem;
        }

        .price-footer {
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px dashed #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .price-tag {
            color: var(--primary-dark);
            font-weight: 800;
            font-size: 1.25rem;
        }
        
        .btn-view {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: var(--bg-light);
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            text-decoration: none; /* Hilangkan garis bawah link */
        }
        .btn-view:hover {
            text-decoration: none;
        }
        .product-card:hover .btn-view {
            background-color: var(--accent-gold);
            color: white;
        }

        /* --- Empty State --- */
        .empty-state {
            background: white;
            border-radius: 20px;
            padding: 4rem 2rem;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }
    </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="#">
                    <i class="fas fa-lightbulb text-warning mr-2"></i> Search Lamp
                </a>
                <a href="/" class="btn btn-outline-light btn-sm ml-auto px-4 rounded-pill">
                    <i class="fas fa-home mr-1"></i> Home
                </a>
            </div>
        </nav>

        <div class="hero-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <h2 class="font-weight-bold mb-1">Hasil Pencarian</h2>
                        <p class="text-white-50 mb-0">
                            Menampilkan hasil untuk: <span class="text-warning font-weight-bold">"{{ request('name') }}"</span>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <form action="actsearchlamp" method="GET">
                            <div class="input-group search-input-group">
                                <input type="text" name="name" class="form-control" placeholder="Cari lampu lain..." value="{{ request('name') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-warning text-dark" type="submit">
                                        <i class="fas fa-search"></i> Cari
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="row">
                
                @forelse($data as $lamp)
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-4 mt-3">
                        <div class="card product-card w-100">
                            
                            <div class="card-img-container">
                                @if($lamp->poster)
                                    <img src="{{ asset('/storage/poster/'.$lamp->poster) }}" alt="{{ $lamp->name }}">
                                @else
                                    <div class="d-flex align-items-center justify-content-center h-100 bg-light text-muted">
                                        <i class="fas fa-image fa-3x"></i>
                                    </div>
                                @endif
                                <div class="position-absolute" style="top:10px; right:10px;">
                                    <span class="badge badge-warning text-white shadow-sm">Hot Item</span>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="mb-2">
                                    <span class="badge-custom"><i class="fas fa-tag mr-1"></i>{{ $lamp->brand }}</span>
                                    <span class="badge-custom"><i class="fas fa-bolt mr-1"></i>{{ $lamp->type }}</span>
                                </div>

                                <h5 class="card-title">{{ $lamp->name }}</h5>
                                
                                <div class="spec-row">
                                    <i class="fas fa-plug text-warning mr-2"></i> Power: {{ $lamp->power }}
                                </div>

                                <div class="price-footer">
                                    <div class="price-tag">
                                        <span class="text-warning" style="font-size: 0.8em;">Rp</span> {{ number_format($lamp->price, 0, ',', '.') }}
                                    </div>
                                    <a href="#" class="btn-view shadow-sm">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 mt-5">
                        <div class="empty-state">
                            <i class="fas fa-search fa-4x text-muted mb-4"></i>
                            <h3 class="font-weight-bold text-dark">Oops, Produk Tidak Ditemukan</h3>
                            <p class="text-muted">Kami tidak dapat menemukan lampu dengan kata kunci <strong>"{{ request('name') }}"</strong>.<br>Coba gunakan kata kunci lain atau lihat kategori produk kami.</p>
                            <a href="/" class="btn btn-primary bg-primary-custom rounded-pill px-4 mt-3">Lihat Semua Produk</a>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>