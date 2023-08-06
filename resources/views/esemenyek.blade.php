<x-guest-layout>
    @section('title') {{'- Mérkőzések'}} @endsection
    <div class="w-full min-h-screen bg-[#f1e1d0]">
        <div class="w-full text-[#a87c5b]">
            @include('components.navbar')
        </div>

        <div class="container mx-auto mt-4 lg:mt-14 pb-24 text-[#2323232] px-2">
            <h2 class="text-center text-3xl mb-20 text-[#a87c5b]">Mérkőzések</h2>
            @foreach ($events as $event)
                <div
                    class="rounded-md mt-8 relative flex items-center gap-2 md:gap-14 text-sm md:text-xl font-bold border-4 border-[#a87c5b] mx-auto w-full lg:w-2/3 px-4 py-[24px]">
                    <p class="w-5/12 text-center uppercase">Kabai Delta KSE</p>
                    <div class="w-2/12 text-center uppercase">
                        <p class="border-y-2 border-[#a87c5b] inline-block py-1">VS</p>
                    </div>
                    <p class="w-5/12 text-center uppercase">{{$event->play_with}}</p>
                    <div class="absolute w-full -bottom-[20px] flex justify-center centerLogo">
                        <p class="py-2 px-4 bg-[#a87c5b] text-white text-xs md:text-sm rounded-sm">
                            {{ \Carbon\Carbon::parse($event->date)->isoFormat('YYYY MMMM DD.') . ' - ' . $event->address}}
                        </p>
                    </div>
                </div>
            @endforeach

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
