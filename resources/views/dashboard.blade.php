@extends('welcome')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Selamat Datang 😊😊</h5>
                    {{-- <p class="mb-0">Anda login sebagai {{ Auth::user()->name }}</p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-8">
                            <h5 class="card-title mb-9 fw-semibold">Total Pengguna</h5>
                            <h4 class="fw-semibold mb-3">{{ $totalUsers }}</h4>
                            <div class="d-flex align-items-center">
                                <span class="me-2 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-arrow-up-right text-success"></i>
                                </span>
                                <p class="text-dark me-1 fs-3 mb-0">Pengguna Terdaftar</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <div class="text-white bg-primary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-users fs-6"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-8">
                            <h5 class="card-title mb-9 fw-semibold">Pengguna Aktif</h5>
                            <h4 class="fw-semibold mb-3">{{ $activeUsers }}</h4>
                            <div class="d-flex align-items-center">
                                <span class="me-2 rounded-circle bg-light-info round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-check text-info"></i>
                                </span>
                                <p class="text-dark me-1 fs-3 mb-0">Email Terverifikasi</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <div class="text-white bg-info rounded-circle p-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-user-check fs-6"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
