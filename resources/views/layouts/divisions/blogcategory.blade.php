@name('divisions/blogs_categories')
@schema([
    'heading: text',
    'heading: text',
])

<section class="pt-37.5 pb-25 bg-surface-raised">
    <div class="container">
        <h1 class="text-4xl text-center mb-7.5">
            ‘Travel’ here’s what we’ve got
        </h1>
        <form action="" class="flex flex-col xs:flex-row justify-center gap-2">
            <label for="search" class="hidden"></label>
            <div class="relative max-w-188 h-16.5 w-full bg-surface-default">
                <input id="search" type="text" placeholder="Travel" class="pl-17 size-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 absolute left-7.5 -translate-y-1/2 top-1/2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>
            <button class="h-16.5 center px-10 btn animation" type="button">
                Search
            </button>
        </form>
    </div>
</section>
<section x-data="section4" class="pt-25 pb-70">
    <div class="container">
        <ul class="grid grid-cols-1 m:grid-cols-2 justify-between gap-y-55 gap-x-6">
            <template x-for="card in cards">
                <li class="relative group ">
                    <div class="aspect-[1.2] overflow-hidden">
                        <img class="size-full object-cover group-active-hover:scale-105 animation"
                        :src="card.src" :alt="card.alt" draggable="false">
                    </div>
                    <div class="absolute w-[88%] h-[15.125rem] flex flex-col justify-between z-10 top-[90%] bg-surface-raised p-4 3xs:p-5">
                        <div class="flex items-center gap-x-2">
                            <span class="w-6 h-0.5 bg-main"></span>
                            <span class="text-text-heading" x-text="card.type"></span>
                        </div>
                        <h3 x-text="card.heading" class="line-clamp-3 text-2xl xs:text-[28px] leading-[1.2]"></h3>
                        <div class="text-text-quiet flex gap-x-2 mt-2.5">
                            <time x-text="card.date" :datetime="2021-03-25">March 25, 2021</time>
                            <span>&#8226;</span>
                            <p x-text="`${card.time} min read`">пр</p>
                        </div>
                        <a :href="card.href" title="Arcticle" class="flex items-center mt-5 gap-x-2 text-text-heading group-active-hover:text-main animation">
                            Read Arcticle
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </li>
            </template>

        </ul>
    </div>
</section>

                {{--
                "src": "https://media.npr.org/assets/img/2023/03/01/npr-news-now_square.webp?s=1000&c=85",
                "atl": "News",
                "type": "Traveling",
                "heading": "Top 10 beautiful Place in Bangladesh",
                "date": "March 25, 2021",
                "datetime": "2021-03-25",
                "time": "4",
                "href": "/blog"
            },
                "src": "https://akns-images.eonline.com/eol_images/Entire_Site/202424/rs_1920x960-240304141851-E_News_2024_Digital_EOL_Banner_1920x960.jpg?fit=around%7C1384:692&output-quality=90&crop=1384:692;center,top",
                "atl": "News",
                "type": "Traveling",
                "heading": "Traveling with Kids: Top Tips for Stress-Free Adventures",
                "date": "January 13, 2025",
                "datetime": "2025-01-13",
                "time": "4",
                "href": "/blog"
            },
                "src": "https://media.npr.org/assets/img/2023/03/01/npr-news-now_square.webp?s=1000&c=85",
                "atl": "News",
                "type": "Traveling",
                "heading": "Top 10 beautiful Place in Bangladesh",
                "date": "March 25, 2021",
                "datetime": "2021-03-25",
                "time": "4",
                "href": "/blog"
            },
                "src": "https://akns-images.eonline.com/eol_images/Entire_Site/202424/rs_1920x960-240304141851-E_News_2024_Digital_EOL_Banner_1920x960.jpg?fit=around%7C1384:692&output-quality=90&crop=1384:692;center,top",
                "atl": "News",
                "type": "Traveling",
                "heading": "Traveling with Kids: Top Tips for Stress-Free Adventures",
                "date": "January 13, 2025",
                "datetime": "2025-01-13",
                "time": "4",
                "href": "/blog" --}}

        {{-- @foreach ($page->categories->paginate(15) as $category)
            <article class="p-3 sm:p-5 flex flex-col items-center gap-3 sm:gap-4 border-border/70 border group shadow-none shadow-accent/70 hover:shadow-md transition-all">
                <x-kit-link :options="$category->url" class="aspect-[1.5] w-full overflow-hidden  cursor-pointer">
                    <x-kit-image :options="$category->image" class="size-full object-cover group-hover:scale-105 transition-all duration-500"/>
                </x-kit-link>
                <h3 class="font-heading text-main text-center text-base sm:text-lg leading-[1.25] group-hover:text-accent transition-all">
                    <x-kit-link :options="$category->url">
                        {{$category->heading}}
                    </x-kit-link>
                </h3>
                <p class="text-sm sm:text-base line-clamp-3 h-14.5 sm:h-17.5">
                    {{$category->description}}
                </p>
            </article>
        @endforeach --}}
