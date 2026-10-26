@extends('admin.v_template_tables')
@section('page')
    Kelola Kunjungan
@endsection
@section('content')
    <div class="container-fluid">
        <div class="filter-container">
            <select id="tableFilter" class="form-control">
                <option value="all">Semua Tabel</option>
                <option value="individu">Pengunjung Individu</option>
                <option value="kelompok">Pengunjung Kelompok</option>
            </select>
        </div>
        <br>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pengunjung Individu</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableIndividu" width="100%" cellspacing="0">
                        @if (session('pesan'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Rekapan berhasil dicetak! </h5>
                                {{ session('pesan') }}
                            </div>
                        @endif
                        <div align="right">
                            <a href="{{ route('cetakIndividu') }}" class="btn btn-sm btn-primary">Cetak Data <i
                                    class="fas fa-print"></i></a><br>
                        </div>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Nama Lengkap</th>
                                <th>Asal</th>
                                <th>Pekerjaan</th>
                                <th>Alasan Kunjungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($pengunjungIndividu as $individu)
                                @foreach ($individu->kunjungan as $kunjungan)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $kunjungan->tanggal_kunjungan }}</td>
                                        <td>{{ $individu->nama_pengunjung }}</td>
                                        <td>{{ $individu->alamat }}</td>
                                        <td>{{ $individu->pekerjaan }}</td>
                                        <td>{{ $kunjungan->alasan_kunjungan }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pengunjung Kelompok</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableKelompok" width="100%" cellspacing="0">
                        @if (session('pesan'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Rekapan berhasil dicetak! </h5>
                                {{ session('pesan') }}
                            </div>
                        @endif
                        <div align="right">
                            <a href="{{ route('cetakKelompok') }}" class="btn btn-sm btn-primary">Cetak Data <i
                                    class="fas fa-print"></i></a><br>
                        </div>

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Nama Ketua</th>
                                <th>Asal Instansi</th>
                                <th>Jumlah Rombongan</th>
                                <th>Alasan Kunjungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp

                            @foreach ($pengunjungKelompok as $kelompok)
                                @foreach ($kelompok->kunjungan as $kunjungan)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $kunjungan->tanggal_kunjungan }}</td>
                                        <td>{{ $kelompok->nama_ketua }}</td>
                                        <td>{{ $kelompok->asal_instansi }}</td>
                                        <td>{{ $kelompok->jumlah_rombongan }}</td>
                                        <td>{{ $kunjungan->alasan_kunjungan }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tableFilter').change(function() {
                var selectedValue = this.value;
                var tableIndividu = $('#dataTableIndividu').closest('.card');
                var tableKelompok = $('#dataTableKelompok').closest('.card');

                // Reset visibility
                tableIndividu.show();
                tableKelompok.show();

                // Filter logic
                if (selectedValue === 'individu') {
                    tableKelompok.hide();
                } else if (selectedValue === 'kelompok') {
                    tableIndividu.hide();
                }
            });
        });
    </script>
@endpush
