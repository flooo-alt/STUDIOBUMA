# 🏗️ Struktur Lengkap Sistem Booking & Notifikasi

## Arsitektur MVC

```
┌─────────────────────────────────────────────────────────────────┐
│                        WEB BROWSER                              │
│  GET /Booking → [FORM BOOKING]  →  POST /booking               │
└────────────────────────┬──────────────────────────────────────┘
                         │
        ┌────────────────┴────────────────┐
        │    ROUTES HANDLER               │
        │  (routes/web.php)               │
        │  POST /Booking → store()        │
        │  POST /booking → store()        │
        │  GET /dashboard → dashboard()   │
        └────────────┬───────────────────┘
                     │
    ┌────────────────┴──────────────────────┐
    │      LARAVEL CONTROLLERS              │
    │                                       │
    │ BookingController@store()             │
    │ ├─ Validasi input                     │
    │ ├─ Simpan ke database                 │
    │ ├─ Generate pesan sukses              │
    │ └─ Redirect ke dashboard              │
    │                                       │
    │ CustomerController@dashboard()        │
    │ ├─ Ambil data booking dari DB         │
    │ ├─ Pass ke view dengan data           │
    │ └─ Return view ke browser             │
    └────────────┬──────────────────────────┘
                 │
    ┌────────────┴──────────────────────────┐
    │      DATABASE (MySQL/SQLite)          │
    │                                       │
    │ Table: booking                        │
    │ ├─ id (BIGINT)                       │
    │ ├─ user_id (BIGINT, FK)   ← NEW      │
    │ ├─ nama (VARCHAR)                    │
    │ ├─ nowa (VARCHAR)                    │
    │ ├─ booking_type (ENUM)               │
    │ ├─ paket (VARCHAR)                   │
    │ ├─ jumlah_orang (INT)                │
    │ ├─ tanggal_pelayanan (DATE)          │
    │ ├─ jam_pelayanan (TIME)              │
    │ ├─ status (ENUM)                     │
    │ ├─ progress_stage (ENUM)   ← NEW     │
    │ ├─ created_at (TIMESTAMP)            │
    │ └─ updated_at (TIMESTAMP)            │
    │                                       │
    │ Table: users                          │
    │ └─ id (BIGINT, PK)                   │
    └────────────┬──────────────────────────┘
                 │
    ┌────────────┴──────────────────────────┐
    │    VIEW - BLADE TEMPLATE              │
    │  (resources/views/customer/dashboard) │
    │                                       │
    │ @if(session('success'))               │
    │   ┌─────────────────────────────────┐ │
    │   │ 🎉 NOTIFIKASI HIJAU             │ │
    │   │                                 │ │
    │   │ ✅ Booking Berhasil!           │ │
    │   │                                 │ │
    │   │ Pesan: Paket 'Leaf' untuk 4..   │ │
    │   │                                 │ │
    │   │ [Tutup] [Booking Baru] [×]     │ │
    │   └─────────────────────────────────┘ │
    │                                       │
    │ @endif                                │
    │                                       │
    │ [TABEL RIWAYAT BOOKING]               │
    │ ├─ ID | Paket | Tgl | Status        │ │
    │ ├─ #1 | Leaf  | 29/ | Menunggu ✓   │ │
    │ └─ ...                              │ │
    └─────────────────────────────────────┘
                 │
        ┌────────┴────────┐
        │ CSS + JavaScript│
        │ (Styling, Animation)
        │ Auto-hide setelah 8s
        │ Manual close button
        └──────────────────┘
```

## File Structure

