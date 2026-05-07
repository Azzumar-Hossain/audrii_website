@props(['setting'])

<div class="relative bg-gray-900 text-white py-24 sm:py-32 bg-cover bg-center"
     @if(!empty($setting) && $setting->hero_image) 
        style="background-image: url('{{ asset('storage/' . $setting->hero_image) }}');" 
     @endif>
    
    @if(!empty($setting) && $setting->hero_image)
        <div class="absolute inset-0 bg-gray-900/80"></div>
    @endif

    <div class="relative z-10 mx-auto max-w-7xl px-6 lg:px-8 text-center">
        
        <h1 class="text-4xl font-extrabold tracking-tight sm:text-6xl text-white">
            {!! $setting->hero_title ?? 'Engineering Digital Innovation <br> & Retail Excellence' !!}
        </h1>
        
        <p class="mt-6 text-lg leading-8 text-gray-300 max-w-3xl mx-auto whitespace-pre-line">
            {{ $setting->hero_subtitle ?? 'A premier technology and brand management firm. We design resilient software architectures and operate high-growth eCommerce ventures, delivering uncompromising quality across both digital and retail landscapes.' }}
        </p>
        
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="{{ $setting->hero_button_link ?? '#it-solutions' }}" class="rounded-md bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-all">
                {{ $setting->hero_button_text ?? 'Explore IT Solutions' }}
            </a>
            
            <a href="#ecommerce" class="text-sm font-semibold leading-6 text-white hover:text-gray-300 transition-all">
                View eCommerce Operations <span aria-hidden="true">→</span>
            </a>
        </div>
        
    </div>
</div>