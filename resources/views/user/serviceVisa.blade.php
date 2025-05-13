@extends('layouts.user')

@section('title')
    Layanan Visa | Saudinesia
@endsection

@section('visa')
    active
@endsection

@section('content')
    <div class="container">

        <!-- breadcumb -->
        <x-user.breadcrumb :breadcrumbs="$breadcrumbs" />
        <!-- breadcumb -->

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <section class="d-flex justify-content-center my-5">
            <div class="card p-4" style="max-width: 900px; width: 100%;">
                <h4 class="text-center mb-2">Pengajuan Visa</h4>
                <hr>
                <p class="text-center text-muted">Isi form tersebut untuk pengajuan visa</p>

                <form action="{{ route('user.visa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Biodata -->
                    <h6 class="mt-4 mb-3 fw-bolder">Biodata</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option disabled selected>Pilih</option>
                                <option value="Laki-laki">Laki - laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control">
                        </div>
                    </div>

                    <!-- Paspor -->
                    <h6 class="mt-4 mb-3 fw-bolder">Paspor</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">No. Paspor</label>
                            <input type="text" name="no_paspor" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Terbit</label>
                            <input type="date" name="paspor_terbit" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Kadaluwarsa</label>
                            <input type="date" name="paspor_kadaluarsa" class="form-control">
                        </div>
                    </div>

                    <!-- Penerbangan -->
                    <h6 class="mt-4 mb-3 fw-bolder">Penerbangan (Keberangkatan)</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Berangkat</label>
                            <input type="date" name="tanggal_berangkat" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Maskapai</label>
                            <input type="text" name="maskapai_berangkat" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No. Penerbangan</label>
                            <input type="text" name="no_penerbangan_berangkat" class="form-control">
                        </div>
                    </div>

                    <h6 class="mt-4 mb-3 fw-bolder">Penerbangan (Kepulangan)</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Maskapai</label>
                            <input type="text" name="maskapai_kembali" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No. Penerbangan</label>
                            <input type="text" name="no_penerbangan_kembali" class="form-control">
                        </div>
                    </div>

                    <!-- Hotel Mekkah -->
                    <h6 class="mt-4 mb-3 fw-bolder">Hotel Mekkah</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Hotel</label>
                            <input type="text" name="hotel_mekkah" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Check In</label>
                            <input type="date" name="checkin_mekkah" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Check Out</label>
                            <input type="date" name="checkout_mekkah" class="form-control">
                        </div>
                    </div>

                    <!-- Hotel Madinah -->
                    <h6 class="mt-4 mb-3 fw-bolder">Hotel Madinah</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Hotel</label>
                            <input type="text" name="hotel_madinah" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Check In</label>
                            <input type="date" name="checkin_madinah" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Check Out</label>
                            <input type="date" name="checkout_madinah" class="form-control">
                        </div>
                    </div>

                    <!-- Lampiran -->
                    <h6 class="mt-4 mb-3 fw-bolder">Lampiran</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">KTP</label>
                            <input type="file" name="lampiran_ktp" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Paspor</label>
                            <input type="file" name="lampiran_paspor" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kartu Keluarga</label>
                            <input type="file" name="lampiran_kk" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Bukti Booking Tiket</label>
                            <input type="file" name="lampiran_tiket" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Bukti Booking Hotel</label>
                            <input type="file" name="lampiran_hotel" class="form-control">
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-dark">Kirim</button>
                    </div>
                </form>

            </div>
        </section>


    </div>
@endsection
