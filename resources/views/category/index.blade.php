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
                        <div class="row">
                            <div class="col">
                                <h3><i class="nav-icon fas fa-layer-group my-1 btn-sm-1"></i> Kategori</h3>
                                <hr>
                            </div>
                        </div>
                        <div>
                            <div class="col">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#tambahklasifikasi"><i class="fas fa-plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                            <br>
                        </div>
                        <div class="row table-responsive">
                            <div class="col-10">
                                <table class="table table-hover table-head-fixed" id='tabelKlasifikasi'>
                                    <thead>
                                        <tr class="bg-light">
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Kode</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;?>
                                        @foreach($data_category as $category)
                                        <?php $no++ ;?>
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$category->nama}}</td>
                                            <td>{{$category->kode}}</td>
                                            <td>
                                                <a href="/category/{{$category->id}}/edit"
                                                    class="btn btn-primary btn-sm my-1 mr-sm-1"><i
                                                        class="nav-icon fas fa-pencil-alt"></i> Edit</a>
                                                <a href="/category/{{$category->id}}/delete"
                                                    class="btn btn-danger btn-sm my-1 mr-sm-1"
                                                    onclick="return confirm('Hapus Data ?')"><i class="nav-icon fas fa-trash"></i>
                                                    Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                
                                </table>
                
                            </div>
                        </div>
                
                        <!-- Modal Tambah -->
                        <div class="modal fade" id="tambahklasifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i
                                                class="nav-icon fas fa-layer-group my-1 btn-sm-1"></i> Tambah Data Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/category/tambah" method="POST">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col">
                                                    <label for="nama">Nama</label>
                                                    <input name="nama" type="text" class="form-control bg-light" id="nama"
                                                        placeholder="Nama Kategori" required>
                                                    <label for="kode">Kode</label>
                                                    <input name="kode" type="text" class="form-control bg-light" id="kode"
                                                        placeholder="Kode Kategori" required>
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i>
                                                SIMPAN</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection