<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Client</title>
    {{-- <meta name="csrf-token" content="{{ csrf-token }}"> --}}
    <style>
        /* table.static
        {
            position: relative;
            border: 1px solid #543535;
        } */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr: :nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #04AA6D;
            color: white;
        }

        h3 {
            text-align: center;
        }
    </style>
    {{-- <title>Data Client</title> --}}
</head>
<body>
    <div class="form-group">
        <p align="center"><b>DATA CLIENT</b></p>
        <table class="table" border="none">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{-- <script type="text/javascript">
        window.print();
    </script> --}}
</body>
</html>