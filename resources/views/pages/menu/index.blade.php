@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah
                    Menu</button>
                {{-- model tambah  --}}
                <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <input type="text" placeholder="nama" name="nama" class="form-control mb-3">
                                    <input type="file" placeholder="foto" name="foto" class="form-control mb-3">
                                    <input type="number" placeholder="harga" name="harga" class="form-control mb-3">
                                    <select name="id_category" id="" class="form-control mb-3">
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"> Keterangan</textarea>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">{{ __('Category') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>category</th>
                                <th>Harga</th>
                                <th>keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $item->nama }}
                                    </td>
                                    <td>
                                        <img src="{{ Storage::url($item->foto) }}" alt="" style="width: auto; height: 50px;">
                                    </td>
                                    <td>
                                        {{ $item->category->nama }}
                                    </td>
                                    <td>
                                        {{ $item->harga }}
                                    </td>
                                    <td>
                                        <textarea class="form-control">{{ $item->keterangan }}</textarea>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                Edit Post
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#editmodal{{ $item->id }}"
                                                        href="{{ route('menu.edit', $item->id) }}">edit</a></li>
                                                <form action="{{ route('menu.destroy', $item->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="dropdown-item" type="submit">Delete</button>
                                                </form>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @include('pages.menu.modeledit')
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection