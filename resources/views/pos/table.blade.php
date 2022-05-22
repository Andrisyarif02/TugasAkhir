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
                    <a class="btn btn-danger btn-sm" id="btn-transr" data-id="{{ $item->id }}"
                        tipe="1">Reorder</a>
                @elseif ($item->status == 1)
                    <a class="btn btn-success btn-sm" id="btn-trans" data-id="{{ $item->id }}"
                        tipe="2">Kirim</a>
                @elseif ($item->status == 2)
                    <a class="btn btn-success btn-sm" id="btn-trans" data-id="{{ $item->id }}"
                        tipe="3">Sampai</a>
                    <a class="btn btn-danger btn-sm" id="btn-trans" data-id="{{ $item->id }}"
                        tipe="0">Gagal</a>
                @endif
            </td>
            @can('admin')
                <td><a href="{{ url('/transcation/laporan', $item->invoices_number) }}"
                        class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a></td>
            @endcan
        </tr>
    @endforeach
</table>
