<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
</head>
<body>
    <h1>Halaman Biodata</h1>
    <table border="5">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
        </tr>
        @foreach($biodata as $bio)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$bio['nama']}}</td>
            <td>{{$bio['kelas']}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
