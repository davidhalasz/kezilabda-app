<nav class="h-28 w-full flex justify-center items-center gap-4 text-lg py-4 text-xl">
    <a onclick="scrollToDiv()" class="inline-block hover:text-white">Csapatok</a>
    <div
        x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            }
        }"
        x-on:keydown.escape.prevent.stop="close($refs.button)"
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
        x-id="['dropdown-button']"
        class="relative hover:text-white"
    >
        <!-- Button -->
        <button
            x-ref="button"
            x-on:click="toggle()"
            :aria-expanded="open"
            :aria-controls="$id('dropdown-button')"
            type="button"
            class="flex items-center gap-2 rounded-md"
        >
            Játékosok

            <!-- Heroicon: chevron-down -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Panel -->
        <div
            x-ref="panel"
            x-show="open"
            x-transition.origin.top.left
            x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')"
            style="display: none;"
            class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md"
        >
            <a href="/jatekosok/ferfi" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-gray-800">
                Férfi
            </a>

            <a href="/jatekosok/noi" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-gray-800">
                Női
            </a>
        </div>
    </div>
    <a class="inline-block hover:text-white" href="/edzesek">Edzések</a>
    <a href="/"><img class="h-20" src="{{ URL::asset('images/logo.png') }}" /></a>
    <a class="inline-block hover:text-white" href="/esemenyek">Mérkőzések</a>
    <a class="inline-block hover:text-white" href="/hirek">Hírek</a>
    <a class="inline-block hover:text-white" href="/szabalyzatok">Szabályzatok</a>
</nav>
