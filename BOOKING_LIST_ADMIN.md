# Fitur List Booking Admin Dashboard

## Deskripsi
Fitur ini memungkinkan admin untuk melihat semua data booking dalam bentuk tabel lengkap di dashboard admin.

## Lokasi
- **Dashboard Admin**: `/admin`
- **Halaman Booking Lengkap**: `/bookings`

## Fitur Utama

### 1. Tabel Booking Lengkap di Dashboard
Tabel di dashboard menampilkan:
- **ID**: Nomor booking
- **Nama**: Nama customer
- **No WA**: Nomor WhatsApp (link untuk chat)
- **Tipe**: Tipe booking (grup/family)
- **Paket**: Nama paket yang dipilih
- **Jumlah**: Jumlah orang yang melakukan booking
- **Tanggal**: Tanggal pelayanan (format: dd/mm/yyyy)
- **Jam**: Jam pelayanan (format: HH:mm)
- **Status**: Status booking (pending, confirmed, completed, cancelled)
- **Progress**: Progress pengerjaan (pending, photoshoot, edited, complete)
- **Aksi**: Tombol untuk chat WhatsApp

### 2. Filter Status
Admin dapat memfilter booking berdasarkan status:
- **Semua Status** - Tampilkan semua booking
- **Pending** - Booking yang menunggu konfirmasi
- **Confirmed** - Booking yang sudah dikonfirmasi
- **Completed** - Booking yang sudah selesai
- **Cancelled** - Booking yang dibatalkan

### 3. Navigasi
Tombol tambahan di section "Semua Data Booking":
- **Reset Filter** - Mengembalikan ke tampilan semua data
- **Lihat Detail** - Menuju halaman booking lengkap dengan fitur lengkap

### 4. Statistik Ringkas
Di atas tabel, terdapat 4 kartu statistik:
- **Booking**: Total semua booking
- **Photoshoot**: Booking dalam tahap photoshoot
- **Editing**: Booking dalam tahap editing
- **Completed**: Booking yang sudah selesai

## Status Booking
- 🟡 **Pending**: Booking baru yang menunggu konfirmasi admin
- 🟢 **Confirmed**: Admin sudah confirm booking
- 🔵 **Completed**: Booking sudah selesai
- 🔴 **Cancelled**: Booking dibatalkan

## Progress Stage
- 🟡 **Pending**: Menunggu photoshoot
- 🟢 **Photoshoot**: Sedang dalam proses photoshoot
- 🔵 **Edited**: Sedang dalam proses editing
- 🟢 **Complete**: Selesai dan siap dikirim

## Fitur Interaktif
1. **Chat WhatsApp**: Setiap booking memiliki tombol chat untuk langsung menghubungi customer via WhatsApp
2. **Pagination**: Tabel dapat menampilkan multiple pages (10 booking per halaman di dashboard, 15 di halaman detail)
3. **Responsive Design**: Tabel responsif untuk perangkat mobile

## Routes
```php
GET  /admin              -> Dashboard dengan list booking ringkas
GET  /bookings           -> Halaman detail dengan list booking lengkap
PATCH /admin/booking/{id}/status  -> Update status booking
PATCH /admin/booking/{id}/progress -> Update progress booking
DELETE /admin/booking/{id}         -> Hapus booking
```

## Middleware
Semua rute admin dilindungi dengan middleware:
- `auth` - User harus login
- `admin` - User harus memiliki role admin

## Database
Tabel `booking` memiliki field:
- `id` - Primary key
- `user_id` - ID user yang melakukan booking
- `nama` - Nama customer
- `nowa` - Nomor WhatsApp
- `booking_type` - Tipe booking (grup/family)
- `paket` - Nama paket
- `jumlah_orang` - Jumlah orang
- `tanggal_pelayanan` - Tanggal pelayanan
- `jam_pelayanan` - Jam pelayanan
- `status` - Status booking
- `progress_stage` - Progress pengerjaan
- `created_at`, `updated_at` - Timestamp

## Styling
Menggunakan:
- **Font**: Poppins (Google Fonts)
- **Warna Primary**: #556B2F (Olive Green)
- **Warna Danger**: #B22222 (Red)
- **Bootstrap 5**: Untuk responsive grid
- **Custom CSS**: Untuk styling khusus

## Catatan
- Nomor WhatsApp ditampilkan singkat (hanya 10 digit terakhir)
- Format tanggal: dd/mm/yyyy
- Format jam: HH:mm (24 jam)
- Pagination otomatis untuk tabel besar
