<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .error-message {
            color: red; /* Set error message color to red */
            font-size: 0.9rem; /* Adjust font size */
            margin-top: 0.25rem; /* Add some space between error message and input field */
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-20 max-w-md p-8 rounded-lg shadow-md bg-white">
        <h2 class="text-2xl font-semibold text-center mb-6">Login</h2>
        <form action="authlogin" method="post">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" class="form-control block w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" id="email" name="email" placeholder="Enter email">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
                <input type="password" class="form-control block w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" id="password" name="password" placeholder="Enter password">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn block w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">Login</button>
        </form>
        @if(session('error'))
            <div class="alert alert-danger mt-4 p-2 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <p class="mt-4 text-center">Don't have an account? <a href="/register" class="text-blue-500 hover:underline">Register</a></p>
        <p class="mt-1 text-center">Forgot your password? <a href="/email" class="text-blue-500 hover:underline">Reset Password</a></p>
    </div>
</body>
</html>
