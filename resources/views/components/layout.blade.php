<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<body style="font-family: Open Sans, sans-serif">
<style>
    html{
        scroll-behavior: smooth;
    }
</style>
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="../images/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        @auth()
            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
                <!--  Category -->
                <div class="relative flex lg:inline-flex items-center  rounded-xl">

                    <div x-data="{show: false}" @click.away ="show = false" class="relative">
                        <button @click="show = !show" class="py-2 pl-3 pr-9d w-32 text-left font-semibold text-sm">Welcome back {{auth()->user()->name}}</button>

                        <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52">
                           @can('admin')
                            <a href="/admin/posts"
                               class="block text-sm hover:bg-gray-300 focus:bg-gray-300">Dashboard</a>
                            <a href="/admin/posts/create"  class="block text-sm hover:bg-gray-300 focus:bg-gray-300">New post</a>
                            @endcan
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>


                        </div>
                    </div>

                </div>
            </div>


        @endauth
        @guest()
        <div class="mt-8 md:mt-0">
            <a href="/#newsletter">Newsletter</a>
            <a href="/login">Login</a>
            <a href="/register" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Register
            </a>
        </div>
        @endguest
    </nav>

    {{$slot}}


</section>


@if (session()-> has('success'))
    <div x-data="{show:true}"
         x-init="setTimeout(()=>show = false, 4000)"
         x-show="show"
         class="fixed bottom-3 right-3 bg-blue-500 text-white py-2 px-4 rounded-xl">
        <p>{{session('success')}}</p>
    </div>
@endif
</body>
