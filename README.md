<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Google and Facebook.

**Penggunaan**

```
1.composer update
2.composer require laravel/ui
3.composer require lravel/socialite
4.php artisan ui bootstrap --auth
5.npm install && npm run dev
```

-> setting app.php di `config/app.php` tambahkan Framework Service Providers.

`'providers' => [
   Laravel\Socialite\SocialiteServiceProvider::class,
],`

`'aliases' => [
    'Socialite' => Laravel\Socialite\Facades\Socialite::class,
],`

- login di google developer (https://console.cloud.google.com/)
- login di Facebook developer (https://developers.facebook.com)
- ambil "app_id" dan "secret_id" dan masukan ke `config/service.php`
```
 'google' => [
        'client_id' => '....',
        'client_secret' => '....',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],
    'facebook' => [
        'client_id'     => '....',
        'client_secret' => '....',
        'redirect'      => 'http://localhost:8000/auth/google/callback',
    ],
 ```
 
-> Coba jalankan Aplikasi 
`php artisan serve`



 

