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



## Cara Install Sprint 2

Clone project.

```bash
  git clone -b sprint_2 https://github.com/toniasep/dottoni.git sprint_2
  cd sprint_2
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
  php artisan migrate --seed
```

fetching data kota dan provinsi dari api rajaongkir menggunakan perintah berikut.
```bash
  php artisan fetch:rajaongkir
```

generate key secret jwt auth
```bash
  php artisan jwt:secret
```

ketik perintah berikut untuk menjalankan aplikasi.
```bash
  php artisan serve
```

## API Reference

#### Register User

```bash
  POST /api/auth/register
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**. Name of user |
| `email` | `string` | **Required**. Email of user |
| `password` | `string` | **Required**. Password of user |

#### Login User

```bash
  POST /api/auth/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `integer` | **Required**. Email of user |
| `password` | `integer` | **Required**. Password of user |

#### Example Response

```bash
  {
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY2MTQwNTgxNSwiZXhwIjoxNjYxNDA5NDE1LCJuYmYiOjE2NjE0MDU4MTUsImp0aSI6IkhmR3BmZW50UGI5czcyY2QiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.X7SaYiEb4nXKItYyjdbGgxv-Bv4U5WjvvbLMt4lVWIw",
    "token_type": "bearer",
    "expires_in": 3600
  }
```

#### Get city

```bash
  GET /search/cities/
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**. Id of city |
| `token` | `string` | **Required**. access_token from response login user |
| `source` | `string` | **Optional**. api(default) : data drom api rajaongkir, db : from database app |

#### Get province

```bash
  GET /search/provinces/
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `integer` | **Required**. Id of province |
| `token` | `string` | **Required**. access_token from response login user |
| `source` | `string` | **Optional**. api(default) : data drom api rajaongkir, db : from database app |


## Unit Test API
untuk melakukan unit test pada project, ketika perintah berikut.
```bash
  php artisan test
```

