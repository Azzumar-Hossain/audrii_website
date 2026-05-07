<header class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-5 lg:px-8" aria-label="Global">
        
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5 text-2xl font-extrabold text-gray-900 tracking-tight">
                Corporate<span class="text-red-600">Brand</span>
            </a>
        </div>
        
        <div class="hidden lg:flex lg:gap-x-8 items-center">
            
            <a href="/" class="text-sm font-semibold leading-6 py-2 transition-colors border-b-2 {{ request()->is('/') ? 'text-red-600 border-red-600' : 'text-gray-700 border-transparent hover:text-red-600' }}">
                Home
            </a>

            <a href="/about" class="text-sm font-semibold leading-6 py-2 transition-colors border-b-2 {{ request()->is('about') ? 'text-red-600 border-red-600' : 'text-gray-700 border-transparent hover:text-red-600' }}">
                About Us
            </a>
            
            <div class="relative group">
                <a href="/services" class="text-sm font-semibold leading-6 py-2 transition-colors border-b-2 inline-flex items-center gap-1 {{ request()->is('services*') ? 'text-red-600 border-red-600' : 'text-gray-700 border-transparent hover:text-red-600' }}">
                    Services
                    <svg class="w-4 h-4 transition-colors {{ request()->is('services*') ? 'text-red-600' : 'text-gray-400 group-hover:text-red-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>

                <div class="absolute left-0 mt-0 w-72 bg-[#F9F9F9] shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border border-gray-100">
                    <a href="/services/custom-software" class="block px-6 py-4 text-sm text-gray-700 hover:bg-red-600 hover:text-white transition-colors border-b border-gray-200">
                        Custom Software Development
                    </a>
                    <a href="/services/web-application" class="block px-6 py-4 text-sm text-gray-700 hover:bg-red-600 hover:text-white transition-colors border-b border-gray-200">
                        Web Application Development
                    </a>
                    <a href="/services/mobile-application" class="block px-6 py-4 text-sm text-gray-700 hover:bg-red-600 hover:text-white transition-colors border-b border-gray-200">
                        Mobile Application Development
                    </a>
                    <a href="/services/hosting" class="block px-6 py-4 text-sm text-gray-700 hover:bg-red-600 hover:text-white transition-colors border-b border-gray-200">
                        Hosting Service
                    </a>
                    <a href="/services/e-commerce" class="block px-6 py-4 text-sm text-gray-700 hover:bg-red-600 hover:text-white transition-colors">
                        E-Commerce
                    </a>
                </div>
            </div>

            <a href="/contact" class="text-sm font-semibold leading-6 py-2 transition-colors border-b-2 {{ request()->is('contact') ? 'text-red-600 border-red-600' : 'text-gray-700 border-transparent hover:text-red-600' }}">
                Contact
            </a>

        </div>
    </nav>
</header>