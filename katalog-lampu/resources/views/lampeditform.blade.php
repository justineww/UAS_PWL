@extends('layout.main')

@section('title', 'Edit Data Lampu')

@section('content')

{{-- Style Form Custom --}}
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

    /* Preview Image Box */
    .img-preview-box {
        background-color: #f8f9fa;
        border: 1px dashed #ced4da;
        border-radius: 10px;
        padding: 15px;
        text-align: center;
        display: inline-block;
    }
    .img-preview-box img {
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
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
        <h5 class="font-weight-bold text-dark mb-0">Form Perubahan Data</h5>
        <small class="text-muted">Silakan ubah data lampu di bawah ini.</small>
    </div>
    <a href="/lamp" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
        <i class="bi bi-arrow-left mr-1"></i> Kembali
    </a>
</div>

<form action="/lamp/lampupdate/{{ $lp->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_lampu" class="form-label-custom">ID Lampu</label>
                        <input type="text" name="id_lampu" id="id_lampu" class="form-control form-control-custom" value="{{ $lp->id_lampu }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label-custom">Nama Produk</label>
                        <input type="text" name="name" id="name" class="form-control form-control-custom" value="{{ $lp->name }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="brand" class="form-label-custom">Brand</label>
                        <input type="text" name="brand" id="brand" class="form-control form-control-custom" value="{{ $lp->brand }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="type" class="form-label-custom">Type</label>
                        <input type="text" name="type" id="type" class="form-control form-control-custom" value="{{ $lp->type }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="power" class="form-label-custom">Power</label>
                        <input type="text" name="power" id="power" class="form-control form-control-custom" value="{{ $lp->power }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="price" class="form-label-custom">Harga (Rp)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-right-0" style="border-radius: 8px 0 0 8px;">Rp</span>
                    </div>
                    <input type="number" min="0" name="price" id="price" class="form-control form-control-custom border-left-0" style="border-radius: 0 8px 8px 0;" value="{{ $lp->price }}">
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="form-label-custom">Deskripsi</label>
                <textarea name="description" id="description" rows="4" class="form-control form-control-custom">{{ $lp->description }}</textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-3 bg-light rounded border">
                <label for="poster" class="form-label-custom mb-3">Gambar Produk</label>
                
                <div class="text-center mb-3">
                    <div class="img-preview-box w-100">
                        @if($lp->poster)
                            <img src="{{ asset('storage/poster/'.$lp->poster) }}" alt="{{ $lp->title }}" class="img-fluid" style="max-height: 200px;">
                        @else
                            <img src="{{ asset('storage/poster/no-image.jpg') }}" alt="No Image" class="img-fluid" style="max-height: 200px; opacity: 0.5;">
                        @endif
                        <div class="mt-2 text-muted small font-italic">"Foto Sebelumnya"</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="small text-muted">Upload Foto Baru (Opsional)</label>
                    <input type="file" accept="image/*" name="poster" id="poster" class="form-control-file text-sm">
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-save btn-block">
                    <i class="bi bi-save2 mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</form>

@endsection