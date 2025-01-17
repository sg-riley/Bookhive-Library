
# Bookhive Library - Sistem Manajemen Perpustakaan Berbasis Web

## Langkah-langkah Menjalankan Proyek
- composer install
- php artisan migrate
- php artisan key:generate
- composer require laravel/sanctum
- php artisan install:api
- php artisan storage:link
- php artisan serve

## Username dan Password Login Untuk Testing
- Login User:
  
  - Email : yoga@gmail.com
  - Password : Yoga123!


- Login Admin

  - Email : munyuk@gmail.com
  - Password : Munyuk123!


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
