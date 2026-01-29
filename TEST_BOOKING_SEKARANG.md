# 🎯 Quick Start - Test Booking Notifikasi

## ✅ Status: Semua Sudah Diperbaiki

### Perbaikan yang Dilakukan:

1. **Routes Fixed**
   - ✅ `/booking` (lowercase) - sekarang terdaftar
   - ✅ `/Booking` (uppercase) - tetap berfungsi
   - ✅ Keduanya mengarah ke `BookingController@store`

2. **Database Fixed**
   - ✅ Migration ditambahkan: `add_missing_columns_to_booking_table`
   - ✅ Kolom `user_id` ditambahkan (foreign key)
   - ✅ Kolom `progress_stage` ditambahkan (enum)
   - ✅ Migration sudah dijalankan

3. **Notifikasi Sukses**
   - ✅ Sudah terintegrasi di dashboard customer
   - ✅ CSS dengan animasi smooth
   - ✅ Auto-hide setelah 8 detik
   - ✅ Manual close dengan tombol

4. **Controller Updated**
   - ✅ Pesan detail dengan informasi booking
   - ✅ Redirect ke /dashboard
   - ✅ Flash message dengan session

---

## 🧪 CARA TEST

### **Step 1: Buka Browser**
```
http://localhost:8000
```

### **Step 2: Login atau Register**
- Gunakan akun yang sudah ada atau buat baru
- Email contoh: `user@test.com`
- Password: bebas (misal: `password`)

### **Step 3: Klik "Booking Baru"**
- Dari navbar di dashboard
- Atau akses langsung: `http://localhost:8000/Booking`

### **Step 4: Isi Form Booking**
```
Nama Lengkap:    Budi Santoso
No WhatsApp:     081234567890
Tipe Booking:    Grup
Pilihan Paket:   Leaf Grup
Jumlah Orang:    4
Tanggal:         29/01/2026
Jam:             14:00
```

### **Step 5: Klik "Konfirmasi Booking"**
Pastikan tidak ada error validasi

### **EXPECTED RESULT:**
```
✅ Halaman redirect ke /dashboard
✅ Notifikasi hijau muncul di atas
✅ Pesan: "Paket 'Leaf Grup' untuk 4 orang telah berhasil dipesan. 
           Tanggal pelayanan: 29/01/2026 pukul 14:00"
✅ Booking muncul di list "Riwayat Booking Anda"
✅ Status booking: "Menunggu"
✅ Notifikasi auto-close setelah 8 detik (atau manual)
```

---

## 🔍 Troubleshooting

### ❌ Masih 404?
```bash
# Jalankan di terminal:
cd c:\STUDIOBUMA
php artisan route:clear
php artisan cache:clear
```
Kemudian refresh browser (Ctrl+Shift+R)

### ❌ Data tidak tersimpan ke database?
```bash
# Cek migrations
php artisan migrate:status

# Jalankan semua migrations
php artisan migrate --force
```

### ❌ Notifikasi tidak muncul?
1. Check browser console (F12 → Console)
2. Lihat apakah ada JavaScript error
3. Verifikasi session_driver di `.env` (gunakan 'file')

### ❌ Login gagal?
```bash
# Reset user table dan seeder
php artisan migrate:refresh --seed

# Buat user baru manual:
php artisan tinker
# Di dalam tinker:
App\Models\User::create(['name' => 'Test', 'email' => 'test@test.com', 'password' => bcrypt('password')])
```

---

## 📊 Routes yang Tersedia

```
POST   /Booking           → Create Booking (uppercase)
POST   /booking           → Create Booking (lowercase)
GET    /dashboard         → Dashboard Customer (dengan notifikasi)
GET    /admin            → Dashboard Admin
GET    /bookings         → List Booking Admin
```

---

## 🗄️ Database Schema (Updated)

```sql
Table: booking
- id (BIGINT, PK)
- user_id (BIGINT, FK) ← [NEW]
- nama (VARCHAR)
- nowa (VARCHAR)
- booking_type (ENUM: grup, family)
- paket (VARCHAR)
- jumlah_orang (INT)
- tanggal_pelayanan (DATE)
- jam_pelayanan (TIME)
- status (ENUM: pending, confirmed, completed, cancelled)
- progress_stage (ENUM: pending, photoshoot, edited, complete) ← [NEW]
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

---

## 📝 Files yang Berubah

| File | Status | Perubahan |
|------|--------|-----------|
| routes/web.php | ✅ Updated | Tambah alias `/booking` route |
| database/migrations/2026_01_29_000000_* | ✅ Created | Tambah user_id & progress_stage |
| app/Http/Controllers/BookingController.php | ✅ Updated | Pesan detail booking |
| resources/views/customer/dashboard.blade.php | ✅ Updated | Notifikasi sukses |
| app/Models/Booking.php | ✅ OK | Sudah support semua fields |

---

## 🚀 Nginx/Apache Server

Jika menggunakan shared hosting atau server:

### Pastikan `.htaccess` ada di folder `public/`:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^ index.php [L]
</IfModule>
```

### Atau gunakan: 
```bash
php artisan serve
# Akses: http://localhost:8000
```

---

## 💡 Tips

- Gunakan `php artisan tinker` untuk debug database
- Check `storage/logs/laravel.log` untuk errors
- Gunakan DevTools (F12) untuk inspect element
- Test di incognito/private window untuk clean session

---

## ✨ Selesai!

Sekarang sistem booking dengan notifikasi sudah lengkap dan berfungsi.
Silakan test sesuai langkah di atas! 🎉
