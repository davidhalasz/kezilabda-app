<x-guest-layout>
    <div class="w-full min-h-screen bg-[#f1e1d0]">
        <div class="w-full text-[#a87c5b]">
            @include('components.navbar')
        </div>

        <div class="container mx-auto mt-14 pb-24 text-[#2323232]">
            <h2 class="text-center text-3xl mb-20 text-[#a87c5b]">Mérkőzések</h2>
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

                <div class="flex  flex-row {{ $eventYear != $previousYear || $eventMonth != $previousMonth ? 'pt-4' : '' }}">
                    <h2 class="w-1/4 font-bold text-4xl depth">
                        @if ($eventYear != $previousYear || $eventMonth != $previousMonth)
                            {{ $eventYear . ' ' . \Carbon\Carbon::createFromFormat('m', $eventMonth)->isoFormat('MMMM') }}
                        @endif
                    </h2>

                    <div class="w-3/4 pb-4 px-4 {{ $eventYear == $previousYear && $eventMonth == $previousMonth ? 'pt-2 border-t-2 border-slate-200' : '' }}">
                        <p class="text-lg font-bold">{{ $event->title }}</p>
                        <p>Időpont: 2023 junius 13. 17:00</p>
                        <p>Helyszín: {{ $event->address }}</p>
                        <p class="mt-2">
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
