# 📊 Dokumentasi Sistem Admin Dashboard Studio BUMA

## Alur Sistem

### 1️⃣ **Pelanggan Membuat Booking**
```
Home Page → Klik "Booking" → Isi Form Booking → Submit
    ↓
Disimpan ke Database (tabel: booking)
    ↓
Admin Dashboard Otomatis Update
```

### 2️⃣ **Admin Mengelola Booking**
```
Klik "🔐 Log in" → Input Email & Password → Dashboard
    ↓
Lihat Semua Data Booking Realtime
    ↓
Update Status, Chat WhatsApp, atau Hapus
```

---

## 📋 Kredensial Admin

| Field | Value |
|-------|-------|
| **Email** | `admin@buma.com` |
| **Password** | `password123` |
| **Role** | Admin |

---

## 🗄️ Database Schema

### Tabel: `users`
| Column | Type | Deskripsi |
|--------|------|-----------|
| id | INT | Primary Key |
| name | VARCHAR | Nama user |
| email | VARCHAR | Email (Unique) |
| password | VARCHAR | Password (Hashed) |
| role | ENUM | 'user' atau 'admin' |
| email_verified_at | TIMESTAMP | Verifikasi email |
| remember_token | VARCHAR | Token remember me |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

### Tabel: `booking`
| Column | Type | Deskripsi |
|--------|------|-----------|
| id | INT | Primary Key |
| nama | VARCHAR | Nama pembooking |
| nowa | VARCHAR | Nomor WhatsApp |
| booking_type | ENUM | 'grup' atau 'family' |
| paket | VARCHAR | Paket yang dipilih |
| jumlah_orang | INT | Jumlah peserta |
| tanggal_pelayanan | DATE | Tanggal booking |
| jam_pelayanan | TIME | Jam booking |
| status | ENUM | 'pending', 'confirmed', 'completed', 'cancelled' |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

---

## 🔄 Fitur Admin Dashboard

### 📊 Statistics Cards
- **Total Booking**: Menampilkan jumlah total booking
- **Pending**: Booking yang menunggu konfirmasi
- **Confirmed**: Booking yang sudah dikonfirmasi
- **Completed**: Booking yang sudah selesai

### 📋 Tabel Data Booking
Menampilkan semua data booking dengan kolom:
- ID Booking
- Nama Pelanggan
- No WhatsApp (Clickable untuk chat WhatsApp)
- Tipe Booking (Grup/Family)
- Paket
- Jumlah Orang
- Tanggal Pelayanan
- Jam Pelayanan
- Status (Dropdown untuk update)
- Aksi (Update Status, Hapus)

### ⚙️ Fungsi Admin
1. **👁️ Lihat Booking**: Semua booking otomatis tampil di dashboard
2. **✏️ Update Status**: Ubah status booking (Pending → Confirmed → Completed/Cancelled)
3. **💬 Chat WhatsApp**: Klik nomor WA untuk langsung chat pelanggan
4. **🗑️ Hapus Booking**: Hapus booking jika diperlukan
5. **🔐 Logout**: Keluar dari dashboard admin

---

## 🚀 Setup & Instalasi

### Step 1: Update Database
```bash
php artisan migrate:fresh --seed
```

Perintah ini akan:
- Membuat semua tabel di database
- Membuat admin user otomatis (admin@buma.com / password123)

### Step 2: Jalankan Server
```bash
php artisan serve
```

### Step 3: Buka Website
```
http://localhost:8000
```

---

## 🔐 Security Features

✅ **Admin Protection**
- Hanya user dengan role 'admin' bisa akses dashboard
- Login harus terlebih dahulu sebelum akses admin
- Password di-hash menggunakan bcrypt

✅ **CSRF Protection**
- Semua form dilindungi dengan CSRF token
- Form delete meminta konfirmasi

✅ **Input Validation**
- Email harus valid
- Password minimal 6 karakter
- Tanggal harus lebih dari hari ini

