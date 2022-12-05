<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $data = Menu::with('category')->paginate(10);
        return view('beranda', compact('data'));
    }
}
