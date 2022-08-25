# dottoni
test online untuk proses hiring PT. Digdaya Olah Teknologi (DOT) Indonesia.
 
### Sprint 1
1. Integrasi dengan API province & city Rajaongkir (paket starter) https://rajaongkir.com/dokumentasi/starter

2. Membuat artisan command​ yg melakukan fetching API data provinsi & kota dan data disimpan ke dalam database.

3. Membuat REST API untuk pencarian provinsi & kota dengan endpoint berikut:
    
    a. [GET] /search/provinces?id={province_id}

    b. [GET] /search/cities?id={city_id}
Data API pencarian ini mengambil dari database.

### Sprint 2
Meningkatnya kebutuhan Web service, tim engineer memutuskan untuk membuat swapable implementation​ untuk endpoint pencarian provinsi dan kota.
1. Membuat sumber data pencarian province & cities bisa melalui database​ atau direct API​ raja ongkir (swapable implementation). Proses swap implementasi dapat dilakukan melalui konfigurasi tanpa merubah source code yang sudah dibuat.

2. Menyediakan API login agar endpoint pencarian hanya bisa diakses oleh authorized user saja.

3. Membuat unit test / API test agar web service tetap reliable & maintainable
## Cara Install Sprint 1

Clone project.

```bash
  git clone -b sprint_1 https://github.com/toniasep/dottoni.git sprint_1
  cd sprint_1
```
buat sebuah database di local computer

rename file .env.example menjadi .env.


### Environment Variables

sesuaikan koneksi database dan tambahkan api key raja ongkir di file .env

`RAJAONGKIR_API_KEY` = `0df6d5bf733214af6c6644eb8717c92c`



### Run Project

jalankan perintah berikut.

```bash
  composer install
  php artisan key:generate
  php artisan migrate
```

fetching data kota dan provinsi dari api rajaongkir menggunakan perintah berikut.
```bash
  php artisan fetch:rajaongkir
```

ketik perintah berikut untuk menjalankan aplikasi.
```bash
  php artisan serve
```

## API Reference

#### Get city

```bash
  GET /search/cities/?id={city_id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**. Id of city |

#### Get province

```bash
  GET /search/provinces/?id={province_id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `integer` | **Required**. Id of province |



