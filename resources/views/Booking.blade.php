<div>
<form action="/booking" method="POST">
@csrf
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Studio BUMA</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Untuk Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Untuk Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        input[type=number] {
            appearance: none;
        }

        body {
            background-color: #f6f7fb;
        }

        .card-form {
            max-width: 850px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,.05);
        }

        .form-control,
        select,
        input:not(.form-control) {
            border-radius: 14px;
            padding: 14px;
            border: 1px solid #dee2e6;
            width: 100%;
        }

        textarea.form-control {
            resize: none;
        }

        label,
        .form-label {
            font-weight: 500;
            margin-bottom: 6px;
            margin-top: 16px;
        }

        select:focus,
        input:focus {
            border-color: #ffbe76;
            box-shadow: 0 0 0 0.2rem rgba(255, 190, 118, 0.35);
            outline: none;
        }

        .btn {
            background: #FFDAB0;
            color: #4b5320;
            font-weight: 600;
            width: 100%;
            padding: 14px;
        }

        .btn:hover {
            background: #ffbe76;
        }

        @media (max-width: 768px) {
            .card-form {
                padding: 24px;
            }
        }
    </style>
</head>

<body>

<div class="card-form">
    <small class="text-muted">Form Pendaftaran</small>
    <h3 class="fw-bold mb-4">Foto Studio BUMA</h3>

    <form action="proses-daftar.php" method="POST">
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama lengkap">
            </div>

            <div class="col-md-6">
                <label class="form-label">No WhatsApp</label>
                <input type="number" name="nowa" class="form-control" placeholder="Nomor WhatsApp">
            </div>

            <label>Tipe Booking</label>
            <select id="booking_type">
                <option value="grup">Grup</option>
                <option value="family">Family</option>
            </select>

            <label>Paket</label>
            <select id="booking_type">
                <option value="Leaf">Leaf Grup</option>
                <option value="Breeze">Breeze Grup</option>
                <option value="Dawn">Dawn Grup</option>
                <option value="Excited">Excited Family</option>
                <option value="Delighted">Delighted Family</option>
                <option value="Enthusiastic">Enthusiastic Family</option>
            </select>

            <label>Jumlah Orang</label>
            <input type="number" name="person">
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Tanggal Pelayanan</label>
                <input type="date" name="tanggal_pelayanan" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Jam Pelayanan</label>
                <input type="time" name="jam_pelayanan" class="form-control">
            </div>
        </div>

        <button type="submit" name="daftar" class="btn rounded-pill">
            Kirim Pendaftaran
        </button>

        <script>
        document.querySelector("form").addEventListener("submit", function(){
            alert("Apakah data sudah sesuai?");
        });
        </script>

    </form>
</div>

</body>
</html>
</form>
</div>
