@extends('layouts.app')
@section('content')
    @push('meta')
        <meta name="csrf_token" content="{{ csrf_token() }}">
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="min-height: 85vh">
                    <div class="card-header bg-white">
                        <div class="row">
                            <div class="col">
                                <h4 class="font-weight-bold">History Transcation</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('history-filter') }}">
                                    @csrf
                                    <div class="input-group my-3">
                                        <input type="date" class="form-control" name="start_date" placeholder="Start Date"
                                            id="datepicker">
                                        <input type="date" class="form-control" name="end_date" placeholder="End Date"
                                            id="datepicker">
                                        <div class="input-group-append">
                                            <button class="input-group-text" type="submit">GET</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm" id="history">
                            <tr>
                                <th>No</th>
                                <th>Nomor Invoices</th>
                                <th>User</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Confirm</th>

                                @can('admin')
                                    <th>Aksi</th>
                                @endcan
                            </tr>
                            @foreach ($history as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->invoices_number }}</td>
                                    <td>{{ $item->user->name }}</td>

                                    <td>{{ $item->total }}</td>
                                    <td>
                                        @if ($item->status == 0)
                                            Gagal
                                        @elseif ($item->status == 1)
                                            Diorder
                                        @elseif ($item->status == 2)
                                            Dikirim
                                        @elseif ($item->status == 3)
                                            Berhasil
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 0)
                                            @can('admin')
                                                <a class="btn btn-warning btn-sm" id="btn-trans" data-id="{{ $item->id }}"
                                                    tipe="1">Reorder</a>
                                            @endcan
                                        @elseif ($item->status == 1)
                                            @can('admin')
                                                <a class="btn btn-success btn-sm" id="btn-trans" data-id="{{ $item->id }}"
                                                    tipe="2">Kirim</a>
                                            @endcan
                                        @elseif ($item->status == 2)
                                            @can('karyawan')
                                                @if ($item->konfirmasi == 0)
                                                    <a class="btn btn-success btn-sm" id="btn-konfirmasi"
                                                        data-id="{{ $item->id }}">Konfirmasi</a>
                                                @endif
                                            @endcan
                                            @can('admin')
                                                @if ($item->konfirmasi == 1)
                                                    <a class="btn btn-success btn-sm" id="btn-trans"
                                                        data-id="{{ $item->id }}" tipe="3">Sukses</a>
                                                @endif
                                                <a class="btn btn-danger btn-sm" id="btn-trans" data-id="{{ $item->id }}"
                                                    tipe="0">Gagal</a>
                                            @endcan
                                        @endif
                                    </td>
                                    @can('admin')
                                        <td><a href="{{ url('/transcation/laporan', $item->invoices_number) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a></td>
                                    @endcan
                                </tr>
                            @endforeach
                        </table>
                        <div>{{ $history->links() }}</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('script')
        <script>
            let csrf_token = $('meta[name="csrf-token"]').attr('content');

            $(document).ready(function() {
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
        </script>
    @endpush
@endsection
