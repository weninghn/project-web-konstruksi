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
      <h2>Madyang Konstruksi</h2>

      <p>{{ $offer->number}}</p>
      <p>{{ $offer->project->name}}</p>
      <br>
      <p align="center"><b>Offer Madyang Konstruksi</b></p>

      <table border="1">
        <thead>
          <tr>
            <th>Harga</th>
			<th colspan="4"><center>@currency($total)  </center></th>
            {{-- <th colspan="4"><center>{{$offer->project->price }}</center></th> --}}
          </tr>
          <tr>
            <th >Kategori</th>
            <th colspan="2">Fasilitas</th>
            <th>Jumlah</th>
            <th>Harga</th>
          </tr>
      </thead>
      <tbody>
            @foreach($detail as $category)
            @foreach ($category->facilities as $facility)
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
               @currency($facility->price)
              </td>
              @endforeach
                @endforeach
              {{-- <td>
                {{ $category->category}}
              </td>
              <td>
                  {{ $facility->nama}}
              </td>
              <td>
                    {{ $facility->quantity }}
              </td>
              <td>
                    {{ $facility->price }}
              </td>
              @endforeach
                @endforeach --}}
            </tr>
      </tbody>
      </table>
    </div>
  </body>
</html>
