@extends('layout.main')

@section('title', 'Data Users')

@section('content')

{{-- Style khusus halaman Users --}}
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
        color: #FFC107;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    /* Styling Tabel */
    #example thead th {
        background-color: #001F3D;
        color: white;
        border: none;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        padding: 15px;
    }
    
    #example tbody td {
        vertical-align: middle !important;
        font-size: 0.95rem;
        padding: 10px;
        color: #555;
    }

    /* Styling Foto User (Bulat) */
    .img-avatar {
        border-radius: 50%; 
        box-shadow: 0 2px 5px rgba(0,0,0,0.15);
        object-fit: cover;
        border: 2px solid #f8f9fa;
    }

    /* --- PERBAIKAN STYLING TOMBOL --- */
    /* Class ini dipakai oleh Tombol Edit DAN Delete agar seragam */
    .btn-action {
        border-radius: 8px;      /* Sudut tumpul */
        padding: 6px 10px;       /* Ukuran padding sama */
        transition: all 0.2s;    /* Animasi halus */
        display: inline-flex;    /* Agar icon rata tengah */
        align-items: center;
        justify-content: center;
    }
    
    /* Efek Hover (Membesar sedikit) */
    .btn-action:hover {
        transform: scale(1.1);
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        z-index: 2; /* Agar tombol yang di-hover muncul paling depan */
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="font-weight-bold text-dark mb-1">Daftar Pengguna</h4>
        <p class="text-muted small mb-0">Kelola akses dan data pengguna sistem.</p>
    </div>
    <a href="/users/useraddform" class="btn btn-add-custom shadow-sm">
        <i class="bi bi-person-plus-fill mr-1"></i> Tambah User
    </a>
</div>

@if (session('alert'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert" style="background-color: #d4edda; color: #155724; border-left: 5px solid #28a745 !important;">
        <i class="bi bi-check-circle-fill mr-2"></i> <strong>Info:</strong> {{ session('alert') }}
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
                <th>Name</th>
                <th>E-mail</th>
                <th class="text-center">Foto</th>
                <th class="text-center" width="15%">Aksi</th> {{-- Lebar kolom aksi sedikit ditambah --}}
            </tr>
        </thead>
        <tbody>
            @foreach($usr as $idx => $u)
            <tr>
                <td class="text-center font-weight-bold">{{ $idx + 1 }}</td>
                <td class="font-weight-bold text-dark">{{ $u->name }}</td>
                <td>
                    <span class="text-muted"><i class="bi bi-envelope mr-1"></i> {{ $u->email }}</span>
                </td>
                <td class="text-center">
                    @if($u->foto)
                        <img src="{{ asset('storage/foto/'.$u->foto) }}" alt="{{ $u->name }}" class="img-avatar" width="60" height="60">
                    @else
                        <img src="{{ asset('storage/poster/no-image.jpg') }}" alt="No Image" class="img-avatar" width="60" height="60" style="opacity: 0.6;">
                    @endif
                </td>
                <td class="text-center">
                    {{-- Btn Group agar tombol menempel rapi --}}
                    <div class="btn-group" role="group">
                        {{-- Tombol Edit --}}
                        <a href="/users/editform/{{ $u->id }}" class="btn btn-warning btn-sm btn-action text-white mr-1" title="Edit User">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        {{-- Tombol Hapus --}}
                        <a href="/users/delete/{{ $u->id }}" class="btn btn-danger btn-sm btn-action" title="Hapus User" onclick="return confirm('Yakin ingin menghapus user ini?')">
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