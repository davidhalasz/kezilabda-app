<x-guest-layout>
    @section('title') {{'- Edzők'}} @endsection
    <div class="w-full min-h-screen pb-24">
        <div class="w-full">
            <div class="top-0 w-full text-[#a87c5b]">
                @include('components.navbar')
            </div>
        </div>
        <div class="w-full lg:pt-8 px-4">
            <div class="lg:mt-14 pb-24">
                <h1 class="text-center text-3xl text-[#a87c5b] mb-20">Edzők</h2>
                    <div class="container mx-auto">
                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10 justify-center">
                            @foreach ($coaches as $coach)
                                <div class="h-[400px] aspect-[4/5] relative rounded-xl">
                                    <div class="img rounded-xl w-full h-full relative bg-cover bg-top overflow-hidden"
                                        style="background-image: url({{ URL::asset('storage/' . $coach->avatar) }}">
                                    </div>
                                    <h2
                                        class="w-full px-4 py-2 bg-[#a87c5b] text-white absolute z-10 w-full flex justify-center -right-2 md:-right-3 -bottom-2 -skew-y-2 rounded-md shadow-lg shadow-[#a87c5b]/50">
                                        {{ $coach->name }}
                                    </h2>
                                </div>
                            @endforeach
                        </div>
                    </div>
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
