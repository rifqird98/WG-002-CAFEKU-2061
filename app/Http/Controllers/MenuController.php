<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Menu::with('Category')->paginate(10);
        $category = Category::all();
        $i = 1;
        return view('pages.menu.index', compact('data', 'i','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('pages.menu.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('menu/foto', 'public');

        Menu::create($data);
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $Menu)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = Menu::with('Category')->findOrFail($id);
        // $category = Category::all();
        // return view('pages.Menu.edit', compact('data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $data['foto'] = $request->file('foto')->store('menu/foto', 'public');
            $item = Menu::findOrFail($id);
            $item->update($data);
        } catch (\Throwable $th) {
            
            $item = Menu::findOrFail($id);
            $foto = $item->foto;
            $item->update([
                'nama'=> $request->nama,
                'foto'=> $foto,
                'harga'=> $request->harga,
                'keterangan'=> $request->keterangan,
                'id_category'=> $request->id_category,
            ]);
            
        }
        return redirect()->route('menu.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Menu::findOrFail($id);
        $data->delete();

        return redirect()->route('Menu.index');
    }
}
