@name('hero')
@schema([
    'background_image: image',
    'slides: array',
    'slides.*.category: text',
    'slides.*.heading: text',
    'slides.*.time: text',
    // 'slides.*.image: image',
    // 'slides.*.description: text',
    // 'text_button: text'
])
<section class="relative md:h-[calc(100dvh-120px)]">
    <!-- slider -->
    <div class="md:w-3/4 inline-block md:absolute inset-y-0 right-0">
        {{-- <img src="https://dengi.bm.img.com.ua/dengi/orig/9/68/df958bc1d296d0bce3981c9798d6c689.jpg" alt="Traveling" class="size-full object-cover" draggable="false"> --}}+
        <x-kit-image :options="$background_image" class="w-full object-contain"/>
    </div>
    <div class="container mx-auto md:absolute top-1/2 -translate-y-1/8 md:-translate-y-1/2 md:left-1/2 md:-translate-x-1/2">
        <div class="mx-5 md:mx-0 md:w-3/4 lg:w-162.5 z-20 top-1/2 md:-bottom-1/5 embla">
            <div class="bg-surface-default p-6 sm:py-14.5 sm:px-10 drop-shadow-2xl embla__viewport">
                <div class="embla__container">
                    @foreach ($slides as $slide)
                    <div class="embla__slide">
                        <div class="flex items-center gap-x-2">
                            <span class="w-6 h-0.5 bg-main"></span>
                            <span class="text-text-heading ">
                                {{-- Traveling --}}
                                {{$slide['category']}}
                            </span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl leading-[1.2]">
                            {{-- Traveling with Kids: Top Tips for Stress-Free Adventures --}}
                            {{$slide['heading']}}
                        </h1>
                        <div class="text-text-quiet max-sm:text-sm flex gap-x-2 mt-3">
                            <time datetime="2021-03-25">
                                {{-- March 25, 2021 --}}
                                {{$slide['time']}}
                            <span>&#8226;</span>
                            <p>4 min read</p>
                        </div>
                        <p class="line-clamp-2 mt-2.5">
                            Traveling with kids may seem challenging, but it can be an enjoyable experience with the right preparation. The key to success lies in planning and keeping your little ones engaged throughout the trip.
                            Start by choosing a destination that offers family-friendly activities. Beach resorts, amusement parks, or cities with interactive museums are great options. Ensure the accommodation is comfortable and provides child-friendly amenities, such as cribs or play areas.
                            Packing smart is crucial. Bring essentials like snacks, toys, and a first aid kit. Don’t forget to include a few new surprises to keep the kids entertained during long flights or drives. A lightweight stroller or baby carrier can also make exploring easier.
                            Flexibility is your best friend while traveling with children. Expect some delays or changes in plans and prioritize downtime to avoid overstimulation. Plan activities around their nap schedules and include breaks for snacks or playtime.
                            Lastly, involve your kids in the trip planning process. Let them choose a place to visit or an activity they’d like to try. This creates excitement and keeps them looking forward to the adventure.
                            With a little preparation and patience, traveling with kids can become a treasured family memory filled with joy, laughter, and new experiences.
                        </p>
                        <a href="/blog" title="Read more" class="mt-6.5 block h-12 center max-w-36.25 w-full font-medium leading-1.5 btn animation">
                            Read More
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex mt-5 sm:mt-10 items-center gap-x-5 embla__controls">
                <div class="embla__buttons">
                    <button type="button" class="embla__button embla__button--prev drop-shadow-lg group hover:drop-shadow-xl animation text-text-heading size-10 sm:size-13.5 center bg-surface-default rounded-full">
                        <svg width="24" height="24" class="group-hover:scale-110 animation" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 5L8 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>

                    <button type="button" class="embla__button embla__button--nextdrop-shadow-lg group hover:drop-shadow-xl animation text-text-heading size-10 sm:size-13.5 center bg-surface-default rounded-full">
                        <svg class="group-hover:scale-110 animation" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 19L16 12L9 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
