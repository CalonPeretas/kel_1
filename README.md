clone

Install dependensi dengan composser

```base
composer update
```

Buat database baru dengan nama yang disesuaikan pada nama database di file env

Buat table database dengan mengetikkan perintah

```base
php spark migrate
```

Isi data default dari untuk menjalankan aplikasi

```base
php spark db:seed DefaultDataSeeder
```

Jalankan server

```base
php spark serve
```

Buka Browser dan masukkan url

```base
http://localhost:8080
```

Default login

`Administrator` => Email: `admin@admin.com ` Pass: ` admin`

`Guru` => Email: `guru1@admin.com ` Pass:` admin`

