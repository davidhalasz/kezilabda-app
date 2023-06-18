<x-guest-layout>
    <div class="w-full min-h-screen bg-[#232323]">
        <div class="w-full text-[#eaaa84]">
            @include('components.navbar')
        </div>

        <div class="container mx-auto py-8 text-gray-300">
            <h2 class="text-center text-3xl mb-8 text-gray-200">Események</h2>
            @php
                $customDate = '2010-05-12 13:57:01';
                $currentYear = date('Y', strtotime($customDate));
                $currentMonth = date('m', strtotime($customDate));
                $previousYear = null;
                $previousMonth = null;
            @endphp
            @foreach ($events as $event)
                @php
                    $eventYear = date('Y', strtotime($event['date']));
                    $eventMonth = date('m', strtotime($event['date']));
                @endphp

                <div class="flex flex-row {{ $eventYear != $previousYear || $eventMonth != $previousMonth ? 'mt-6' : '' }}">
                    <h2 class="w-1/4 font-bold text-4xl">
                        @if ($eventYear != $previousYear || $eventMonth != $previousMonth)
                            {{ $eventYear . ' ' . \Carbon\Carbon::createFromFormat('m', $eventMonth)->isoFormat('MMMM') }}
                        @endif
                    </h2>

                    <div class="w-3/4 {{ $eventYear == $previousYear && $eventMonth == $previousMonth ? 'mt-2' : '' }}">
                        <p class="text-lg font-bold">{{ $event->title }}</p>
                        <p>Idopont: 2023 junius 13. 17:00</p>
                        <p>Helyszin: {{ $event->address }}</p>
                        <p>
                            {{ $event->description }}
                        </p>
                    </div>
                </div>
                @php
                    $previousYear = $eventYear;
                    $previousMonth = $eventMonth;
                @endphp
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
