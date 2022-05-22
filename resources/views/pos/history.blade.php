@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="min-height: 85vh">
                <div class="card-header bg-white">
                    <form action="" >
                        <div class="row">
                            <div class="col">      
                                <h4 class="font-weight-bold">History Transcation</h4>
                            </div>
                        
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
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
                        @foreach ($history as $index=>$item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->invoices_number}}</td>
                                <td>{{$item->user->name}}</td>
                                
                                <td>{{$item->total}}</td>
                                <td></td>
                                <td></td>
                                @can('admin')
                                <td><a href="{{url('/transcation/laporan', $item->invoices_number )}}" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a></td>
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

    
@endsection