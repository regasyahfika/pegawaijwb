## How to install

1. Buka terminal ketik `composer install`
2. ketikan pada terminal `cp .env-example .env`
3. ketikan pada terminal `php artisan key:generate`
4. configuration file .env `DB_DATABASE=dbtest` `DB_USERNAME=root` `DB_PASSWORD=secret`
5. atau dapat gunakan `php artisan migrate:fresh --seed`
6. jalan kan `php artisan server` akan tampil `http://127.0.0.1:8000`
7. untuk login user ke `http://127.0.0.1:8000/login` dan admin ke `http://127.0.0.1:8000/admin/login`
8. email : admin@gmail.com, password: admin (untuk login admin)
9. untuk registrasi `http://127.0.0.1:8000/registrasi`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
