<x-app-layout>

    <div class="dashboard-container min-h-screen w-full px-32 bg-gray-800 text-white">
        <h5 class="text-white font-bold pt-16 ml-5">Timeline</h5>
        <div class="blogs-container p-5 grid grid-cols-3 gap-3">                     
            <div class="col-span-2 grid cols-1">
                <div class="col-span-2 mt-8">
                    @foreach ($posts as $post)
                    <a href="{{ route('viewpost', ['id' => $post->id ]) }}" class="mb-2 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-teal-700">
                        <img class="object-contain w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('storage/' . $post->image) }}" alt="">
                        <div class="flex flex-col justify-start p-4 leading-normal">
                            <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->user->name }}</h3>
                            <small class="mb-5 text-gray-400">{{ $post->created_at->format('F d, Y') }}</small>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->body }}</p>
                            <small class="mt-2 text-gray-400">Author: {{ $post->author }}</small>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>                             
        </div>
    </div>

</x-app-layout>

<style>
    #card {
        height: 170px;
        width: 300px;
    }
</style>

