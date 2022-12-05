@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah
                    Category</button>
                {{-- model tambah  --}}
                <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('category.store') }}" method="POST">
                                    @method('POST')
                                    @csrf
                                    <input type="text" placeholder="nama" name="nama" class="form-control mb-3">
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
                                <th>Nama Category</th>
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
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                Edit Post
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#editmodal{{ $item->id }}"
                                                        href="{{ route('category.edit', $item->id) }}">edit</a></li>
                                                <form action="{{ route('category.destroy', $item->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="dropdown-item" type="submit">Delete</button>
                                                </form>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @include('pages.category.modeledit')
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection