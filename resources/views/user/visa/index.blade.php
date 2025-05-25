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

                    @php
                        $useProfile = request()->old('is_self', '1') === '1' && isset($profile);
                    @endphp

                    <div id="manual-form">
                        <h5>Data Pemohon</h5>

                        @php
                            $fields = [
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
                            ];
                        @endphp

                        @foreach ($fields as $field => $label)
                            @php
                                $isDate = str_contains($label, 'Tanggal');
                                $value = old($field, $useProfile ? $profile->$field ?? '' : '');
                            @endphp

                            @if ($field === 'jenis_kelamin')
                                <div class="mb-3">
                                    <label class="form-label">{{ $label }}</label><br>
                                    @foreach (['Laki-laki', 'Perempuan'] as $gender)
                                        <label class="me-3">
                                            <input type="radio" name="{{ $field }}" value="{{ $gender }}"
                                                {{ $value === $gender ? 'checked' : '' }}> {{ $gender }}
                                        </label>
                                    @endforeach
                                    @error($field)
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @else
                                <div class="mb-3">
                                    <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                    <input type="{{ $isDate ? 'date' : 'text' }}" name="{{ $field }}"
                                        id="{{ $field }}" class="form-control" value="{{ $value }}">
                                    @error($field)
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                        @endforeach
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
@endsection
