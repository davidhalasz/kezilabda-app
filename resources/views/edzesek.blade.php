<x-guest-layout>
    @section('title') {{'- Edzések'}} @endsection
    <div class="w-full min-h-screen pb-24">
        <div class="h-full w-full bg-[#232323]">
            <div class="w-full text-[#a87c5b]">
                @include('components.navbar')
            </div>

            <div class="container mx-auto text-[#f1e1d0] mt-4 lg:mt-14 px-2">
                <h2 class="text-center text-3xl mb-20 text-[#f1e1d0]">Edzések</h2>
                <div class="flex flex-col md:flex-row justify-center gap-8 md:gap-0">
                    <div class="w-[200px] md:w-1/4 lg:w-1/6 flex flex-col mx-auto md:mx-0 md:border-r border-[#f1e1d0] p-1 text-center">
                        <h2 class="text-xl">KEDD</h2>
                        <div class="mt-4 border border-[#f1e1d0] rounded-xl p-2">
                            <p class="text-center">16:00-17:00</p>
                            <p class="font-bold text-lg mt-2">L/F U8-9</p>
                            <p class="text-lg">Sportcsarnok</p>
                        </div>
                        <div class="mt-4 border border-[#f1e1d0] rounded-xl p-2">
                            <p class="text-center">17:00-18:30</p>
                            <p class="font-bold text-lg mt-2">L/F U10</p>
                            <p class="text-lg">Sportcsarnok</p>
                        </div>
                    </div >

                    <div class="w-[200px] md:w-1/4 lg:w-1/6 flex flex-col mx-auto md:mx-0 md:border-r border-[#f1e1d0] p-1 text-center">
                        <h2 class="text-xl">SZERDA</h2>
                        <div class="mt-4 border border-[#f1e1d0] rounded-xl p-2">
                            <p class="text-center">16:00-17:00</p>
                            <p class="font-bold text-lg mt-2">5-6 év</p>
                            <p class="text-lg">Hétszínvirág óvoda</p>
                        </div>
                    </div >

                    <div class="w-[200px] md:w-1/4 lg:w-1/6 flex flex-col mx-auto md:mx-0 md:border-r border-[#f1e1d0] p-1 text-center">
                        <h2 class="text-xl">CSÜTÖRTÖK</h2>
                        <div class="mt-4 border border-[#f1e1d0] rounded-xl p-2">
                            <p class="text-center">16:00-17:00</p>
                            <p class="font-bold text-lg mt-2">L/F U8-9</p>
                            <p class="text-lg">Sportcsarnok</p>
                        </div>
                        <div class="mt-4 border border-[#f1e1d0] rounded-xl p-2">
                            <p class="text-center">17:00-18:30</p>
                            <p class="font-bold text-lg mt-2">L/F U10</p>
                            <p class="text-lg">Sportcsarnok</p>
                        </div>
                    </div>

                    <div class="w-[200px] md:w-1/4 lg:w-1/6 flex flex-col mx-auto md:mx-0 p-1 text-center">
                        <h2 class="text-xl">PÉNTEK</h2>
                        <div class="mt-4 border border-[#f1e1d0] rounded-xl p-2">
                            <p class="text-center">16:00-17:00</p>
                            <p class="font-bold text-lg mt-2">L/F U10</p>
                            <p class="text-lg">Sportcsarnok</p>
                            <p class="text-lg">(játék)</p>
                        </div>
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
