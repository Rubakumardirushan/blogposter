<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom style for word wrapping */
        .post-body {
            white-space: pre-wrap; /* Allows for line breaks within the content */
            word-break: break-word; /* Breaks long words onto the next line */
        }

        /* Ensure the image is responsive */
        .image-container {
            position: relative;
            padding-top: 56.25%; /* 16:9 aspect ratio */
            overflow: hidden;
            border-radius: 0.5rem; /* Rounded corners */
        }
        .image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image covers the container */
        }
    </style>
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow-md py-4">
        <div class="max-w-6xl mx-auto flex items-center justify-between px-4">
            <h1 class="text-2xl font-bold text-gray-800">Blog Post Detail</h1>
        </div>
    </header>

    <div class="max-w-6xl mx-auto py-10 px-6 bg-white shadow-lg rounded-lg mt-10">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>
        <div class="image-container mb-6">
            <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}">
        </div>
        <div class="text-gray-700 leading-relaxed post-body">
            {!! nl2br(e($post->body)) !!}
        </div>
    </div>

</body>
</html>
