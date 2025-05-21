@extends('layouts.user')

@section('title')
    Profile User | Saudinesia
@endsection

@section('profile')
    active
@endsection

@section('content')
<div class="container">
    <h1>Profil Saya</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($profile)
        <table class="table table-bordered">
            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $profile->nama_lengkap }}</td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>{{ $profile->tempat_lahir }}, {{ $profile->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $profile->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>No HP</th>
                <td>{{ $profile->no_hp }}</td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <td>{{ $profile->pekerjaan }}</td>
            </tr>
            <tr>
                <th>Paspor</th>
                <td>{{ $profile->no_paspor ?? '-' }}</td>
            </tr>
            <tr>
                <th>Lampiran Paspor</th>
                <td>
                    @if($profile->lampiran_paspor)
                        <a href="{{ asset('uploads/' . $profile->lampiran_paspor) }}" target="_blank">Lihat</a>
                    @else
                        Tidak ada
                    @endif
                </td>
            </tr>
            <tr>
                <th>Foto</th>
                <td>
                    @if($profile->photo)
                        <img src="{{ asset('uploads/' . $profile->photo) }}" width="100">
                    @else
                        Tidak ada
                    @endif
                </td>
            </tr>
        </table>

        <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-warning">Edit Profil</a>
    @else
        <p>Profil belum tersedia.</p>
        <a href="{{ route('profiles.create') }}" class="btn btn-primary">Buat Profil</a>
    @endif
</div>
@endsection