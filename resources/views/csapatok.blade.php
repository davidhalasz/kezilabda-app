<x-guest-layout>
    <div class="w-full min-h-screen pt-8 pb-24">
        <div class="w-full text-[#eaaa84]">
            @include('components.navbar')
        </div>
        <div class="mt-14 pb-24">
            <h1 class="text-center text-3xl mb-20 text-[#a87c5b]">{{ $team->name }}</h2>
                <div class="container mx-auto">
                    <div class="grid grid-cols-5 gap-10 justify-center">
                        @foreach ($team->players as $player)
                            <div class="h-[300px] relative rounded-xl">
                                <div class="img rounded-xl w-full h-full relative bg-cover overflow-hidden"
                                    style="background-image: url({{ URL::asset('storage/' . $player->avatar) }}">
                                    <div class="opacity-0 hover:opacity-100 ease-in-out duration-200 absolute z-5 w-full h-full backdrop-blur-md bg-black/50">
                                        <p class="p-4 text-white">{{$player->description}}</p>
                                    </div>
                                </div>
                                <h2
                                    class="w-full px-4 py-2 bg-[#a87c5b] text-white absolute z-10 w-full flex justify-center -right-3 -bottom-2 -skew-y-2 rounded-md shadow-lg shadow-[#a87c5b]/50">
                                    {{ $player->name }}
                                </h2>
                            </div>
                        @endforeach
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
