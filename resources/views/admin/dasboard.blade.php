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
            background-color: #FDF6E3;
        }

        header {
            background: #59654E;
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
            background-color: #9E4A1E;
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
            color: #59654E;
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
            border-left: 5px solid #59654E;
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
            color: #59654E;
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
            color: #59654E;
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
            border: 2px solid #dddd;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .filter-group select:focus {
            outline: none;
            border-color: #59654E;
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
            background-color: #59654E;
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
            background-color: #d4eeb6;
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
            background-color: #59654E;
            color: white;
        }

        .btn-primary:hover {
            background-color: #48513F;
        }

        .btn-danger {
            background-color: #9E4A1E;
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
            border-color: #9E4A1E;
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
            color: #59654E;
            transition: background-color 0.3s;
        }

        .pagination a:hover {
            background-color: #59654E;
            color: white;
        }

        .pagination .active {
            background-color: #59654E;
            color: white;
            border-color: #59654E;
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
                 <a href="/admin">Dashboard</a>
                <a href="/bookings">Pesanan</a>
                <a href="/packages">Paket</a>
                <a href="/">Home</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: #9E4A1E; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer; font-family: 'Poppins'; font-weight: 600;">Logout</button>
                </form>
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

        <!-- Quick Action Buttons -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-bottom: 40px;">
            <a href="{{ url('/bookings') }}" class="btn-sm" style="padding: 12px 20px; background: #59654E; color: white; text-decoration: none; border-radius: 8px; text-align: center; font-weight: 600; transition: all 0.3s; box-shadow: 0 2px 8px rgba(85, 107, 47, 0.2);">
                📋 Lihat Semua Booking
            </a>
            <a href="{{ url('/packages') }}" class="btn-sm" style="padding: 12px 20px; background: #28a745; color: white; text-decoration: none; border-radius: 8px; text-align: center; font-weight: 600; transition: all 0.3s; box-shadow: 0 2px 8px rgba(40, 167, 69, 0.2);">
                📦 Kelola Paket
            </a>
            <a href="{{ url('/admin?status=pending') }}" class="btn-sm" style="padding: 12px 20px; background: #FFC107; color: #333; text-decoration: none; border-radius: 8px; text-align: center; font-weight: 600; transition: all 0.3s; box-shadow: 0 2px 8px rgba(255, 193, 7, 0.2);">
                ⏳ Pending Booking
            </a>
            <a href="{{ url('/admin?status=confirmed') }}" class="btn-sm" style="padding: 12px 20px; background: #17a2b8; color: white; text-decoration: none; border-radius: 8px; text-align: center; font-weight: 600; transition: all 0.3s; box-shadow: 0 2px 8px rgba(23, 162, 184, 0.2);">
                ✅ Confirmed Booking
            </a>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-icon">📋</span>
                <div class="stat-label">Booking</div>
                <div class="stat-number">{{ $totalBooking }}</div>
                <div class="stat-change">Semua data booking</div>
            </div>
            <div class="stat-card">
                <span class="stat-icon">⏳</span>
                <div class="stat-label">Photoshoot</div>
                <div class="stat-number">{{ $pendingBooking }}</div>
                <div class="stat-change">Menunggu konfirmasi</div>
            </div>
            <div class="stat-card">
                <span class="stat-icon">✅</span>
                <div class="stat-label">Editing</div>
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

        <!-- Bookings Dalam Proses -->
        <div class="section-header">
            <h2>📋 Booking Yang Perlu Dikerjakan</h2>
        </div>

        @php
            $confirmedBookings = $bookings->filter(fn($b) => $b->status === 'confirmed' || $b->progress_stage !== 'complete');
        @endphp

        @if($confirmedBookings->count() > 0)
            <div class="table-wrapper" style="margin-bottom: 40px;">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Paket</th>
                            <th>Tanggal</th>
                            <th>Progress</th>
                            <th>Update Progress</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($confirmedBookings as $booking)
                            <tr>
                                <td><strong>#{{ $booking->id }}</strong></td>
                                <td>{{ $booking->nama }}</td>
                                <td>{{ $booking->paket }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->tanggal_pelayanan)->format('d/m/Y') }}</td>
                                <td>
                                    <span class="status-badge" style="@switch($booking->progress_stage)
                                        @case('pending') background-color: #fff3cd; color: #856404; @break
                                        @case('photoshoot') background-color: #d4edda; color: #155724; @break
                                        @case('edited') background-color: #d1ecf1; color: #0c5460; @break
                                        @case('complete') background-color: #d4edda; color: #155724; @break
                                    @endswitch">
                                        @switch($booking->progress_stage)
                                            @case('pending') Menunggu @break
                                            @case('photoshoot') Photo Shoot @break
                                            @case('edited') Diedit @break
                                            @case('complete') Selesai @break
                                            @default {{ ucfirst($booking->progress_stage) }}
                                        @endswitch
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('booking.updateProgress', $booking->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <select name="progress_stage" onchange="this.form.submit()" style="padding: 6px 8px; border: 1px solid #ddd; border-radius: 5px; cursor: pointer; font-family: 'Poppins'; font-size: 12px;">
                                            <option value="pending" {{ $booking->progress_stage == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                            <option value="photoshoot" {{ $booking->progress_stage == 'photoshoot' ? 'selected' : '' }}>Photo Shoot</option>
                                            <option value="edited" {{ $booking->progress_stage == 'edited' ? 'selected' : '' }}>Diedit</option>
                                            <option value="complete" {{ $booking->progress_stage == 'complete' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $booking->nowa) }}" target="_blank" class="btn-sm btn-primary" title="Chat WhatsApp">Chat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="table-wrapper" style="margin-bottom: 40px;">
                <div class="empty-state">
                    <p>✓ Semua booking sudah selesai!</p>
                </div>
            </div>
        @endif

        <!-- Semua Data Booking -->
        <div class="section-header">
            <h2>📊 Semua Data Booking</h2>
            <div class="filter-group">
                <form method="GET" action="{{ url('/admin') }}" style="display: flex; gap: 10px;">
                    <select name="status" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <a href="{{ url('/admin') }}" class="btn-sm btn-primary" style="padding: 8px 12px; text-decoration: none; display: inline-block;">Reset Filter</a>
                    <a href="{{ url('/bookings') }}" class="btn-sm btn-primary" style="padding: 8px 12px; text-decoration: none; display: inline-block;">Lihat Detail</a>
                </form>
            </div>
        </div>

        @if($bookings->count() > 0)
            <div class="table-wrapper" style="margin-bottom: 40px; overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>No WA</th>
                            <th>Tipe</th>
                            <th>Paket</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th>Progress</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td><strong>#{{ $booking->id }}</strong></td>
                                <td>{{ $booking->nama }}</td>
                                <td>
                                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $booking->nowa) }}" target="_blank" style="color: #59654E; text-decoration: none; font-size: 12px;">
                                        {{ substr($booking->nowa, -10) }}
                                    </a>
                                </td>
                                <td><span style="background: #f0f0f0; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">{{ ucfirst($booking->booking_type) }}</span></td>
                                <td>{{ $booking->paket }}</td>
                                <td>{{ $booking->jumlah_orang }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->tanggal_pelayanan)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->jam_pelayanan)->format('H:i') }}</td>
                                <td>
                                    <span class="status-badge status-{{ $booking->status }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge" style="@switch($booking->progress_stage)
                                        @case('pending') background-color: #fff3cd; color: #856404; @break
                                        @case('photoshoot') background-color: #d4edda; color: #155724; @break
                                        @case('edited') background-color: #d1ecf1; color: #0c5460; @break
                                        @case('complete') background-color: #d4edda; color: #155724; @break
                                    @endswitch">
                                        @switch($booking->progress_stage)
                                            @case('pending') Pending @break
                                            @case('photoshoot') Shoot @break
                                            @case('edited') Edited @break
                                            @case('complete') Done @break
                                            @default {{ ucfirst($booking->progress_stage) }}
                                        @endswitch
                                    </span>
                                </td>
                                <td>
                                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $booking->nowa) }}" target="_blank" class="btn-sm btn-primary" title="Chat WhatsApp" style="text-decoration: none;">💬</a>
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

