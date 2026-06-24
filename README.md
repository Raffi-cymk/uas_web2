# uas_web2

# 📚 UAS Pemrograman Web 2 – Sistem Informasi E-Library

## 📝 Deskripsi Proyek

Sistem Informasi **E-Library** merupakan aplikasi berbasis **Decoupled Architecture** yang memisahkan frontend dan backend menjadi dua bagian yang saling berkomunikasi melalui RESTful API.

Backend dikembangkan menggunakan **CodeIgniter 4** sebagai penyedia layanan API, sedangkan frontend dibangun menggunakan **Vue.js 3**, **Axios**, dan **TailwindCSS** sehingga menghasilkan antarmuka yang ringan dan mudah digunakan. Sistem ini memanfaatkan **MySQL/MariaDB** sebagai basis data untuk menyimpan seluruh informasi buku, kategori, dan anggota.

## ✨ Fitur yang Diimplementasikan

* 🔐 Login Administrator
* 📊 Dashboard ringkasan data
* 📚 Pengelolaan data buku
* 👥 Penambahan data anggota
* 🗂️ Pengelolaan kategori buku
* 🔗 Komunikasi Frontend SPA dengan Backend REST API menggunakan Axios
* 🔑 Autentikasi menggunakan Bearer Token pada endpoint yang diproteksi

---

# 📸 Dokumentasi Implementasi

### 1️⃣ Struktur Database pada phpMyAdmin
<img width="1290" height="390" alt="Screenshot (337)" src="https://github.com/user-attachments/assets/5f026a59-729a-4261-905b-c9d6405e2d4e" />

Menampilkan struktur tabel yang digunakan sebagai penyimpanan data aplikasi E-Library, meliputi data buku, kategori, anggota, dan tabel pendukung lainnya.

### 2️⃣ Pengujian Endpoint API Data Buku
<img width="681" height="214" alt="Screenshot (338)" src="https://github.com/user-attachments/assets/1d8f808c-f1e5-4906-bef9-9aeed9eea164" />

Pengujian endpoint REST API untuk mengambil daftar buku melalui browser yang menghasilkan data dalam format JSON.

### 3️⃣ Pengujian Penambahan Data Buku Menggunakan Postman
<img width="1366" height="523" alt="Screenshot (339)" src="https://github.com/user-attachments/assets/82a0b3ed-f654-4791-a2cb-d1ad80fe1417" />

Melakukan request metode **POST** untuk menambahkan data buku baru ke dalam sistem melalui REST API dan memperoleh respons berhasil dari server.

### 4️⃣ Pengujian Endpoint GET Data Buku di Postman
<img width="1009" height="567" alt="Screenshot (340)" src="https://github.com/user-attachments/assets/19046c98-be8a-4deb-aa8e-2f36bd1799b0" />

Menampilkan hasil pengambilan data buku menggunakan metode **GET** sehingga seluruh informasi buku dapat diakses dalam format JSON.

### 5️⃣ Hasil Respons Data Buku Berformat JSON
<img width="568" height="260" alt="Screenshot (341)" src="https://github.com/user-attachments/assets/90417a7b-ebf1-4064-b588-e1acffa18388" />

Memperlihatkan data buku yang berhasil tersimpan dan dikembalikan oleh API, meliputi judul, penulis, penerbit, kategori, dan informasi lainnya.

### 6️⃣ Hasil Respons API Data Kategori
<img width="643" height="281" alt="Screenshot (342)" src="https://github.com/user-attachments/assets/7f892a9b-088e-46ba-9e4f-29d2dcddd08e" />

Menampilkan daftar kategori buku yang berhasil diambil melalui endpoint REST API sebagai data referensi pada aplikasi.

### 7️⃣ Pengujian Endpoint API Data Anggota
<img width="665" height="236" alt="Screenshot (343)" src="https://github.com/user-attachments/assets/c4eee116-38db-45d0-b04d-44c12f3c0162" />

Melakukan pengujian endpoint anggota melalui browser untuk memastikan layanan REST API dapat diakses dengan baik.

### 8️⃣ Tampilan Dashboard Administrator
<img width="1351" height="584" alt="Screenshot (350)" src="https://github.com/user-attachments/assets/862136ab-ed3e-446b-8a09-c388969757cf" />

Dashboard utama aplikasi yang menyajikan ringkasan informasi seperti jumlah buku, kategori, dan anggota sebagai gambaran kondisi data secara cepat.

### 9️⃣ Halaman Manajemen Data Buku
<img width="1345" height="578" alt="Screenshot (351)" src="https://github.com/user-attachments/assets/c9e4bd94-0c70-40ea-af76-c6b8ad05f326" />

Halaman antarmuka untuk menambahkan data buku baru sekaligus menampilkan daftar buku yang telah tersimpan di dalam sistem.

### 🔟 Halaman Form Tambah Anggota
<img width="1144" height="543" alt="Screenshot (355)" src="https://github.com/user-attachments/assets/570b3220-6bab-4625-954e-b7565f58bbf5" />

Menampilkan proses penambahan data anggota beserta notifikasi bahwa data berhasil disimpan ke dalam database melalui REST API.

---

# ⚙️ Cara Menjalankan Proyek

1. Install dan jalankan XAMPP (Apache dan MySQL).
2. Letakkan folder backend (`lab7_php_ci`) di dalam direktori `htdocs`.
3. Import database menggunakan phpMyAdmin sesuai file SQL yang digunakan pada proyek.
4. Letakkan folder frontend (`lab8_vuejs`) pada lokasi yang diinginkan dan jalankan melalui browser.
5. Pastikan konfigurasi URL Axios pada frontend mengarah ke endpoint REST API backend.
6. Jalankan aplikasi, lakukan login, kemudian gunakan fitur-fitur yang tersedia seperti pengelolaan buku dan penambahan anggota.

---

# 🔗 Link Demo

**Demo Aplikasi:**
https://youtu.be/3r2H_kk8yJA?si=eQs6uN1BLOh8UT_A
