 <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">

            <div x-data="{show: false}" @click.away ="show = false">
                <button @click="show = !show" class="py-2 pl-3 pr-9d w-32 text-left font-semibold text-sm">Categories</button>

                <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52">
                    <a href="/" class="block text-sm hover:bg-gray-300 focus:bg-gray-300">All</a>
                    @foreach(\App\Models\Category::all() as $categorie)
                        <a href="/categories/{{$categorie->slug}}" class="block text-sm hover:bg-gray-300 focus:bg-gray-300">
                            {{$categorie->name}}
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
 </div>
