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
    <title>CETAK DATA KUNJUNGAN</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Kunjungan Kelompok</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>No</th>
                <th>Tanggal Kunjungan</th>
                <th>Nama Ketua</th>
                <th>Asal Instansi</th>
                <th>Jumlah Rombongan</th>
                <th>Alasan Kunjungan</th>
            </tr>
            @foreach ($pengunjungKelompok as $index => $kelompok)
                @foreach ($kelompok->kunjungan as $kunjungan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kunjungan->tanggal_kunjungan }}</td>
                        <td>{{ $kelompok->nama_ketua }}</td>
                        <td>{{ $kelompok->asal_instansi }}</td>
                        <td>{{ $kelompok->jumlah_rombongan }}</td>
                        <td>{{ $kunjungan->alasan_kunjungan }}</td>
                    </tr>
                @endforeach
            @endforeach
        </table>
        <script type="text/javascript">
            window.print();
        </script>
</body>

</html>
