<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Blog</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <div class="max-w-3xl mx-auto py-10 px-6">
  <div class=" text-right">
      <a
        href="/" 
        class="bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 font-semibold transition ease-in-out duration-150"
      >
        Home
      </a>
    </div>

    <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">Create Blog</h1>
    

    @if (session('status'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg mb-6">
        {{ session('status') }}
    </div>
@endif



    <form class="bg-white p-8 rounded-lg shadow-lg" action="store" method="POST" enctype="multipart/form-data">
      @csrf

      <!-- Blog Title -->
      <div class="mb-6">
        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Blog Title</label>
        <input
          type="text"
          id="title"
          name="title"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="Enter blog title"
        />
        @error('title')
          <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>

      <!-- Blog Body -->
      <div class="mb-6">
        <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Blog Body</label>
        <textarea
          id="body"
          name="body"
          rows="6"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="Write your blog content here..."
        ></textarea>
        @error('body')
          <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>

      <!-- Blog Image -->
      <div class="mb-6">
        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Upload Image</label>
        <input
          type="file"
          id="image"
          name="image"
          class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
          accept="image/*"
        />
        @error('image')
          <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button
          type="submit"
          class="w-full bg-indigo-600 text-white py-3 px-4 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-semibold transition ease-in-out duration-150"
        >
          Publish Blog
        </button>
      </div>
    </form>
  </div> 

</body>
</html>
