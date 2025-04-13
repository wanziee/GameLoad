@extends('layouts.layout')

@section('content')
    <style>
        td {
            color: white;
        }
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

        .status-paid {
            background-color: #00D25B !important; /* Warna hijau untuk PAID */
        }

        .status-unpaid {
            background-color: rgb(255, 74, 74) !important; /* Warna merah untuk UNPAID */
        }

        .transaction-status{
            padding: 5px 7px;
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 12px;
        }

        .detail-table{
            font-weight: 200;
            font-size: 15px;
        }


    </style>
    <div class="p-4">
        <div class="row">
            <div class="col-12 col-xl-6">
                <!-- Breadcrumb start -->
                <ol class="breadcrumb d-none d-lg-flex mb-4 align-items-center">
                    <li class="breadcrumb-item d-flex align-items-center">
                        <i class="bi bi-house-door me-3 house"></i>
                        <a href="#" class="text-decoration-none text-white">Home</a>
                    </li>
                    <li class="breadcrumb-item text-white d-flex justify-content-center">
                        <i class="bi bi-chevron-right"></i>
                    </li>
                    <li class="breadcrumb-item games">Transaksi
                    </li>
                </ol>
                <!-- Breadcrumb end -->
            </div>
        </div>

        <div class="box">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-white">
                            <th>No.</th>
                            <th>Kode Transaksi</th>
                            <th>Id Game</th>
                            <th>Email</th>
                            <th>Nama Game</th>
                            <th>Item</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($transaksi->isEmpty())
                            <tr>
                                <td colspan="12" class="text-center">Data Transaksi Tidak Tersedia</td>
                            </tr>
                        @else
                            @foreach ($transaksi as $index => $transaksi)
                                <tr class="align-middle">
                                    <td class="text-white detail-table">{{ $index + 1 }}</td>
                                    <td class="text-white detail-table">{{ $transaksi->transaction_id }}</td>
                                    <td class="text-white detail-table">{{ $transaksi->id_game_user }}</td>
                                    <td class="text-white detail-table">{{ $transaksi->email }}</td>
                                    <td class="text-white detail-table">{{ $transaksi->nama_game }}</td>
                                    <td class="text-white detail-table">{{ $transaksi->jumlah_diamond }}</td>
                                    <td class="text-white detail-table">Rp. {{ number_format($transaksi->harga_diamond, 0, ',', '.') }}</td>
                                    <td><div class="transaction-status @if ($transaksi->status == 'PAID') 
                                            status-paid 
                                        @elseif ($transaksi->status == 'UNPAID') 
                                            status-unpaid 
                                        @endif">
                                        {{ $transaksi->status }}
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
