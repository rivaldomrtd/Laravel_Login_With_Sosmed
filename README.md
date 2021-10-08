<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Google and Facebook

**Penggunaan**

-> setting app.php di `config/app.php` tambahkan Framework Service Providers.

.`'providers' => [
   Laravel\Socialite\SocialiteServiceProvider::class,
],`

`'aliases' => [
    'Socialite' => Laravel\Socialite\Facades\Socialite::class,
],`

login di google dan facebook developer
ambil `app_id` dan `secret_id` (facebook and google)
 



```
1.composer update
2.composer require laravel/ui
3.composer require lravel/socialite
4.php artisan ui bootstrap --auth
5.npm install && npm run dev
6.php artisan serve
```
