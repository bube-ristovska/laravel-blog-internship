<x-layout>

<section class="px-6 py-8">
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="<?= str_replace('public', '../storage', $post->thumbnail)?>" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>1 day ago</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="../images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                       Author: <h5 class="font-bold"><a href="/authors/{{$post->author->username }}"> {{ $post->author->name }} </a></h5> <br>

                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                    class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                </div>

                    <div class="space-x-2">
                        <a href="/categories/{{$post->category->slug}}"
                           class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                           style="font-size: 10px"
                        >{{$post->category->name }}</a>
                    </div>


                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{$post->title }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.</p>

                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium,
                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae
                        vitae
                        dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                        fugit.</p>

                    <h2 class="font-bold text-lg">Sed quia consequuntur</h2>

                    <p>Magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui
                        dolorem
                        ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
                        tempora
                        incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>

                    <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                        nisi ut
                        aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate
                        velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas
                        nulla
                        pariatur?"</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.</p>

                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium,
                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae
                        vitae
                        dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                        fugit.</p>
                </div>
            </div>
        </article>
    </main>
@auth()
    <section>
        <form method="POST" action="/posts/{{$post->slug}}/comments" class="border border-gray-200 p-6 rounded-xl">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{auth()->id() }}" alt="" width="60" height="60" class="rounded-full">
                <h2 class="ml-4">Want to participate</h2>
            </header>
                <div class="mt-8">
                    <textarea name="body" class="w-full text-sm" cols="30" rows="10" placeholder="Write a comment">

                    </textarea>
                </div>
          <div>
              <button type="submit" class="text-xs bg-blue-500 uppercase text-white rounded-2xl" style="padding: 10px">Post</button>
          </div>
        </form>
<br>
        @endauth

    @foreach($post->comments as $comment)
            <x-comment :comment="$comment"></x-comment><br>
        @endforeach
    </section>
<x-footer></x-footer>
    </section>

</x-layout>
