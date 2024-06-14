<x-layout>
    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            Latest <span class="text-blue-500">DEVOPS :) </span> News
        </h1>

        <h2 class="inline-flex mt-2">212016 </h2>

        <p class="text-sm mt-14">
            Another year. Another drama. We're refreshing the popular news series with new content.
            We are going to keep you guys up to speed with what's going on! Subscribe.
        </p>

     <x-dropdown></x-dropdown>

            <!-- Other Filters -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">

            </div>

            <!-- Search -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form method="GET" action="#">
                    <input type="text" name="search" placeholder="Find something"
                           class="bg-transparent placeholder-black font-semibold text-sm" value="{{request('search')}}">
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-post-card :post="$posts[0]"></x-post-card>

            <div class="lg:grid lg:grid-cols-3">
                @foreach($posts->skip(1) as $post)
                    <x-post-card :post="$post"></x-post-card>
                @endforeach
            </div>

            {{   $posts->links() }}
        @else
            <p class="text-center">No posts yet.</p>
        @endif
    </main>
    <x-footer></x-footer>
</x-layout>
