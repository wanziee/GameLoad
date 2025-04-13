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
        .all-isi-table{
            font-size: 14px;
            font-weight: 200;
        }

        .house {
            font-size: 26px;
            color: rgb(79, 140, 255) !important;
        }

    </style>
    <div class="p-4">
        <div class="row">
            <div class="col-12 col-xl-6">
                <!-- Breadcrumb start -->
                <ol class="breadcrumb d-none d-lg-flex mb-4 align-items-center">
                    <li class="breadcrumb-item d-flex align-items-center">
                        <!-- Ganti teks dengan ikon Home -->
                        <i class="bi bi-house-door me-3 house"></i>
                        <a href="#" class="text-decoration-none text-white">Home</a>
                    </li>
                    <!-- Ganti separator dengan ikon -->
                    <li class="breadcrumb-item text-white d-flex justify-content-center">
                        <i class="bi bi-chevron-right"></i>
                    </li>
                    <li class="breadcrumb-item games">Users
                    </li>
                </ol>
                <!-- Breadcrumb end -->
            </div>
        </div>
        
        <div class="box">
            <div class="table-responsive ">
                <table class="table ">
                    <thead>
                        <tr class="text-white ">
                            <th>No.</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($allUsers->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center">Data Produk Tidak Tersedia</td>
                            </tr>
                        @else
                            @foreach ($allUsers as $index => $user)
                                <tr class="align-middle all-isi-table">
                                    <td class="text-white">{{ $index + 1 }}</td>
                                    <td class="text-white">{{ $user->username }}</td>
                                    <td class="text-white">{{ $user->email }}</td>
                                    {{-- <td class="text-white">{{ substr($user->password, 0, 5) . '...' }}</td> --}}
                                    <td class="text-white">{{ $user->role}}</td>
                                    <td class="action-button d-flex d-md-flex d-lg-flex flex-column flex-md-row">
                                        <div class="box-edit">
                                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-custom-class="custom-tooltip-primary"
                                                data-bs-title="Edit" aria-describedby="tooltip302346">
                                                <i class="bi edit bi-pencil-square "></i>
                                            </button>
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
