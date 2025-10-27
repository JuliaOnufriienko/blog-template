@name('two_posts')
@schema([
    'heading: text',
    'featured_posts: popular_items',
    'text_button: text'
])

<section x-data="section4" class="pt-21 pb-70">
    <div class="container">
        <div class="flex flex-col gap-y-2.5">
            <h2 class="text-[42px]">
                {{-- Latest Post --}}
                {{$heading}}
            </h2>
            <div class="h-1 w-28 bg-main"></div>
        </div>
        <ul class="flex flex-col m:flex-row justify-between gap-y-55 gap-x-6 mt-12.5">

                <li class="relative group m:w-1/2">
                    <div class="aspect-[1.2] overflow-hidden">
                        <img class="size-full object-cover group-hover:scale-105 animation"
                        :src="card.src" :alt="card.alt" draggable="false">
                    </div>
                    <div class=" absolute w-[88%] h-[15.125rem] flex flex-col justify-between z-10 top-[90%] bg-surface-raised p-4 3xs:p-5">
                        <div class="flex items-center gap-x-2">
                            <span class="w-6 h-0.5 bg-main"></span>
                            <span class="text-text-heading" x-text="card.type"></span>
                        </div>
                        <h3 class="line-clamp-3 text-2xl xs:text-[28px] leading-[1.2]"></h3>
                        <div class="max-md:text-sm text-text-quiet flex gap-x-2 mt-2.5">
                            <time :datetime="2021-03-25">March 25, 2021</time>
                            <span>&#8226;</span>
                            {{-- <p>
                                {{$post['layout_settings']['time_to_read']}}
                            </p> --}}
                        </div>
                        <a :href="card.href" title="Arcticle" class="flex items-center mt-5 gap-x-2 text-text-heading group-hover:text-main animation">
                            Read Arcticle
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </li>

        </ul>
    </div>
</section>
