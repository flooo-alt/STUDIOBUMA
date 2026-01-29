<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan - Studio BUMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FDF6E3;
        }

        .navbar {
            background: #59654E;
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
            max-width: 1000px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .welcome {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .welcome h2 {
            color: #59654E;
            margin-bottom: 1rem;
        }

        .booking-list {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .booking-list h3 {
            background: #59654E;
            color: white;
            padding: 1.5rem;
            margin: 0;
        }

        .booking-item {
            padding: 1.5rem;
            border-bottom: 1px solid #eee;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr auto;
            gap: 1rem;
            align-items: center;
        }

        .booking-item:last-child {
            border-bottom: none;
        }

        .booking-info h4 {
            color: #59654E;
            margin-bottom: 0.5rem;
        }

        .booking-info p {
            color: #666;
            font-size: 14px;
            margin: 0.25rem 0;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
        }

        .status-pending {
            background: #FFC107;
            color: #333;
        }

        .status-confirmed {
            background: #28a745;
            color: white;
        }

        .status-completed {
            background: #17a2b8;
            color: white;
        }

        .status-cancelled {
            background: #dc3545;
            color: white;
        }

        .empty {
            padding: 3rem;
            text-align: center;
            color: #999;
        }

        .logout-btn {
            background: #9E4A1E;
            color: white;
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        .logout-btn:hover {
            background: #7A3818;
        }

        /* Notifikasi Sukses Styling */
        .alert-notification {
            padding: 0;
            margin-bottom: 2rem;
        }

        .alert-success-custom {
            background: #59654E;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(89, 101, 78, 0.3);
            border-left: 5px solid #fff;
            animation: slideDown 0.5s ease-out;
        }

        .alert-success-custom .alert-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        .alert-success-custom .alert-icon {
            font-size: 28px;
            animation: popIn 0.5s ease-out;
        }

        .alert-success-custom .alert-title {
            font-size: 18px;
            font-weight: 700;
            margin: 0;
        }

        .alert-success-custom .alert-message {
            font-size: 14px;
            margin-bottom: 15px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.95);
        }

        .alert-success-custom .alert-details {
            background: rgba(0, 0, 0, 0.1);
            padding: 12px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .alert-success-custom .alert-action {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .alert-success-custom .btn-action {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-action-primary {
            background: white;
            color: #28a745;
        }

        .btn-action-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .btn-action-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-action-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .close-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 4px 8px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 20px;
            transition: all 0.3s;
        }

        .close-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes popIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        @media (max-width: 768px) {
            .booking-item {
                grid-template-columns: 1fr;
            }
            
            .navbar {
                flex-direction: column;
                gap: 1rem;
            }

            .navbar a {
                margin-left: 0;
            }

            .alert-success-custom .alert-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .alert-success-custom .alert-action {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Studio BUMA</h1>
        <div>
            <a href="/">Beranda</a>
            <a href="/Booking">Booking Baru</a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <div class="container">
        <!-- Notifikasi Sukses Booking -->
        @if(session('success'))
            <div class="alert-notification" id="successNotif">
                <div class="alert-success-custom">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div>
                            <div class="alert-header">
                                <span class="alert-icon">✅</span>
                                <h3 class="alert-title">Booking Berhasil!</h3>
                            </div>
                            <p class="alert-message">
                                {{ session('success') }}
                            </p>
                            <div class="alert-details">
                                <p style="margin: 0;">
                                    <strong>💡 Tip:</strong> Admin akan segera mengkonfirmasi booking Anda. Anda akan menerima notifikasi via WhatsApp.
                                </p>
                            </div>
                            <div class="alert-action">
                                <a href="/Booking" class="btn-action btn-action-secondary" onclick="event.preventDefault(); document.getElementById('successNotif').remove();">
                                    ← Kembali Booking Baru
                                </a>
                                <button type="button" class="btn-action btn-action-primary" onclick="document.getElementById('successNotif').style.display='none';">
                                    Tutup Notifikasi
                                </button>
                            </div>
                        </div>
                        <button type="button" class="close-btn" onclick="document.getElementById('successNotif').remove();">×</button>
                    </div>
                </div>
            </div>
            <script>
                // Auto-hide notifikasi setelah 8 detik
                setTimeout(function() {
                    const notif = document.getElementById('successNotif');
                    if (notif) {
                        notif.style.opacity = '0';
                        notif.style.transition = 'opacity 0.5s ease-out';
                        setTimeout(() => notif.remove(), 500);
                    }
                }, 8000);
            </script>
        @endif

        <div class="welcome">
            <h2>Selamat datang, {{ Auth::user()->name }}! 👋</h2>
            <p>Berikut adalah daftar booking Anda di Studio BUMA</p>
        </div>

        @if($bookings->count() > 0)
            <div class="booking-list">
                <h3>Riwayat Booking Anda</h3>
                @foreach($bookings as $booking)
                    <div class="booking-item">
                        <div class="booking-info">
                            <h4>{{ $booking->paket }}</h4>
                            <p><strong>Tipe:</strong> {{ ucfirst($booking->booking_type) }}</p>
                            <p><strong>Peserta:</strong> {{ $booking->jumlah_orang }} orang</p>
                        </div>
                        <div class="booking-info">
                            <p><strong>Tanggal:</strong> {{ $booking->tanggal_pelayanan->format('d/m/Y') }}</p>
                            <p><strong>Jam:</strong> {{ $booking->jam_pelayanan }}</p>
                            <p><strong>No. WA:</strong> {{ $booking->nowa }}</p>
                        </div>
                        <div class="booking-info">
                            <p><strong>ID Booking:</strong> #{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</p>
                            <p><strong>Dibuat:</strong> {{ $booking->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div>
                            @php
                                $statusClass = 'status-' . $booking->status;
                            @endphp
                            <a href="{{ route('booking.tracker', $booking->id) }}" style="text-decoration: none;">
                                <span class="status-badge {{ $statusClass }}">
                                    @switch($booking->status)
                                        @case('pending')
                                            Menunggu
                                        @break
                                        @case('confirmed')
                                            Dikonfirmasi
                                        @break
                                        @case('completed')
                                            Selesai
                                        @break
                                        @case('cancelled')
                                            Dibatalkan
                                        @break
                                        @default
                                            {{ ucfirst($booking->status) }}
                                    @endswitch
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="booking-list">
                <div class="empty">
                    <p>Anda belum memiliki booking.</p>
                    <p><a href="/Booking">Buat booking sekarang!</a></p>
                </div>
            </div>
        @endif
    </div>
</body>
</html>

