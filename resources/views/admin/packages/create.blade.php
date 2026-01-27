<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paket - Studio BUMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #556B2F 0%, #B22222 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h1 {
            color: #556B2F;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #666;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
        }

        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #556B2F;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .error-text {
            color: #B22222;
            font-size: 12px;
            margin-top: 5px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        button, a {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            text-decoration: none;
            flex: 1;
            text-align: center;
            transition: all 0.3s;
        }

        .btn-submit {
            background: #556B2F;
            color: white;
        }

        .btn-submit:hover {
            background: #4B5320;
        }

        .btn-cancel {
            background: #e0e0e0;
            color: #333;
        }

        .btn-cancel:hover {
            background: #d0d0d0;
        }

        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1>➕ Tambah Paket Baru</h1>
            <p>Isi form di bawah untuk menambahkan paket baru</p>
        </div>

        <form action="{{ route('packages.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Paket</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    placeholder="Contoh: Paket Premium 2 Jam"
                    value="{{ old('name') }}"
                    required>
                @error('name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea 
                    id="description" 
                    name="description" 
                    placeholder="Jelaskan apa yang termasuk dalam paket ini...">{{ old('description') }}</textarea>
                @error('description')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="price">Harga (Rp)</label>
                    <input 
                        type="number" 
                        id="price" 
                        name="price" 
                        placeholder="500000"
                        value="{{ old('price') }}"
                        step="1000"
                        required>
                    @error('price')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="duration">Durasi (Menit)</label>
                    <input 
                        type="number" 
                        id="duration" 
                        name="duration" 
                        placeholder="120"
                        value="{{ old('duration') }}"
                        required>
                    @error('duration')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="type">Tipe Paket</label>
                    <select id="type" name="type" required>
                        <option value="">-- Pilih Tipe --</option>
                        <option value="grup" {{ old('type') === 'grup' ? 'selected' : '' }}>Grup</option>
                        <option value="family" {{ old('type') === 'family' ? 'selected' : '' }}>Family</option>
                    </select>
                    @error('type')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">✓ Simpan</button>
                <a href="{{ route('packages.index') }}" class="btn-cancel">← Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
