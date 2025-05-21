@extends('layouts.admin')

@section('title')
    Dashboard LA | Saudinesia
@endsection

@section('LA')
    active
@endsection

@section('content')
    <div class="wrapper">
        @include('components.admin.sidebar')
        <div id="body">
            @include('components.admin.navbar')
            <div class="content">
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <h2>{{ isset($la) ? 'Edit' : 'Tambah' }} Land Arrangement</h2>

                    <form
                        action="{{ isset($la) ? route('land-arrangements.update', $la->id) : route('land-arrangements.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($la))
                            @method('PUT')
                        @endif

                        {{-- Nama LA --}}
                        <div class="mb-3">
                            <label for="name">Nama Land Arrangement</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $la->name ?? '') }}" required>
                        </div>

                        {{-- Daftar Layanan --}}
                        <label>Layanan</label>
                        <div id="items-wrapper">
                            @php
                                $items = old(
                                    'items',
                                    isset($la)
                                        ? $la->items->toArray()
                                        : [
                                            [
                                                'serviceable_type' => '',
                                                'serviceable_id' => '',
                                                'custom_name' => '',
                                                'keterangan' => '',
                                            ],
                                        ],
                                );
                            @endphp

                            @foreach ($items as $index => $item)
                                @php
                                    $isCustom = empty($item['serviceable_type']);
                                @endphp
                                <div class="item-group border p-3 mb-3 position-relative">
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2"
                                        onclick="this.parentElement.remove()">Hapus</button>

                                    {{-- Pilihan Radio --}}
                                    <div class="mb-2">
                                        <label>Pilih Jenis Layanan:</label><br>
                                        <label>
                                            <input type="radio" name="items[{{ $index }}][source]"
                                                value="database" {{ !$isCustom ? 'checked' : '' }}
                                                onchange="toggleItemType(this)"> Layanan dari Database
                                            </label>

                                        <label class="ms-3">
                                            <input type="radio" name="items[{{ $index }}][source]" 
                                                value="custom" {{ $isCustom ? 'checked' : '' }} 
                                                onchange="toggleItemType(this)"> Layanan Kustom
                                        </label>
                                    </div>

                                    {{-- Bagian Database --}}
                                    <div class="item-database" style="{{ $isCustom ? 'display:none' : '' }}">
                                        <div class="mb-2">
                                            <label>Tipe Layanan</label>
                                            <select name="items[{{ $index }}][serviceable_type]"
                                                class="form-control serviceable-type" onchange="fetchServiceables(this)">
                                                <option value="">-- Pilih --</option>
                                                <option value="App\Models\Hotel"
                                                    {{ $item['serviceable_type'] == 'App\Models\Hotel' ? 'selected' : '' }}>
                                                    Hotel</option>
                                                <option value="App\Models\Transport"
                                                    {{ $item['serviceable_type'] == 'App\Models\Transport' ? 'selected' : '' }}>
                                                    Transport</option>
                                            </select>
                                        </div>

                                        <div class="mb-2">
                                            <label>Layanan</label>
                                            <select name="items[{{ $index }}][serviceable_id]"
                                                class="form-control serviceable-select">
                                                @if (!$isCustom)
                                                    @php
                                                        $modelClass = $item['serviceable_type'];
                                                        $options = class_exists($modelClass)
                                                            ? app($modelClass)::all()
                                                            : [];
                                                    @endphp
                                                    @foreach ($options as $opt)
                                                        <option value="{{ $opt->id }}"
                                                            {{ $opt->id == ($item['serviceable_id'] ?? null) ? 'selected' : '' }}>
                                                            {{ $opt->name ?? 'Unnamed' }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Bagian Custom --}}
                                    <div class="item-custom" style="{{ !$isCustom ? 'display:none' : '' }}">
                                        <div class="mb-2">
                                            <label>Nama Layanan (Kustom)</label>
                                            <input type="text" name="items[{{ $index }}][custom_name]"
                                                class="form-control" value="{{ $item['custom_name'] ?? '' }}">
                                        </div>
                                    </div>
                                    
                                    {{-- Keterangan (umum) --}}
                                    <div class="mb-2">
                                        <label>Keterangan</label>
                                        <textarea name="items[{{ $index }}][keterangan]" class="form-control">{{ $item['keterangan'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="row">
                            <div class="col-sm-3 mb-3">
                                <button type="button" class="btn btn-sm btn-success" onclick="addItem()">+ Tambah
                                    Layanan</button>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('land-arrangements.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPT --}}
<script>
    function toggleItemType(radio) {
        const wrapper = radio.closest('.item-group');
        const isCustom = radio.value === 'custom';

        wrapper.querySelector('.item-database').style.display = isCustom ? 'none' : '';
        wrapper.querySelector('.item-custom').style.display = isCustom ? '' : 'none';
    }

    function addItem() {
        const wrapper = document.getElementById('items-wrapper');
        const count = wrapper.children.length;
        const html = `
            <div class="item-group border p-3 mb-3 position-relative">
                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2" onclick="this.parentElement.remove()">Hapus</button>

                <div class="mb-2">
                    <label>Pilih Jenis Layanan:</label><br>
                    <label><input type="radio" name="items[${count}][source]" value="database" checked onchange="toggleItemType(this)"> Layanan dari Database</label>
                    <label class="ms-3"><input type="radio" name="items[${count}][source]" value="custom" onchange="toggleItemType(this)"> Layanan Kustom</label>
                </div>

                <div class="item-database">
                    <div class="mb-2">
                        <label>Tipe Layanan</label>
                        <select name="items[${count}][serviceable_type]" class="form-control serviceable-type" onchange="fetchServiceables(this)">
                            <option value="">-- Pilih --</option>
                            <option value="App\\\\Models\\\\Hotel">Hotel</option>
                            <option value="App\\\\Models\\\\Transport">Transport</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label>Layanan</label>
                        <select name="items[${count}][serviceable_id]" class="form-control serviceable-select"></select>
                    </div>
                </div>

                <div class="item-custom" style="display: none;">
                    <div class="mb-2">
                        <label>Nama Layanan (Kustom)</label>
                        <input type="text" name="items[${count}][custom_name]" class="form-control">
                    </div>
                </div>

                <div class="mb-2">
                    <label>Keterangan</label>
                    <textarea name="items[${count}][keterangan]" class="form-control"></textarea>
                </div>
            </div>
        `;
        wrapper.insertAdjacentHTML('beforeend', html);
    }

    function fetchServiceables(select) {
        const type = select.value;
        const parent = select.closest('.item-group');
        const serviceableSelect = parent.querySelector('.serviceable-select');

        fetch(`/api/serviceables?type=${encodeURIComponent(type)}`)
            .then(res => res.json())
            .then(data => {
                serviceableSelect.innerHTML = '';
                data.forEach(item => {
                    const opt = document.createElement('option');
                    opt.value = item.id;
                    opt.textContent = item.name || 'Unnamed';
                    serviceableSelect.appendChild(opt);
                });
            })
            .catch(error => {
                console.error("Fetch error:", error);
            });
    }
</script>

@endsection
