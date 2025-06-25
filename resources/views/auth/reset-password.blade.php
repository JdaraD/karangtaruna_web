<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Reset Password</h2>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full border-gray-300 pl-1 rounded-lg shadow-sm focus:ring-amber-500 focus:border-amber-500" required>
            </div>

            <div>
                <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password Baru</label>
                <input type="password" name="password" id="password" class="w-full border-gray-300 pl-1 rounded-lg shadow-sm focus:ring-amber-500 focus:border-amber-500" required>
            </div>

            <div>
                <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border-gray-300 pl-1 rounded-lg shadow-sm focus:ring-amber-500 focus:border-amber-500" required>
            </div>

            <button type="submit" class="w-full bg-amber-500 text-white py-2 rounded-lg hover:bg-amber-600 transition">
                Reset Password
            </button>
        </form>
    </div>
</body>
</html>
