<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracker Booking - Studio BUMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #556B2F 0%, #f5f5f5 100%);
            min-height: 100vh;
            padding: 20px 0;
        }

        .navbar {
            background: linear-gradient(135deg, #556B2F 0%, #B22222 100%);
            padding: 1rem 2rem;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 24px;
            margin: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
        }

        .navbar a:hover {
            opacity: 0.8;
        }

        .container-custom {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 20px;
        }

        .card-tracker {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .booking-header {
            text-align: center;
            margin-bottom: 2rem;
            border-bottom: 2px solid #556B2F;
            padding-bottom: 1.5rem;
        }

        .booking-header h2 {
            color: #556B2F;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .booking-id {
            color: #B22222;
            font-size: 14px;
            font-weight: 600;
        }

        .booking-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: #f9f9f9;
            border-radius: 10px;
        }

        .detail-item {
            padding: 1rem;
            border-radius: 8px;
        }

        .detail-item label {
            color: #556B2F;
            font-weight: 600;
            display: block;
            margin-bottom: 0.5rem;
            font-size: 13px;
        }

        .detail-item p {
            color: #333;
            margin: 0;
            font-weight: 500;
        }

        .progress-container {
            margin: 2rem 0;
        }

        .progress-title {
            color: #556B2F;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            font-size: 18px;
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            position: relative;
            margin-bottom: 2rem;
        }

        .progress-steps::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            right: 0;
            height: 4px;
            background: #e0e0e0;
            z-index: 1;
        }

        .progress-step {
            flex: 1;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .step-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: white;
            border: 4px solid #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-weight: 700;
            font-size: 24px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .step-circle.active {
            background: #556B2F;
            color: white;
            border-color: #556B2F;
            box-shadow: 0 4px 15px rgba(85, 107, 47, 0.4);
        }

        .step-circle.completed {
            background: #28a745;
            color: white;
            border-color: #28a745;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.4);
        }

        .step-label {
            color: #666;
            font-size: 13px;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .step-label.active {
            color: #556B2F;
            font-weight: 700;
        }

        .step-label.completed {
            color: #28a745;
            font-weight: 700;
        }

        .status-info {
            background: linear-gradient(135deg, #556B2F 0%, #4B5320 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .status-info h3 {
            margin: 0 0 0.5rem 0;
            font-size: 18px;
        }

        .status-info p {
            margin: 0;
            opacity: 0.95;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }

        .btn-custom {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .btn-back {
            background: #556B2F;
            color: white;
        }

        .btn-back:hover {
            background: #4B5320;
            color: white;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .booking-details {
                grid-template-columns: 1fr;
            }

            .progress-steps {
                flex-direction: column;
                gap: 1.5rem;
            }

            .progress-steps::before {
                content: '';
                position: absolute;
                top: 0;
                left: 40px;
                right: auto;
                width: 4px;
                height: 100%;
                background: #e0e0e0;
            }

            .step-circle {
                width: 60px;
                height: 60px;
                font-size: 18px;
            }

            .card-tracker {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Studio BUMA</h1>
        <div>
            <a href="/dashboard">← Kembali ke Dashboard</a>
        </div>
    </div>

    <div class="container-custom">
        <div class="card-tracker">
            <div class="booking-header">
                <h2>{{ $booking->paket }} ({{ ucfirst($booking->booking_type) }})</h2>
                <p class="booking-id">ID Booking: #{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</p>
            </div>

            <div class="booking-details">
                <div class="detail-item">
                    <label>Nama Pelanggan</label>
                    <p>{{ $booking->nama }}</p>
                </div>
                <div class="detail-item">
                    <label>No. WhatsApp</label>
                    <p>{{ $booking->nowa }}</p>
                </div>
                <div class="detail-item">
                    <label>Tanggal Pelayanan</label>
                    <p>{{ $booking->tanggal_pelayanan->format('d M Y') }}</p>
                </div>
                <div class="detail-item">
                    <label>Jam Pelayanan</label>
                    <p>{{ $booking->jam_pelayanan }}</p>
                </div>
                <div class="detail-item">
                    <label>Jumlah Peserta</label>
                    <p>{{ $booking->jumlah_orang }} orang</p>
                </div>
                <div class="detail-item">
                    <label>Dibuat Pada</label>
                    <p>{{ $booking->created_at->format('d M Y H:i') }}</p>
                </div>
            </div>

            <div class="status-info">
                <h3>Status Saat Ini</h3>
                <p>{{ $booking->progressLabel }}</p>
            </div>

            <div class="progress-container">
                <div class="progress-title">📊 Progress Booking Anda</div>
                <div class="progress-steps">
                    <!-- Step 1: Pending -->
                    <div class="progress-step">
                        <div class="step-circle {{ $booking->progress_stage === 'pending' ? 'active' : ($booking->progress_stage !== 'pending' && in_array($booking->progress_stage, ['photoshoot', 'edited', 'complete']) ? 'completed' : '') }}">
                            ✓
                        </div>
                        <div class="step-label {{ $booking->progress_stage === 'pending' ? 'active' : '' }}">Menunggu Konfirmasi</div>
                    </div>

                    <!-- Step 2: Photoshoot -->
                    <div class="progress-step">
                        <div class="step-circle {{ $booking->progress_stage === 'photoshoot' ? 'active' : (in_array($booking->progress_stage, ['edited', 'complete']) ? 'completed' : '') }}">
                            📸
                        </div>
                        <div class="step-label {{ $booking->progress_stage === 'photoshoot' ? 'active' : '' }}">Photo Shoot</div>
                    </div>

                    <!-- Step 3: Edited -->
                    <div class="progress-step">
                        <div class="step-circle {{ $booking->progress_stage === 'edited' ? 'active' : ($booking->progress_stage === 'complete' ? 'completed' : '') }}">
                            ✏️
                        </div>
                        <div class="step-label {{ $booking->progress_stage === 'edited' ? 'active' : '' }}">Diedit</div>
                    </div>

                    <!-- Step 4: Complete -->
                    <div class="progress-step">
                        <div class="step-circle {{ $booking->progress_stage === 'complete' ? 'active' : '' }}">
                            🎉
                        </div>
                        <div class="step-label {{ $booking->progress_stage === 'complete' ? 'active' : '' }}">Selesai</div>
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <a href="/dashboard" class="btn-custom btn-back">← Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
