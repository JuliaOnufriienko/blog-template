@name('footer')
@schema([
    'logo_image: image',
    'description: text',
    'category_heading: text',
    'footermenu: menu',
    'social_heading: text',
    'socials: socials',
    'subscribe_heading: text',
    'subscribe_button: text',
])
<footer x-data="" class=" bg-surface-lower text-text-bold/60 ">
    <div class="container px-5 mx-auto pt-20 xl:pt-24.75">
        <div class="flex flex-col xl:flex-row items-start gap-y-7 gap-x-3 justify-between pb-16.75 border-b border-border">
            <div class="flex-col flex gap-y-3">
                @if (rtrim($host['url'], '/') === rtrim(url()->current(), '/'))
                    <span class="size-30 block ">
                        <x-kit-image :options="$logo_image" class="w-full object-contain"/>
                    </span>
                @else
                    <x-kit-link :options="$host" class="size-20 block  group">
                        <x-kit-image :options="$logo_image" class="w-full object-contain group-hover:scale-105 transition-all"/>
                    </x-kit-link>
                @endif
                <p class="xl:max-w-84">
                    {{$description}}
                </p>
            </div>
            <div class="flex justify-between w-full md:w-1/3">
                <div class="">
                    <h2 class="font-heading text-text-bold text-2xl mb-6">
                        {{$category_heading}}
                    </h2>
                    <ul class="flex flex-col gap-y-2.5">
                        @foreach ($footermenu as $item)
                            <x-kit-link :options="$item" class="hover:text-text-bold animation"/>
                        @endforeach
                    </ul>
                </div>
                <div class="">
                    <h2 class="font-heading text-text-bold text-2xl mb-6">
                        {{$social_heading}}
                    </h2>
                    <ul class="flex flex-col gap-y-2.5">
                        @foreach($socials as $social)
                            <x-kit-link :options="$social['url']" class="hover:text-text-bold animation">
                                {{$social['icon']}}
                            </x-kit-link>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="max-xs:w-full">
                <h2 class="font-heading text-text-bold text-2xl mb-6">
                    {{$subscribe_heading}}
                </h2>
                <form action="" class="flex flex-col xs:flex-row gap-2.25">
                    <input placeholder="Email" type="text" class="px-5 h-12.5 bg-surface-default/5" inputmode="email">
                    <button aria-label="{{$subscribe_button}}" type="submit"
                    class="h-12.5 px-5.5 leading-1.5 font-medium btn center animation">
                        {{$subscribe_button}}
                    </button>
                </form>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row max-sm:text-sm justify-between py-5">
            <p>
                @ 2025 - Blogy
            </p>
            <p>
                Designed & Develop by <a href="#" class="hover:text-text-bold animation">Divotek</a>
            </p>
        </div>
    </div>
</footer>

@vite(['resources/js/app.js'])
@stack('scripts')
<script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const emblaNodes = document.querySelectorAll('.embla')
        const OPTIONS = { loop: true }
        emblaNodes.forEach(emblaNode => {
        const viewportNode = emblaNode.querySelector('.embla__viewport')
        const prevBtn = emblaNode.querySelector('.embla__button--prev')
        const nextBtn = emblaNode.querySelector('.embla__button--next')

        if (!viewportNode) return // защита, если где-то неполная разметка

        const emblaApi = EmblaCarousel(viewportNode, {
            loop: false,
            align: 'start',
            slidesToScroll: 1,
        })

        const togglePrevNextBtnsState = () => {
            prevBtn.disabled = !emblaApi.canScrollPrev()
            nextBtn.disabled = !emblaApi.canScrollNext()
        }

        prevBtn.addEventListener('click', () => emblaApi.scrollPrev())
        nextBtn.addEventListener('click', () => emblaApi.scrollNext())

        emblaApi
            .on('init', togglePrevNextBtnsState)
            .on('reInit', togglePrevNextBtnsState)
            .on('select', togglePrevNextBtnsState)
        })
    })
</script>
