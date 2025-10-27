@name('grid_posts')
@schema([
    'heading: text',
    'featured_posts: popular_items',
    'text_button: text'
])
<section class="bg-surface-raised pt-25 pb-80">
    <div class="container mx-auto px-5">
        <div class="flex flex-col gap-y-2.5">
            <h2 class="text-4xl">
                Latest Post
            </h2>
            <div class="h-1 w-28 bg-main"></div>
        </div>
        <ul class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-6 gap-y-60 mt-12">
            @foreach($featured_posts as $post)
                <li class="relative group">
                    <div class="aspect-[1.2] overflow-hidden">
                        <x-kit-image :options="$post->image " class="size-full object-cover group-hover:scale-105 animation"/>
                    </div>
                    <div class="absolute w-[95%] sm:h-60.5 flex flex-col justify-between z-10 top-[90%] bg-surface-default p-4 sm:p-5">
                        <div class="flex items-center gap-x-2 mb-2">
                            <span class="w-6 h-0.5 bg-main"></span>
                            <span class="text-text-heading">
                                {{$post->parent->name}}
                            </span>
                        </div>
                        <h3 x-text="card.heading" class="line-clamp-3 text-2xl lg:text-3xl leading-[1.2] hover:text-main animation">
                            <x-kit-link :options="$post->url" class="">
                                {{ $post->title }}
                            </x-kit-link>
                        </h3>
                        <div class="max-md:text-sm text-text-quiet flex gap-x-2 mt-2.5">
                            <time x-text="card.date" datetime="{{ $post->updated_at->format('Y.m.d') }}">
                                {{ $post->updated_at->format('m.d.Y') }}
                            </time>
                            <span>&#8226;</span>
                            {{-- <p>
                                {{$post['layout_settings']['time_to_read']}}
                            </p> --}}
                        </div>
                        <x-kit-link :options="$post->url" class="flex items-center mt-5 gap-x-2 text-text-heading group hover:text-main animation">
                            {{$text_button}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 group-hover:translate-x-1.5 animation">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </x-kit-link>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
