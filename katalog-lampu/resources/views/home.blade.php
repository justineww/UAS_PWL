@extends('layout.main')

@section('title', 'Dashboard')

@section('content')

<style>
    /* Custom Card Stats */
    .card-stat {
        border: none;
        border-radius: 15px;
        color: white;
        transition: transform 0.3s;
        overflow: hidden;
        position: relative;
    }
    .card-stat:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    .card-stat .icon-bg {
        position: absolute;
        right: 15px;
        bottom: -10px;
        font-size: 5rem;
        opacity: 0.2;
        transform: rotate(-15deg);
    }
    
    /* Warna Gradient */
    .bg-gradient-navy {
        background: linear-gradient(45deg, #001F3D, #003366);
    }
    .bg-gradient-gold {
        background: linear-gradient(45deg, #FFC107, #FF9800);
    }
    .bg-gradient-info {
        background: linear-gradient(45deg, #17a2b8, #138496);
    }

    /* Welcome Banner */
    .welcome-banner {
        background-color: #f8f9fa;
        border-left: 5px solid #001F3D;
        border-radius: 8px;
        padding: 20px;
    }
</style>

{{-- Baris 1: Statistik Ringkas --}}
<div class="row mb-4">
    {{-- Card Total Lampu --}}
    <div class="col-md-4">
        <div class="card card-stat bg-gradient-navy mb-3">
            <div class="card-body py-4">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1" style="opacity: 0.8;">Total Lampu</h6>
                        <h2 class="font-weight-bold mb-0">{{ $count_lamp ?? 0 }}</h2>
                    </div>
                </div>
                <i class="bi bi-lightbulb-fill icon-bg"></i>
            </div>
        </div>
    </div>

    {{-- Card Total User --}}
    <div class="col-md-4">
        <div class="card card-stat bg-gradient-gold mb-3">
            <div class="card-body py-4">
                <div class="d-flex align-items-center">
                    <div class="text-dark">
                        <h6 class="text-uppercase mb-1 font-weight-bold" style="opacity: 0.7;">Total User</h6>
                        <h2 class="font-weight-bold mb-0">{{ $count_user ?? 0 }}</h2>
                    </div>
                </div>
                <i class="bi bi-people-fill icon-bg text-dark"></i>
            </div>
        </div>
    </div>

    {{-- Card Waktu / Info Lain --}}
    <div class="col-md-4">
        <div class="card card-stat bg-gradient-info mb-3">
            <div class="card-body py-4">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1" style="opacity: 0.8;">Status System</h6>
                        <h5 class="font-weight-bold mb-0">Active <i class="bi bi-check-circle ml-1"></i></h5>
                    </div>
                </div>
                <i class="bi bi-cpu-fill icon-bg"></i>
            </div>
        </div>
    </div>
</div>

{{-- Baris 2: Welcome & Quick Actions --}}
<div class="row">
    <div class="col-md-8">
        <div class="welcome-banner shadow-sm mb-4">
            <h4 class="font-weight-bold text-dark">Halo, {{ Auth::user()->name }}! 👋</h4>
            <p class="text-muted mb-3">Selamat datang kembali di Panel Admin <b>WEB LAMP</b>. Anda memiliki akses penuh untuk mengelola data lampu dan pengguna aplikasi.</p>
            
            <hr>
            
            <p class="small text-muted mb-2">Pintasan Cepat:</p>
            <a href="/lamp/lampaddform" class="btn btn-outline-primary btn-sm rounded-pill px-3 mr-2">
                <i class="bi bi-plus-circle mr-1"></i> Tambah Lampu
            </a>
            <a href="/users/useraddform" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                <i class="bi bi-person-plus mr-1"></i> Tambah User
            </a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-light">
            <div class="card-body">
                <h6 class="font-weight-bold text-dark mb-3">Informasi Akun</h6>
                <ul class="list-unstyled mb-0 text-muted small">
                    <li class="mb-2"><i class="bi bi-envelope mr-2"></i> {{ Auth::user()->email }}</li>
                    <li class="mb-2"><i class="bi bi-calendar-event mr-2"></i> Gabung: {{ Auth::user()->created_at->format('d M Y') }}</li>
                    <li><i class="bi bi-shield-lock mr-2"></i> Role: Administrator</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection