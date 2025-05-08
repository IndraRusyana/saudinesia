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

        <section class="d-flex justify-content-center my-5">
            <div class="card p-4" style="max-width: 900px; width: 100%;">
                <h4 class="text-center mb-2">Pengajuan Visa</h4>
                <hr>
                <p class="text-center text-muted">Isi form tersebut untuk pengajuan visa</p>

                <form>
                    <!-- Biodata -->
                    <h6 class="mt-4 mb-3 fw-bolder">Biodata</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Budi Susilo">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" placeholder="Jakarta">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-select">
                                <option selected disabled>Pilih</option>
                                <option>Laki - laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No HP</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Paspor -->
                    <h6 class="mt-4 mb-3 fw-bolder">Paspor</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">No. Paspor</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Terbit</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Kadaluwarsa</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>

                    <!-- Penerbangan Keberangkatan -->
                    <h6 class="mt-4 mb-3 fw-bolder">Penerbangan (Keberangkatan)</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Berangkat</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Maskapai</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No. Penerbangan</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Penerbangan Kepulangan -->
                    <h6 class="mt-4 mb-3 fw-bolder">Penerbangan (Kepulangan)</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Maskapai</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No. Penerbangan</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Hotel Mekkah -->
                    <h6 class="mt-4 mb-3 fw-bolder">Hotel Mekkah</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Hotel</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Check In</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Check Out</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>

                    <!-- Hotel Madinah -->
                    <h6 class="mt-4 mb-3 fw-bolder">Hotel Madinah</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Hotel</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Check In</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Check Out</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>

                    <!-- Lampiran -->
                    <h6 class="mt-4 mb-3 fw-bolder">Lampiran</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">KTP</label>
                            <input type="file" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Paspor</label>
                            <input type="file" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kartu Keluarga</label>
                            <input type="file" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Bukti Booking Tiket</label>
                            <input type="file" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Bukti Booking Hotel</label>
                            <input type="file" class="form-control">
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
