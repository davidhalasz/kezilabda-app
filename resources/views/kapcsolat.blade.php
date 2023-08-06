<x-guest-layout>
    @section('title') {{'- Kapcsolat'}} @endsection
    <div class="w-full min-h-screen">
        <div class="w-full text-[#eaaa84]">
            @include('components.navbar')
        </div>
        <div class="container mx-auto mt-4 lg:mt-14 pb-24 px-4">
            <h2 class="text-center text-3xl mb-14 text-[#a87c5b]">Kapcsolat</h2>
            <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-6">
                <div
                    class="dynamic-height border border-[#f1e1d0] p-8 md:p-0 rounded-xl flex flex-col gap-4 items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#f1e1d0" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-16 h-16 text-[#a87c5b]">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                    </svg>
                    <p class="text-xl text-[#f1e1d0]">+36 30 123 45 67</p>
                </div>
                <div
                    class="dynamic-height border border-[#f1e1d0] p-8 md:p-0 rounded-xl flex flex-col gap-4 items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-16 h-16 text-[#a87c5b]">
                        <path stroke-linecap="round"
                            d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                    </svg>

                    <p class="text-xl text-[#f1e1d0]">email@email.com</p>
                </div>
                <div
                    class="dynamic-height border border-[#f1e1d0] p-8 md:p-0 rounded-xl flex flex-col gap-4 items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-16 h-16 text-[#a87c5b]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>

                    <p class="text-xl text-[#f1e1d0]"> Kaba, Jókai u. 10, 4183</p>
                </div>
                <div
                    class="md:col-span-3 h-64 md:h-72 lg:h-full lg:col-span-2 border border-[#f1e1d0] rounded-xl overflow-hidden">
                    <iframe class="h-full w-full"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10811.052588892315!2d21.274249!3d47.358022!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47471fe58a147f05%3A0x67ad53b080d76252!2sKaba%20V%C3%A1rosi%20Tornacsarnok!5e0!3m2!1shu!2shu!4v1690991985090!5m2!1shu!2shu"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
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

        document.addEventListener("DOMContentLoaded", function() {
            const windowWidth = window.innerWidth || document.documentElement.clientWidth;
            if (windowWidth >= 640) {
                var divs = document.getElementsByClassName("dynamic-height");

                // Iterate through each div
                for (var i = 0; i < divs.length; i++) {
                    var div = divs[i];

                    // Get the width of each div
                    var divWidth = div.offsetWidth;

                    // Set the height equal to the width
                    div.style.height = divWidth + "px";
                }
            }

        });
    </script>
</x-guest-layout>
