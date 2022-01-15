<head>
    <title>Tes Laravel - Kledo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-15">
                <div id="showimages"></div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white" align="center">Data Kasbon</h6>
                        <a href="{{ url('kasbon/form')}}" class="btn btn-danger btn-xs" align="right">Form</a>
                        <a href="{{ url('pegawai/index')}}" class="btn btn-secondary btn-xs" align="right">Pegawai</a>
                    </div>

                    <div class="card-body">
                        @include('flash-message')
                        <table class="table table-bordered">
                            <tr>
                                <th>Tanggal Diajukan</th>
                                <th>Tanggal Disetujui</th>
                                <th>Nama Pegawai</th>
                                <th>Total Kasbon</th>
                                <th>Aksi</th>
                            </tr>

                            @foreach($data as $key =>$d)

                            <tr>
                                <td>{{ date('d-m-Y', strtotime($d['tanggal_diajukan'])) }}</td>
                                <td>{{ ($d['tanggal_disetujui'] == null) ? '' : date('d-m-Y', strtotime($d['tanggal_disetujui'])) }}</td>
                                <td>{{ $d['nama'] }}</td>
                                <td>Rp. {{ number_format($d['total_kasbon']) }}</td>
                                <td><a href="{{ url('update-data-kasbon/'. $d['id'])}}" class="btn btn-danger">Setujui</a></td>
                            </tr>
                            @endforeach

                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
