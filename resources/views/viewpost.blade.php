<x-app-layout>
    <div class="addpost-container min-h-screen flex justify-start w-full px-20 py-8 bg-gray-800 text-white">
        
        <div class="grid grid-cols-3 gap-4 w-full h-100 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-700 dark:border-gray-700">
            <div class="col-span-1 h-96 w-96 ">
                <div class="p-6">
                    <img class="h-[350px] w-[350px] object-cover" src="{{ asset('storage/' . $post->image ) }}" id="preview-image" alt="Post Photo" >
                    <form class="pt-5" method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}">
                        <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                <label for="comment" class="sr-only">Your comment</label>
                                <textarea id="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." name="comment" required></textarea>
                            </div>
                            <div class="flex items-center justify-end px-3 py-2 border-t dark:border-gray-600">
                                <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                    Post comment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>               
            </div>   
            <div class="col-span-2 pt-16">
                <div class="mb-6">
                    <h1 class=" block mb-2 text-2xl font-medium text-white">Title</h1>
                    <p class="text-gray-200  text-sm rounded-lg">{{ $post->title }}</p>
                </div>
                <div class="mb-6">
                    <h1 class=" block mb-2 text-2xl font-medium text-white">Content</h1>
                    <p class="pr-10 text-gray-200 text-sm rounded-lg">{{ $post->body }}</p>
                </div>
                <div class="mb-16">
                    <small class="text-white">Author: {{ $post->author }}</small>
                </div>
                @foreach ($comments as $comment)
                    <div class="flex items-start space-x-4 mr-10 p-2 mb-2 bg-gray-700 rounded ">
                        <img class="w-10 h-10 rounded-full object-cover" src="{{ asset('storage/' . $comment->user->image ) }}" alt="">
                        <div class="font-medium dark:text-white">
                            <div>{{ $comment->user->name }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $comment->created_at->format('F d, Y \a\t H:i') }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-300 mt-4">{{ $comment->content }}</div>
                        </div>
                    </div>
                @endforeach                 
            </div>           
        </div>
    </div>


</x-app-layout>


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


