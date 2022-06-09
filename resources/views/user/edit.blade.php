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
                        <form action="/user/{{$user->id}}/update" method="POST">
                            <h3><i class="nav-icon fas fa-layer-group my-1 btn-sm-1"></i> Edit User</h3>
                            <hr>
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input name="name" type="text" class="form-control bg-light" id="name"
                                            placeholder="Username" value="{{$user->name}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" type="text" class="form-control bg-light" id="email"
                                            placeholder="Email" value="{{$user->email}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input name="password" type="password" class="form-control bg-light" id="password"
                                            placeholder="Password" value="{{$user->password}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="roles">Roles</label>
                                        <select  name="roles" type="text" class="form-control bg-light" id="roles" value="{{$user->roles}}" required>
                                        {{-- <option value="">-- Pilih Roles --</option> --}}
                                            <option @if ($user->roles == 'Karyawan') selected @endif value="Karyawan">Karyawan</option>
                                            <option @if ($user->roles == 'Administrator') selected @endif value="Administrator">Administrator</option>
                                        </select>  
                                    </div>
                                    <div class="form-group">
                                        <label for="store">Store</label>
                                        <select name="store" class="form-control bg-light" id="store" value="{{$user->store}}" required>
                                            <option @if ($user->store == 'Tlogomas') selected @endif value="Tlogomas">Tlogomas</option>
                                            <option @if ($user->store == 'Joyo Grand') selected @endif value="Joyo Grand">Joyo Grand</option>
                                            <option @if ($user->store == 'Singasari') selected @endif value="Singasari">Singasari</option>    
                                        </select>
                                    </div>
                                    {{-- <label for="roles">Roles</label>
                                    <input name="roles" type="text" class="form-control bg-light" id="roles"
                                        placeholder="Roles" required> --}}                                                   
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success btn-sm "><i class="fas fa-save"></i> SIMPAN</button>
                            <a class="btn btn-danger btn-sm" href="/user/index" role="button"><i class="fas fa-undo"></i>
                                BATAL</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
