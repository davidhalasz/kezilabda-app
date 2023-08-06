<x-guest-layout>
    @section('title') {{'- ' . $post->title}} @endsection
    <div class="w-full min-h-screen bg-[#f1e1d0]">
        <div class="w-full text-[#232323]">
            @include('components.navbar')
        </div>
        <div class="container mx-auto mt-4 lg:mt-14 pb-24 px-4 lg:px-0">
            <div class="text-xl md:text-3xl lg:text-5xl font-extrabold flex justify-center w-full lg:w-2/3 mx-auto mb-10 lg:mb-20">
                <span class="text-[#232323]">
                  {{$post->title}}
                </span>
            </div>
            <div class="text-center w-full text-gray-700 font-bold lg:text-lg mt-4">
                {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('YYYY MMMM DD.') }}
            </div>

            <div class="mx-auto lg:w-2/3 mt-8 lg:mt-14 lg:text-xl text-gray-800">
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
