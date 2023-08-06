<x-guest-layout>
    @section('title') {{'- Szabályzatok'}} @endsection
    <div class="w-full min-h-screen">
        <div class="w-full text-[#eaaa84]">
            @include('components.navbar')
        </div>
        <div class="container mx-auto mt-4 lg:mt-14 pb-24 px-4">
            <h2 class="text-center text-3xl mb-14 text-[#a87c5b]">Szabályzatok</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($documents as $document)
                    <a href="storage/{{ $document->filepath }}">
                        <div class="hover:scale-105 ease-in-out duration-200 neumorphCard rounded-2xl flex flex-col h-full justify-between">
                            <h2 class="text-xl p-4 text-[#a87c5b]">
                                {{ $document->name }}
                            </h2>
                            <p class="px-4 pb-4 text-right text-gray-400">Utolsó módosítás: {{ \Carbon\Carbon::parse($document->updated_at)->isoFormat('YYYY MMMM DD.') }}</p>
                        </div>
                    </a>
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
