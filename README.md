### **💡 Tentang Aplikasi**

---

> Aplikasi POS atau point of sales adalah aplikasi yang digunakan untuk mengelola transaksi pada sebuah toko atau oleh kasir. Aplikasi ini dibuat menggunakan Laravel v5.8 dan minimal PHP v7.1 jadi apabila pada saat proses instalasi atau penggunaan terdapat error atau bug kemungkinan karena versi dari PHP yang tidak support.

### **🙇 Anggota Kelompok:**

---

-   Andika Tulus Pangestu
-   Yulyanti Putri
-   Eka Prasetya Nugraha
-   Hafizhul Qisti Muhammad
-   Anhar Mukhlis

### **📝 To-Do List**

---

-   [x] Manajemen Kategori Produk
-   [x] Manajemen Produk
-   [x] Manajemen Users
-   [ ] Transaksi
-   [ ] Laporan Pendapatan
-   [ ] Grafik ChartJS pada Dashboard

### **🕙 Instalasi & Kolaborasi**

---

1. Clone repository
    
    ```bash
    git clone https://github.com/andikatuluspangestu/pos-management.git
    ```

2. Masuk ke folder repository
    
    ```bash
    cd pos-management
    ```

3. Install dependency
    
    ```bash
    composer update
    composer install
    ```

4. Copy file `.env.example` menjadi `.env`
    
    ```bash
    cp .env.example .env
    ```

5. Generate key
    
    ```bash
    php artisan key:generate
    ```

6. Buat database baru dengan nama `db_pos` (sesuaikan dengan nama database yang ada di file `.env`) melalui phpmyadmin atau terminal
    
    ```bash
    mysql -u root -p
    create database db_pos;
    exit;
    ```

7. Migrasi database
    
    ```bash
    php artisan migrate
    ```
    
8. Lakukan seeding data
    
    ```bash
    php artisan db:seed
    ```

9. Jalankan server
    
    ```bash
    php artisan serve
    ```

10. Buka browser dan akses `http://localhost:8000`

11. Buat perubahan
12. Tambahkan perubahan ke repository
    
    ```bash
    git add .
    ```

13. Commit perubahan
    
    ```bash
    git commit -m "pesan commit"
    ```

14. Push ke repository
    
    ```bash
    git push origin main
    ```

15. Lakukan Sync dengan Repository Utama
    
    ```bash
    git pull
    ```

### **🗒 Catatan :**

---

-   Jika ada perubahan pada repository utama, maka lakukan langkah 5 untuk mengambil perubahan tersebut.
-   Jika ada konflik pada langkah 5, maka selesaikan konflik (Diskusikan di Grup)


