<x-layout>
    <section class="px-6 py-8 max-w-md mx-auto border border-gray-200 rounded-xl">
        <h1 class="text-lg  font-bold mb-4">
            Edit Post: {{$post->title}}
        </h1>

        <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="title"
                >
                    Title
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="title"
                       id="title"
                       value="{{ $post->title }}"
                       required
                >

                @error('title')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="slug"
                >
                    Slug
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="slug"
                       id="slug"
                       value="{{ $post->slug }}"
                       required
                >

                @error('slug')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="thumbnail"
                >
                    Thumbnail
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="file"
                       name="thumbnail"
                       id="thumbnail"
                       required
                >

                @error('thumbnail')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>



            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="excerpt"
                >
                    Excerpt
                </label>

                <textarea class="border border-gray-400 p-2 w-full"
                          name="excerpt"
                          id="excerpt"
                          required
                >{{ $post->excerpt }}</textarea>

                @error('excerpt')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="body"
                >
                    Body
                </label>

                <textarea class="border border-gray-400 p-2 w-full"
                          name="body"
                          id="body"
                          required
                >{{ $post->body }}</textarea>

                @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="category_id"
                >
                    Category
                </label>

                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                @error('category')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">Update</button>
        </form>
    </section>
</x-layout>
