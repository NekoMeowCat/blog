<x-app-layout>
    <div class="addpost-container min-h-screen w-full px-32 bg-gray-800 text-white">
        <h5 class="text-white font-bold pt-16">Edit Post</h5>
        <form method="post" action="{{ route('posts.update', ['post' => $post->id]) }}" class="container grid grid-cols-3 gap-4 mx-auto" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-span-1 h-80 w-80 mt-16">
                <div>
                    <img id="preview-image" class="h-[300px] w-[350px] uploaded-image rounded-lg" src="{{ $post->image ? asset('storage/' .$post->image) : asset('storage/images/picture.png') }}" alt="">
                </div>
                <input id="post_image" name="post_image" type="file" class="hidden" accept="image/*" onchange="handleFileInputChange(event)" />
                <label for="post_image" class="mt-3 inline-flex items-center text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    Upload Photo
                </label>
            </div>
            <div class="col-span-2 pl-20 mt-10">
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Title</label>
                    <input type="text" id="blog-title" name="blog-title" value="{{ $post->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                </div>
                <div class="mb-6">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                    <textarea id="blog-content" name="blog-content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">{{ $post->body }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author (Optional)</label>
                    <input type="text" id="blog-author" name="blog-author" value="{{ $post->author }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                </div>
                <div class="flex">
                    <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Submit</button>
                    <button type="submit" form="delete-form" class=" text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5  mr-2 mb-2 text-center">Delete</button>
                </div>
            </div>
        </form>
        <form id="delete-form" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('DELETE')
        </form>`
    </div>
</x-app-layout>
