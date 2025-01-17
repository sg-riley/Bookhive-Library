
# Kelas A Kelompok 2

## Anggota Kelompok
- Diego Bagas Brilian Wiguna (220711617) - Frontend
- Galih Rizky Pradana (220711809) - Frontend
- Gabriel Gaetano Onen Baskara (220711933) - Frontend
- Dina Oktavia Pangaribuan (220711928) - Frontend Backend

## Username dan Password Login
- Login User:
  
  - Email : yoga@gmail.com
  - Password : Yoga123!


- Login Admin

  - Email : munyuk@gmail.com
  - Password : Munyuk123!

## Bonus Yang Diambil
- Rute API

 # Dokumentasi API

## Authentication Routes
| Method | Endpoint         | Deskripsi                       |
|--------|------------------|----------------------------------|
| POST   | `/api/login`     | Login pengguna                  |
| POST   | `/api/register`  | Registrasi pengguna baru        |
| POST   | `/api/logout`    | Logout pengguna                 |
| GET    | `/api/getUser`   | Mendapatkan data pengguna saat ini (yang sedang login) |

---

## Universal Routes (Tanpa Role Khusus)
| Method | Endpoint                        | Deskripsi                                    |
|--------|---------------------------------|---------------------------------------------|
| GET    | `/api/ruangan`                  | Mendapatkan daftar semua ruangan            |
| GET    | `/api/ruangan/{id}`             | Mendapatkan detail ruangan berdasarkan ID   |
| GET    | `/api/bahan-pustaka`            | Mendapatkan daftar semua bahan pustaka      |
| GET    | `/api/bahan-pustaka/{id}`       | Mendapatkan detail bahan pustaka berdasarkan ID |
| GET    | `/api/kategori`                 | Mendapatkan daftar semua kategori           |
| GET    | `/api/peminjaman`               | Mendapatkan daftar semua data peminjaman    |
| GET    | `/api/peminjaman/{id}`          | Mendapatkan riwayat peminjaman pengguna berdasarkan ID |
| POST   | `/api/peminjaman`               | Melakukan peminjaman buku                   |
| POST   | `/api/review-peminjaman/{id}`   | Memberikan review untuk data peminjaman     |
| GET    | `/api/donasi`                   | Mendapatkan daftar semua data donasi        |
| GET    | `/api/reservasi`                | Mendapatkan daftar semua data reservasi     |
| GET    | `/api/riwayat-reservasi/{id}`   | Mendapatkan riwayat reservasi pengguna berdasarkan ID |

---

## Admin Routes
| Method | Endpoint                        | Deskripsi                                    |
|--------|---------------------------------|---------------------------------------------|
| GET    | `/api/getAllUsers`              | Mendapatkan daftar semua pengguna           |
| GET    | `/api/getAllAdmin`              | Mendapatkan daftar semua admin              |
| DELETE | `/api/deleteUser/{id}`          | Menghapus pengguna berdasarkan ID           |
| POST   | `/api/ruangan`                  | Menambahkan ruangan baru                    |
| PUT    | `/api/ruangan/{id}`             | Mengedit detail ruangan berdasarkan ID      |
| DELETE | `/api/ruangan/{id}`             | Menghapus ruangan berdasarkan ID            |
| POST   | `/api/bahan-pustaka`            | Menambahkan bahan pustaka baru              |
| PUT    | `/api/bahan-pustaka/{id}`       | Mengedit detail bahan pustaka berdasarkan ID |
| DELETE | `/api/bahan-pustaka/{id}`       | Menghapus bahan pustaka berdasarkan ID      |
| GET    | `/api/rekomendasi`              | Mendapatkan daftar semua rekomendasi        |
| GET    | `/api/rekomendasi/{id}`         | Mendapatkan detail rekomendasi berdasarkan ID |
| DELETE | `/api/rekomendasi/{id}`         | Menghapus rekomendasi berdasarkan ID        |
| GET    | `/api/donasi/{id}`              | Mendapatkan detail donasi berdasarkan ID    |
| PUT    | `/api/donasi/{id}`              | Mengupdate status donasi                    |
| POST   | `/api/store-donasi`             | Menambahkan data donasi baru                |
| PUT    | `/api/update-status/{id}`       | Mengupdate status peminjaman buku           |

---

## Pengguna Routes
| Method | Endpoint            | Deskripsi                     |
|--------|---------------------|-------------------------------|
| POST   | `/api/rekomendasi`  | Menambahkan rekomendasi baru  |
| POST   | `/api/donasi`       | Menambahkan data donasi baru  |
| POST   | `/api/tambah-reservasi` | Menambahkan reservasi baru |

---

### Catatan
1. Semua route di bawah **Universal**, **Admin**, dan **Pengguna** membutuhkan middleware `auth:sanctum` (autentikasi token).
2. Route **Admin** membutuhkan middleware tambahan `role:admin` untuk memastikan hanya admin yang dapat mengakses.
3. Route **Pengguna** membutuhkan middleware tambahan `role:pengguna` untuk memastikan hanya pengguna yang dapat mengakses.

Jika ada perubahan atau tambahan, sesuaikan dokumentasi ini dengan kebutuhan Anda h3h3. 😊








<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
