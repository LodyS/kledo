## Tes Laravel Developer - Lody Sanjaya

Silahkan jalankan 
# php artisan migrate

-- data seeder 
# php artisan db:seed --class=PegawaiSeeder
# php artisan db:seed --class=KasbonSeeder

-- jalankan REST API
# silahkan jalankan perintah php artisan serve

Silahkan untuk tes API bisa jalankan ENDPOINT
localhost:8000/api/pegawai-api/ dengan method : get. "untuk menampikan data"
localhost:8000/api/kasbon-pegawai/ dengan method : post berserta parameternya.

localhost:8000/api/kasbon-api/ dengan method get, untuk melihat data kasbon
localhost:8000/api/kasbon-api/ dengan method post, untuk simpan data kasbon beserta parameter
localhost:8000/api/kasbon-api/ dengan method patch, untuk update data kasbon

untuk validasi data silahkan dibagian HTTP headers, atur header Accept dengan value application/json

untuk menjajal di bagian front end link : localhost:8000/pegawai/index atau localhost:8000/kasbon/index

Untuk pengujian PHP unit bisa menjalankan perintah .\vendor\bin\phpunit
