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

            <form action="{{url('kirim-data-kasbon')}}" method="POST" id="kasbon">@csrf

                <div class="form-group row">
                    <label class="col-md-3">Nama Pegawai</label>
                        <div class="col-md-7">
                            <select class="form-control" id="pegawai_id" name="pegawai_id">
                            <option>Pilih</option>
                            @foreach($pegawai as $id=>$nama)
                            <option value="{{$id}}">{{$nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Total Kasbon</label>
                        <div class="col-md-7">
                        <input type="number" id="total_kasbon" name="total_kasbon" class="form-control input">
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
    $("#kasbon").validate({
        rules: {
            pegawai_id : {
                required: true,
            },

            total_kasbon : {
                required:true,
            }

        },
        messages : {
            pegawai_id : {
                required: "Nama wajib diisi",
            },

            total_kasbon : {
                required : "Total Kasbon wajib diisi"
            },
        }
    });
});
</script>
