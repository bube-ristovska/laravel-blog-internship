
<footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
    <img src="../images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
    <h5 class="text-3xl">You can leave your email here.</h5>
    <p class="text-sm">Promise to keep the inbox clean. No bugs.</p>

    <div class="mt-10">
        <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
            <form method="POST" action="/newsletter" class="lg:flex text-sm">
               @csrf
                <div class="lg:py-3 lg:px-5 flex items-center">
                    <label for="email" class="hidden lg:inline-block">
                        <img src="../images/mailbox-icon.svg" alt="mailbox letter">
                    </label>

                    <input name='email' id="email" type="text" placeholder="Your email address"
                           class="lg:bg-transparent pl-4 focus-within:outline-none">
                </div>

                <button type="submit"
                        class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</footer>
