@extends('layouts.user')

@section('title')
    Profile User | Saudinesia
@endsection

@section('profile')
    active
@endsection

@section('content')
<div class="container">
    <h1>Edit Profil Saya</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profiles.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $userProfile->nama_lengkap) }}" required>
        </div>

        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $userProfile->tempat_lahir) }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $userProfile->tanggal_lahir) }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="Laki-laki" {{ old('jenis_kelamin', $userProfile->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $userProfile->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $userProfile->no_hp) }}">
        </div>

        <div class="mb-3">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $userProfile->pekerjaan) }}">
        </div>

        <div class="mb-3">
            <label>No Paspor</label>
            <input type="text" name="no_paspor" class="form-control" value="{{ old('no_paspor', $userProfile->no_paspor) }}">
        </div>

        <div class="mb-3">
            <label>Paspor Terbit</label>
            <input type="date" name="paspor_terbit" class="form-control" value="{{ old('paspor_terbit', $userProfile->paspor_terbit) }}">
        </div>

        <div class="mb-3">
            <label>Paspor Kadaluarsa</label>
            <input type="date" name="paspor_kadaluarsa" class="form-control" value="{{ old('paspor_kadaluarsa', $userProfile->paspor_kadaluarsa) }}">
        </div>

        <div class="mb-3">
            <label>Wilayah Terbit</label>
            <input type="text" name="wilayah_terbit" class="form-control" value="{{ old('wilayah_terbit', $userProfile->wilayah_terbit) }}">
        </div>

        <div class="mb-3">
            <label>Foto</label><br>
            @if ($userProfile->photo)
                <img src="{{ asset('uploads/' . $userProfile->photo) }}" width="100" class="mb-2"><br>
            @endif
            <input type="file" name="photo" class="form-control">
        </div>

        <div class="mb-3">
            <label>Lampiran Paspor</label><br>
            @if ($userProfile->lampiran_paspor)
                <a href="{{ asset('uploads/' . $userProfile->lampiran_paspor) }}" target="_blank">Lihat File</a><br>
            @endif
            <input type="file" name="lampiran_paspor" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('profiles.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection