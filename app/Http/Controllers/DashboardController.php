<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function store(Request $request)
    {

        $nama = $request->nama;
        $pesan = explode(',', $request->pesan);
        $jumlah_pesanan = count($pesan);
        $total_pesanan = $jumlah_pesanan*50;
        $status = $request->member;
        $hasil = new total($status, $total_pesanan);
        $data = [
            'nama' => $nama ,
            'jumlah_pesanan' => $jumlah_pesanan ,
            'total_pesanan' => $jumlah_pesanan ,
            'status' => $status ,
            'diskon' => $hasil->diskon() ,
            'total_pembayaran' => $hasil->diskon() ,
        ];

        return view('home',compact('data'));
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
