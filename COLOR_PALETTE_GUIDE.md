# 🎨 Color Palette - Studio BUMA

## Warna yang Digunakan

```
┌─────────────────────────────────────────────┐
│ PRIMARY COLORS                              │
├─────────────────────────────────────────────┤
│ Hijau (Primary)      #59654E                │
│ Hijau Gelap (Hover)  #48513F                │
│ Merah Bata (Accent)  #9E4A1E                │
│ Cream (Background)   #F7EED6                │
│ Putih (Light BG)     #FDF6E3                │
│ Abu-abu (Text)       #666666                │
│                                             │
│ TANPA GRADASI / FLAT DESIGN                │
└─────────────────────────────────────────────┘
```

## CSS Variables (Style.css)

```css
:root {
    --primary: #59654E;          /* Hijau */
    --primary-dark: #48513F;     /* Hijau Gelap */
    --secondary: #9E4A1E;        /* Merah Bata */
    --dark: #FDF6E3;             /* Putih Cream */
    --darker: #F7EED6;           /* Cream */
    --light: #59654E;            /* Hijau (text) */
    --text-muted: #666;          /* Abu-abu */
}
```

## Penggunaan Warna

### Primary Actions (Buttons, Links)
- **Background**: #59654E (Hijau)
- **Hover**: #48513F (Hijau Gelap)
- **Text**: Putih

### Secondary Actions (Delete, Cancel)
- **Background**: #9E4A1E (Merah Bata)
- **Hover**: #7A3818 (Merah Gelap)
- **Text**: Putih

### Alerts & Notifications
- **Success Background**: #E8EEE0 (Hijau Muda)
- **Success Border**: #59654E
- **Success Text**: #59654E
- **Error Background**: #FED7B8 (Merah Muda)
- **Error Border**: #9E4A1E
- **Error Text**: #9E4A1E

### Page Backgrounds
- **Dark Background**: #FDF6E3 (Putih Cream)
- **Light Background**: #F7EED6 (Cream)
- **Card Background**: Putih (#FFFFFF)

### Text Colors
- **Primary Text**: #333333 (Gelap)
- **Secondary Text**: #666666 (Abu-abu)
- **Muted Text**: #999999 (Abu-abu Muda)
- **Light Text**: #FFFFFF (Putih)

## Files yang Sudah Diupdate

✅ resources/views/auth/login.blade.php
✅ resources/views/auth/signup.blade.php
✅ resources/views/admin/dasboard.blade.php
✅ resources/views/admin/bookings/index.blade.php
✅ resources/views/admin/packages/index.blade.php
✅ resources/views/admin/packages/create.blade.php
✅ resources/views/admin/packages/edit.blade.php
✅ resources/views/admin/packages/show.blade.php
✅ resources/views/customer/dashboard.blade.php
✅ resources/views/customer/tracker.blade.php
✅ resources/views/Booking.blade.php
✅ resources/views/home.blade.php
✅ resources/views/login.blade.php
✅ resources/views/welcome.blade.php
✅ public/css/style.css
✅ public/css/app.css

## Info Perubahan

- ❌ Tidak ada gradasi (linear-gradient dihapus)
- ✅ Warna solid & flat design
- ✅ Konsistensi di semua halaman
- ✅ Button hover dengan warna gelap
- ✅ Alert box dengan background sesuai status
- ✅ Responsive design tetap terjaga
