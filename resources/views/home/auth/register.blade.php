<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Customer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-xl p-10 w-full max-w-md">
        <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">
            Booking sekarang di
            <span class="text-blue-600 italic underline">Tjahya Teknik</span>
        </h2>

        <!-- Success message -->
        @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <!-- Error messages -->
        @if($errors->any())
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-1">Nama</label>
                <input type="text" name="name" id="name" placeholder="Masukkan nama Anda"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-1">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div>
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div>
                <label for="no_tlp" class="block text-gray-700 font-semibold mb-1">Nomor Telepon</label>
                <input type="no_tlp" name="no_tlp" id="no_tlp" placeholder="Contoh: 08xxxxxxxxxx"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div>
                <label for="alamat" class="block text-gray-700 font-semibold mb-1">Alamat</label>
                <input type="alamat" name="alamat" id="alamat" placeholder="Masukkan alamat"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>


            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                Register
            </button>
        </form>

        <p class="text-center text-gray-600 mt-5">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Login</a>
        </p>
    </div>

</body>

</html>