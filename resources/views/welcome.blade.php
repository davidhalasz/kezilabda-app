<x-guest-layout>
    <div>
        <div class="h-screen w-full relative">
            <div class="absolute top-0 w-full text-[#a87c5b] z-10">
                @include('components.navbar')
            </div>
            <div class="absolute h-full flex items-center">
                <h1 class="main--title">
                    Kabai Delta KSE
                </h1>
            </div>

            <canvas id="myCanvas" class="h-full w-full"></canvas>
        </div>
        <div class="w-full bg-[#232323] py-10 text-white">
            <div class="container mx-auto">
                <h2 class="text-center text-3xl mb-8 text-[#a87c5b]">Mérkőzések</h2>
                <div class="flex gap-8 snap-x overflow-x-auto lg:hidden">
                    @foreach ($events as $event)
                        <div class="w-[300px] flex-none snap-normal snap-center rounded-2xl shadow-lg p-4 border-2 border-gray-300 text-gray-300">
                            <h2 class="text-xl font-bold">
                                {{ \Carbon\Carbon::parse($event->date)->isoFormat('YYYY MMMM DD.') }}</h2>
                            <h3 class="Text-lg font-bold">
                                {{ \Carbon\Carbon::parse($event->date)->isoFormat('HH:mm') }}</h3>
                            <p class="text-md mb-2">{{ $event->address }}</p>
                            <p class="text-md font-bold mb-1">Kabai Delta KSE - {{ $event->play_with }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="lg:grid grid-cols-4 gap-8 hidden">
                    @foreach ($events as $event)

                            <div class="rounded-2xl shadow-lg p-4 border-2 border-gray-300 text-gray-300">
                                <h2 class="text-xl font-bold">
                                    {{ \Carbon\Carbon::parse($event->date)->isoFormat('YYYY MMMM DD.') }}</h2>
                                <h3 class="Text-lg font-bold">
                                    {{ \Carbon\Carbon::parse($event->date)->isoFormat('HH:mm') }}</h3>
                                <p class="text-md mb-2">{{ $event->address }}</p>
                                <p class="text-md font-bold mb-1">Kabai Delta KSE - {{ $event->play_with }}</p>
                            </div>

                    @endforeach
                </div>
                <div class="w-full flex justify-center mt-10 text-[#a87c5b]">
                    <a href="/esemenyek">
                        <button
                            class="py-2 px-8 rounded-full border-2 border-[#a87c5b] font-bold hover:bg-[#a87c5b] hover:text-gray-800">További mérkőzések</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="relative w-full">
            <div class="absolute w-full h-full bg-[#f1e1d0] -z-10"></div>
            <div class="container mx-auto py-14 px-2">
                <h2 class="text-center text-3xl mb-8">Hírek</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 ">
                    @foreach ($posts as $post)
                        @php
                            $pattern = '/<figure\b[^>]*>(.*?)<\/figure>/s';
                            $replacement = '';
                            $updatedHtml = preg_replace($pattern, $replacement, $post->description);

                            $string = strip_tags($updatedHtml);
                            $string = preg_replace('/<br\s?\/?>/', ' $0 ', $string);
                            $string = trim($string);
                        @endphp
                        <a class="newCard" href="/hirek/{{$post->id}}">
                            <div class="text-gray-300">
                                <div class="card__content">
                                    <h2 class="font-bold text-2xl">{{$post->title}}</h2>
                                    <div class="text-md leading-6 line-clamp-5">{{$string}}</div>
                                </div>
                                <div class="absolute top-2 right-2 text-gray-400">
                                    <p>{{ \Carbon\Carbon::parse($post->created_at)->isoFormat('YYYY MMMM DD.') }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="w-full flex justify-center mt-10">
                    <a href="/hirek">
                    <button
                        class="py-2 px-8 rounded-full border-2 border-[#232323] font-bold hover:bg-[#232323] hover:text-white">Összes
                        hír</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full bg-[#232323]">
            <div id="csapatok" class="container mx-auto pt-14 pb-36 px-4">
                <h2 class="text-center text-3xl mb-8 text-[#a87c5b]">Csapatok</h2>
                <div class="w-full grid grid-cols-1 md:grid-cols-2">
                    @foreach ($teams as $team)
                        <a href="/csapatok/{{$team->id}}">
                            <div id="carousel-{{ $loop->index }}" class="mb-36 relative w-full flex justify-center">
                                <div
                                    class="neumorphCard absolute w-full md:w-5/6 lg:w-2/3 h-[180px] rounded-2xl -bottom-28 flex justify-center">
                                    <h2 class="absolute text-2xl bottom-0 py-6 text-[#a87c5b]">
                                        {{ $team->name }}
                                    </h2>
                                </div>
                                <div class="carousel">
                                    <ul class="carousel__list">
                                        @foreach ($team->players as $player)
                                            <li class="carousel__item" data-pos="{{ $loop->index }}">
                                                <div class="img rounded-xl">
                                                    <img class="rounded-xl w-full h-full object-cover"
                                                        src="{{ URL::asset('storage/' . $player->avatar) }}" />
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </a>


                        <script>
                            function imageViewer(index) {
                                let cards = document.querySelectorAll(`#carousel-${index} .carousel__item`);
                                update{{ $loop->index }}(-1, cards);
                            }

                            const update{{ $loop->index }} = function(direction, cards) {
                                flipCards(cards, 0, direction);
                            }

                            function flipCards(cards, i, direction) {
                                if (direction === 1) {
                                    if (parseInt(cards[i].dataset.pos) === cards.length - 1) {
                                        cards[i].dataset.pos = 0;
                                    } else {
                                        cards[i].dataset.pos = parseInt(cards[i].dataset.pos) + parseInt(direction);
                                    }
                                    if (i === cards.length - 1) {
                                        return;
                                    }
                                    i++;
                                } else if (direction === -1) {
                                    if (parseInt(cards[i].dataset.pos) === 0) {
                                        cards[i].dataset.pos = cards.length - 1;
                                    } else {
                                        cards[i].dataset.pos = parseInt(cards[i].dataset.pos) + parseInt(direction);
                                    }
                                    if (i === cards.length - 1) {
                                        return;
                                    }
                                    i++;
                                }
                                flipCards(cards, i, direction);
                            }

                            const carouselId{{ $loop->index }} = setInterval(function() {
                                imageViewer({{ $loop->index }});
                            }, 2000);
                        </script>
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
