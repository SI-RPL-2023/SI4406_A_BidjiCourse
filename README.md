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

# Cara Menjalankan Aplikasi

**_Salin perintah ini di terminal :_**

-   Clone project dari github ini

```bash
git clone https://github.com/SI-RPL-2023/SI-44-06_A_BidjiCourse.git
```

-   Copy file `.env.example` dan rename menjadi `.env`

```bash
cp .env.example .env
```

-   Ubah database masing-masing di file `.env` yang sudah di copy tadi

```bash
DB_PORT=mysql_port
DB_DATABASE=nama_database
```

-   Install Composer

```bash
composer install
```

-   Generate Key

```bash
php artisan key:generate
```

-   Lakukan migrasi database

```bash
php artisan migrate:fresh --seed
```

-   Jalankan server

```bash
php artisan serve
```

# Beberapa preview tampilan website kami :

## Landing Page

![Landing Page](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/landing-page.png)

## Login

![Login](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/login.png)

## Register

![Register](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/register.png)

## Course

![Course](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/course.png)

## Quiz

![Quiz](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/quiz.png)

## Admin Dashboard: Home

![Admin Dashboard: Home](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/admin-dashboard.png)

## Admin Dashboard: Category

![Admin Dashboard: Category](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/categories-admin.png)

## Admin Dashboard: Course

![Admin Dashboard: Course](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/courses-admin.png)

## Admin Dashboard: Quiz

![Admin Dashboard: Quiz](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/quizzes-admin.png)

## Admin Dashboard: User

![Admin Dashboard: User](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/users-admin.png)
![Admin Dashboard: User's Detail](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/users-detail.png)

## Admin Dashboard: Add Category

![Admin Dashboard: Add Category](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/add-category.png)

## Admin Dashboard: Add Course

![Admin Dashboard: Add Course](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/add-course.png)

## Admin Dashboard: Add Quiz

![Admin Dashboard: Add Quiz](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/add-quiz.png)
![Admin Dashboard: Quiz Question](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/quiz-questions.png)
![Admin Dashboard: Add Question](https://raw.githubusercontent.com/SI-RPL-2023/SI4406_A_BidjiCourse/wisnu/public/img/screenshots/add-quiz-questions.png)
