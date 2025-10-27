@name('hero')
@schema([
    'background_image: image',
    'random_posts: random_items',
    'text_button: text'
])
<section class="relative md:h-[calc(100dvh-120px)]">
    <div class="md:w-3/4 inline-block md:absolute inset-y-0 right-0 h-full overflow-hidden">
        <x-kit-image :options="$background_image" class="size-full object-cover "/>
    </div>
    <div class="container mx-auto md:absolute top-1/2 -translate-y-1/8 md:-translate-y-1/2 md:left-1/2 md:-translate-x-1/2">
        <div class="mx-5 md:mx-0 md:w-3/4 lg:w-162.5 z-20 top-1/2 md:-bottom-1/5 embla">
            <div class="bg-surface-default p-4 sm:p-6 md:py-14 sm:px-10 drop-shadow-2xl embla__viewport">
                <div class="flex gap-10 embla__container">
                    @foreach ($random_posts as $post)
                        <div class="embla__slide flex-[0_0_100%] flex gap-y-2 flex-col justify-between">
                            <div class="flex items-center gap-x-2">
                                <span class="w-6 h-0.5 bg-main"></span>
                                <span class="text-text-heading ">
                                    {{$post->parent->name}}
                                </span>
                            </div>
                            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl leading-[1.2]">
                                {{ $post->title }}
                            </h1>
                            <div class="text-text-quiet max-sm:text-sm flex gap-x-2 mt-2">
                                <time datetime="{{ $post->updated_at->format('m.d.Y') }}">
                                    {{ $post->updated_at->format('m.d.Y') }}
                                </time>
                                <span>&#8226;</span>
                                {{--
                                <p>
                                    {{$post['layout_settings']['time_to_read']}}
                                </p> --}}
                            </div>
                            <p class="line-clamp-2 mt-2">
                                {{ $post->summary }}
                            </p>
                            <x-kit-link :options="$post->url" class="mt-auto block h-10 sm:h-12 center max-w-36 w-full font-medium leading-1.5 btn animation">
                                {{$text_button}}
                            </x-kit-link>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex mt-5 items-center  embla__controls">
                <div class="embla__buttons flex gap-x-5">
                    <button type="button" class="embla__button embla__button--prev drop-shadow-lg group hover:drop-shadow-xl animation text-text-heading size-10 sm:size-13.5 center bg-surface-default rounded-full">
                        <svg width="24" height="24" class="group-hover:scale-110 animation" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 5L8 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button type="button" class="embla__button embla__button--next drop-shadow-lg group hover:drop-shadow-xl animation text-text-heading size-10 sm:size-13.5 center bg-surface-default rounded-full">
                        <svg class="group-hover:scale-110 animation" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 19L16 12L9 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
