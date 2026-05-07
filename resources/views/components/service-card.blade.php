@props(['title', 'description'])

<div class="group relative p-8 bg-white border border-gray-200 hover:border-red-600 transition-all duration-300 shadow-sm hover:shadow-xl rounded-2xl overflow-hidden flex flex-col h-full">
    <div class="w-14 h-14 bg-red-50 text-red-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
        {{ $slot }}
    </div>
    
    <h3 class="text-xl font-extrabold text-gray-900 mb-3 tracking-tight group-hover:text-red-600 transition-colors">{{ $title }}</h3>
    
    <p class="text-gray-600 leading-relaxed text-sm flex-grow">
        {{ $description }}
    </p>
    
    <div class="absolute bottom-0 left-0 h-1 bg-red-600 w-0 group-hover:w-full transition-all duration-500"></div>
</div>