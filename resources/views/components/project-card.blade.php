@props(['title', 'category', 'description', 'techStack' => []])

<div class="min-w-[85vw] sm:min-w-[400px] snap-center bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col">
    <div class="h-48 bg-gray-50 relative border-b border-gray-100">
        <div class="absolute inset-0 flex items-center justify-center text-gray-300">
            <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
        </div>
        <span class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 text-xs font-bold text-blue-600 rounded-full uppercase tracking-wide">
            {{ $category }}
        </span>
    </div>
    
    <div class="p-6 flex-grow flex flex-col">
        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $title }}</h3>
        <p class="text-gray-600 text-sm mb-6 flex-grow">{{ $description }}</p>
        
        <div class="flex flex-wrap gap-2 mt-auto">
            @foreach($techStack as $tech)
                <span class="px-2 py-1 bg-gray-50 text-gray-600 text-xs rounded border border-gray-200">
                    {{ $tech }}
                </span>
            @endforeach
        </div>
    </div>
</div>