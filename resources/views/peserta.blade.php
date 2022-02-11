<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/peserta/persyaratan" method="post">
        @csrf
        <input type="text" name="nama" placeholder="nama">
        <input type="text" name="alamat" placeholder="alamat">
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
