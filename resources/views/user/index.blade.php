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
                                <h3><i class="nav-icon fas fa-layer-group my-1 btn-sm-1"></i> User</h3>
                                <hr>
                            </div>
                        </div>
                        <div>
                            <div class="col">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#tambahUser"><i class="fas fa-plus"></i>
                                    Tambah User
                                </button>
                            </div>
                            <br>
                        </div>
                        <div class="row table-responsive">
                            <div class="col-10">
                                <table class="table table-hover table-head-fixed" id='tabelUser'>
                                    <thead>
                                        <tr class="bg-light">
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            {{-- <th>Password</th> --}}
                                            <th>Roles</th>
                                            <th>Store</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;?>
                                        @foreach($data_user as $user)
                                        <?php $no++ ;?>
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            {{-- <td>{{$user->password}}</td> --}}
                                            <td>{{$user->roles}}</td>
                                            <td>{{$user->store}}</td>
                                            <td>
                                                <a href="/user/{{$user->id}}/edit"
                                                    class="btn btn-primary btn-sm my-1 mr-sm-1"><i
                                                        class="nav-icon fas fa-pencil-alt"></i> Edit</a>
                                                <a href="/user/{{$user->id}}/delete"
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
                        <div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i
                                                class="nav-icon fas fa-layer-group my-1 btn-sm-1"></i> Tambah Data User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/user/tambah" method="POST">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="name">Nama</label>
                                                        <input name="name" type="text" class="form-control bg-light" id="name"
                                                            placeholder="Username" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input name="email" type="text" class="form-control bg-light" id="email"
                                                            placeholder="Email" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input name="password" type="password" class="form-control bg-light" id="password"
                                                            placeholder="Password" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="roles">Roles</label>
                                                        <select  name="roles" type="text" class="form-control bg-light" id="roles" required>
                                                        <option value="">-- Pilih Roles --</option>
                                                        <option value="Administrator">Administrator</option>                                                    
                                                        <option value="Karyawan">Karyawan</option>    
                                                        </select>  
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="store">Store</label>
                                                        <select name="store" class="form-control bg-light" id="store" required>
                                                            <option value="">-- Pilih Store --</option>
                                                            <option value="Tlogomas">Tlogomas</option>                                                    
                                                            <option value="Joyo Grand">Joyo Grand</option>    
                                                            <option value="Singasari">Singasari</option>    
                                                        </select>
                                                    </div>
                                                    {{-- <label for="roles">Roles</label>
                                                    <input name="roles" type="text" class="form-control bg-light" id="roles"
                                                        placeholder="Roles" required> --}}                                                   
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