@extends('layouts.admin')

@section('title')
    Dashboard Visa | Saudinesia
@endsection

@section('Visa')
    active
@endsection

@section('content')
    <div class="wrapper">
        <!-- Sodebar -->
        @include('components.admin.sidebar')
        <!-- Sodebar -->
        <div id="body">
            <!-- Navbar -->
            @include('components.admin.navbar')
            <!-- Navbar -->
            <div class="content">
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="page-title my-3 d-flex justify-content-between align-items-center pb-3">
                        <h3 class="mb-0">Pemesanan Visa</h3>
                    </div>
                    <div class="row px-2">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Paspor</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Akun</th>
                                    <th>Lampiran KTP</th>
                                    <th>Lampiran Paspor</th>
                                    <th>Lampiran KK</th>
                                    <th>Lampiran Tiket</th>
                                    <th>Lampiran Hotel</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($visa as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama_lengkap }}</td>
                                        <td>{{ $item->tempat_lahir }},
                                            {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->no_paspor ?? '-' }}</td>
                                        <td>{{ optional($item->tanggal_berangkat)->format('d-m-Y') }}</td>
                                        <td>{{ optional($item->tanggal_kembali)->format('d-m-Y') }}</td>
                                        <td>{{ $item->user->name ?? '-' }}</td>

                                        {{-- Lampiran File --}}
                                        <td>
                                            @if ($item->lampiran_ktp)
                                                <a class="btn btn-sm btn-outline-primary" href="{{ asset('uploads/' . $item->lampiran_ktp) }}"
                                                    target="_blank">Lihat</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->lampiran_paspor)
                                                <a class="btn btn-sm btn-outline-primary" href="{{ asset('uploads/' . $item->lampiran_paspor) }}"
                                                    target="_blank">Lihat</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->lampiran_kk)
                                                <a class="btn btn-sm btn-outline-primary" href="{{ asset('uploads/' . $item->lampiran_kk) }}"
                                                    target="_blank">Lihat</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->lampiran_tiket)
                                                <a class="btn btn-sm btn-outline-primary" href="{{ asset('uploads/' . $item->lampiran_tiket) }}"
                                                    target="_blank">Lihat</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->lampiran_hotel)
                                                <a class="btn btn-sm btn-outline-primary" href="{{ asset('uploads/' . $item->lampiran_hotel) }}"
                                                    target="_blank">Lihat</a>
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm">Konfirmasi</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="15" class="text-center">Belum ada data pengajuan visa.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        @if ($visa->hasPages())
                            <div class="my-4 d-flex justify-content-center">
                                {!! $visa->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        @endif



                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
