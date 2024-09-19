<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow-md py-4">
        <div class="max-w-6xl mx-auto flex items-center justify-between px-4">
            <h1 class="text-2xl font-bold text-gray-800">Blog Post Side</h1>
            <div class="flex space-x-4">
                @auth
                    <a href="logout" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition">Logout</a>
                @endauth
                <a href="/createblog" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">Create Blog</a>
                @auth
                <a href="mypost" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
                        {{ Auth::user()->name }} <!-- Display username -->
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <div class="max-w-6xl mx-auto py-10 px-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">All Blog Posts</h1>

        <!-- Check if there are blog posts -->
        @if($blogpost->isEmpty())
        <div class="text-center text-gray-500">No blog posts available.</div>
        @else
        <!-- Blog Posts List -->
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach($blogpost as $post)
            <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $post->title }}</h2>
                <div class="w-full h-48 overflow-hidden rounded-lg mb-4">
                    <img class="w-full h-full object-cover" src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}">
                </div>
             
                    <a href="/blog/{{ $post->id }}" class="text-blue-600 hover:underline">Read more</a>
               
            </div>
            @endforeach
        </div>
        @endif
    </div>

</body>
</html>
