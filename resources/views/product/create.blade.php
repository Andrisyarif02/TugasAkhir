@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4 class="font-weight-bold">Products</h4>

                    </div>
                    <div class="card-body">
                        @if (Session::has('error'))
                            @include('layouts.flash-error',[ 'message'=> Session('error') ])
                        @endif
                        <form action="{{ url('/products') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label for="product">Product Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @include('layouts.error', ['name' => 'name'])
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                                        @include('layouts.error', ['name' => 'price'])
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div>
                                            <div class="custom-file">
                                                <br>
                                                <input name="image" id="image" type="file" class="custom-file-input"
                                                    accept="image/*"
                                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"><label
                                                    class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12"><img id="output" src="" class="img-fluid"></div>
                                        @include('layouts.error', ['name' => 'image'])
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Categories</label>
                                        <select name="description" class="custom-select my-1 mr-sm-2 bg-light"
                                            id="inlineFormCustomSelectPref" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach ($data_category as $category)
                                                <option value="{{ $category->nama }}">{{ $category->nama }} (
                                                    {{ $category->kode }} )
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="qty">Qty</label>
                                        <input type="number" class="form-control" name="qty" value="{{ old('qty') }}">
                                        @include('layouts.error', ['name' => 'qty'])
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="store">Store</label>
                                        <select name="store" class="custom-select" required>
                                            <option value="Tlogomas" selected>Tlogomas</option>
                                            <option value="Joyo Grand">Joyo Grand</option>
                                            <option value="Singasari">Singasari</option>
                                        </select>
                                    </div> --}}
                                </div>
                            </div>


                            {{-- <div class="form-group">
                            <label for="description">Categories</label>
                            <textarea name="description" cols="30" rows="1"
                                class="form-control">{{ old('description') }}</textarea>

                        </div> --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Submit Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
