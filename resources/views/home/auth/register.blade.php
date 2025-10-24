<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Customer | Tjahya Teknik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #f2f4f8, #e8ebf2);
            color: #444;
        }

        .card {
            background: #f8f9fb;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.1);
        }

        .input {
            background: #eef1f6;
            border: none;
            border-radius: 10px;
            padding: 10px 14px;
            width: 100%;
            transition: box-shadow 0.2s ease;
        }

        .input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(124, 116, 184, 0.25);
        }

        .btn {
            background: linear-gradient(135deg, #e6ecf5, #dcd0f2);
            color: #333;
            border: none;
            border-radius: 12px;
            padding: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: linear-gradient(135deg, #dcd0f2, #e6ecf5);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .link {
            color: #7c74b8;
        }

        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen px-4">

    <div class="card p-8 w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center mb-6 text-gray-700">
            Daftar Sekarang di <br>
            <span class="italic font-bold text-[#7c74b8]">Tjahya Teknik</span>
        </h2>

        <!-- Success Message -->
        @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg mb-4 text-sm">
            {{ session('success') }}
        </div>
        @endif

        <!-- Error Message -->
        @if($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded-lg mb-4 text-sm">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm text-gray-600 mb-1 font-medium">Nama</label>
                <input type="text" name="name" id="name" placeholder="Masukkan nama Anda" class="input" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1 font-medium">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email Anda" class="input" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1 font-medium">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password" class="input" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1 font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password" class="input" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1 font-medium">Nomor Telepon</label>
                <input type="text" name="no_tlp" id="no_tlp" placeholder="08xxxxxxxxxx" class="input" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1 font-medium">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat Anda" class="input" required>
            </div>

            <button type="submit" class="btn w-full mt-2">
                Register
            </button>
        </form>

        <p class="text-center text-gray-500 mt-5 text-sm">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="link font-semibold">Login</a>
        </p>
    </div>

</body>

</html>