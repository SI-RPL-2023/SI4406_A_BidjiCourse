<p align="center"><img src="https://telkomuniversity.ac.id/wp-content/uploads/2019/03/Logo-Telkom-University-png-3430x1174.png" width="370" alt="Logo Telkom University"></p>
<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="500" alt="Laravel Logo"></p>

# Kelompok A - SI-44-06

Repository ini dibuat bertujuan untuk memenuhi tugas besar mata kuliah Rekayasa Perangkat Lunak

# Tentang Bidji Course

📚 Bidji Course adalah sebuah website pembelajaran untuk siswa-siswi Indonesia terutama siswa-siswi sekolah SD, SMP, SMA, SMK sederajat. Bidji Course menyediakan berbagai macam materi dan video pembelajaran yang dapat diakses secara gratis!

# Anggota Kelompok

| No  | Nama                                                            | NIM        | Role            |
| --- | --------------------------------------------------------------- | ---------- | --------------- |
| 1   | [M. Rayhan Ampurama](https://www.instagram.com/ray_ampurama)    | 1202204036 | Project Manager |
| 2   | [Nazla Nabila](https://www.instagram.com/nazlaanbl)             | 1202204344 | Analyst         |
| 3   | [Putu Wisnu Wirayuda Putra](https://www.instagram.com/puutuuu_) | 1202200244 | Programmer      |
| 4   | [Herro Arya Setiawan](https://www.instagram.com/herroaryst)     | 1202204068 | Programmer      |
| 5   | [Alfatha Huga Anaku](https://www.instagram.com/alfathahuga_)    | 1202201281 | Programmer      |
| 6   | [Fathan](https://www.instagram.com/fathan147)                   | 1202184140 | Programmer      |

## Cara Menjalankan Aplikasi
***Salin perintah ini di terminal :***

- Clone project dari github ini

```bash
git clone https://github.com/SI-RPL-2023/SI-44-06_A_BidjiCourse.git 
```

- Copy file `.env.example` dan rename menjadi `.env`

```bash
cp .env.example .env
```

- Ubah database masing-masing di file `.env` yang sudah di copy tadi

```bash
DB_PORT=mysql_port
DB_DATABASE=nama_database
```

- Install Composer

```bash
composer install
```

- Generate Key

```bash
php artisan key:generate
```

- Install library [Eloquent-Sluggable](https://github.com/cviebrock/eloquent-sluggable)

```bash
composer require cviebrock/eloquent-sluggable
```

- Lakukan migrasi database

```bash
php artisan migrate
```

- Jalankan server

```bash
php artisan serve
```

# Beberapa preview tampilan website kami :
