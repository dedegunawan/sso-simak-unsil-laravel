
# Sso Simak Unsil Laravel

Sso menggunakan akun simak unsil khusus untuk laravel.



## FAQ

#### Siapa yang bisa mengakses layanan ini ?

Pihak pengembang sistem di unsil yang ingin menggunakan sso [simak unsil](https://simak.unsil.ac.id).

#### Bagaimana mekanisme sso ini ?

Menggunakan sharing session antara simak unsil dengan aplikasi pengembang. Karena itu dukungan sso ini terbatas hanya pada pengembangan aplikasi yang berbasis [laravel](https://laravel.com/)


#### Bagaimana cara supaya aplikasi bisa menggunakan sso ini ?

Silahkan daftarkan aplikasi ke UPT TIK Universitas Siliwangi untuk mendapatkan `simak-app-id` & `simak-client-id`.


## Cara Penggunaan

- Install package ini menggunakan perintah `composer require dedegunawan/sso-simak-unsil-laravel`
- Tambahkan provider pada file `config/app.php` :
```
'providers' => [
    # provider lain
    # .....

    \DedeGunawan\SsoSimakUnsilLaravel\SsoSimakUnsilServiceProvider::class,
    
],
```

- Jalankan perintah `php artisan vendor:publish --provider="DedeGunawan\SsoSimakUnsilLaravel\SsoSimakUnsilServiceProvider" `
- Jangan lupa mengatur `simak-app-id` dan `simak-client-id` pada file `config/sso-simak-unsil-laravel.php`
- Tambahkan middleware `\DedeGunawan\SsoSimakUnsilLaravel\Middlewares\AuthSimakMiddleware::class` pada controller yang membutuhkan data sso simak.
- Untuk mengakses data user simak pada controller gunakan perintah `\DedeGunawan\SsoSimakUnsilLaravel\Helpers\SsoSimakHelper::getInstance()->getUser()`
- contoh lengkapnya klik pada folder `examples/`


## Authors

- [Dede Gunawan](https://dede-gunawan.web.id/) - [@dedegunawan](https://www.github.com/dedegunawan)


![Logo](logo.png)

