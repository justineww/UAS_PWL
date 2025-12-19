@extends('layout.main')

@section('title', 'Edit Data User')

@section('content')

{{-- Menggunakan Style yang sama dengan Add Form agar konsisten --}}
<style>
    .form-label-custom { color: #001F3D; font-weight: 600; font-size: 0.9rem; }
    .form-control-custom { 
        border-radius: 0 8px 8px 0; 
        border: 1px solid #ced4da; 
        border-left: 0;
        padding: 10px 15px; 
        height: auto; 
    }
    .form-control-custom:focus { 
        border-color: #001F3D; 
        box-shadow: none; 
        border-left: 1px solid #001F3D; 
    }
    .input-group-text-custom {
        background-color: white;
        border: 1px solid #ced4da;
        border-right: 0;
        border-radius: 8px 0 0 8px;
        color: #6c757d;
    }
    
    /* Box Area Foto */
    .current-img-box {
        position: relative;
        display: inline-block;
        border: 3px solid #001F3D;
        border-radius: 50%;
        padding: 3px;
    }
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
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
    <div>
        <h5 class="font-weight-bold text-dark mb-0">Edit Profil Pengguna</h5>
        <small class="text-muted">Perbarui data nama, email, atau foto profil.</small>
    </div>
    <a href="/users" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
        <i class="bi bi-arrow-left mr-1"></i> Kembali
    </a>
</div>

{{-- Form Edit --}}
<form action="/users/update/{{ $u->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT') {{-- Wajib untuk Update --}}

    <div class="row">
        {{-- Kolom Kiri: Input Data Teks --}}
        <div class="col-md-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    
                    {{-- Input Nama --}}
                    <div class="form-group mb-4">
                        <label class="form-label-custom">Nama Lengkap</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text input-group-text-custom">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                            </div>
                            <input type="text" name="name" class="form-control form-control-custom" value="{{ $u->name }}" required>
                        </div>
                    </div>

                    {{-- Input Email --}}
                    <div class="form-group mb-4">
                        <label class="form-label-custom">Alamat E-mail</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text input-group-text-custom">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                            </div>
                            <input type="email" name="email" class="form-control form-control-custom" value="{{ $u->email }}" required>
                        </div>
                    </div>

                    <div class="alert alert-info small">
                        <i class="bi bi-info-circle mr-1"></i> Password tidak dapat diubah di sini. Gunakan menu "Ganti Password" jika diperlukan.
                    </div>

                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Edit Foto --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 text-center">
                    <label class="form-label-custom mb-3 d-block text-left">Foto Profil</label>
                    
                    {{-- Tampilkan Foto Lama --}}
                    <div class="mb-3">
                        @if($u->foto)
                            <div class="current-img-box">
                                <img src="{{ asset('storage/foto/'.$u->foto) }}" class="rounded-circle" width="120" height="120" style="object-fit: cover;">
                            </div>
                        @else
                            <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-2" style="width: 120px; height: 120px; border: 3px solid #dee2e6;">
                                <i class="bi bi-person-fill text-muted" style="font-size: 4rem;"></i>
                            </div>
                        @endif
                        <p class="text-muted small mt-2">Foto Saat Ini</p>
                    </div>

                    <div class="form-group text-left">
                        <label class="small font-weight-bold">Ganti Foto:</label>
                        <input type="file" accept="image/*" name="foto" class="form-control-file text-sm">
                        <small class="text-muted mt-1 d-block">* Kosongkan jika tidak ingin mengubah foto.</small>
                    </div>

                    <hr class="my-4">

                    <button type="submit" class="btn btn-save btn-block">
                        <i class="bi bi-check-circle-fill mr-2"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection