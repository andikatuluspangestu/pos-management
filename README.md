### **💡 Tentang Aplikasi**

---

> Aplikasi POS atau point of sales adalah aplikasi yang digunakan untuk mengelola transaksi pada sebuah toko atau oleh kasir. Aplikasi ini dibuat menggunakan Laravel v5.8 dan minimal PHP v7.1 jadi apabila pada saat proses instalasi atau penggunaan terdapat error atau bug kemungkinan karena versi dari PHP yang tidak support.

### **🙇 Anggota Kelompok:**

---

-   Andika Tulus Pangestu
-   Yulianti Putri
-   Eka Prasetya Nugraha
-   Hafizhul Qisti Muhammad
-   Anhar Mukhlis

### **📝 To-Do List**

---

-   [x] Manajemen Kategori Produk
-   [ ] Manajemen Produk
-   [ ] Manajemen Users
-   [ ] Transaksi
-   [ ] Laporan Pendapatan
-   [ ] Grafik ChartJS pada Dashboard

### **🕙 Instalasi**

Clone Repository

```bash
git clone https://github.com/andikatuluspangestu/pos-management.git
```

Update Composer Package

```bash
composer update
```

atau:

```bash
composer install
```

Copy file .env dari .env.example

```bash
cp .env.example .env
```

Konfigurasi file .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_pos
DB_USERNAME=root
DB_PASSWORD=
```

Generate key

```bash
php artisan key:generate
```

Migrate Database

```bash
php artisan migrate
```

Seeder Table

```bash
php artisan db:seed
```

Menjalankan aplikasi

```bash
php artisan serve
```

### **📚 Panduan Kolaborasi dengan Git & GitHub**

---

#### **Langkah 1:** Clone Repository ke Komputer Lokal

```bash
git clone https://github.com/andikatuluspangestu/pos-management.git
```

#### **Langkah 2:** Buka folder Projects

```bash
cd pos-management
```

#### **Langkah 3:** Pindah ke Branch Development di Git

```bash
git checkout development
```

#### **Langkah 4:** Sinkronkan dengan Repository Development

```bash
git pull origin development
```

> Lakukan `git pull` setiap ada perubahan pada repository utama.

#### **Langkah 5:** Membuat Perubahan dan Mengunggah Perubahan

1. Lakukan perubahan pada proyek menggunakan Visual Studio Code
2. Setelah selesai maka simpan atau tekan `CTRL + S`
3. Tambahkan perubahan:

    ```bash
    git add .
    ```

4. Buat commit:

    ```bash
    git commit -m "Nama Perubahan"
    ```

5. Unggah perubahan ke GitHub:

    ```bash
    git push origin development
    ```

#### **Langkah 6:** Sinkronkan dengan Repository Utama Kembali

```bash
git pull origin development
```

### **Merge ke Branch Main**

---

#### **Langkah 1:** Pindah ke Branch Main

```bash
git checkout main
```

#### **Langkah 2:** Sinkronkan dengan Repository Main

```bash
git pull origin main
```

#### **Langkah 3:** Merge Branch Development ke Branch Main

```bash
git merge development
```

#### **Langkah 4:** Unggah Perubahan ke GitHub

```bash
git push origin main
```

### **🗒 Catatan :**

---

-   Jika ada perubahan pada repository utama, maka lakukan langkah 5 untuk mengambil perubahan tersebut.
-   Jika ada konflik pada langkah 5, maka selesaikan konflik (Diskusikan di Grup)


