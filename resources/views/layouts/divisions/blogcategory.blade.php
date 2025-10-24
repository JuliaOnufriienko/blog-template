@name('divisions/blogs_categories')
@schema([
    'heading: text',
    'search_text_button: text',
    'input_text: text',
    'read_text_button: text',
])
    @php
        $items = $page->items->paginate(12);
    @endphp
<section class="pt-37 pb-25 bg-surface-raised">
    <div class="container px-5 mx-auto">
        <h1 class="text-4xl text-center mb-7.5">
            {{$heading}}
        </h1>
        <form action="" class="flex flex-col sm:flex-row w-full justify-center gap-2">
            <label for="search" class="hidden"></label>
            <div class="relative max-w-188 h-16.5 w-full bg-surface-default">
                <input id="search" type="text" placeholder="{{$input_text}}" class="pl-17 size-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 absolute left-7.5 -translate-y-1/2 top-1/2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>
            <button class="h-16.5 center px-10 font-semibold btn animation" type="button">
                {{$search_text_button}}
            </button>
        </form>
    </div>
</section>
<section class="pt-25 pb-70">
    <div class="container px-5 mx-auto">
        <ul class="grid md:grid-cols-3 justify-between gap-y-55 gap-x-6">
            @foreach($items as $item)
                <li class="relative group ">
                    <div class="aspect-[1.2] overflow-hidden">
                        <x-kit-image :options=" $item->image " class="size-full object-cover group-hover:scale-105 animation"/>
                    </div>
                    <div class="absolute w-[88%] h-60.5 flex flex-col justify-between z-10 top-[90%] bg-surface-raised p-4 sm:p-5">
                        <div class="flex items-center gap-x-2">
                            <span class="w-6 h-0.5 bg-main"></span>
                            <span class="text-text-heading">
                                {{$item->parent->name}}
                            </span>
                        </div>
                        <h3 class="line-clamp-3 text-xl sm:text-2xl leading-[1.2] hover:text-main animation">
                            <x-kit-link :options="$item->url" class="">
                                {{ $item->title }}
                            </x-kit-link>
                        </h3>
                        <div class="text-text-quiet max-md:text-sm flex gap-x-2 mt-2.5">
                            <time datetime="{{ $item->updated_at->format('Y.m.d') }}">
                                {{ $item->updated_at->format('m.d.Y') }}
                            </time>
                            <span>&#8226;</span>
                            <p>
                                {{$item['layout_settings']['time_to_read']}}
                            </p>
                        </div>
                        <x-kit-link :options="$item->url" class="flex items-center mt-3 gap-x-2 text-text-heading hover:text-main animation">
                            {{$read_text_button}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </x-kit-link>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
