<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Studio BUMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #556B2F 0%, #B22222 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .auth-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-header h2 {
            color: #556B2F;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .auth-header p {
            color: #666;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #556B2F;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #556B2F;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background-color: #4B5320;
        }

        .error-message {
            color: #B22222;
            font-size: 14px;
            padding: 10px;
            background-color: #ffe6e6;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        .success-message {
            color: #556B2F;
            font-size: 14px;
            padding: 10px;
            background-color: #e6ffe6;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        .auth-footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }

        .auth-footer a {
            color: #556B2F;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .auth-footer a:hover {
            color: #B22222;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #556B2F;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #B22222;
        }

        .error-field {
            border-color: #B22222 !important;
        }

        .error-text {
            color: #B22222;
            font-size: 12px;
            margin-top: 5px;
        }

        .alert-list {
            list-style: none;
            text-align: left;
            padding-left: 0;
        }

        .alert-list li {
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <a href="/" class="back-link">← Kembali ke Beranda</a>
        
        <div class="auth-header">
            <h2>📝 Sign Up</h2>
            <p>Buat akun baru untuk Studio BUMA</p>
        </div>

        @if($errors->any())
            <div class="error-message">
                <ul class="alert-list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('signup') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    placeholder="Masukkan nama lengkap"
                    value="{{ old('name') }}"
                    class="@error('name') error-field @enderror"
                    required>
                @error('name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="user@email.com"
                    value="{{ old('email') }}"
                    class="@error('email') error-field @enderror"
                    required>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Minimal 6 karakter"
                    class="@error('password') error-field @enderror"
                    required>
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    placeholder="Ulangi password"
                    class="@error('password_confirmation') error-field @enderror"
                    required>
                @error('password_confirmation')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Daftar Sekarang</button>
        </form>

        <div class="auth-footer">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </div>
</body>
</html>
