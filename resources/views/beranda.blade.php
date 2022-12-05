@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @foreach ($data as $item)
                    <div class="card">
                        <div class="card-header">{{ __('Post') }}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p>nama : {{ $item->nama }}</p>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <img src="{{ Storage::url($item->foto) }}" alt="" style="width: auto; height:150px ;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>harga : <i>{{ $item->harga }}</i></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <textarea class="form-control">
                                        {{ $item->keterangan }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
