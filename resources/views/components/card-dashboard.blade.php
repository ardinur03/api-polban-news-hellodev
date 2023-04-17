@props(['title', 'logo', 'link' => '#'])

<div>
    <a href="{{ $link }}">
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg hover:bg-gray-50 transition duration-300">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-medium">{{ $title }}</h2>

                @isset($logo)
                    {{ $logo }}
                @else
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"></path>
                    </svg>
                @endisset
            </div>
            <p class="text-gray-600">{{ $slot }}</p>
        </div>
    </a>
</div>
