<nav x-data="{ openMobile: false }" class="h-28 w-full  gap-4 text-lg py-4 text-xl">
    <div class="hidden lg:flex lg:justify-center md:items-center gap-4">
        <a onclick="scrollToDiv()" class="inline-block hover:text-white">Csapatok</a>
        <a class="inline-block hover:text-white" href="/edzok">Edzők</a>
        <div x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (!this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            }
        }" x-on:keydown.escape.prevent.stop="close($refs.button)"
            x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
            class="relative hover:text-white">
            <!-- Button -->
            <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
                type="button" class="flex items-center gap-2 rounded-md">
                Játékosok

                <!-- Heroicon: chevron-down -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Panel -->
            <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
                :id="$id('dropdown-button')" style="display: none;"
                class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md">
                <a href="/jatekosok/ferfi"
                    class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-gray-800">
                    Férfi
                </a>

                <a href="/jatekosok/noi"
                    class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-gray-800">
                    Női
                </a>
            </div>
        </div>
        <a class="inline-block hover:text-white" href="/edzesek">Edzések</a>
        <a href="/"><img class="h-20" src="{{ URL::asset('images/logo.png') }}" /></a>
        <a class="inline-block hover:text-white" href="/esemenyek">Mérkőzések</a>
        <a class="inline-block hover:text-white" href="/hirek">Hírek</a>
        <a class="inline-block hover:text-white" href="/szabalyzatok">Szabályzatok</a>
        <a class="inline-block hover:text-white" href="/kapcsolat">Kapcsolat</a>
    </div>

    <!-- Mobile menu -->
    <div class="flex justify-between lg:hidden px-4">
        <a href="/"><img class="h-14" src="{{ URL::asset('images/logo.png') }}" /></a>
        <button x-data @click="$store.mobileMenu.toggle()" class="text-white hover:text-white focus:outline-none">
            <svg class="text-[#a87c5b] h-6 w-6" viewBox="0 0 24 24">
                <path fill="#a87c5b" d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4zm0 5h16v2H4z" />
            </svg>
        </button>
    </div>

    <div class="mobileMenu px-4" x-cloak x-data x-show="$store.mobileMenu.isShowing">
        <div class="flex justify-between md:hidden pt-4">
            <a href="/"><img class="h-14" src="{{ URL::asset('images/logo.png') }}" /></a>
            <button x-data @click="$store.mobileMenu.toggle()" class="text-[#a87c5b] hover:text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#a87c5b" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="text-[#a87c5b] md:hidden flex flex-col gap-3 justify-center text-center items-center h-full -mt-20 text-2xl">
            <a onclick="scrollToDiv()" class="inline-block hover:text-white">Csapatok</a>
            <a class="inline-block hover:text-white" href="/edzok">Edzők</a>
            <div x-data="{
                open: false,
                toggle() {
                    if (this.open) {
                        return this.close()
                    }

                    this.$refs.button.focus()

                    this.open = true
                },
                close(focusAfter) {
                    if (!this.open) return

                    this.open = false

                    focusAfter && focusAfter.focus()
                }
            }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
                class="relative hover:text-white">

                <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                    :aria-controls="$id('dropdown-button')" type="button" class="ml-4 flex items-center gap-2 rounded-md">
                    Játékosok


                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>


                <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
                    :id="$id('dropdown-button')" style="display: none;"
                    class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md">
                    <a href="/jatekosok/ferfi"
                        class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-gray-800">
                        Férfi
                    </a>

                    <a href="/jatekosok/noi"
                        class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-gray-800">
                        Női
                    </a>
                </div>
            </div>
            <a class="inline-block hover:text-white" href="/edzesek">Edzések</a>
            <a class="inline-block hover:text-white" href="/esemenyek">Mérkőzések</a>
            <a class="inline-block hover:text-white" href="/hirek">Hírek</a>
            <a class="inline-block hover:text-white" href="/szabalyzatok">Szabályzatok</a>
            <a class="inline-block hover:text-white" href="/kapcsolat">Kapcsolat</a>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.store("mobileMenu", {
                isShowing: false,
                lastScrollTopPosition: 0,
                toggle() {

                    if (!this.isShowing) {
                        this.lastScrollTopPosition = window.scrollY;

                        document.body.style.height = "100vh";
                        document.body.style.overflowY = "hidden";
                    }

                    this.isShowing = !this.isShowing;

                    if (!this.isShowing) {
                        document.body.style.height = "auto";
                        document.body.style.overflowY = "visible";
                        window.scrollTo(0, this.lastScrollTopPosition);
                    }
                }
            });
        });
    </script>
</nav>
