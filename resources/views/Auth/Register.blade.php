<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .error-message {
            color: red; /* Set error message color to red */
            margin-top: 0.25rem; /* Add some space between error message and input field */
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-blue-500 text-white text-center py-4">
                        <h2 class="text-xl font-semibold">Register</h2>
                    </div>
                    <div class="p-6">
                        <form method="POST" action="authendicate">
                            @csrf

                            <div class="mb-4">
                                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                                <input type="text" class="form-control block w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" id="username" name="name" placeholder="Enter username">
                                @error('name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                <input type="email" class="form-control block w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" id="email" name="email" placeholder="Enter email">
                                @error('email')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                                <input type="password" class="form-control block w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" id="password" name="password" placeholder="Password">
                                @error('password')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                                <input type="password" class="form-control block w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                @error('password_confirmation')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn block w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
