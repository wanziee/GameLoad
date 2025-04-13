@extends('layouts.layout')

@section('content')
    <style>

        body{
            color: white
        }
           .house {
            font-size: 26px;
            color: rgb(79, 140, 255) !important;
        }
        .breadcrumb-item+.breadcrumb-item::before {
            content: "";
            color: white;
        }
        .edit-game {
            color: rgb(79, 140, 255) !important;
        }

        input {
            background-color: #191C24 !important;
            color: white !important;
            border: 1px solid gray !important;
        }
        .form-select{
            background-color: #191C24 !important;
            color: white !important;
            border: 1px solid gray !important;
        }
        textarea{
            background-color: #191C24 !important;
            color: white !important;
            border: 1px solid gray !important;
        }
    </style>
    <div class="p-4">
        <div class="row">
            <div class="col-12">
                <!-- Breadcrumb start -->
                <ol class="breadcrumb  d-lg-flex mb-4 align-items-center">
                    <li class="breadcrumb-item d-flex align-items-center">
                        <!-- Ganti teks dengan ikon Home -->
                        <i class="bi bi-house-door me-3 house"></i>
                        <a href="{{route('show.adminDashboard')}}" class="text-decoration-none text-white">Home</a>
                    </li>
                    <!-- Ganti separator dengan ikon -->
                    <li class="breadcrumb-item text-white d-flex justify-content-center">
                        <i class="bi bi-chevron-right"></i>
                    </li>
                    <li class="breadcrumb-item games text-white">
                        <a href="{{route('show.adminAllGames')}}" class="text-decoration-none text-white">Games</a>
                    </li>
                    <li class="breadcrumb-item text-white d-flex justify-content-center">
                        <i class="bi bi-chevron-right"></i>
                    </li>
                    <li class="breadcrumb-item edit-game">Edit Game
                    </li>
                </ol>
                <!-- Breadcrumb end -->
            </div>
        </div>
        <h2 class="text-white">Edit Game</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.games.update', $game->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_game" class="form-label">Nama Game</label>
                <input type="text" class="form-control @error('nama_game') is-invalid @enderror" id="nama_game"
                    name="nama_game" value="{{ old('nama_game', $game->nama_game) }}">
                @error('nama_game')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == old('kategori_id', $game->kategori_id) ? 'selected' : '' }}>
                            {{ $category->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="detail" class="form-label">Detail</label>
                <textarea class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail"
                    rows="4">{{ old('detail', $game->detail) }}</textarea>
                @error('detail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="banner" class="form-label">Banner</label>
                <input type="file" class="form-control @error('banner') is-invalid @enderror" id="banner" name="banner">
                @error('banner')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
