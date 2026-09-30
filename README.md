# 📝 TugasWeb-P10-BlogCRUD

Aplikasi **Blog CRUD** berbasis Laravel 12 yang dibuat untuk memenuhi tugas Pemrograman Web Pertemuan 10.

Aplikasi ini digunakan untuk mengelola artikel blog dengan fitur **Create, Read, Update, Delete (CRUD)** serta beberapa fitur tambahan seperti pencarian, pagination, upload gambar, validasi form, flash message, dan soft delete.

---

## 📌 Deskripsi Project

**TugasWeb-P10-BlogCRUD** merupakan aplikasi blog sederhana yang dikembangkan menggunakan framework **Laravel 12** dengan konsep **MVC (Model-View-Controller)**.

Aplikasi memungkinkan pengguna untuk:

- Menambahkan artikel baru
- Melihat daftar artikel
- Melihat detail artikel
- Mengubah artikel
- Menghapus artikel
- Mencari artikel
- Melakukan pagination
- Mengunggah gambar artikel
- Melakukan validasi data
- Menampilkan pesan sukses menggunakan flash message
- Menggunakan Soft Delete pada data artikel

Project ini juga menerapkan **Resource Route**, **Resource Controller**, **Blade Layout**, **Blade Component**, **Route Model Binding**, dan **Eloquent ORM**.

---

# 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|---|---|
| PHP | Bahasa pemrograman |
| Laravel 12 | Framework utama |
| MySQL | Database |
| Composer | Dependency Manager |
| Blade | Template Engine Laravel |
| HTML | Struktur halaman |
| CSS | Styling halaman |
| XAMPP | Menjalankan MySQL secara lokal |
| Git & GitHub | Version Control dan Repository |

---

# 💻 Persyaratan Sistem

Sebelum menjalankan project, pastikan komputer sudah memiliki:

- PHP 8.2 atau lebih baru
- Composer
- MySQL
- XAMPP
- Git
- Web Browser

Untuk mengecek versi PHP:

```bash
php -v
```

Untuk mengecek Composer:

```bash
composer -V
```

---

# 🚀 Cara Instalasi

## 1. Clone Repository

Clone repository dari GitHub:

```bash
git clone https://github.com/Dheilays24/TugasWeb-P10-BlogCRUD.git
```

Masuk ke folder project:

```bash
cd TugasWeb-P10-BlogCRUD
```

---

## 2. Install Dependency Laravel

Jalankan perintah:

```bash
composer install
```

Perintah tersebut digunakan untuk menginstall seluruh dependency yang dibutuhkan oleh Laravel berdasarkan file `composer.json`.

---

## 3. Membuat File `.env`

Salin file `.env.example` menjadi `.env`.

### Windows

```powershell
copy .env.example .env
```

### Linux / macOS

```bash
cp .env.example .env
```

File `.env` digunakan untuk menyimpan konfigurasi aplikasi, termasuk konfigurasi database.

---

## 4. Generate Application Key

Jalankan:

```bash
php artisan key:generate
```

Perintah ini digunakan untuk membuat `APP_KEY` yang diperlukan Laravel untuk keamanan aplikasi.

---

# 🗄️ Konfigurasi Database

## 5. Jalankan XAMPP

Buka XAMPP kemudian aktifkan:

- Apache
- MySQL

MySQL harus dalam kondisi **Running** agar Laravel dapat terhubung ke database.

---

## 6. Membuat Database

Buka phpMyAdmin melalui:

```text
http://localhost/phpmyadmin
```

Kemudian buat database baru dengan nama:

```text
TugasWeb-P10-BlogCRUD
```

---

## 7. Konfigurasi File `.env`

Buka file:

```text
.env
```

