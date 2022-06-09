<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title><?= $title_pdf; ?></title> --}}
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div style="text-align:center">
        <h3> Laporan PDF Optik Indonesia</h3>
    </div>
    <div class="input-group my-3">
        <label id="totalpenghasilan"><h4>Total penghasilan : Rp. {{ number_format($history->sum('total')) }}</h4></label>
    </div><br>
    <table id="table" class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>INV</th>
                <th>User</th>
                <th>Store</th>
                <th>Total</th>
                <th>Cust Name</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //  $count =1;
            foreach ($history as $index => $item) { ?>
                <tr>
                    <td>{{ $item->invoices_number }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->user->store }}</td>
                    <td>{{ $item->total }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->created_at->format('d, M Y') }}</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body></html>