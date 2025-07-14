# Milala Auto Service Landing Page

Sebuah website landing page modern untuk Milala Auto Service dengan tema gelap dan animasi yang menarik.

## 🚀 Fitur Utama

- **Desain Modern**: Interface yang clean dengan tema gelap dan aksen kuning
- **Responsive Design**: Tampilan optimal di semua perangkat
- **Animasi Smooth**: Menggunakan AOS (Animate On Scroll) library
- **Komponen Reusable**: Struktur modular untuk kemudahan maintenance
- **Form Validation**: Validasi real-time untuk semua form
- **SEO Optimized**: Meta tags dan struktur yang SEO-friendly

## 📁 Struktur Direktori

```
├── application/views/landing/
│   ├── home.php                 # Halaman utama
│   ├── about.php               # Halaman tentang kami
│   ├── contact.php             # Halaman kontak
│   ├── workshop.php            # Halaman workshop
│   ├── artikel.php             # Halaman artikel
│   ├── reservation.php         # Halaman reservasi
│   └── partials/               # Komponen reusable
│       ├── service_card.php    # Komponen kartu layanan
│       ├── testimonial_card.php # Komponen kartu testimoni
│       ├── location_card.php   # Komponen kartu lokasi
│       └── background_animation.php # Komponen animasi latar
├── assets/
│   ├── css/
│   │   └── theme-colors.css    # Variabel CSS dan tema
│   └── js/
│       └── landing-interactions.js # JavaScript interaksi
└── README.md                   # Dokumentasi ini
```

## 🎨 Sistem Tema

### Warna Utama
- **Primary**: `#FCFB0B` (Kuning)
- **Background**: `#1F2937` (Abu-abu gelap)
- **Card Background**: `rgba(31, 41, 55, 0.5)` dengan backdrop blur
- **Text**: `#FFFFFF` (Putih) dan `rgba(255, 255, 255, 0.8)` (Abu-abu terang)

### CSS Variables
Semua warna tema didefinisikan dalam `assets/css/theme-colors.css`:

```css
:root {
  --primary-color: #FCFB0B;
  --dark-bg: #1F2937;
  --card-bg: rgba(31, 41, 55, 0.5);
  --text-primary: #FFFFFF;
  --text-secondary: rgba(255, 255, 255, 0.8);
}
```

## 🧩 Komponen Reusable

### 1. Service Card (`partials/service_card.php`)
Komponen untuk menampilkan kartu layanan.

**Parameter:**
```php
$service = [
    'title' => 'Nama Layanan',
    'description' => 'Deskripsi layanan',
    'icon' => '<svg>...</svg>',
    'duration' => '30 menit',
    'price' => 'Rp 150.000',
    'badge' => 'Populer',
    'badge_color' => 'bg-gradient-to-r from-yellow-400/10...',
    'delay' => '100'
];
```

**Penggunaan:**
```php
<?php include 'partials/service_card.php'; ?>
```

### 2. Testimonial Card (`partials/testimonial_card.php`)
Komponen untuk menampilkan kartu testimoni pelanggan.

**Parameter:**
```php
$testimonial = [
    'name' => 'Nama Pelanggan',
    'title' => 'Jabatan/Profesi',
    'image' => 'url_foto.jpg',
    'rating' => 5,
    'content' => 'Isi testimoni...',
    'verified' => true,
    'delay' => '150'
];
```

### 3. Location Card (`partials/location_card.php`)
Komponen untuk menampilkan kartu lokasi cabang.

**Parameter:**
```php
$location = [
    'name' => 'Milala Auto Service Cabang Utama',
    'address' => 'Alamat lengkap...',
    'phone' => '+62 21 1234 5678',
    'hours' => 'Senin - Sabtu: 08:00 - 17:00',
    'image' => 'url_gambar.jpg',
    'services' => ['Service Rutin', 'Body Repair', 'Cat Mobil'],
    'is_main' => true,
    'delay' => '200'
];
```

### 4. Background Animation (`partials/background_animation.php`)
Komponen untuk elemen animasi latar belakang.

**Parameter:**
```php
$config = [
    'elements' => [
        [
            'type' => 'yellow',
            'size' => 'md',
            'position' => 'top-right',
            'delay' => 'delay-500'
        ]
    ]
];
```

## 🎯 JavaScript Interactions

File `assets/js/landing-interactions.js` mengelola:

- **Animasi Scroll**: Efek parallax dan navbar transparency
- **Interaksi Kartu**: Hover effects dan ripple animations
- **Validasi Form**: Real-time validation untuk semua form
- **Navigasi**: Smooth scroll dan mobile menu
- **Notifikasi**: Sistem notifikasi untuk feedback user

### Fungsi Utama:

```javascript
// Inisialisasi animasi
initializeAnimations();

// Efek scroll
initializeScrollEffects();

// Validasi form
validateForm(formElement);

// Tampilkan notifikasi
showNotification('Pesan', 'success');

// Loading state
setLoadingState(buttonElement, true);
```

## 🔧 Instalasi & Setup

1. **Clone atau download** project ini
2. **Setup web server** (Apache/Nginx) dengan PHP support
3. **Include CSS dan JS** di template:

```html
<!-- CSS -->
<link rel="stylesheet" href="assets/css/theme-colors.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- JavaScript -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="assets/js/landing-interactions.js"></script>
```

## 📱 Responsive Breakpoints

- **Mobile**: < 768px
- **Tablet**: 768px - 1024px
- **Desktop**: > 1024px

## 🎨 Customization

### Mengubah Warna Tema
Edit file `assets/css/theme-colors.css`:

```css
:root {
  --primary-color: #YOUR_COLOR;
  --dark-bg: #YOUR_DARK_COLOR;
}
```

### Menambah Komponen Baru
1. Buat file PHP di `partials/`
2. Definisikan parameter yang diperlukan
3. Include di halaman yang membutuhkan

### Mengubah Animasi
Edit konfigurasi AOS di `landing-interactions.js`:

```javascript
AOS.init({
    duration: 1000,
    easing: 'ease-in-out',
    once: true,
    offset: 150
});
```

## 🚀 Performance Tips

1. **Lazy Loading**: Gunakan `loading="lazy"` untuk gambar
2. **Minify Assets**: Compress CSS dan JS untuk production
3. **Optimize Images**: Gunakan format WebP dan ukuran yang sesuai
4. **Cache Headers**: Set proper cache headers di server

## 🐛 Troubleshooting

### Animasi Tidak Berjalan
- Pastikan AOS library ter-load dengan benar
- Check console untuk error JavaScript
- Verifikasi data-aos attributes

### Styling Tidak Sesuai
- Pastikan `theme-colors.css` ter-load
- Check CSS specificity conflicts
- Verifikasi Tailwind CSS classes

### Form Validation Error
- Check JavaScript console untuk error
- Pastikan form memiliki attribute yang benar
- Verifikasi field validation rules

## 📞 Support

Untuk pertanyaan atau bantuan, silakan hubungi tim development.

---

**Milala Auto Service** - Solusi Terpercaya untuk Perawatan Kendaraan Anda