Kemudian sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=TugasWeb-P10-BlogCRUD
DB_USERNAME=root
DB_PASSWORD=
```

> Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan konfigurasi MySQL pada komputer masing-masing.

Jika menggunakan konfigurasi default XAMPP, biasanya:

```env
DB_USERNAME=root
DB_PASSWORD=
```

---

# 🏗️ Menyiapkan Database

## 8. Menjalankan Migration

Setelah database dibuat dan konfigurasi `.env` selesai, jalankan:

```bash
php artisan migrate
```

Migration akan membuat tabel yang diperlukan oleh aplikasi Laravel, termasuk tabel:

- `users`
- `cache`
- `jobs`
- `posts`

Tabel `posts` digunakan untuk menyimpan data artikel blog.

---

## 9. Membuat Storage Link

Karena aplikasi mendukung upload gambar, jalankan:

```bash
php artisan storage:link
```

Perintah ini membuat symbolic link dari:

```text
storage/app/public
```

ke:

```text
public/storage
```

Dengan demikian gambar yang diupload dapat ditampilkan pada browser.

---

# ▶️ Menjalankan Aplikasi

## 10. Menjalankan Laravel Development Server

Jalankan:

```bash
php artisan serve
```

Jika berhasil, akan muncul alamat seperti:

```text
INFO  Server running on [http://127.0.0.1:8000].
```

Buka browser dan akses:

```text
http://127.0.0.1:8000
```

Halaman utama akan otomatis diarahkan ke:

```text
http://127.0.0.1:8000/posts
```

---

# ✨ Fitur Aplikasi

## 1. Create Post

Digunakan untuk menambahkan artikel baru.

Data yang dapat dimasukkan:

- Judul artikel
- Isi artikel
- Gambar artikel

Form menggunakan:

```blade
@csrf
```

untuk keamanan request.

---

## 2. Read Post

Menampilkan seluruh artikel yang tersimpan pada database.

Terdapat dua bentuk tampilan:

### Daftar Artikel

Menampilkan beberapa artikel dalam bentuk card.

### Detail Artikel

Menampilkan:

- Judul
- Isi artikel
- Gambar
- Waktu pembuatan
- Tombol Edit
- Tombol Hapus

---

## 3. Update Post

Digunakan untuk mengubah artikel yang sudah tersimpan.

Form edit menggunakan:

```blade
@csrf
@method('PUT')
```

Data lama akan otomatis ditampilkan pada form.

---

## 4. Delete Post

Digunakan untuk menghapus artikel.

Form menggunakan:

```blade
@csrf
@method('DELETE')
```

Sebelum penghapusan dilakukan, pengguna akan mendapatkan konfirmasi.

---

## 5. Search

Pengguna dapat mencari artikel berdasarkan:

- Judul artikel
- Isi artikel

Contoh pencarian:

```text
Laravel
```

Aplikasi akan menampilkan artikel yang memiliki kata tersebut pada judul atau isi.

---

## 6. Pagination

Daftar artikel menggunakan pagination.

Jumlah artikel yang ditampilkan:

```text
6 artikel per halaman
```

Pagination digunakan agar daftar artikel tetap rapi ketika jumlah data semakin banyak.

---

## 7. Upload Gambar

Pengguna dapat mengunggah gambar untuk artikel.

Format gambar yang diperbolehkan:

```text
JPG
JPEG
PNG
WEBP
```

Ukuran maksimal:

```text
2 MB
```

Gambar disimpan pada:

```text
storage/app/public/posts
```

---

## 8. Validasi Form

Aplikasi memiliki validasi pada form Create dan Edit.

Aturan validasi:

### Judul

- Wajib diisi
- Harus berupa string
- Maksimal 255 karakter

### Isi

- Wajib diisi
- Harus berupa string

### Gambar

- Tidak wajib diisi
- Harus berupa gambar
- Format JPG, JPEG, PNG, atau WEBP
- Maksimal 2 MB

Pesan error ditampilkan langsung pada field yang mengalami kesalahan.

---

## 9. Old Input

Aplikasi menggunakan fungsi Laravel:

```blade
old()
```

Fungsinya adalah mempertahankan data yang sudah dimasukkan pengguna ketika validasi gagal.

Contoh:

```blade
value="{{ old('title') }}"
```

Dengan demikian pengguna tidak perlu mengetik ulang seluruh data.

---

## 10. Flash Message

Setelah proses berhasil, aplikasi menampilkan pesan kepada pengguna.

Contoh:

```text
Post berhasil ditambahkan!
```

```text
Post berhasil diperbarui!
```

```text
Post berhasil dihapus!
```

Flash message dibuat menggunakan session Laravel.

---

## 11. Soft Delete

Aplikasi menggunakan fitur **Soft Delete**.

Ketika sebuah post dihapus, data tidak langsung dihapus secara permanen dari database.

Laravel akan mengisi kolom:

```text
deleted_at
```

Contoh:

```text
id | title                 | deleted_at
1  | Belajar Laravel       | 2026-09-30 05:30:20
```

Dengan demikian data masih tersimpan di database tetapi tidak ditampilkan pada query normal.

Soft Delete diterapkan pada Model `Post` menggunakan:

```php
use Illuminate\Database\Eloquent\SoftDeletes;
```

dan:

```php
use SoftDeletes;
```

---

# 🧩 Konsep Laravel yang Digunakan

Project ini menerapkan beberapa konsep penting Laravel.

## MVC

MVC merupakan singkatan dari:

- Model
- View
- Controller

Alurnya:

```text
User
  ↓
Route
  ↓
Controller
  ↓
Model
  ↓
Database
```

Kemudian data dikirim kembali ke:

```text
Controller
  ↓
View / Blade
  ↓
Browser
```

---

## Resource Route

Routing menggunakan:

```php
Route::resource('posts', PostController::class);
```

Route resource secara otomatis menyediakan route untuk operasi CRUD.

Route yang digunakan:

| Method | URL | Controller |
|---|---|---|
| GET | `/posts` | index |
| GET | `/posts/create` | create |
| POST | `/posts` | store |
| GET | `/posts/{post}` | show |
| GET | `/posts/{post}/edit` | edit |
| PUT/PATCH | `/posts/{post}` | update |
| DELETE | `/posts/{post}` | destroy |

Untuk melihat seluruh route:

```bash
php artisan route:list
```

---

# 📁 Struktur Folder

Struktur utama project:

```text
TugasWeb-P10-BlogCRUD/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── PostController.php
│   │
│   └── Models/
│       └── Post.php
│
├── database/
│   ├── migrations/
│   │   └── create_posts_table.php
│   │
│   └── seeders/
│
├── public/
│   └── storage
│
├── resources/
│   └── views/
│       │
│       ├── components/
│       │   ├── alert.blade.php
│       │   └── card.blade.php
│       │
│       ├── layouts/
│       │   └── app.blade.php
│       │
│       └── posts/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── show.blade.php
│           └── edit.blade.php
│
├── routes/
│   └── web.php
│
├── storage/
│
├── .env
├── .env.example
├── artisan
├── composer.json
├── composer.lock
└── README.md
```

---

# 📂 Penjelasan Struktur Folder

## `app/`

Folder utama yang berisi logic aplikasi Laravel.

---

## `app/Http/Controllers/`

Berisi Controller yang mengatur alur request dan proses aplikasi.

### `PostController.php`

Controller utama untuk pengelolaan artikel.

Memiliki tujuh method Resource Controller:

```php
index()
create()
store()
show()
edit()
update()
destroy()
```

---

## `app/Models/`

Berisi Model yang digunakan untuk berinteraksi dengan database.

### `Post.php`

Model untuk tabel `posts`.

Model ini memiliki:

```php
protected $fillable = [
    'title',
    'content',
    'image',
];
```

Model juga menggunakan:

```php
SoftDeletes
```

untuk menerapkan Soft Delete.

---

# `database/`

Folder yang berisi file terkait database.

## `database/migrations/`

Berisi migration untuk membuat struktur tabel database.

Migration untuk Post membuat tabel:

```text
posts
```

dengan beberapa kolom:

```text
id
title
content
image
created_at
updated_at
deleted_at
```

---

# `resources/views/`

Berisi seluruh tampilan aplikasi menggunakan Blade Template.

---

## `resources/views/layouts/`

Berisi layout utama aplikasi.

### `app.blade.php`

Digunakan sebagai **Master Layout**.

Halaman lain menggunakan:

```blade
@extends('layouts.app')
```

Layout ini berisi:

- Navbar
- Container
- Flash Message
- CSS
- Footer
- `@yield('content')`

---

## `resources/views/components/`

Berisi Blade Component yang dapat digunakan kembali.

### `alert.blade.php`

Digunakan untuk menampilkan pesan sukses.

Contoh:

```blade
<x-alert type="success">
    Post berhasil ditambahkan!
</x-alert>
```

---

### `card.blade.php`

Digunakan untuk membuat container card pada halaman.

Contoh:

```blade
<x-card>
    Isi artikel
</x-card>
```

---

# `resources/views/posts/`

Berisi halaman yang berhubungan dengan Post.

## `index.blade.php`

Digunakan untuk menampilkan daftar seluruh post.

Fitur yang tersedia:

- Daftar artikel
- Search
- Pagination
- Tombol Lihat
- Tombol Edit
- Tombol Hapus

---

## `create.blade.php`

Digunakan untuk menampilkan form penambahan artikel baru.

---

## `show.blade.php`

Digunakan untuk menampilkan detail sebuah artikel.

---

## `edit.blade.php`

Digunakan untuk menampilkan form pengeditan artikel.

---

# `routes/`

Folder yang berisi routing aplikasi.

### `web.php`

Berisi route utama aplikasi.

Route utama:

```php
Route::get('/', function () {
    return redirect()->route('posts.index');
});
```

Route tersebut membuat halaman `/` otomatis diarahkan ke daftar post.

Resource route:

```php
Route::resource('posts', PostController::class);
```

digunakan untuk seluruh operasi CRUD.

---

# `public/`

Folder yang dapat diakses secara langsung oleh browser.

Folder ini juga memiliki symbolic link:

```text
public/storage
```

yang mengarah ke:

```text
storage/app/public
```

---

# `storage/`

Digunakan Laravel untuk menyimpan file dan data aplikasi.

Pada project ini digunakan untuk menyimpan gambar artikel yang diunggah pengguna.

---

# 🔄 Alur CRUD

Alur proses aplikasi secara sederhana:

```text
User
 │
 ▼
Browser
 │
 ▼
Route
 │
 ▼
PostController
 │
 ├── index()
 ├── create()
 ├── store()
 ├── show()
 ├── edit()
 ├── update()
 └── destroy()
 │
 ▼
Post Model
 │
 ▼
MySQL Database
```

Untuk tampilan:

```text
Controller
    │
    ▼
Blade View
    │
    ├── layouts/app.blade.php
    │
    ├── components/
    │     ├── alert.blade.php
    │     └── card.blade.php
    │
    └── posts/
          ├── index.blade.php
          ├── create.blade.php
          ├── show.blade.php
          └── edit.blade.php
```

---

# 🧪 Pengujian Fitur

Berikut fitur yang telah diuji pada aplikasi:

| Fitur | Status |
|---|---|
| Menampilkan daftar Post | ✅ |
| Menambahkan Post | ✅ |
| Melihat detail Post | ✅ |
| Mengedit Post | ✅ |
| Menghapus Post | ✅ |
| Validasi Form | ✅ |
| Error per Field | ✅ |
| Old Input | ✅ |
| Flash Message | ✅ |
| Search | ✅ |
| Pagination | ✅ |
| Upload Gambar | ✅ |
| Soft Delete | ✅ |
| Route Model Binding | ✅ |
| Resource Controller | ✅ |
| Resource Route | ✅ |
| Blade Layout | ✅ |
| Blade Component | ✅ |

---

# 📋 Perintah Artisan yang Digunakan

Menjalankan server:

```bash
php artisan serve
```

Membuat Model dan Migration:

```bash
php artisan make:model Post -m
```

Membuat Resource Controller:

```bash
php artisan make:controller PostController --resource
```

Menjalankan Migration:

```bash
php artisan migrate
```

Membuat Storage Link:

```bash
php artisan storage:link
```

Melihat daftar route:

```bash
php artisan route:list
```

---

# ⚠️ Catatan Penting

Jangan mengunggah file `.env` ke GitHub karena file tersebut berisi konfigurasi lokal aplikasi.

Gunakan:

```text
.env.example
```

sebagai contoh konfigurasi.

Setiap pengguna yang melakukan clone repository perlu membuat file `.env` sendiri dan menyesuaikan konfigurasi database.

---

# 👩‍💻 Author

**Dheila Yosa Chintaka**

**Tugas Web — Pertemuan 10**

Universitas Negeri Medan

---

# 📄 Lisensi

Project ini dibuat untuk keperluan pembelajaran dan tugas akademik Pemrograman Web.