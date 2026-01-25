<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Studio BUMA</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<div class="container mt-4">
    <!-- Penempatan: Di atas Card, rata kiri -->
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ url()->previous() }}" class="btn-back-modern">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #d4edda; border: 1px solid #28a745; color: #155724; border-radius: 8px; padding: 15px; margin-bottom: 20px;">
            <strong>✓ Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color: #f8d7da; border: 1px solid #B22222; color: #721c24; border-radius: 8px; padding: 15px; margin-bottom: 20px;">
            <strong>✗ Terjadi Kesalahan!</strong>
            <ul style="margin: 10px 0 0 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <div class="card-form shadow-lg">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-white">Form Reservasi</h2>
                <p class="text-light-green">Silakan lengkapi data untuk booking jadwal studio</p>
            </div>

            <form action="/booking" method="POST">
                @csrf
                <div class="row g-4">
                    <!-- Nama -->
                    <div class="col-md-6">
                        <label class="form-label" for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="form-control custom-input" placeholder="Contoh: Budi Santoso" required>
                    </div>

                    <!-- No WA -->
                    <div class="col-md-6">
                        <label class="form-label" for="nowa">No WhatsApp</label>
                        <input type="text" id="nowa" name="nowa" class="form-control custom-input" placeholder="0812xxxx" required>
                    </div>

                    <!-- Tipe Booking -->
                    <div class="col-md-6">
                        <label class="form-label" for="booking_type">Tipe Booking</label>
                        <select id="booking_type" name="booking_type" class="form-select custom-input" required>
                            <option value="" selected disabled>Pilih Tipe</option>
                            <option value="grup">Grup</option>
                            <option value="family">Family</option>
                        </select>
                    </div>

                    <!-- Paket -->
                    <div class="col-md-6">
                        <label class="form-label" for="paket">Pilihan Paket</label>
                        <select id="paket" name="paket" class="form-select custom-input" required>
                            <option value="" selected disabled>Pilih Paket</option>
                            <optgroup label="Grup">
                                <option value="Leaf">Leaf Grup</option>
                                <option value="Breeze">Breeze Grup</option>
                                <option value="Dawn">Dawn Grup</option>
                            </optgroup>
                            <optgroup label="Family">
                                <option value="Excited">Excited Family</option>
                                <option value="Delighted">Delighted Family</option>
                                <option value="Enthusiastic">Enthusiastic Family</option>
                            </optgroup>
                        </select>
                    </div>

                    <!-- Jumlah Orang (Diperbaiki: name tadi 'nama') -->
                    <div class="col-md-6">
                        <label class="form-label" for="jumlah_orang">Jumlah Orang</label>
                        <input type="number" id="jumlah_orang" name="jumlah_orang" class="form-control custom-input" placeholder="0" required>
                    </div>

                    <!-- Tanggal -->
                    <div class="col-md-6">
                        <label class="form-label" for="tanggal_pelayanan">Tanggal Pelayanan</label>
                        <input type="date" id="tanggal_pelayanan" name="tanggal_pelayanan" class="form-control custom-input" required>
                    </div>

                    <!-- Jam -->
                    <div class="col-md-12">
                        <label class="form-label" for="jam_pelayanan">Jam Pelayanan</label>
                        <input type="time" id="jam_pelayanan" name="jam_pelayanan" class="form-control custom-input" required>
                    </div>

                    <!-- Submit -->
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-submit w-100">
                            Konfirmasi Booking
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>