<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        if (Auth::user()->role == 'admin') {
            return view('home');
        } else {
            return redirect()->route('menu.index');
        }
    }
    public function store(Request $request)
    {
        $nama = $request->nama;
        $pesan = explode(',', $request->jumlah_pesanan);
        $jumlah_pesanan = count($pesan);
        $total_pesanan = $jumlah_pesanan * 50000;
        $status = $request->status;
        $hasil = new total($status, $total_pesanan);
        $data = [
            'nama' => $nama,
            'jumlah_pesanan' => $jumlah_pesanan,
            'total_pesanan' => $total_pesanan,
            'status' => $status,
            'diskon' => $hasil->diskon(),
            'total_pembayaran' => $hasil->pembayaran(),
        ];
        return view('home', compact('data'));
    }
}

interface cetak
{

    public function diskon();
}
class hasil implements cetak
{
    public function __construct($sts, $psn)
    {
        $this->status = $sts;
        $this->pesan = $psn;
    }

    public function diskon()
    {

        if ($this->status == 'member' && $this->pesan >= 100000) {
            $diskon = $this->pesan * 0.2;
        } elseif ($this->status == 'member' && $this->pesan < 100000) {
            $diskon = $this->pesan * 0.1;
        } else {
            $diskon = 'tidak ada diskon untuk anda ';
        }

        return $diskon;
    }
}

class total extends hasil
{
    public function pembayaran()
    {
        $totalpemesanan = $this->pesan;
        $diskon = $this->diskon();

        return $totalpemesanan - $diskon;
    }
}
