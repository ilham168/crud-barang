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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# CRUD Barang (Laravel)

![GitHub repo size](https://img.shields.io/github/repo-size/ilham168/crud-barang)
![GitHub last commit](https://img.shields.io/github/last-commit/ilham168/crud-barang)
![GitHub issues](https://img.shields.io/github/issues/ilham168/crud-barang)
![GitHub stars](https://img.shields.io/github/stars/ilham168/crud-barang?style=social)

Aplikasi **CRUD Barang** ini dibuat menggunakan framework **Laravel** untuk mengelola data barang.  
Fitur CRUD mencakup menambah, melihat, mengubah, dan menghapus data barang dengan mudah.

---

## 🚀 Fitur Aplikasi
- Create – tambah data barang  
- Read – menampilkan daftar barang  
- Update – mengedit data barang  
- Delete – menghapus data barang  
- Validasi input  
- Struktur kode sederhana untuk praktikum

---

## 🛠️ Teknologi yang Digunakan
- PHP 8+
- Laravel 10
- MySQL / MariaDB
- Blade Template Engine

---

## 🧩 Diagram Alur CRUD

```mermaid
flowchart TD
    A[User] --> B[Halaman Barang]
    B --> |Tambah| C[Form Create]
    C --> D[Simpan ke Database]

    B --> |Edit| E[Form Edit]
    E --> F[Update Database]

    B --> |Hapus| G[Delete Data]
    G --> B

    D --> B
    F --> B
```

---

## 📁 Struktur Folder
```
app/
 ├── Models/Barang.php
 └── Http/Controllers/BarangController.php
resources/
 └── views/barang/
routes/
 └── web.php
database/
 └── migrations/
```

---

## ⚙️ Cara Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/ilham168/crud-barang.git
cd crud-barang
```

### 2. Install Dependency
```bash
composer install
```

### 3. Copy File .env
```bash
cp .env.example .env
```

Atur database:
```
DB_DATABASE=crud_barang
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate App Key
```bash
php artisan key:generate
```

### 5. Migrasi Database
```bash
php artisan migrate
```

### 6. Jalankan Server
```bash
php artisan serve
```

Akses aplikasi:
```
http://localhost:8000
```

---

## 📸 Screenshot Aplikasi

### **1. Halaman Daftar Barang**
![Tampilan Index](public/screenshots/index.png)

### **2. Form Tambah Barang**
![Form Create](public/screenshots/create.png)

### **3. Form Edit Barang**
![Form Edit](public/screenshots/edit.png)

> 📝 *Catatan:*  
> Letakkan gambar screenshot di folder:  
> ```
> public/screenshots/
> ```  
> dengan nama file sesuai contoh.

---

## 🧪 Contoh Output (Teks)

### **Daftar Barang**
```
ID | Nama Barang | Harga | Jumlah | Aksi
-----------------------------------------
1  | Pulpen       | 5000  | 10     | Edit | Hapus
2  | Buku Tulis   | 8000  | 5      | Edit | Hapus
```

---


