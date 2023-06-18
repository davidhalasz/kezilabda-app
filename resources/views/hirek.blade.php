<x-guest-layout>
    <div class="w-full min-h-screen">
            <div class="w-full text-[#eaaa84]">
                @include('components.navbar')
            </div>
            <div class="container mx-auto py-8">
                <h2 class="text-center text-3xl mb-8 text-white">Hírek</h2>
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($posts as $post)
                        @php
                            $pattern = '/<figure\b[^>]*>(.*?)<\/figure>/s';
                            $replacement = '';
                            $updatedHtml = preg_replace($pattern, $replacement, $post->description);

                            $string = strip_tags($updatedHtml);
                            $string = preg_replace('/<br\s?\/?>/', ' $0 ', $string);
                            $string = trim($string);
                        @endphp
                        <a class="newCard moreTop" href="/hirek/{{$post->id}}">
                            <div class="text-white">
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
