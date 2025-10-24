@name('categories')
@schema([
    'heading: text',
    'categories: array',
    'categories.*.image: image',
    'categories.*.link: link',
    'read_text_button: text',

])
<section class="pt-15 sm:pt-20 pb-70 container px-5 mx-auto">
    <h1 class="text-3xl sm:text-5xl lg:text-5xl leading-[1.2] mb-10">
        {{ $heading }}
    </h1>
    <ul class="grid md:grid-cols-2 lg:grid-cols-3 justify-between gap-y-62 gap-x-6">
        @foreach($categories as $category)
            <li class="relative group ">
                <div class="aspect-[1.2] overflow-hidden">
                    <x-kit-image :options=" $category['image'] " class="size-full object-cover group-hover:scale-105 animation"/>
                </div>
                <div class="absolute w-9/10  h-auto flex flex-col justify-between z-10 top-[90%] left-1/2 -translate-x-1/2 bg-surface-raised p-4 sm:p-5">
                    <h3 class="line-clamp-3 text-xl sm:text-2xl leading-[1.2] hover:text-main animation">
                        <x-kit-link :options="$category['link']" class="">
                            {{ $category['link']['title'] }}
                        </x-kit-link>
                    </h3>
                    <x-kit-link :options="$category['link']" class="flex items-center mt-3 gap-x-2 text-text-heading group hover:text-main animation">
                        {{$read_text_button}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 group-hover:translate-x-1 animation">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </x-kit-link>
                </div>
            </li>
        @endforeach
    </ul>
</section>
