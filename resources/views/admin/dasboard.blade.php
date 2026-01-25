<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Studio BUMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        header {
            background: linear-gradient(135deg, #556B2F 0%, #4B5320 100%);
            color: white;
            padding: 20px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            list-style: none;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: opacity 0.3s;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .admin-btn {
            background-color: #B22222;
            border-radius: 5px;
        }

        .admin-btn:hover {
            background-color: #a01a1a;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .dashboard-header {
            margin-bottom: 40px;
            text-align: center;
        }

        .dashboard-header h1 {
            color: #556B2F;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .dashboard-header p {
            color: #666;
            font-size: 16px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border-left: 5px solid #556B2F;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
        }

        .stat-icon {
            font-size: 30px;
            display: block;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .stat-number {
            color: #556B2F;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-change {
            color: #999;
            font-size: 12px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .section-header h2 {
            color: #556B2F;
            font-size: 24px;
            font-weight: 700;
            margin: 0;
        }

        .filter-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter-group select {
            padding: 8px 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .filter-group select:focus {
            outline: none;
            border-color: #556B2F;
        }

        .table-wrapper {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #556B2F;
            color: white;
        }

        th {
            padding: 16px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
        }

        td {
            padding: 14px 16px;
            border-bottom: 1px solid #f0f0f0;
        }

        tbody tr:hover {
            background-color: #f9f9f9;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-confirmed {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }

        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #556B2F;
            color: white;
        }

        .btn-primary:hover {
            background-color: #4B5320;
        }

        .btn-danger {
            background-color: #B22222;
            color: white;
        }

        .btn-danger:hover {
            background-color: #a01a1a;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.5;
        }

        .alert {
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            border-left: 5px solid;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #28a745;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #B22222;
            color: #721c24;
        }

        .pagination-wrapper {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination {
            display: flex;
            gap: 5px;
        }

        .pagination a, .pagination span {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-decoration: none;
            color: #556B2F;
            transition: background-color 0.3s;
        }

        .pagination a:hover {
            background-color: #556B2F;
            color: white;
        }

        .pagination .active {
            background-color: #556B2F;
            color: white;
            border-color: #556B2F;
        }

        @media (max-width: 768px) {
            .section-header {
                flex-direction: column;
                align-items: flex-start;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">🔐 Admin Panel BUMA</div>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">← Kembali ke Beranda</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-links" style="background: none; border: none; color: white; cursor: pointer; padding: 8px 15px; border-radius: 5px;">
                            🚪 Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="dashboard-header">
            <h1>📊 Dashboard Admin</h1>
            <p>Kelola semua data booking studio BUMA</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                ✗ {{ session('error') }}
            </div>
        @endif

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-icon">📋</span>
                <div class="stat-label">Total Booking</div>
                <div class="stat-number">{{ $totalBooking }}</div>
                <div class="stat-change">Semua data booking</div>
            </div>
            <div class="stat-card">
                <span class="stat-icon">⏳</span>
                <div class="stat-label">Pending</div>
                <div class="stat-number">{{ $pendingBooking }}</div>
                <div class="stat-change">Menunggu konfirmasi</div>
            </div>
            <div class="stat-card">
                <span class="stat-icon">✅</span>
                <div class="stat-label">Confirmed</div>
                <div class="stat-number">{{ $confirmedBooking }}</div>
                <div class="stat-change">Sudah dikonfirmasi</div>
            </div>
            <div class="stat-card">
                <span class="stat-icon">🎉</span>
                <div class="stat-label">Completed</div>
                <div class="stat-number">{{ $completedBooking }}</div>
                <div class="stat-change">Selesai dikerjakan</div>
            </div>
        </div>

        <!-- Booking Data Table -->
        <div class="section-header">
            <h2>Daftar Booking</h2>
        </div>

        @if($bookings->count() > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>No WA</th>
                            <th>Tipe</th>
                            <th>Paket</th>
                            <th>Orang</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td><strong>#{{ $booking->id }}</strong></td>
                                <td>{{ $booking->nama }}</td>
                                <td>
                                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $booking->nowa) }}" target="_blank" title="Chat WhatsApp">
                                        {{ $booking->nowa }}
                                    </a>
                                </td>
                                <td>{{ ucfirst($booking->booking_type) }}</td>
                                <td>{{ $booking->paket }}</td>
                                <td>{{ $booking->jumlah_orang }} orang</td>
                                <td>{{ \Carbon\Carbon::parse($booking->tanggal_pelayanan)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->jam_pelayanan)->format('H:i') }}</td>
                                <td>
                                    <span class="status-badge status-{{ $booking->status }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <form action="{{ route('booking.updateStatus', $booking->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()" class="btn-sm btn-primary" style="padding: 6px 8px; cursor: pointer;">
                                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            </select>
                                        </form>
                                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus booking ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($bookings->hasPages())
                <div class="pagination-wrapper">
                    {{ $bookings->links() }}
                </div>
            @endif
        @else
            <div class="table-wrapper">
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <p>Tidak ada data booking saat ini</p>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>