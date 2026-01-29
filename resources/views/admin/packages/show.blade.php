<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Paket - Studio BUMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #59654E;
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

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 20px;
        }

        .header h1 {
            color: #59654E;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 20px 0;
        }

        .info-item {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #59654E;
        }

        .info-label {
            color: #999;
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .info-value {
            color: #333;
            font-weight: 600;
            font-size: 16px;
        }

        .info-description {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #59654E;
            margin: 20px 0;
            grid-column: 1 / -1;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 13px;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
        }

        .price-value {
            color: #28a745;
            font-size: 20px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        a, button {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s;
        }

        .btn-edit {
            background: #FFC107;
            color: #333;
        }

        .btn-edit:hover {
            background: #ffb300;
        }

        .btn-back {
            background: #59654E;
            color: white;
        }

        .btn-back:hover {
            background: #48513F;
        }

        @media (max-width: 600px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $package->name }}</h1>
            <div style="margin-top: 15px;">
                <span class="status-badge status-{{ $package->status }}">
                    {{ $package->status === 'active' ? '✓ Aktif' : '✗ Nonaktif' }}
                </span>
            </div>
        </div>

        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Harga</div>
                <div class="info-value price-value">
                    Rp {{ number_format($package->price, 0, ',', '.') }}
                </div>
            </div>

            <div class="info-item">
                <div class="info-label">Tipe Paket</div>
                <div class="info-value">{{ ucfirst($package->type) }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Durasi</div>
                <div class="info-value">{{ $package->duration }} menit</div>
            </div>

            <div class="info-item">
                <div class="info-label">Dibuat</div>
                <div class="info-value">{{ $package->created_at->format('d/m/Y H:i') }}</div>
            </div>

            <div class="info-description">
                <div class="info-label">Deskripsi</div>
                <div class="info-value" style="font-size: 14px; font-weight: normal; margin-top: 10px; line-height: 1.6;">
                    {{ $package->description ?? 'Tidak ada deskripsi' }}
                </div>
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('packages.edit', $package->id) }}" class="btn-edit">✏️ Edit</a>
            <a href="{{ route('packages.index') }}" class="btn-back">← Kembali</a>
        </div>
    </div>
</body>
</html>

