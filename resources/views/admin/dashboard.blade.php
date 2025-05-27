@extends('layouts.admin')

@section('title')
    Dashboard | Saudinesia
@endsection

@section('dashboard')
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
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title">Dashboard</h2>
                        </div>
                    </div>
                    {{-- SECTION: Statistik Singkat --}}
                    <div class="row">
                        @php
                            $cards = [
                                [
                                    'title' => 'Total Pengguna',
                                    'count' => $users,
                                    'icon' => 'bi-people-fill',
                                    'bg' => 'primary',
                                ],
                                ['title' => 'Paket Haji', 'count' => $haji, 'icon' => 'bi-kaaba', 'bg' => 'success'],
                                [
                                    'title' => 'Paket Umroh',
                                    'count' => $umroh,
                                    'icon' => 'bi-moon-stars',
                                    'bg' => 'info',
                                ],
                                [
                                    'title' => 'Total Hotel',
                                    'count' => $hotels,
                                    'icon' => 'bi-building',
                                    'bg' => 'warning',
                                ],
                                [
                                    'title' => 'Transportasi',
                                    'count' => $transport,
                                    'icon' => 'bi-bus-front',
                                    'bg' => 'danger',
                                ],
                                [
                                    'title' => 'Pengajuan Visa',
                                    'count' => $visa,
                                    'icon' => 'bi-file-earmark-text',
                                    'bg' => 'secondary',
                                ],
                                [
                                    'title' => 'Permintaan Muttowif',
                                    'count' => $muttowif,
                                    'icon' => 'bi-person-check',
                                    'bg' => 'dark',
                                ],
                                [
                                    'title' => 'Total Merchandise',
                                    'count' => $merchandise,
                                    'icon' => 'bi-bag',
                                    'bg' => 'info',
                                ],
                                [
                                    'title' => 'Total Transaksi',
                                    'count' => $transactions,
                                    'icon' => 'bi-receipt',
                                    'bg' => 'success',
                                ],
                                [
                                    'title' => 'Total Land Arrangement',
                                    'count' => $landArrangements,
                                    'icon' => 'bi-geo-alt',
                                    'bg' => 'primary',
                                ],
                            ];
                        @endphp


                        @foreach ($cards as $card)
                            <div class="col-md-3 mb-3">
                                <div class="card text-white bg-{{ $card['bg'] }}">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6>{{ $card['title'] }}</h6>
                                                <h3>{{ $card['count'] }}</h3>
                                            </div>
                                            <i class="bi {{ $card['icon'] }} fs-1"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- SECTION: Visa Terbaru --}}
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>Pengajuan Visa Terbaru</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>No Paspor</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>Tanggal Kembali</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($visaLatest as $i => $v)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $v->nama_lengkap }}</td>
                                            <td>{{ $v->no_paspor }}</td>
                                            <td>{{ \Carbon\Carbon::parse($v->tanggal_berangkat)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($v->tanggal_kembali)->format('d-m-Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Belum ada data visa.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- SECTION: Muttowif --}}
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>Permintaan Muttowif</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Akun</th>
                                        <th>Jumlah Jamaah</th>
                                        <th>Periode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($muttowifList as $i => $m)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $m->user->name ?? '-' }}</td>
                                            <td>{{ $m->jamaah_count }}</td>
                                            <td>{{ \Carbon\Carbon::parse($m->start_date)->format('d-m-Y') }} -
                                                {{ \Carbon\Carbon::parse($m->end_date)->format('d-m-Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data muttowif aktif.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
