<?php

namespace App\Http\Controllers;

use App\Models\DetailPembelian;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $detail_pembelian = DetailPembelian::all();
        $detail_penjualan = DetailPenjualan::all();
        return view('laporan.index', [
            'detail_pembelian' => $detail_pembelian,
            'detail_penjualan' => $detail_penjualan,
        ]);
    }

    public function cetakPembelian()
    {
        $detail_pembelian = DetailPembelian::all();

        view()->share('detail_pembelian', $detail_pembelian);
        $pdf = PDF::loadview('laporan\pembelian');
        return $pdf->download('Data Detail Pembelian.pdf');
    }

    public function cetakPenjualan()
    {
        $detail_penjualan = DetailPenjualan::all();

        view()->share('detail_penjualan', $detail_penjualan);
        $pdf = PDF::loadview('laporan\penjualan');
        return $pdf->download('Data Detail Penjualan.pdf');
    }
}
