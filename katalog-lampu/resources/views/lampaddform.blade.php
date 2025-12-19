@extends('layout.main')

@section('title', 'Tambah Data Lampu')

@section('content')

{{-- Style Form Custom (Sama dengan halaman Edit) --}}
<style>
    .form-label-custom {
        color: #001F3D;
        font-weight: 600;
        font-size: 0.9rem;
    }
    
    .form-control-custom {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 10px 15px;
        height: auto;
        transition: border-color 0.3s;
    }
    .form-control-custom:focus {
        border-color: #001F3D;
        box-shadow: 0 0 0 0.2rem rgba(0, 31, 61, 0.15);
    }

    /* Box Upload Placeholder */
    .upload-box {
        background-color: #f8f9fa;
        border: 2px dashed #ced4da;
        border-radius: 10px;
        padding: 40px 20px;
        text-align: center;
        transition: all 0.3s;
    }
    .upload-box:hover {
        border-color: #001F3D;
        background-color: #eef2f5;
    }
    .upload-icon {
        font-size: 3rem;
        color: #adb5bd;
        margin-bottom: 10px;
    }

    /* Save Button */
    .btn-save {
        background-color: #001F3D;
        color: white;
        border-radius: 50px;
        padding: 10px 40px;
        font-weight: 600;
        letter-spacing: 1px;
    }
    .btn-save:hover {
        background-color: #003366;
        color: #FFC107;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
    <div>
        <h5 class="font-weight-bold text-dark mb-0">Form Input Produk Baru</h5>
        <small class="text-muted">Lengkapi form di bawah untuk menambah data lampu.</small>
    </div>
    <a href="/lamp" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
        <i class="bi bi-arrow-left mr-1"></i> Kembali
    </a>
</div>

<form action="/lamp/lampsave" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_lampu" class="form-label-custom">ID Lampu <span class="text-danger">*</span></label>
                        <input type="text" name="id_lampu" id="id_lampu" class="form-control form-control-custom" placeholder="Contoh: LMP-001" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label-custom">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control form-control-custom" placeholder="Masukkan nama lampu" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="brand" class="form-label-custom">Brand <span class="text-danger">*</span></label>
                        <input type="text" name="brand" id="brand" class="form-control form-control-custom" placeholder="Merk" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="type" class="form-label-custom">Type <span class="text-danger">*</span></label>
                        <input type="text" name="type" id="type" class="form-control form-control-custom" placeholder="Jenis" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="power" class="form-label-custom">Power <span class="text-danger">*</span></label>
                        <input type="text" name="power" id="power" class="form-control form-control-custom" placeholder="Watt" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="price" class="form-label-custom">Harga (Rp) <span class="text-danger">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-right-0" style="border-radius: 8px 0 0 8px;">Rp</span>
                    </div>
                    <input type="number" min="0" name="price" id="price" class="form-control form-control-custom border-left-0" style="border-radius: 0 8px 8px 0;" placeholder="0" required>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="form-label-custom">Deskripsi</label>
                <textarea name="description" id="description" rows="3" class="form-control form-control-custom" placeholder="Tulis deskripsi singkat produk..."></textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="upload-box">
                <i class="bi bi-cloud-arrow-up upload-icon"></i>
                <h6 class="font-weight-bold text-dark">Upload Poster</h6>
                <p class="text-muted small mb-3">Format: JPG, PNG, JPEG</p>
                
                <div class="form-group text-left">
                    <input type="file" accept="image/*" name="poster" id="poster" class="form-control-file text-sm" required>
                    <small class="text-danger mt-2 d-block">* Wajib diisi</small>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-save btn-block">
                    <i class="bi bi-save2 mr-2"></i> Simpan Data
                </button>
            </div>
        </div>
    </div>
</form>

@endsection