---

## 📱 Alur Lengkap Sistem

```
┌─────────────────────────────────────┐
│      HALAMAN HOME STUDIO BUMA       │
│   ┌─────────────────────────────┐   │
│   │  Header Navbar              │   │
│   │  - Home                     │   │
│   │  - Layanan & Produk         │   │
│   │  - Lokasi                   │   │
│   │  - 🔐 Log in (ADMIN)        │   │
│   └─────────────────────────────┘   │
└──────────┬────────────────────────────┘
           │
      ┌────┴─────────────────────────────────┐
      │                                       │
      ▼                                       ▼
┌──────────────────┐          ┌──────────────────────────┐
│  PELANGGAN KLIK  │          │  ADMIN KLIK "LOG IN"    │
│   "BOOKING"      │          │                          │
└────────┬─────────┘          └──────────┬───────────────┘
         │                               │
         ▼                               ▼
┌──────────────────────┐        ┌────────────────────┐
│ FORM BOOKING        │        │  LOGIN PAGE        │
│ - Nama              │        │ - Email            │
│ - No WA             │        │ - Password         │
│ - Tipe (Grup/Fam)  │        │ - [LOGIN BUTTON]   │
│ - Paket             │        └────────┬───────────┘
│ - Jumlah Orang      │                 │
│ - Tanggal           │                 ▼
│ - Jam               │        ┌──────────────────────┐
│ [SUBMIT]            │        │ ADMIN DASHBOARD      │
└────────┬────────────┘        │                      │
         │                     │ 📊 Statistics Cards  │
         ▼                     │                      │
┌──────────────────────┐        │ 📋 Tabel Booking    │
│ SIMPAN KE DATABASE  │        │                      │
│ (tabel: booking)    │        │ - View All Bookings │
└────────┬────────────┘        │ - Update Status     │
         │                     │ - Chat WhatsApp     │
         ▼                     │ - Delete Booking    │
   DASHBOARD ADMIN             │                      │
   UPDATE OTOMATIS             │ [LOGOUT]             │
                               └──────────────────────┘
```

---

## ✨ Fitur Yang Sudah Diimplementasikan

✅ Login & Signup System  
✅ Role-based Access Control (RBAC)  
✅ Form Booking Terintegrasi Database  
✅ Admin Dashboard Realtime  
✅ Update Status Booking  
✅ Delete Booking  
✅ WhatsApp Integration (Direct Chat)  
✅ Statistics Dashboard  
✅ Middleware Protection  
✅ CSRF Protection  
✅ Input Validation  
✅ Responsive Design  

---

## 📞 Testing

### Test Case 1: Pelanggan Membuat Booking
1. Buka http://localhost:8000
2. Klik tombol "Booking"
3. Isi semua field form
4. Klik "Konfirmasi Booking"
5. ✅ Data harus muncul di Admin Dashboard

### Test Case 2: Admin Login & Lihat Booking
1. Buka http://localhost:8000
2. Klik tombol "🔐 Log in"
3. Input: admin@buma.com / password123
4. ✅ Masuk ke dashboard dengan semua booking data

### Test Case 3: Update Status Booking
1. Di Admin Dashboard, pilih status baru dari dropdown
2. ✅ Status harus update di database

### Test Case 4: Chat WhatsApp
1. Klik nomor WhatsApp pelanggan
2. ✅ Harus membuka WhatsApp chat

---

## 🐛 Troubleshooting

**Q: Login tidak bisa?**  
A: Pastikan sudah jalankan `php artisan migrate:fresh --seed`

**Q: Data booking tidak muncul di dashboard?**  
A: Periksa apakah booking sudah submitted (check di database)

**Q: Tidak bisa akses admin hanya dengan login user biasa?**  
A: Benar! Hanya admin yang bisa akses. Login dengan admin@buma.com

---

**Last Updated**: 25 Januari 2026  
**Version**: 1.0
