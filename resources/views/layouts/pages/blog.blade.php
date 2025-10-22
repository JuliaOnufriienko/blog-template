@name('blog')
@schema([
    'background_image: image',
    'author_image: image',
    'author_name: link',
    'time_to_read: text',
    'author_socials: socials',
    'likes: text',
    'comments: text',
    'button_text: text',
    'share_text: text',
    'socials: socials',
])
@php
    $category = $page['parent'] ?? null;
    $items = $category ? \SmartCms\Kit\Models\Front\FrontPage::whereParentId($category['id'])->get() : collect();
@endphp
<section class="relative z-30">
    <div class="w-full ">
        <x-kit-image :options="$background_image" class="size-full object-cover"/>
    </div>
    <div class="absolute w-full -bottom-34">
        <div class="container drop-shadow-lg h-full mx-auto bg-surface-default p-4 sm:p-10">
            <div class="flex items-center gap-x-2">
                <span class="w-6 h-0.5 bg-main"></span>
                <span class="text-text-heading">
                    {{$page->parent->name}}
                </span>
            </div>
            <h1 class="text-3xl sm:text-5xl lg:text-5xl leading-[1.2]">
                {{ $page->title }}
            </h1>
            <div class="flex flex-col lg:flex-row items-center gap-y-3 mt-5 justify-between">
                <div class="flex items-center gap-x-3 sm:gap-x-4 text-center max-xs:text-xs text-text-quiet">
                    <div class="flex flex-row items-center gap-x-2">
                        <div class="max-sm:hidden size-10 rounded-full overflow-hidden">
                            <x-kit-image :options="$author_image" class="size-full object-cover"/>
                        </div>
                        <x-kit-link :options="$author_name" class="ext-text-heading leading-1.5 text-center hover:opacity-80 animation"></x-kit-link>
                    </div>
                    <span class="">&#8226;</span>
                    <time :datetime="{{ $page->updated_at->format('d.m.Y') }}">
                        {{ $page->updated_at->format('m.d.Y') }}
                    </time>
                    <span>&#8226;</span>
                    <p>{{$time_to_read}}</p>
                </div>
                <div class="flex items-center gap-x-3">
                    @foreach($author_socials as $social)
                        <x-kit-link :options="$social['url']" class="size-10 rounded-full bg-surface-raised center text-text-heading hover:shadow-md animation">
                            {{$social['icon']}}
                        </x-kit-link>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-58.5 mb-12.5">
    <div class="container mx-auto flex flex-col lg:flex-row items-start gap-x-20 justify-between">
        <div class="w-45.5 flex flex-row lg:flex-col gap-8.5 mb-4">
            <a href="#" title="Likes" class="flex gap-1 group">
                <div class="text-main mr-1 group-hover:text-text-heading animation">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.49997 18.9999H2.79999C2.3226 18.9999 1.86477 18.8102 1.5272 18.4727C1.18964 18.1351 1 17.6773 1 17.1999V10.8999C1 10.4226 1.18964 9.96472 1.5272 9.62715C1.86477 9.28959 2.3226 9.09995 2.79999 9.09995H5.49997M11.7999 7.29996V3.69998C11.7999 2.9839 11.5155 2.29715 11.0091 1.79081C10.5028 1.28446 9.81603 1 9.09995 1L5.49997 9.09995V18.9999H15.6519C16.086 19.0048 16.5072 18.8527 16.838 18.5715C17.1688 18.2903 17.3868 17.8991 17.4519 17.4699L18.6939 9.36995C18.733 9.11197 18.7156 8.84856 18.6429 8.59798C18.5701 8.34739 18.4438 8.11562 18.2726 7.91872C18.1013 7.72182 17.8894 7.5645 17.6513 7.45765C17.4133 7.35081 17.1548 7.29701 16.8939 7.29996H11.7999Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <p class="text-nowrap">
                    {{$likes}}
                </p>
            </a>
            <a href="#" title="Likes" class="flex gap-1 group">
                <div class="text-main mr-1 group-hover:text-text-heading animation">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 13C19 13.5304 18.7893 14.0391 18.4142 14.4142C18.0391 14.7893 17.5304 15 17 15H5L1 19V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H17C17.5304 1 18.0391 1.21071 18.4142 1.58579C18.7893 1.96086 19 2.46957 19 3V13Z" fill="white" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <p class="text-nowrap">{{$comments}}</p>
            </a>
        </div>
        <div class="">
            <article class="prose">
                {!!$page->content!!}
            </article>
            <div class="py-16 sm:py-20 border-y border-surface-raised">
                <div class="mx-auto max-w-175 w-full flex flex-col gap-y-3 md:flex-row justify-between items-center">
                    <button aria-label="{{$button_text}}" class="max-w-82 w-full h-13 center gap-x-2.5 font-medium leading-1.25 btn animation">
                        <svg width="20" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.14304 18.9999H3.44305C2.96567 18.9999 2.50783 18.8102 2.17027 18.4727C1.83271 18.1351 1.64307 17.6773 1.64307 17.1999V10.8999C1.64307 10.4226 1.83271 9.96472 2.17027 9.62715C2.50783 9.28959 2.96567 9.09995 3.44305 9.09995H6.14304M12.443 7.29996V3.69998C12.443 2.9839 12.1585 2.29715 11.6522 1.79081C11.1458 1.28446 10.4591 1 9.74301 1L6.14304 9.09995V18.9999H16.295C16.7291 19.0048 17.1503 18.8527 17.4811 18.5715C17.8119 18.2903 18.0299 17.8991 18.095 17.4699L19.337 9.36995C19.3761 9.11197 19.3587 8.84856 19.286 8.59798C19.2132 8.34739 19.0868 8.11562 18.9156 7.91872C18.7444 7.72182 18.5324 7.5645 18.2944 7.45765C18.0563 7.35081 17.7979 7.29701 17.537 7.29996H12.443Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        {{$button_text}}
                    </button>
                    <div class="flex items-center gap-x-4">
                        <p class="text-text-heading">
                            {{-- Share the Post: --}}
                            {{$share_text}}
                        </p>
                        @foreach($socials as $social)
                            <x-kit-link :options="$social['url']" class="size-10 rounded-full bg-surface-raised center text-text-heading hover:shadow-md animation">
                                {{$social['icon']}}
                            </x-kit-link>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section x-data="blog" class="pt-21 pb-70">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <div class="flex flex-col gap-y-2.5">
                <h2 class="text-3xl">
                    You May Also Like
                </h2>
                <div class="h-1 w-28 bg-main"></div>
            </div>
            <a href="/blogs" title="View All" class="font-semibold text-right text-text-heading hover:text-text-quiet animation">
                View All
            </a>
        </div>
        <div class="grid grid-cols-3 justify-between gap-y-55 gap-x-6 mt-12">
            @foreach ($items as $item)
                @if (!empty($item['layout_settings']['heading']) && $item['id'] !== $page['id'])
                    <article class="relative group">
                        <x-kit-link :options="$item->url" class="aspect-[1.2] overflow-hidden cursor-pointer">
                            <x-kit-image :options="$item->image" class="size-full object-cover group-hover:scale-105 animation"/>
                        </x-kit-link>
                        <div class=" absolute w-[88%] h-60.5 flex flex-col justify-between z-10 top-[90%] bg-surface-raised p-4 3xs:p-5">
                            <div class="flex items-center gap-x-2">
                                <span class="w-6 h-0.5 bg-main"></span>
                                <span class="text-text-heading">
                                    {{$item->parent->name}}
                                </span>
                            </div>
                            <h3 class="line-clamp-3 text-2xl sm:text-3xl leading-[1.2]">
                                {{ $item['heading'] }}
                            </h3>
                            <div class="text-text-quiet flex gap-x-2 mt-2.5">
                                <time :datetime="{{ $item->updated_at->format('Y.m.d') }}">
                                    {{ $item->updated_at->format('m.d.Y') }}
                                </time>
                                <span>&#8226;</span>
                                <p>
                                    {{$item->time_to_read}}
                                </p>
                            </div>
                            <x-kit-link :options="$item->url" class="flex items-center mt-5 gap-x-2 text-text-heading group-hover:text-main animation">
                                {{$$item->url}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                </svg>
                            </x-kit-link>
                        </div>
                    </article>
                @endif
            @endforeach
        </div>
    </div>
</section>
<section class="container max-w-218.75 w-full mx-auto">
    <div class="mb-15 sm:mb-17.5">
        <h2 class="text-3xl mb-6">
            Leave a Comment
        </h2>
        <form action="comment" class="flex flex-col gap-3 sm:gap-y-6">
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-6">
                <label for="name" class="hidden"></label>
                <input type="text" id="name" placeholder="Your name" class="pl-6.5 h-14 sm:w-1/2 bg-surface-raised focus:ring-0 outline-main">
                <label for="email" class="hidden"></label>
                <input type="email" id="email" placeholder="Your email" class="pl-6.5 h-14 sm:w-1/2 bg-surface-raised focus:ring-0 outline-main">
            </div>
            <label for="comment" class="hidden"></label>
            <textarea type="text" id="comment" placeholder="Your Comments" rows="4" class="pl-6.5 py-4.5 bg-surface-raised focus:ring-0 outline-main"></textarea>
            <button type="submit" class="ml-auto center h-12 px-7.25 font-medium btn animation">
                Post Commnent
            </button>
        </form>
    </div>
    <div class="">
        <h2 class="text-3xl mb-8">
            Comments
            <span class="font-normal text-text-quiet">(02)</span>
        </h2>
        <div class="text-text-quiet py-6 border-b border-border">
            <div class="flex items-center gap-x-3.25 mb-3">
                <div class="size-10 rounded-full overflow-hidden">
                    <img src="https://plus.unsplash.com/premium_photo-1669343628944-d0e2d053a5e8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW5zdGFncmFtJTIwcHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D"
                    alt="Profile image" class="size-full object-cover" draggable="false">
                </div>
                <div class="">
                    <p class="font-medium text-text-heading">
                        Kevin
                    </p>
                    <p >
                        <span>2</span> hours ago
                    </p>
                </div>
            </div>
            <p class="leading-1.55">
                Donec pellentesque luctus tortor finibus blandit. Fusce tincidunt lectus augue, quis commodo justo tincidunt eget. Praesent at elit diam.
            </p>
        </div>
        <div class="text-text-quiet py-6 border-b border-border">
            <div class="flex items-center gap-x-3.25 mb-3">
                <div class="size-10 rounded-full overflow-hidden">
                    <img src="https://plus.unsplash.com/premium_photo-1669343628944-d0e2d053a5e8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW5zdGFncmFtJTIwcHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D"
                    alt="Profile image" class="size-full object-cover" draggable="false">
                </div>
                <div class="">
                    <p class="font-medium text-text-heading">
                        Kevin
                    </p>
                    <p >
                        <span>2</span> hours ago
                    </p>
                </div>
            </div>
            <p class="leading-1.55">
                Donec pellentesque luctus tortor finibus blandit. Fusce tincidunt lectus augue, quis commodo justo tincidunt eget. Praesent at elit diam.
            </p>
        </div>
    </div>
    <div class="mt-6 mb-17.5">
        <h2 class="text-3xl mb-6">
            Write a Replay
        </h2>
        <form action="comment" class="flex flex-col gap-3 sm:gap-y-6">
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-6">
                <label for="name" class="hidden"></label>
                <input type="text" id="name" placeholder="Your name" class="pl-6.5 h-14 sm:w-1/2 bg-surface-raised focus:ring-0 outline-main">
                <label for="email" class="hidden"></label>
                <input type="email" id="email" placeholder="Your email" class="pl-6.5 h-14 sm:w-1/2 bg-surface-raised focus:ring-0 outline-main">
            </div>
            <label for="comment" class="hidden"></label>
            <textarea type="text" id="comment" placeholder="Your Comments" rows="4" class="pl-6.5 py-4.5 bg-surface-raised focus:ring-0 outline-main"></textarea>
            <button type="submit" class="ml-auto center h-12 px-7.25 font-medium btn animation">
                Post Commnent
            </button>
        </form>
    </div>
</section>
