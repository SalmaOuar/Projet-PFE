<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/iconepfe.png" rel="icon">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg w-96 p-8">
        <h2 class="text-2xl font-bold text-center text-green-600 mb-6">Sign In</h2>

        @if(session('error'))
            <div class="mb-4 text-red-500 text-sm text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Username</label>
                <input type="text" name="username" class="w-full px-4 py-2 border border-gray-300 rounded-full focus:ring-2 focus:ring-green-500 focus:outline-none" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-full focus:ring-2 focus:ring-green-500 focus:outline-none" required>
            </div>

            <div class="text-right mb-4">
                <a href="#" class="text-green-500 text-sm">Forgot <span class="font-semibold">Username</span> / <span class="font-semibold">Password?</span></a>
            </div>

            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-full text-lg font-bold hover:bg-green-600 transition">
                SIGN IN
            </button>
        </form>

        <p class="text-center text-gray-600 mt-4">
            Don't have an account? 
            <a href="#" class="text-green-500 font-bold">SIGN UP NOW</a>
        </p>
    </div>
</body>
</html>
