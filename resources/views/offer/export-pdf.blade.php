<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
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

    th,
    td {
      text-align: left;
      padding: 8px;
    }

    tr: :nth-child(even) {
      background-color: #f2f2f2;
    }

    th {
      background-color: #04aa6d;
      color: white;
    }

    h3 {
      text-align: center;
    }
  </style>
  <body>
    <div class="form-group">
      <p align="center"><b>Madyang Konstruksi</b></p>
      <br>
      <br>
      <table align="center" cellpadding="5" width="500">
        <tr>
          <td>No Penawaran</td>
          <td>: {{ $offer->number}}</td>
        </tr>
        <tr>
          <td>Nama Projek</td>
          <td>: {{ $offer->project->name}}</td>
        </tr>
      </table>
      <br>
      <table border="1">
        <thead>
          <tr>
            <th>Harga</th>
			{{-- <th colspan="4"><center>{{ 'Rp. '. format_uang($total) }}  </center></th> --}}
            <th colspan="5"><center>{{$offer->project->price }}</center></th>
          </tr>
          <tr>
            <th >Kategori</th>
            <th colspan="2">Fasilitas</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
          </tr>
      </thead>
      <tbody>
            @foreach($detail as $category)
            @foreach ($category->facilities as $facility)
            @php
            $total = $facility["price"]*$facility["quantity"];
             @endphp
            <tr>
              <td>
                {{ $category->category}}
              </td>
              <td colspan="2">
                  {{ $facility->nama}}
              </td>
              <td>
                    {{ $facility->quantity }}
              </td>
              <td>
				{{-- {{ 'Rp. '. format_uang($facility->price) }} --}}
               @currency($facility->price)
              </td>
              <td>{{ $total}}</td>
            </tr>
            
            @endforeach
            <tr>
              <td colspan="5" class="text-end">Sub Total</td>
              <td >{{ $category->total}}</td>
            </tr>
            @endforeach
         
      </tbody>
      </table>
    </div>
  </body>
</html>
