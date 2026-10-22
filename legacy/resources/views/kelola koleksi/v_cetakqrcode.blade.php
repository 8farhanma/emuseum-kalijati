<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            /* left: 3%; */
            border: 1px solid #543535;
        }
    </style>
    <title>CETAK QR CODE KOLEKSI</title>
</head>

<body>
    <div class="form-group">
        <div style="text-align:center;">
            <p>{{ $koleksi->nama_koleksi }}</p><br>
            <br>
            <img src="{{ asset('qr_code_koleksi/' . $koleksi->qr_code_koleksi) }}" width="600px">
        </div>
        <script type="text/javascript">
            window.print();
        </script>
</body>

</html>
