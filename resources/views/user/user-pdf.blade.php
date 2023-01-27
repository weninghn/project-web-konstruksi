<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>A Fancy Table</h1>

<table id="customers">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Level</th>
    </tr>
    @php
        $no = 1;
    @endphp
    @foreach ($user as $users)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $users->name }}</td>
        <td>{{ $users->email }}</td>
        <td>{{ $users->phone }}</td>
        <td>{{ $users->addres }}</td>
        <td>{{ $users->role?->name }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>