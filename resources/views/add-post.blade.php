<x-app-layout>
    <div class="addpost-container min-h-screen w-full px-4 md:px-32 bg-gray-800 text-white">

        <div class="pt-5">
            @if ($errors->any())
                <div class="p-4   mb-4 text-sm text-gray-100 rounded-lg bg-red-400" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
        </div>

        <h5 class="text-white font-bold pt-16 ">Add Blog Post</h5>
        <form method="post" action="{{ route("post.addPost") }}" class="container" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="md:pt-6 ">
                    <img id="preview-image" class="ml-5 h-[300px] w-[350px] uploaded-image rounded-lg"
                        src="{{ asset("storage/images/default.jpg") }}" alt="">
                    <div class="flex justify-center">

                        <input id="post_image" name="post_image" type="file" class="hidden md:pt-6" accept="image/*"
                            onchange="handleFileInputChange(event)" />
                        <label for="post_image"
                            class="mt-3 inline-flex items-center text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300  shadow-lg shadow-teal-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            Upload Photo
                        </label>
                    </div>
                </div>
                <div>


                    <div class="mb-6">
                        <label for="default-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Title</label>
                        <input type="text" id="blog-title" name="blog-title"
                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    </div>
                    <div class="mb-6">
                        <label for="message"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                        <textarea id="blog-content" name="blog-content" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            placeholder="Write your thoughts here..."></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="default-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author ( Optional
                            )</label>
                        <input type="text" id="blog-author" name="blog-author"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    </div>
                    <button type="submit"
                        class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Submit</button>
                </div>
            </div>





        </form>
    </div>


</x-app-layout>

<style>
    #preview-image {
        height: 300px;
        width: 350px;
        object-fit: cover;
    }
</style>


<script>
    function handleFileInputChange(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        }

        reader.readAsDataURL(file);
    }
</script>
