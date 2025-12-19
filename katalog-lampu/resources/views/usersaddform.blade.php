@extends('layout.main')

@section('title', 'Tambah User Baru')

@section('content')

{{-- Style CSS (Konsisten dengan halaman Edit) --}}
<style>
    .form-label-custom { 
        color: #001F3D; 
        font-weight: 600; 
        font-size: 0.9rem; 
    }
    .form-control-custom { 
        border-radius: 0 8px 8px 0; /* Radius hanya di kanan karena ada icon di kiri */
        border: 1px solid #ced4da; 
        border-left: 0;
        padding: 10px 15px; 
        height: auto; 
    }
    .form-control-custom:focus { 
        border-color: #001F3D; 
        box-shadow: none; /* Menghilangkan shadow default bootstrap */
        border-left: 1px solid #001F3D; /* Trik visual saat fokus */
    }
    
    /* Styling untuk Icon Input Group */
    .input-group-text-custom {
        background-color: white;
        border: 1px solid #ced4da;
        border-right: 0;
        border-radius: 8px 0 0 8px;
        color: #6c757d;
    }
    .input-group:focus-within .input-group-text-custom {
        border-color: #001F3D;
        color: #001F3D;
    }

    /* Box Upload Foto */
    .img-upload-box { 
        background-color: #f8f9fa; 
        border: 2px dashed #ced4da; 
        border-radius: 10px; 
        padding: 30px; 
        text-align: center;
        transition: all 0.3s;
    }
    .img-upload-box:hover {
        border-color: #001F3D;
        background-color: #e9ecef;
    }

    /* Tombol Simpan */
    .btn-save { 
        background-color: #001F3D; 
        color: white; 
        border-radius: 50px; 
        padding: 10px 40px; 
        font-weight: 600; 
        transition: all 0.3s;
    }
    .btn-save:hover { 
        background-color: #003366; 
        color: #FFC107; 
        transform: translateY(-2px); 
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
</style>

{{-- Header Halaman --}}
<div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
    <div>
        <h5 class="font-weight-bold text-dark mb-0">Tambah Pengguna Baru</h5>
        <small class="text-muted">Lengkapi formulir di bawah ini untuk mendaftarkan user.</small>
    </div>
    <a href="/users" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
        <i class="bi bi-arrow-left mr-1"></i> Kembali
    </a>
</div>

{{-- Form Start --}}
{{-- Pastikan action route-nya sesuai (saya gunakan /users/save mengikuti controller sebelumnya) --}}
<form action="/users/save" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        {{-- Kolom Kiri: Input Data --}}
        <div class="col-md-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    
                    {{-- Input Nama --}}
                    <div class="form-group mb-4">
                        <label for="name" class="form-label-custom">Nama Lengkap</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text input-group-text-custom">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                            </div>
                            <input type="text" name="name" id="name" class="form-control form-control-custom" placeholder="Contoh: John Doe" required>
                        </div>
                    </div>

                    {{-- Input Email --}}
                    <div class="form-group mb-4">
                        <label for="email" class="form-label-custom">Alamat E-mail</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text input-group-text-custom">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control form-control-custom" placeholder="Contoh: user@email.com" required>
                        </div>
                    </div>

                    {{-- Input Password --}}
                    <div class="form-group mb-4">
                        <label for="password" class="form-label-custom">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text input-group-text-custom">
                                    <i class="bi bi-key-fill"></i>
                                </span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control form-control-custom" placeholder="Minimal 6 karakter" required>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Upload Foto & Tombol Simpan --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <label class="form-label-custom mb-3">Foto Profil</label>
                    
                    <div class="img-upload-box mb-3">
                        <i class="bi bi-cloud-arrow-up text-muted mb-2" style="font-size: 2rem;"></i>
                        <p class="text-muted small mb-0">Klik tombol di bawah untuk memilih foto</p>
                    </div>

                    <div class="form-group">
                        <input type="file" accept="image/*" name="foto" id="foto" class="form-control-file text-sm">
                        <small class="text-muted mt-2 d-block">* Format: JPG, PNG, JPEG.</small>
                    </div>

                    <hr class="my-4">

                    <button type="submit" class="btn btn-save btn-block">
                        <i class="bi bi-check-circle-fill mr-2"></i> Simpan Data
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection