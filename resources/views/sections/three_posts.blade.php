@name('three_posts')
@schema([
    'heading: text',
    'latest_posts:latest_items',
    'text_button: text'
])
<section class="py-24 container mx-auto">
    <div class="flex flex-col gap-y-2.5">
        <h2 class="text-4xl">
            {{-- Recent Post --}}
            {{$heading}}
        </h2>
        <div class="h-1 w-28 bg-main"></div>
    </div>
    <ul class="grid grid-cols-3 gap-6 w-full">
        {{-- <template x-for="card in cards"> --}}
        @foreach($latest_posts as $post)
            <li class=" bg-surface-raised/50 flex flex-col group justify-between p-6 group hover:bg-surface-raised animation">
                <div class="flex items-center gap-x-2">
                    <span class="w-6 h-0.5 bg-main"></span>
                    <span class="text-text-heading">
                        {{$post->parent->name}}
                    </span>
                </div>
                <h3 class="line-clamp-3 text-2xl sm:text-[28px] leading-[1.2] hover:text-main animation">
                    <x-kit-link :options="$post->url" class="">
                        {{ $post->title }}
                    </x-kit-link>
                </h3>
                <div class="text-text-quiet flex gap-x-2 mt-2.5">
                    <time x-text="card.date" datetime="{{ $post->updated_at->format('Y.m.d') }}">
                        {{ $post->updated_at->format('m.d.Y') }}
                    </time>
                    <span>&#8226;</span>
                    <p>
                        {{$post['layout_settings']['time_to_read']}}
                    </p>
                </div>
                <p class="line-clamp-2 mt-2">
                    {{ $post->summary }}
                </p>
                <x-kit-link :options="$post->url" class="flex items-center mt-5 gap-x-2 text-text-heading group group-hover:text-main animation">
                    {{$text_button}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 group-hover:translate-x-1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                </x-kit-link>
            </li>
        @endforeach
        {{-- </template> --}}
    </ul>
</section>
