@extends('layouts.layout')

@section('content')

    <style>
        .box {
            height: auto;
            background-color: #191C24;
            padding: 10px;
            position: relative;
        }

        .table {
            border-color: rgb(100, 100, 100);
            border-width: 1px;
        }

        .edit,
        .delete {
            color: white !important;
        }

        .action-button {
            gap: 3px;
        }

        .games {
            color: rgb(79, 140, 255) !important;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            content: "";
            color: white;


        }

        .house {
            font-size: 26px;
            color: rgb(79, 140, 255) !important;
        }

        .bi-plus-lg {
            color: rgb(79, 140, 255) !important;
            font-size: 23px;
        }

        .box-tambah-game{
            border: 1px solid rgb(79, 140, 255) ;
            border-radius: 5px;
            padding: 3px;
            padding-left: 5px;
            padding-right: 8px;
            color: rgb(79, 140, 255) !important;
            cursor: pointer;
        }
        .box-tambah-game:hover {
            border: 1px solid rgb(121, 168, 255) ;
            color: rgb(121, 168, 255) ;
        }

        .text-tambah-game{
            font-size: 15px;
        }

        .box-tambah-game:hover {
        background-color: rgb(79, 140, 255); 
        color: white; 
        border-color: rgb(79, 140, 255); 
        text-decoration: none; 
        
    }
    .all-isi-table{
        font-size: 14px;
        font-weight: 200;
    }

    .box-tambah-game:hover i,
    .box-tambah-game:hover p {
        color: white !important;
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
                    <li class="breadcrumb-item games">Games
                    </li>
                </ol>
                <!-- Breadcrumb end -->
            </div>
        </div>
        <div class="tambah-game d-flex justify-content-end position-relative mb-2">
            <a href="{{ route('show.adminTambahGame')}}" class="inner-object box-tambah-game d-flex justify-content-center align-items-center text-decoration-none">
                <i class="bi bi-plus-lg"></i>
                <p class="p-0 m-0 ms-1 text-tambah-game">Tambah Game</p>
            </a>
        </div>
        
        <div class="box">

            <div class="table-responsive ">
                <table class="table ">
                    <thead>
                        <tr class="text-white ">
                            <th>No.</th>
                            <th>Nama Game</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($games->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center">Data Produk Tidak Tersedia</td>
                            </tr>
                        @else
                            @foreach ($games as $index => $game)
                                <tr class="align-middle all-isi-table">
                                    <td class="text-white">{{ $index + 1 }}</td>
                                    <td class="text-white">{{ $game->nama_game }}</td>
                                    <td class="text-white">{{ $game->kategori->nama_kategori }}</td>
                                    <td class="action-button d-flex d-md-flex d-lg-flex flex-column flex-md-row">
                                        <div class="box-edit">
                                            <a href="{{ route('admin.games.edit', $game->id) }}" class="btn btn-outline-primary btn-sm" 
                                               data-bs-toggle="tooltip" data-bs-placement="top" 
                                               data-bs-custom-class="custom-tooltip-primary" data-bs-title="Edit" aria-describedby="tooltip302346">
                                                <i class="bi edit bi-pencil-square"></i>
                                            </a>
                                        </div>
                                        
                                        <div class="box-delete ">
                                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-custom-class="custom-tooltip-danger"
                                                data-bs-title="Delete" aria-describedby="tooltip334726">
                                                <i class="bi delete bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>






@endsection
