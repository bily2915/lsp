<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use PDF;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::all();
            return view('penjualan.index', [
            'penjualan' => $penjualan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Menampilkan Form Tambah Standar Kompetensi
        return view(
            'penjualan.create', [
            'user' => User::all() //Mengirimkan semua data user ke Modal pada halaman create
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Menyimpan Data 
        $request->validate([
            'nonota_jual' => 'required',
            'tgl_jual' => 'required',
            'total_jual' => 'required',
            'id_user' => 'required'
        ]);
            $array = $request->only([
            'nonota_jual',
            'tgl_jual',
            'total_jual',
            'id_user'
        ]);
        $penjualan = Penjualan::create($array);
        return redirect()->route('penjualan.index')->with('success_message', 'Berhasil menambah Penjualan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Menampilkan Form edit
        $penjualan = Penjualan::find($id);
        if (!$penjualan) return redirect()->route('penjualan.index')->with('error_message', 'Penjualan dengan id'.$id.' tidak ditemukan');
        return view('penjualan.edit', [
        'penjualan' => $penjualan,
        'user' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        //Mengedit Data Penjualan
        $request->validate([
            'nonota_jual' => 'required',
            'tgl_jual' => 'required',
            'total_jual' => 'required',
            'id_user' => 'required'
        ]);
            $penjualan = Penjualan::find($id);
            $penjualan->nonota_jual = $request->nonota_jual;
            $penjualan->tgl_jual = $request->tgl_jual;
            $penjualan->total_jual = $request->total_jual;
            $penjualan->id_user = $request->id_user;
            $penjualan->save();
        return redirect()->route('penjualan.index')->with('success_message', 'Berhasil mengubah Penjualan');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        //Menghapus Obat
        $penjualan = Penjualan::find($id);
        if ($penjualan) $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success_message', 'Berhasil menghapus Penjualan');
    }

    public function exportpdf2 (){
        $penjualan = Penjualan::all();

        view()->share('penjualan', $penjualan);
        $pdf = PDF::loadview('penjualan\penjualanpdf');
        return $pdf->download('Data penjualan.pdf');
    }
}
