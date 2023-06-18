<x-guest-layout>
    <div class="w-full">
        <div class="w-full text-[#eaaa84]">
            @include('components.navbar')
        </div>
        <h1 class="text-center text-3xl mb-8 text-gray-200">{{ $team->name }}</h2>
            <div class="container mx-auto">
                <div class="grid grid-cols-5 gap-8 justify-center">
                    @foreach ($team->players as $player)
                    <div class="img rounded-xl relative">
                        <img class="rounded-xl w-full h-full object-cover"
                            src="{{ URL::asset('storage/' . $player->avatar) }}" />
                            <div class="absolute w-full flex justify-center -bottom-4">
                                <button
                                    class="py-1 px-4 rounded-full border-2 font-bold bg-gray-100 text-black">{{$player->name}}</button>
                            </div>
                    </div>
                    @endforeach
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
