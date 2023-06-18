<x-guest-layout>
    <div class="w-full min-h-screen bg-[#232323]">
        <div class="w-full text-[#eaaa84]">
            @include('components.navbar')
        </div>
        <div class="container mx-auto py-8">
            <div class="text-5xl font-extrabold flex justify-center w-2/3 mx-auto">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#67e8f9] to-[#0284c7]">
                  {{$post->title}}
                </span>
            </div>
            <div class="text-center w-full text-gray-500 font-bold text-lg mt-4">
                {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('YYYY MMMM DD.') }}
            </div>

            <div class="mt-14 text-xl text-gray-300">
                {!! $post->description!!}
            </div>
        </div>
    <script>
        function scrollToDiv() {
            window.location.href = '/#csapatok';
            var div = document.getElementById("csapatok");
            div.scrollIntoView({
                behavior: "smooth"
            });
        }
    </script>
</x-guest-layout>
