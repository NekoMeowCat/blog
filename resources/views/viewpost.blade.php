<x-app-layout>
    <section class="min-h-screen w-full border bg-black">
        <div class="flex justify-center">
            <div class="border-2 rounded-lg w-96 md:w-[600px] m-6">
                <!-- post profile -->
                <div class="m-2 flex justify-start border rounded-md flex-grow">
                    <div class="m-2 border rounded-full w-16">
                        <img class="h-full rounded-full object-cover w-full" src="{{ asset('storage/' . Auth::user()->image) }}" alt="Bordered avatar">
                    </div>
                    <div class="w-5/6 border m-1">
                        <div class="flex justify-start items-start">
                            <span class="font-bold text-white"> {{ $post->author }}</span>
                        </div>
                        <div class="flex justify-start items-start">
                            <small class="font-light font-poppins text-gray-400"> {{ $post->created_at->format('F d, Y \a\t H:i') }} </small>
                        </div>
                    </div>
                </div> 
                <!-- post profile -->
                <!-- post content -->
                <div class="m-2 flex justify-start border rounded-md">
                    <span class="text-start font-poppins text-gray-200 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum accusamus labore cumque adipisci, quos praesentium soluta, repellat asperiores veritatis aliquam excepturi vero dignissimos dolorem nihil saepe atque quia tempore nam doloribus! Laborum ut, accusantium, cupiditate ad doloribus dicta harum ipsam aliquid corporis placeat quam totam nam laudantium vel labore unde.
                    </span>
                </div>
                <!-- post content -->
                <!-- post comment submit -->
                <div class="m-2 flex border rounded-md">
                    <form class="w-full" method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}">
                        <div class="w-full border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
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
                <!-- post comment submit -->
                <!-- post comment section -->
                <div class="m-2 block border rounded-md h-auto">
                    @foreach ($comments as $comment)
                        <div class="flex items-start w-full mr-10 p-2 mb-2 bg-gray-700 rounded ">
                            <div class="m-1 border rounded-full w-14">
                                <img class="h-14 rounded-full object-cover w-full" src="{{ asset('storage/' . Auth::user()->image) }}" alt="Bordered avatar">
                            </div>
                            <div class="w-5/6 border m-1">
                                <div class="flex justify-start items-start">
                                    <span class="font-bold text-white"> {{ $comment->user->name }}</span>
                                </div>
                                <div class="flex justify-start items-start">
                                    <small class="font-light font-poppins text-gray-400"> {{ $post->created_at->format('F d, Y \a\t H:i') }} </small>
                                </div>
                                <div class="">
                                    <span class="text-gray-200">{{ $comment->content }}</span>
                                </div>
                            </div>                          
                        </div>

                    @endforeach   
                </div>
                <!-- post comment section -->
            </div>
        </div>
    </section>
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