```
📁 STUDIOBUMA
├── 📁 app
│   ├── 📁 Http
│   │   ├── 📁 Controllers
│   │   │   ├── AuthController.php
│   │   │   ├── BookingController.php ✓ (store method)
│   │   │   ├── CustomerController.php ✓ (dashboard method)
│   │   │   ├── AdminController.php
│   │   │   └── PackageController.php
│   │   └── 📁 Middleware
│   ├── 📁 Models
│   │   └── Booking.php ✓ (fillable, casts)
│   └── Providers
│
├── 📁 database
│   ├── 📁 migrations
│   │   ├── 2014_10_12_000000_create_users_table.php
│   │   ├── 2019_12_14_000001_create_personal_access_tokens_table.php
│   │   ├── 2026_01_15_035612_create_booking_table.php
│   │   ├── 2026_01_28_000000_add_user_id_to_booking_table.php
│   │   └── 2026_01_29_000000_add_missing_columns_to_booking_table.php ✓ [NEW]
│   └── 📁 seeders
│
├── 📁 resources
│   └── 📁 views
│       ├── 📁 auth
│       │   └── login.blade.php
│       ├── 📁 customer
│       │   └── dashboard.blade.php ✓ (notifikasi)
│       ├── 📁 admin
│       │   ├── dasboard.blade.php
│       │   ├── 📁 bookings
│       │   │   └── index.blade.php
│       │   └── 📁 packages
│       ├── Booking.blade.php ✓ (form action)
│       ├── home.blade.php
│       └── login.blade.php
│
├── 📁 routes
│   └── web.php ✓ (booking routes)
│
├── 📁 storage
│   ├── logs
│   │   └── laravel.log (cek di sini jika error)
│   └── ...
│
├── .env ✓ (pastikan DB_CONNECTION dan SESSION_DRIVER correct)
├── artisan
├── composer.json
└── PERBAIKAN_SELESAI.txt ✓ [NEW]
```

## Data Flow Sequence

```
TIMELINE BOOKING BARU:
═══════════════════════════════════════════════════════════

[00:00] USER AKSES /BOOKING
        ├─ Browser GET request
        ├─ BookingController@create() return view('Booking')
        └─ User lihat form

[00:30] USER ISI FORM
        ├─ Nama: Budi Santoso
        ├─ No WA: 081234567890
        ├─ Tipe: Grup
        ├─ Paket: Leaf Grup
        ├─ Jumlah: 4
        ├─ Tanggal: 29/01/2026
        ├─ Jam: 14:00
        └─ Data siap submit

[01:00] USER KLIK "KONFIRMASI BOOKING"
        ├─ Form POST ke /booking
        ├─ CSRF token terverifikasi
        └─ Request sampai ke server

[01:10] BOOKINGCONTROLLER@STORE() DIJALANKAN
        ├─ Validasi:
        │  ├─ nama (required, string)
        │  ├─ nowa (required, string)
        │  ├─ booking_type (required, in:grup,family)
        │  ├─ paket (required, string)
        │  ├─ jumlah_orang (required, integer, min:1)
        │  ├─ tanggal_pelayanan (required, date, after_or_equal:today)
        │  └─ jam_pelayanan (required, date_format:H:i)
        │
        ├─ Create record:
        │  ├─ $booking = Booking::create([
        │  │     'user_id' => auth()->id(),
        │  │     'nama' => 'Budi Santoso',
        │  │     'nowa' => '081234567890',
        │  │     'booking_type' => 'grup',
        │  │     'paket' => 'Leaf Grup',
        │  │     'jumlah_orang' => 4,
        │  │     'tanggal_pelayanan' => '2026-01-29',
        │  │     'jam_pelayanan' => '14:00',
        │  │     'status' => 'pending',
        │  │     'progress_stage' => 'pending'
        │  │  ])
        │  └─ Database INSERT: OK ✓
        │
        ├─ Generate pesan:
        │  └─ $message = "Paket 'Leaf Grup' untuk 4 orang telah berhasil 
        │               dipesan. Tanggal pelayanan: 29/01/2026 pukul 14:00"
        │
        └─ return redirect('/dashboard')->with('success', $message)

[01:20] SESSION FLASH MESSAGE
        ├─ Pesan disimpan di session
        ├─ Status: pending dikirim ke server
        └─ Redirect response dikirim ke browser

[01:30] BROWSER MENERIMA REDIRECT
        ├─ Status: 302 Found
        ├─ Location: http://localhost:8000/dashboard
        └─ Browser follow redirect otomatis

[01:40] CUSTOMERCONTROLLER@DASHBOARD() DIJALANKAN
        ├─ $user = Auth::user()
        ├─ $bookings = Booking::where('user_id', $user->id)->get()
        ├─ Data booking termasuk yang baru saja dibuat
        └─ return view('customer.dashboard', compact('bookings'))

[01:50] BLADE TEMPLATE DIRENDER
        ├─ @if(session('success'))
        │  └─ TRUE! Pesan ada di session
        │
        ├─ Render notifikasi HTML:
        │  ├─ <div class="alert-success-custom">
        │  ├─ Icon: ✅
        │  ├─ Title: "Booking Berhasil!"
        │  ├─ Message: {{ session('success') }}
        │  │           = "Paket 'Leaf Grup' untuk 4 orang..."
        │  ├─ Buttons: [Tutup] [Booking Baru] [×]
        │  └─ </div>
        │
        ├─ Render CSS inline:
        │  ├─ Gradient: #28a745 → #20c997
        │  ├─ Animation: slideDown 0.5s
        │  ├─ Shadow & radius
        │  └─ Responsive design
        │
        └─ Render JavaScript:
           ├── setTimeout() untuk auto-hide setelah 8000ms
           └── Event listeners untuk manual close

[02:00] BROWSER MENAMPILKAN NOTIFIKASI
        ├─ Notifikasi muncul dengan animasi slideDown
        ├─ Icon check mark pop-in animation
        ├─ User baca pesan detail
        └─ User lihat tabel riwayat booking dengan data baru

[02:30] AUTO-HIDE (atau manual close)
        ├─ JavaScript setTimeout() mencapai 8 detik
        ├─ fadeOut animation 0.5s
        ├─ Notifikasi hilang dari view
        ├─ Booking tetap ada di tabel
        └─ Session dihapus

[END]   BOOKING SELESAI
        ├─ Data tersimpan di database
        ├─ User tahu booking berhasil
        ├─ Ready untuk booking baru atau admin confirm
        └─ ✓ SUCCESS!
```

