@extends('layouts.admin')

@section('title')
    Dashboard LA | Saudinesia
@endsection

@section('LA')
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
                        <h3 class="mb-0">Daftar Land Arrangements</h3>
                        <a href="{{ route('land-arrangements.create') }}" class="btn btn-primary">Tambah LA</a>
                    </div>

                    <div class="row px-2">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama LA</th>
                                    <th>Daftar Layanan</th>
                                    <th>Umroh</th>
                                    <th>Haji</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($landArrangements as $la)
                                    <tr>
                                        <td>{{ $la->id }}</td>
                                        <td>{{ $la->name }}</td>
                                        <td>
                                            <ul class="mb-0 ps-3">
                                                @foreach ($la->items as $item)
                                                    <li>
                                                        @if ($item->serviceable)
                                                            {{ class_basename($item->serviceable_type) }}:
                                                            {{ $item->serviceable->name }}
                                                        @elseif ($item->custom_name)
                                                            Kustom: {{ $item->custom_name }}
                                                        @else
                                                            <em>Tanpa nama</em>
                                                        @endif
                                                        @if ($item->keterangan)
                                                            <br><small class="text-muted">{{ $item->keterangan }}</small>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            @foreach ($la->umrohs as $item)
                                               <li>{{ $item->name }}</li> 
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($la->hajis as $item)
                                               <li>{{ $item->name }}</li> 
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('land-arrangements.edit', $la->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('land-arrangements.destroy', $la->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Yakin ingin menghapus LA ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($landArrangements->hasPages())
                            <div class="my-4 d-flex justify-content-center">
                                {!! $landArrangements->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
