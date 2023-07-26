<x-guest-layout>
    <div class="w-full min-h-screen bg-[#f1e1d0]">
        <div class="w-full text-[#232323]">
            @include('components.navbar')
        </div>
        <div class="container mx-auto mt-14 pb-24">
            <div class="text-5xl font-extrabold flex justify-center w-2/3 mx-auto mb-20">
                <span class="text-[#232323]">
                  {{$post->title}}
                </span>
            </div>
            <div class="text-center w-full text-gray-700 font-bold text-lg mt-4">
                {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('YYYY MMMM DD.') }}
            </div>

            <div class="mt-14 text-xl text-gray-800">
                {!! $post->description!!}
            </div>
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
