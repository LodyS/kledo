<head>
    <title>Tes Laravel - Kledo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="showimages"></div>
            </div>
            <div class="col-md-6 offset-3 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white" align="center">Data Karyawan</h6>
                        <a href="{{ url('pegawai/form')}}" class="btn btn-danger btn-xs" align="right">Form</a>
                        <a href="{{ url('kasbon/index')}}" class="btn btn-secondary btn-xs" align="right">Pegawai</a>
                    </div>

                    <div class="card-body">
                        @include('flash-message')
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal Masuk</th>
                                <th>Total Gaji</th>
                            </tr>

                            @foreach($data as $key =>$d)
                            <tr>
                               <td>{{ (strpos($d['nama'], " ")) ? substr($d['nama'],0, strpos($d['nama'], " ")) : $d['nama']}}</td>
                               <td>{{ date('d-m-Y', strtotime($d['tanggal_masuk'])) }}</td>
                               <td>Rp. {{ number_format($d['total_gaji']) }}</td>
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
