@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="min-height: 85vh"> 
                <div class="card-header bg-white">
                    <div class="box">
                        @if(session('sukses'))
                        <div class="alert alert-success" role="alert">
                            {{session('sukses')}}
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="/category/{{$category->id}}/update" method="POST">
                            <h3><i class="nav-icon fas fa-layer-group my-1 btn-sm-1"></i> Edit Kategori</h3>
                            <hr>
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-6">
                                    <label for="nama">Nama</label>
                                    <input name="nama" type="text" class="form-control bg-light" id="nama"
                                        placeholder="Nama Klasifikasi" value="{{$category->nama}}" required>
                                    <label for="kode">Kode</label>
                                    <input name="kode" type="text" class="form-control bg-light" id="kode"
                                        placeholder="Kode Klasifikasi" value="{{$category->kode}}" required>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success btn-sm "><i class="fas fa-save"></i> SIMPAN</button>
                            <a class="btn btn-danger btn-sm" href="/kategori/index" role="button"><i class="fas fa-undo"></i>
                                BATAL</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
