@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                  
                    <div class="container">
                        <div class="row">
                            <div class="col">
                    
                                <form action="{{ route('home.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Pesanan <br><i>masukkan nama pesanan lebih dari 1, dipisahkan dengan (,)</i></label>
                                        <input type="text" class="form-control" name="jumlah_pesanan">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="member">Member</option>
                                            <option value="pelanggan_biasa">pelangan biasa</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="col">
                                @isset($data)
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" value="{{ $data['nama'] }}" >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">jumlah Pesanan</label>
                                    <input type="number" class="form-control" value="{{ $data['jumlah_pesanan'] }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">total Pesanan</label>
                                    <input type="number" class="form-control" value="{{ $data['total_pesanan'] }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">status Pesanan</label>
                                    <input type="text" class="form-control" value="{{ $data['status'] }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Diskon</label>
                                    <input type="number" class="form-control" value="{{ $data['diskon'] }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Total Pembayaran</label>
                                    <input type="number" class="form-control" value="{{ $data['total_pembayaran'] }}">
                                </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection