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

                    {{-- Pilihan Ajukan Untuk --}}
                    <div class="mb-3">
                        <label for="is_self" class="form-label">Ajukan untuk:</label>
                        <select name="is_self" id="is_self" class="form-select" onchange="toggleManualForm()">
                            <option value="1" {{ old('is_self') == '1' ? 'selected' : '' }}>Diri sendiri</option>
                            <option value="0" {{ old('is_self') == '0' ? 'selected' : '' }}>Orang lain</option>
                        </select>
                    </div>

                    {{-- Form Manual - hanya muncul jika is_self == 0 --}}
                    <div id="manual-form" style="display: none;">
                        <h5>Data Pemohon</h5>
                        @foreach ([
            'nama_lengkap' => 'Nama Lengkap',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'pekerjaan' => 'Pekerjaan',
            'no_hp' => 'No HP',
            'no_paspor' => 'No Paspor',
            'paspor_terbit' => 'Tanggal Terbit Paspor',
            'paspor_kadaluarsa' => 'Tanggal Kadaluarsa Paspor',
            'wilayah_terbit' => 'Wilayah Terbit Paspor',
        ] as $field => $label)
                            <div class="mb-3">
                                <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                <input type="{{ str_contains($field, 'tanggal') ? 'date' : 'text' }}"
                                    name="{{ $field }}" class="form-control" value="{{ old($field) }}">
                                @error($field)
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach

                        {{-- Jenis Kelamin --}}
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label><br>
                            <label><input type="radio" name="jenis_kelamin" value="Laki-laki"
                                    {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}> Laki-laki</label>
                            <label><input type="radio" name="jenis_kelamin" value="Perempuan"
                                    {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}> Perempuan</label>
                            @error('jenis_kelamin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Informasi Keberangkatan --}}
                    <h5>Detail Keberangkatan</h5>
                    @foreach ([
            'tanggal_berangkat' => 'Tanggal Berangkat',
            'maskapai_berangkat' => 'Maskapai Berangkat',
            'no_penerbangan_berangkat' => 'Nomor Penerbangan Berangkat',
            'tanggal_kembali' => 'Tanggal Kembali',
            'maskapai_kembali' => 'Maskapai Kembali',
            'no_penerbangan_kembali' => 'Nomor Penerbangan Kembali',
        ] as $field => $label)
                        <div class="mb-3">
                            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                            <input type="{{ str_contains($field, 'tanggal') ? 'date' : 'text' }}"
                                name="{{ $field }}" class="form-control" value="{{ old($field) }}">
                            @error($field)
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    {{-- Hotel Mekkah & Madinah --}}
                    <h5>Detail Hotel</h5>
                    @foreach ([
            'hotel_mekkah' => 'Hotel Mekkah',
            'checkin_mekkah' => 'Check-In Mekkah',
            'checkout_mekkah' => 'Check-Out Mekkah',
            'hotel_madinah' => 'Hotel Madinah',
            'checkin_madinah' => 'Check-In Madinah',
            'checkout_madinah' => 'Check-Out Madinah',
        ] as $field => $label)
                        <div class="mb-3">
                            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                            <input type="{{ str_contains($field, 'check') ? 'date' : 'text' }}" name="{{ $field }}"
                                class="form-control" value="{{ old($field) }}">
                            @error($field)
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    {{-- Upload File --}}
                    <h5>Lampiran</h5>
                    @foreach ([
            'lampiran_ktp' => 'KTP',
            'lampiran_kk' => 'Kartu Keluarga',
            'lampiran_paspor' => 'Paspor',
            'lampiran_tiket' => 'lampiran/tiket.jpg',
            'lampiran_hotel' => 'lampiran/hotel.jpg',
        ] as $field => $label)
                        @php
                            $isPaspor = $field === 'lampiran_paspor';
                        @endphp
                        <div class="mb-3 {{ $isPaspor ? '' : '' }}" id="{{ $isPaspor ? 'lampiran-paspor-wrapper' : '' }}">
                            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                            <input type="file" name="{{ $field }}" class="form-control">
                            @error($field)
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach


                    <button type="submit" class="btn btn-primary">Ajukan Visa</button>
                </form>

            </div>
        </section>


    </div>
    <script>
        function toggleManualForm() {
            const isSelf = document.getElementById('is_self').value === '1';
            document.getElementById('manual-form').style.display = isSelf ? 'none' : 'block';
            document.getElementById('lampiran-paspor-wrapper').style.display = isSelf ? 'none' : 'block';
        }

        // Jalankan saat halaman pertama kali dimuat
        document.addEventListener('DOMContentLoaded', toggleManualForm);
    </script>
@endsection
