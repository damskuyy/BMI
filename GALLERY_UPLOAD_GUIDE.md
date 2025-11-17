# Guide: Upload Gambar Gallery

## Persyaratan
1. Anda harus login sebagai admin
2. Gambar harus dalam format JPEG atau PNG
3. Server storage harus writable (sudah di-setup dengan benar)

## Langkah-Langkah Upload

### 1. Buka Form Create Gallery
- Navigasi ke **Admin Dashboard** → **Gallery** → **Add Image**
- Atau akses langsung: `http://localhost/admin/gallery_be/create`

### 2. Isi Form Data
Isilah data berikut:
- **Title** (Wajib): Nama/judul galeri, contoh "Event Bazar 2025"
- **Event Date** (Wajib): Tanggal event
- **Description** (Opsional): Deskripsi event

### 3. Upload Gambar
- Klik **"Choose File"** untuk memilih gambar pertama
- Setiap gambar dapat dikonfigurasi:
  - **Display Mode**: Pilih `col-4` (3 gambar per baris) atau `col-6` (2 gambar per baris)
  - **Center**: Centang checkbox jika ingin gambar ditengahkan

### 4. Tambah Gambar Lainnya (Opsional)
- Klik tombol **"Add another photo"** untuk menambah file input baru
- Ulangi langkah 3 untuk setiap gambar tambahan

### 5. Simpan
- Klik tombol **"Save Gallery"** untuk menyimpan

## Yang Terjadi Setelah Simpan
1. Sistem akan validasi semua field
2. Gambar akan di-upload ke folder: `storage/app/public/gallery/`
3. Nama file akan di-generate otomatis (contoh: `123abc456_0.jpg`)
4. Data akan disimpan ke database
5. Anda akan diredirect ke halaman daftar gallery

## Verifikasi Upload Berhasil
✓ Di halaman **Gallery Admin Index**:
  - Gallery baru muncul di daftar
  - Thumbnail gambar pertama terlihat di sebelah kiri

✓ Di halaman **Frontend Gallery** (`/gallery`):
  - Gallery baru muncul di bagian bawah (galeri terbaru di bawah)
  - Semua gambar ditampilkan dengan mode display yang dipilih

## Troubleshooting

### Gambar tidak muncul di admin index
**Kemungkinan penyebab:**
1. Form tidak ter-submit dengan benar
   - Solusi: Pastikan minimal 1 file sudah dipilih, klik "Add another photo" kalau perlu
   
2. Validation error
   - Solusi: Cek apakah ada pesan error merah di form, pastikan:
     - File adalah gambar (JPEG/PNG)
     - Ukuran file tidak terlalu besar
     - Semua field wajib sudah diisi

3. File tidak tersimpan di storage
   - Solusi: Cek di `storage/app/public/gallery/` apakah file ada
   - Jika tidak ada, mungkin permission folder bermasalah

### Gambar tidak muncul di frontend
1. Pastikan sudah refresh halaman (Ctrl+F5 untuk hard refresh)
2. Cek di admin gallery index dulu - kalau tidak muncul di sana, berarti belum berhasil upload
3. Kalau muncul di admin tapi tidak di frontend, coba clear cache:
   ```bash
   php artisan cache:clear
   php artisan view:clear
   ```

### Ukuran thumbnail terlalu kecil/besar
- Edit gallery dan ubah **Display Mode** untuk masing-masing gambar
- Klik tombol **Edit** di gallery yang ingin diubah

## File Locations
- **Upload folder**: `storage/app/public/gallery/`
- **Public URL**: `/storage/gallery/filename.jpg`
- **Symlink**: `public/storage` → `storage/app/public`

## Testing (Developer)
Untuk test upload dari command line:
```bash
php artisan test:gallery-upload
```

Untuk test image storage:
```bash
php artisan test:image-upload
```
