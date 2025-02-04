<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Laravel</title>
</head>
<body>
    <h1>Ini adalah halaman Home</h1>
    <h3>Selamat datang {{$name}}, Anda berada di kelas {{$kelas}}, Anda tinggal di {{$alamat}}</h3>
    <h3>Member JMK 47:</h3>
    <ol>
        @foreach($mbr as $m)
            <li>{{$m}}</li>
        @endforeach
    </ol>
</body>
</html>