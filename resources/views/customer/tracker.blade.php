<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Booking - Studio BUMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
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
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 2rem;
        }

        .navbar a:hover {
            opacity: 0.8;
        }

        .container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .tracker-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 2rem;
        }

        .header {
            margin-bottom: 2rem;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 1.5rem;
        }

        .booking-id {
            color: #556B2F;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .booking-id span {
            background: #f0f5eb;
            padding: 0.5rem 1rem;
            border-radius: 20px;
        }

        .header h2 {
            color: #333;
            margin: 1rem 0 0.5rem 0;
            font-size: 28px;
        }

        .booking-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .info-item {
            background: #f9f9f9;
            padding: 1rem;
            border-radius: 8px;
            border-left: 4px solid #556B2F;
        }

        .info-label {
            color: #999;
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .info-value {
            color: #333;
            font-weight: 600;
            font-size: 16px;
        }

        /* Progress Tracker */
        .progress-section {
            margin: 2rem 0;
        }

        .progress-section h3 {
            color: #556B2F;
            margin-bottom: 2rem;
            font-size: 18px;
        }

        .progress-timeline {
            position: relative;
            padding: 1rem 0;
        }

        .progress-step {
            display: flex;
            margin-bottom: 2rem;
            position: relative;
        }

        .progress-step:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 24px;
            top: 60px;
            width: 2px;
            height: 50px;
            background: #ddd;
        }

        .progress-step.active:not(:last-child)::after {
            background: #556B2F;
        }

        .progress-dot {
            min-width: 50px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #f0f0f0;
            border: 3px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #999;
            position: relative;
            z-index: 1;
        }

        .progress-step.active .progress-dot {
            background: #556B2F;
            border-color: #556B2F;
            color: white;
            box-shadow: 0 0 0 8px rgba(85, 107, 47, 0.1);
        }

        .progress-step.completed .progress-dot {
            background: #28a745;
            border-color: #28a745;
            color: white;
        }

        .progress-step.completed .progress-dot::after {
            content: '✓';
            position: absolute;
        }

        .progress-info {
            margin-left: 2rem;
            flex: 1;
        }

        .progress-title {
            color: #333;
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 0.3rem;
        }

        .progress-desc {
            color: #999;
            font-size: 13px;
            margin-bottom: 0.5rem;
        }

        .progress-date {
            color: #556B2F;
            font-size: 12px;
            font-weight: 500;
        }

        /* Status Messages */
        .status-message {
            background: linear-gradient(135deg, #556B2F 0%, #B22222 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 8px;
            margin: 2rem 0;
            text-align: center;
        }

        .status-message h4 {
            margin-bottom: 0.5rem;
            font-size: 18px;
        }

        .status-message p {
            font-size: 14px;
            opacity: 0.9;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #556B2F;
            color: white;
        }

        .btn-primary:hover {
            background: #4B5320;
        }

        .btn-secondary {
            background: white;
            color: #556B2F;
            border: 2px solid #556B2F;
        }

        .btn-secondary:hover {
            background: #f9f9f9;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 1rem;
            }

            .navbar a {
                margin-left: 0;
            }

            .booking-info {
                grid-template-columns: 1fr;
            }

            .progress-step {
                flex-direction: column;
            }

            .progress-info {
                margin-left: 0;
                margin-top: 1rem;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Studio BUMA</h1>
        <div>
            <a href="/">Beranda</a>
            <a href="/dashboard">Dashboard</a>
            <a href="/Booking">Booking Baru</a>
        </div>
    </div>

    <div class="container">
        <div class="tracker-card">
            <div class="header">
                <div class="booking-id">
                    ID Booking: <span>#{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</span>
                </div>
                <h2>{{ $booking->paket }}</h2>
                <div class="booking-info">
                    <div class="info-item">
                        <div class="info-label">Tipe Booking</div>
                        <div class="info-value">{{ ucfirst($booking->booking_type) }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tanggal Pelayanan</div>
                        <div class="info-value">{{ $booking->tanggal_pelayanan->format('d/m/Y') }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Jam Pelayanan</div>
                        <div class="info-value">{{ $booking->jam_pelayanan }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Jumlah Peserta</div>
                        <div class="info-value">{{ $booking->jumlah_orang }} orang</div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="status-message">
                    <h4>✓ {{ session('success') }}</h4>
                    <p>Tim admin akan segera mengkonfirmasi booking Anda</p>
                </div>
            @endif

            <div class="progress-section">
                <h3>Status Progress Booking</h3>
                <div class="progress-timeline">
                    <!-- Step 1: Pending -->
                    <div class="progress-step @if($booking->status === 'pending' || in_array($booking->status, ['confirmed', 'completed'])) active @endif @if(in_array($booking->status, ['confirmed', 'completed'])) completed @endif">
                        <div class="progress-dot">1</div>
                        <div class="progress-info">
                            <div class="progress-title">Booking Diterima</div>
                            <div class="progress-desc">Booking Anda telah diterima oleh sistem</div>
                            <div class="progress-date">{{ $booking->created_at->format('d/m/Y H:i') }}</div>
                        </div>
                    </div>

                    <!-- Step 2: Confirmed -->
                    <div class="progress-step @if(in_array($booking->status, ['confirmed', 'completed'])) active @endif @if($booking->status === 'completed') completed @endif">
                        <div class="progress-dot">2</div>
                        <div class="progress-info">
                            <div class="progress-title">Dikonfirmasi Admin</div>
                            <div class="progress-desc">Admin telah mengkonfirmasi booking Anda</div>
                            @if(in_array($booking->status, ['confirmed', 'completed']))
                                <div class="progress-date">Sudah dikonfirmasi</div>
                            @else
                                <div class="progress-desc">Menunggu konfirmasi dari admin...</div>
                            @endif
                        </div>
                    </div>

                    <!-- Step 3: Completed -->
                    <div class="progress-step @if($booking->status === 'completed') active completed @endif">
                        <div class="progress-dot">3</div>
                        <div class="progress-info">
                            <div class="progress-title">Selesai</div>
                            <div class="progress-desc">Pelayanan telah selesai dilaksanakan</div>
                            @if($booking->status === 'completed')
                                <div class="progress-date">Pelayanan selesai</div>
                            @else
                                <div class="progress-desc">Menunggu waktu pelayanan...</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if($booking->status === 'cancelled')
                <div class="status-message" style="background: linear-gradient(135deg, #dc3545 0%, #a02622 100%);">
                    <h4>✕ Booking Dibatalkan</h4>
                    <p>Booking Anda telah dibatalkan oleh admin</p>
                </div>
            @endif

            <div class="button-group">
                <a href="/dashboard" class="btn btn-primary">← Kembali ke Dashboard</a>
                <a href="/Booking" class="btn btn-secondary">+ Buat Booking Baru</a>
            </div>
        </div>
    </div>
</body>
</html>
