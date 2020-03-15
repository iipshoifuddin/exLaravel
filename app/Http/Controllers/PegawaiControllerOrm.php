<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// panggil model pegawai
use App\Pegawai;


class PegawaiControllerOrm extends Controller
{
    //
    public function index()
    {
    	// mengambil data pegawai
    	$pegawai = Pegawai::all();

    	// mengirim data pegawai ke view pegawai
    	return view('pegawai2', ['pegawai' => $pegawai]);
    }
    public function tambah()
    {

        // memanggil view tambah
        return view('pegawai2Tambah');

    }
        // method untuk insert data ke table pegawai
    public function store(Request $request)
    {
        $pegawai = new Pegawai;
        $pegawai->pegawai_nama = $request->nama;
        $pegawai->pegawai_jabatan = $request->jabatan;
        $pegawai->pegawai_umur = $request->umur;
        $pegawai->pegawai_alamat = $request->alamat;
        $pegawai->save();

        return redirect('/pegawai2');
    }
    public function edit($pegawai_id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $pegawai = Pegawai::where('pegawai_id', $pegawai_id)->get(); 
        // passing data pegawai yang didapat ke view
        return view('pegawai2Edit',['pegawai' => $pegawai]);
    }

    public function update(Request $request)
    {
        // update data pegawai
        $pegawai = Pegawai::where('pegawai_id', $request->id);
        $pegawai->update(['pegawai_nama' => $request->nama,
                          'pegawai_jabatan' => $request->jabatan,
                          'pegawai_umur' => $request->umur,
                          'pegawai_alamat' => $request->alamat]); 
        return redirect('/pegawai2');
    }

    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        $pegawai = Pegawai::where('pegawai_id', $id);
        $pegawai->delete(); 
        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai2');
    }

}
