@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="row">
                            <div class="col">
                                <h4 class="font-weight-bold">Products</h4>
                            </div>
                            <div class="col text-right">
                                <select name="cat" id="categories" class="form-control from-control-sm"
                                    style="font-size: 12px">
                                    <option value="all">All</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->nama }}">{{ $cat->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col text-right">
                                <select name="store" id="store" class="form-control from-control-sm"
                                    style="font-size: 12px">
                                    <option value="Tlogomas" selected>Tlogomas</option>
                                    <option value="Joyo Grand">Joyo Grand</option>
                                    <option value="Singasari">Singasari</option>
                                </select>
                            </div> --}}
                            <div class="col"><input type="text" id="search" name="search"
                                    class="form-control form-control-sm col-sm-10 float-right"
                                    placeholder="Search Product..."></div>
                            <div class="col-sm-2"><a href="{{ url('/products/create') }}"
                                    class="btn btn-danger btn-sm float-right btn-block">Add Product</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            @include('layouts.flash-success',[ 'message'=> Session('success') ])
                        @endif
                        <div class="row" id="tempat" style="margin-left: 1px; margin-right: 1px">
                            @foreach ($products as $product)
                                <div class="col-sm-3">
                                    <div class="card mb-3">
                                        <div class="view overlay">
                                            <img class="card-img-top gambar" src="{{ $product->image }}"
                                                alt="Card image cap">
                                            <a href="#!">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="card-title text-center font-weight-bold"
                                                style="text-transform: capitalize;">
                                                {{ Str::words($product->name, 6) }}</h6>
                                            <p class="card-text text-center"> Quantity : {{ $product->qty }}</p>
                                            <p class="card-text text-center">Rp.
                                                {{ number_format($product->price, 2, ',', '.') }}
                                            </p>
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-danger btn-block btn-sm">Details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('style')
        <style>
            .gambar {
                width: 90%;
                height: 175px;
                padding: 0.9rem 0.9rem
            }

            @media only screen and (max-width: 600px) {
                .gambar {
                    width: 100%;
                    height: 100%;
                    padding: 0.9rem 0.9rem
                }
            }

        </style>
    @endpush
    @push('script')
        <script>
            let csrf_token = $('meta[name="csrf-token"]').attr('content');

            $(document).ready(function() {
                function ajaxx() {
                    cat = $('#categories').val();
                    search = $('#search').val();
                    store = $('#store').val();
                    $.ajax({
                        url: "<?= route('product-filter') ?>",
                        type: "POST",
                        data: {
                            "cat": cat,
                            "search": search,
                            "store" : store,
                            "_token": csrf_token
                        },
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var html = '';
                            var i;
                            if (data[0].name) {
                                for (i = 0; i < data.length; i++) {
                                    console.log();
                                    html +=
                                        '<div class="col-sm-3"><div class="card mb-3"><div class="view overlay"><img class="card-img-top gambar" src="' +
                                        data[i]['img'] +
                                        '" alt="Card image cap"><a href="#!"><div class="mask rgba-white-slight"></div></a></div><div class="card-body"><h6 class="card-title text-center font-weight-bold" style="text-transform: capitalize;">' +
                                        data[i]['name'] +
                                        '</h6><p class="card-text text-center"> Quantity : ' + data[i][
                                            'qty'
                                        ] + '</p><p class="card-text text-center">Rp.' + data[i][
                                            'price'
                                        ] + '</p><a href="' + data[i]['url_detail'] +
                                        '" class="btn btn-danger btn-block btn-sm">Details</a></div></div></div>';
                                }
                            }
                            $('#tempat').html(html);
                        },
                    });
                }

                $('#categories').change(function() {
                    ajaxx();
                });
                $('#store').change(function() {
                    ajaxx();
                });
                $('#search').keydown(function() {
                    ajaxx();
                });
            })

        </script>
    @endpush