## Message Detail Flow

```
Controller Output:
──────────────────
$booking->paket         = "Leaf Grup"
$booking->jumlah_orang  = 4
$booking->tanggal_pelayanan = "2026-01-29"
$booking->jam_pelayanan = "14:00"

String Concatenation:
────────────────────
"Paket '{$booking->paket}' untuk {$booking->jumlah_orang} orang 
 telah berhasil dipesan. Tanggal pelayanan: " . 
\Carbon\Carbon::parse($booking->tanggal_pelayanan)->format('d/m/Y') . 
" pukul " . date('H:i', strtotime($booking->jam_pelayanan))

Final Message:
──────────────
"Paket 'Leaf Grup' untuk 4 orang telah berhasil dipesan. 
 Tanggal pelayanan: 29/01/2026 pukul 14:00"

Displayed in Blade:
───────────────────
<p class="alert-message">{{ session('success') }}</p>
```

## Error Handling

```
Jika ada error:

1. VALIDATION ERRORS:
   ├─ Blade @error directive menampilkan error
   ├─ Form values ter-preserve dengan old()
   └─ User dapat memperbaiki dan resubmit

2. DATABASE ERRORS:
   ├─ Exception caught (jika no try-catch)
   ├─ 500 error ditampilkan
   ├─ Log di storage/logs/laravel.log
   └─ Check .env DB_* settings

3. AUTH ERRORS:
   ├─ user tidak login → redirect ke /login
   ├─ Middleware 'auth' protect routes
   └─ auth()->id() = NULL jika tidak login

4. SESSION ERRORS:
   ├─ SESSION_DRIVER di .env harus 'file' atau 'database'
   ├─ storage/framework/sessions/ harus writable
   └─ Clear cache: php artisan cache:clear
```

## Integration Points

```
DARI FORM KE DATABASE:
───────────────────────

1. HTML FORM (Booking.blade.php)
   ├─ <form action="/booking" method="POST">
   ├─ Field names match DB columns
   ├─ CSRF token included
   └─ Bootstrap 5 styling

2. ROUTES (routes/web.php)
   ├─ POST /booking → BookingController@store
   ├─ Middleware: auth
   └─ Route names: booking.store, booking.store.alt

3. CONTROLLER (BookingController.php)
   ├─ Validasi request
   ├─ Booking::create() dengan user_id dari auth()
   ├─ Generate message
   └─ Redirect dengan flash message

4. MODEL (Booking.php)
   ├─ Fillable: semua kolom yang di-create
   ├─ Casts: tanggal_pelayanan, jam_pelayanan
   └─ Relation: belongsTo(User)

5. DATABASE (booking table)
   ├─ Record disimpan dengan user_id
   ├─ Status: pending
   ├─ Progress: pending
   └─ Created_at: timestamp saat ini

6. VIEW (customer/dashboard.blade.php)
   ├─ Session flash message ditampilkan
   ├─ Notifikasi render dengan CSS & JS
   ├─ Booking list updated
   └─ User melihat sukses
```

---

**READY TO USE! 🚀**

Semua komponen sudah terintegrasi dengan baik.
Silakan test sesuai panduan di TEST_BOOKING_SEKARANG.md
