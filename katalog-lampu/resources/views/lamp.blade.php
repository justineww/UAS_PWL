@extends('layout.main')

@section('title', 'Data Lampu')

@section('content')

{{-- Style khusus untuk mempercantik tabel dan tombol --}}
<style>
    /* Tombol Tambah Custom */
    .btn-add-custom {
        background-color: #001F3D;
        color: white;
        border-radius: 50px;
        padding: 8px 25px;
        font-weight: 500;
        transition: all 0.3s;
    }
    .btn-add-custom:hover {
        background-color: #003366;
        color: #FFC107; /* Aksen Emas saat hover */
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    /* Styling Tabel DataTables */
    #example thead th {
        background-color: #001F3D; /* Header Tabel Navy */
        color: white;
        border: none;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        padding: 15px;
    }
    
    #example tbody td {
        vertical-align: middle !important; /* Agar konten di tengah secara vertikal */
        font-size: 0.95rem;
        padding: 10px;
        color: #555;
    }

    /* Styling Gambar */
    .img-product {
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        object-fit: cover;
        border: 1px solid #eee;
    }

    /* Tombol Aksi */
    .btn-action {
        border-radius: 8px;
        padding: 6px 10px;
        transition: all 0.2s;
    }
    .btn-action:hover {
        transform: scale(1.1);
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="font-weight-bold text-dark mb-1">Daftar Inventaris Lampu</h4>
        <p class="text-muted small mb-0">Kelola data lampu yang tersedia di sistem.</p>
    </div>
    <a href="/lamp/lampaddform" class="btn btn-add-custom shadow-sm">
        <i class="bi bi-plus-lg mr-1"></i> Tambah Lampu
    </a>
</div>

@if (session('alert'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert" style="background-color: #d4edda; color: #155724; border-left: 5px solid #28a745 !important;">
        <i class="bi bi-check-circle-fill mr-2"></i> <strong>Berhasil!</strong> {{ session('alert') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="table-responsive">
    <table id="example" class="table table-hover table-borderless" style="width:100%">
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th>Lamp ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Type</th>
                <th>Power</th>
                <th>Price</th>
                <th class="text-center">Poster</th>
                <th class="text-center" width="15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lp as $idx => $l)
            <tr>
                <td class="text-center font-weight-bold">{{ $idx + 1 }}</td>
                <td><span class="badge badge-light border px-2 py-1">{{ $l->id_lampu }}</span></td>
                <td class="font-weight-bold text-dark">{{ $l->name }}</td>
                <td>{{ $l->brand }}</td>
                <td>{{ $l->type }}</td>
                <td>{{ $l->power }}</td>
                <td class="font-weight-bold" style="color: #001F3D;">Rp {{ number_format($l->price, 0, ',', '.') }}</td>
                <td class="text-center">
                    @if($l->poster)
                        <img src="{{ asset('storage/poster/'.$l->poster) }}" alt="{{ $l->name }}" class="img-product" width="60" height="60">
                    @else
                        <img src="{{ asset('storage/poster/no-image.jpg') }}" alt="No Image" class="img-product" width="60" height="60" style="opacity: 0.6;">
                    @endif
                </td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="/lamp/editform/{{ $l->id }}" class="btn btn-warning btn-sm btn-action text-white mr-1" title="Edit Data">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="/lamp/delete/{{ $l->id }}" class="btn btn-danger btn-sm btn-action" title="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection