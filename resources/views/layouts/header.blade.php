@name('header')
@schema([
    'headermenu: menu',
])
@livewire('alpine')
<header x-data="" class="h-30 flex">
    <div class="container mx-auto px-5 my-auto flex items-center justify-between">
        @if (rtrim($host['url'], '/') === rtrim(url()->current(), '/'))
            <span class=" size-20 block center">
                <x-kit-image :options="logo()" class="w-full object-contain"/>
            </span>
        @else
            <x-kit-link :options="$host" class="size-20 block center group">
                <x-kit-image :options="logo()" class="w-full object-contain group-hover:scale-105 transition-all"/>
            </x-kit-link>
        @endif
        <div class="flex items-center gap-x-7.5 max-md:hidden">
            <nav>
                <ul class="flex gap-x-5">
                    @foreach ($headermenu as $item)
                        @if (rtrim($item['url'], '/') === rtrim(url()->current(), '/'))
                            <span class="select-none opacity-50 text-text-quiet font-normal">
                                {{ $item['title'] }}
                            </span>
                        @else
                            <x-kit-link :options="$item" class="text-text-quiet font-normal hover:text-text-heading transisiton-all"/>
                        @endif
                    @endforeach
                </ul>
            </nav>
            <form class="max-w-60 l:max-w-[19.5rem] w-full h-12 relative items-center bg-surface-raised">
                <input type="text" placeholder="Search here..." class="text-base pl-11 size-full focus:ring-0 outline-main">
                <svg xmlns="http://www.w3.org/2000/svg" a fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 absolute left-4 -translate-y-1/2 top-1/2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </form>
        </div>
        <button
            @click="$dispatch('open-burger-menu')"
            class="size-8 text-text-heading md:hidden hover:text-text-quiet animation"
            aria-label="Open menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-7 ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>
</header>

<!-- burger menu -->
<div x-data="{
    showBurger: false,
    openBurger() {
        this.showBurger = true;
        document.body.style.overflow = 'hidden';
    },
    closeBurger() {
        this.showBurger = false;
        document.body.style.overflow = '';
    }
}"
    @open-burger-menu.window="openBurger()"
    @keydown.escape.window="showBurger && closeBurger()"
    x-show="showBurger"
    x-cloak
    class="modal-wrapper">

    <!-- Overlay -->
    <div x-show="showBurger"
        @click="closeBurger()"
        class="modal-overlay">
    </div>

    <div class="burger-container w-full max-w-110 bg-surface-default text-text-secondary p-12 inset-y-0 absolute top-0 right-0">
        <div x-show="showBurger"
            @click.stop
            class="burger-content flex flex-col justify-between h-full">
            <div class="flex flex-col justify-between h-full">
                <div class="w-full between pb-4 md:pb-8">
                    @if (rtrim($host['url'], '/') === rtrim(url()->current(), '/'))
                        <span class=" ">
                            <x-kit-image :options="logo()" class=""/>
                        </span>
                    @else
                        <x-kit-link :options="$host" class="group">
                            <x-kit-image :options="logo()" class="group-hover:scale-105 transition-all"/>
                        </x-kit-link>
                    @endif
                    <button @click="closeBurger()" class="modal-close text-text-normal cursor-pointer flex ml-auto hover:text-main transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <ul class="flex flex-col text-lg font-bold gap-y-3 2xl:text-xl text-text-heading">
                    @foreach ($headermenu as $item)
                        @if (rtrim($item['url'], '/') === rtrim(url()->current(), '/'))
                            <span class="select-none opacity-50">
                                {{ $item['title'] }}
                            </span>
                        @else
                            <x-kit-link :options="$item" class="cursor-pointer after:block after:h-0.25 after:bg-main after:w-0 after:transition-all hover:after:w-full transition-all"/>
                        @endif
                    @endforeach
                </ul>
                <form class="w-full mt-auto h-12 relative items-center bg-surface-raised">
                    <input type="text" placeholder="Search here..." class="text-base pl-11 size-full focus:ring-0 outline-main">
                    <svg xmlns="http://www.w3.org/2000/svg" a fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="size-6 absolute left-4 -translate-y-1/2 top-1/2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </form>
            </div>
        </div>
    </div>
</div>
