@extends('layouts.app')
@section('content')
    @push('meta')
        <meta name="csrf_token" content="{{ csrf_token() }}">
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="min-height: 85vh">
                    <div class="card-header bg-white">
                        <div class="row">
                            <div class="col">
                                <h4 class="font-weight-bold">History Transcation</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                {{-- <form method="POST" action="{{ route('history-filter') }}"> --}}
                                    @csrf
                                    <div class="input-group my-3">
                                        <input type="date" class="form-control" name="start_date" placeholder="Start Date"
                                            id="start">
                                        <input type="date" class="form-control" name="end_date" placeholder="End Date"
                                            id="end">
                                        {{-- <div class="input-group-append">
                                            <button class="input-group-text" type="submit">GET</button>
                                        </div> --}}
                                    </div>
                                {{-- </form> --}}

                                    {{-- <form action="{{ route('history-filter-store') }}" method="get"> --}}
                                        <div class="row" @can('admin') @elsecannot('admin') style="display: none" @endcan>
                                            <div class="col text-right">
                                                <select name="toko" id="toko" class="form-control from-control-sm"
                                                    style="font-size: 12px">
                                                    <option value="all">All</option>
                                                    <option @if(Auth::user()->store == "Tlogomas") selected @endif value="Tlogomas">Tlogomas</option>
                                                    <option @if(Auth::user()->store == "Joyo Grand") selected @endif value="Joyo Grand">Joyo Grand</option>
                                                    <option @if(Auth::user()->store == "Singasari") selected @endif value="Singasari">Singasari</option>
                                                </select>
                                            </div>
                                            {{-- <div class="col-sm-2">
                                                <button class="btn btn-danger btn-sm float-right btn-block">Find</button>
                                            </div> --}}
                                            <div class="button">
                                                <button class="btn btn-primary float-right btn-sm" id="convertBtn" name="convertBtn" type="button" >
                                                    <i class="fas fa-print"></i>Print</button>
                                            </div>
                                        </div>
                                        <div class="input-group my-3">
                                            <label id="totalpenghasilan">Total penghasilan : Rp. {{ number_format($history->sum('total')) }}</label>
                                            {{-- <div class="input-group-append">
                                                <button class="input-group-text" type="submit">GET</button>
                                            </div> --}}
                                        </div>
                                    {{-- </form> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table dt table-sm" id="history">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Invoices</th>
                                        <th>User</th>
                                        <th>Store</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Confirm</th>
                                        <th>Cust. Name</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        @can('karyawan')
                                        <th>Email</th>
                                        @endcan
                                        @can('admin')
                                            <th>Action</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @foreach ($history as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->invoices_number }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->store }}</td>

                                            <td>{{ $item->total }}</td>
                                            <td>
                                                @if ($item->status == 0)
                                                    Gagal
                                                @elseif ($item->status == 1)
                                                    Diorder
                                                @elseif ($item->status == 2 && $item->konfirmasi == 0)
                                                    Dikirim
                                                @elseif ($item->status == 2 && $item->konfirmasi == 1)
                                                    Diterima
                                                @elseif ($item->status == 3 && $item->konfirmasi == 1)
                                                    Berhasil
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == 0)
                                                    @can('admin')
                                                        <a class="btn btn-warning btn-sm" id="btn-trans"
                                                            data-id="{{ $item->id }}" tipe="1">Reorder</a>
                                                    @endcan
                                                @elseif ($item->status == 1)
                                                    @can('admin')
                                                        <a class="btn btn-primary btn-sm" id="btn-trans"
                                                            data-id="{{ $item->id }}" tipe="2">Kirim</a>
                                                    @endcan
                                                @elseif ($item->status == 2 && $item->konfirmasi == 0)
                                                    @can('karyawan')
                                                        <a class="btn btn-success btn-sm" id="btn-konfirmasi"
                                                            data-id="{{ $item->id }}">Diterima</a>
                                                    @endcan
                                                @elseif ($item->status == 2 && $item->konfirmasi == 1)
                                                    @can('karyawan')
                                                        <a class="btn btn-success btn-sm" id="btn-trans"
                                                            data-id="{{ $item->id }}" tipe="3">Berhasil</a>
                                                    @endcan
                                                @endif
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td> <a href="https://wa.me/62{{ $item->number }}/?text=Pesanan atas nama {{ $item->name }} telah selesai dibuat dan dapat diambil. Sekian terima kasih"
                                                    target="_blank"><i class="fa fa-whatsapp"
                                                        style="font-size:24px;color: green;"></i> </a></td>
                                            <td>{{ $item->created_at->format('d, M Y') }}</td>
                                            @can('admin')
                                                <td><a href="{{ url('/transcation/laporan', $item->invoices_number) }}"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a></td>
                                            @endcan
                                            @can('karyawan')
                                            <form action="{{ route('email', $item->invoices_number)}}" method="get" class="form">
                                            @csrf
                                                <td>
                                                    <div class="form-group">
                                                        <button type="submit" class="fa fa-envelope" area-hidden="true"></button>
                                                    </div>
                                                </td>
                                            </form>
                                            @endcan
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @push('script')
            <script>
                let csrf_token = $('meta[name="csrf-token"]').attr('content');

                $(document).ready(function() {
                    function ajaxx() {
                        toko = $('#toko').val();
                        start1 = $('#start').val();
                        end1 = $('#end').val();
                        $.ajax({
                            url: "<?= route('history-filter') ?>",
                            type: "POST",
                            data: {
                                "toko": toko,
                                "start1": start1,
                                "end1": end1,
                                "_token": csrf_token
                            },
                            async: false,
                            dataType: 'json',
                            success: function(data) {
                                var html = '';
                                var i, u = 0;
                                var baseurl = '<?php echo url("/transcation/laporan") ?>';
                                for (i = 0; i < data['data'].length; i++) {
                                    u++;
                                    html += '<tr>' +
                                        '<td>' + u + '</td>' +
                                        '<td>' + data['data'][i].invoices_number + '</td>' +
                                        '<td>' + data['data'][i].un + '</td>' +
                                        '<td>' + data['data'][i].store + '</td>' +
                                        '<td>' + data['data'][i].total + '</td>';
                                    if (data['data'][i].status == 0){
                                        html += '<td>Gagal</td>';
                                        if(data['role'] == "Administrator") html += '<td><a class="btn btn-warning btn-sm" id="btn-trans" data-id="'+ data['data'][i].id +' " tipe="1">Reorder</a></td>';
                                        else html += '<td></td>';
                                    }else if (data['data'][i].status == 1){
                                        html += '<td>Diorder</td>';
                                        if(data['role'] == "Administrator") html += '<td><a class="btn btn-primary btn-sm" id="btn-trans" data-id="'+ data['data'][i].id +'" tipe="2">Kirim</a></td>';
                                        else html += '<td></td>';
                                    }else if (data['data'][i].status == 2 && data['data'][i].konfirmasi == 0){
                                        html += '<td>Dikirim</td>';
                                        if(data['role'] == "Karyawan") html += '<td><a class="btn btn-success btn-sm" id="btn-konfirmasi" data-id="'+ data['data'][i].id +'">Diterima</a></td>';
                                        else html += '<td></td>';
                                    }else if (data['data'][i].status == 2 && data['data'][i].konfirmasi == 1){
                                        html += '<td>Diterima</td>';
                                        if(data['role'] == "Karyawan") html += '<td><a class="btn btn-success btn-sm" id="btn-trans" data-id="'+ data['data'][i].id +'" tipe="3">Diterima</a></td>';
                                        else html += '<td></td>';
                                    }else if (data['data'][i].status == 3 && data['data'][i].konfirmasi == 1){
                                        html += '<td>berharil</td><td></td>';
                                    }
                                    html += '<td>' + data['data'][i].name + '</td>' + ' <td> <a href="https://wa.me/62'+ data['data'][i].number +'/?text=Pesanan atas nama '+ data['data'][i].name +' telah selesai dibuat dan dapat diambil. Sekian terima kasih" target="_blank"><i class="fa fa-whatsapp" style="font-size:24px;color: green;"></i> </a></td>' + '<td>'+data['tanggal'][i]+'</td>'  ;
                                    if(data['role'] == "Administrator") html += ' <td><a href="'+baseurl+'/'+data['data'][i].invoices_number+'" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a></td>';
                                }
                                $('.dt').DataTable().destroy();
                                $('#totalpenghasilan').html('Total penghasilan : Rp.'+ data['total'])
                                $('#tbody').html(html);
                            },
                        });
                        $('.dt').DataTable();;
                    }
                    $('.dt').DataTable({
                        retrieve: true,
                    });

                    $('#toko').change(function() {
                        ajaxx();
                    });
                    $('#start').change(function() {
                        if ($('#end').val()) {
                            ajaxx();
                        }
                    });
                    $('#end').change(function() {
                        if ($('#start').val()) {
                            ajaxx();
                        }
                    });
                    $('#history').on('click', '#btn-trans', function() {
                        let id = $(this).attr('data-id');
                        let tipe = $(this).attr('tipe'); // 0 = Gagal, 1 = Reorder, 2 = Kirim, 3 = Sukses
                        console.log(tipe);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });
                        $.ajax({
                            method: 'post',
                            url: '{{ url('/transaction/ubah-status') }}',
                            data: {
                                _token: csrf_token,
                                id: id,
                                tipe: tipe
                            },
                            success: function() {
                                location.reload();
                            },
                            error: function() {
                                console.log('error');
                            }

                        });
                    })
                    $('#history').on('click', '#btn-konfirmasi', function() {
                        let id = $(this).attr('data-id');
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });
                        $.ajax({
                            method: 'post',
                            url: '{{ url('/transaction/konfirmasi') }}',
                            data: {
                                _token: csrf_token,
                                id: id
                            },
                            success: function(data) {
                                location.reload();
                            },
                            error: function() {
                                console.log('Error');
                            }
                        })
                    })
                    // $('#datepicker').datepicker({
                    //     'dateformat': 'yyyy-mm-dd',
                    //     changeYear: true
                    // })
                    
                })
                $('#convertBtn').click(function(event) {
                    var e = document.getElementById("toko");
                    var store = e.options[e.selectedIndex].text;

                    // console.log(store)

                    if(store != '')
                    {  
                        $.ajax({   
                            url:"/transcation/history/history_pdf",
                            type:"GET",
                            dataType:"json",
                            data:{
                                "store":store, 
                                "_token": csrf_token,
                                },
                            
                            success:function(data){
                                // console.log(data);
                                
                            },
                            error: function(data){
                                alert('Error');
                            }
                        }) 
                    } else
                    {
                        alert("error gan ");
                    }
                });
            </script>
        @endpush
    @endsection
