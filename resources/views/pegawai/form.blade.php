<style>

label {
  width: 300px;
  font-weight: bold;
  display: inline-block;
  margin-top: 20px;
}

label span {
  font-size: 1rem;
}

label.error {
    color: red;
    font-size: 1rem;
    display: block;
    margin-top: 5px;
}

input.error, textarea.error {
    border: 1px dashed red;
    font-weight: 300;
    color: red;
}

</style>

<div class="container">
    <h3 align="center">Input Pegawai</h3>
        @include('flash-message')

            <ul>
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $error }}</strong>
                </div>
                @endforeach
            </ul>

            <form action="{{url('kirim-data-pegawai')}}" method="POST" id="pegawai">@csrf

                <div class="form-group row">
                    <label class="col-md-3">Nama Pegawai</label>
                        <div class="col-md-7">
                        <input type="text" id="nama" name="nama" class="form-control input">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Tanggal Masuk</label>
                        <div class="col-md-7">
                        <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control input">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-md-3">Total Gaji</label>
                        <div class="col-md-7">
                        <input type="number" id="total_gaji" name="total_gaji" class="form-control input">
                    </div>
                </div>

                <div>
                <button type="submit" class="btn btn-danger">Simpan</button>
            </div>
        </div>
    </div>
</form>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $("#pegawai").validate({
        rules: {
            nama : {
                required: true,
            },
            tanggal_masuk : {
                required:true,
            },
            total_gaji : {
                required:true,
            }

        },
        messages : {
            nama: {
                required: "Nama wajib diisi",
            },
            tanggal_masuk : {
                required : "Tanggal masuk wajid diisi"
            },
            total_gaji : {
                required : "Total Gaji wajib diisi"
            },
        }
    });
});
</script>
