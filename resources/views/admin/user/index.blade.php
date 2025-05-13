@extends('layouts.admin')

@section('title')
    Dashboard User | Saudinesia
@endsection

@section('User')
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
                        <h3 class="mb-0">Tabel User</h3>
                    </div>
                    <div class="row px-2">

                        <table class="table table-bordered mt-3">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Dibuat pada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($query as $index => $user)
                                    <tr>
                                        <td>{{ $index + $query->firstItem() }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada user ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        @if ($query->hasPages())
                            <div class="d-flex justify-content-center">
                                {!! $query->links('pagination::bootstrap-5') !!}
                            </div>
                        @endif




                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
