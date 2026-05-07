@extends('layouts.app')

@php
    $pageTitle = "Custom Software Development";
@endphp

@section('title', $pageTitle . ' | CorporateBrand')

@section('content')

    <section class="bg-gray-900 py-16 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">
                {{ $pageTitle }}
            </h1>
            <div class="mt-4 flex items-center text-sm text-gray-400">
                <a href="/" class="hover:text-red-500 transition-colors">Home</a>
                <span class="mx-2">/</span>
                <a href="/services" class="hover:text-red-500 transition-colors">Services</a>
                <span class="mx-2">/</span>
                <span class="text-gray-200">{{ $pageTitle }}</span>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-12 lg:gap-20">
            
            <div class="lg:w-2/3">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Tailored solutions for complex business needs.</h2>
                
                <div class="prose prose-lg text-gray-700 leading-relaxed max-w-none">
                    <p class="mb-6">
                        Off-the-shelf software rarely fits the unique operational requirements of growing businesses. We architect custom software from the ground up, ensuring deep integration with your existing workflows and complete scalability for the future.
                    </p>
                    <p class="mb-6">
                        Our engineering team utilizes modern, robust frameworks to build systems that are not just functional, but secure and blazing fast. We handle the entire lifecycle—from requirements gathering and wireframing to coding, testing, and deployment.
                    </p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-10 mb-4">Core Technologies We Utilize:</h3>
                    <ul class="space-y-3 mb-8 list-none pl-0">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-red-600 mr-2 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span><strong>PHP Laravel:</strong> For secure, robust backend systems.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-red-600 mr-2 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span><strong>Flutter & Dart:</strong> For native-feeling cross-platform applications.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-red-600 mr-2 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span><strong>MySQL & Database Optimization:</strong> For high-traffic data integrity.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="lg:w-1/3">
                <div class="bg-gray-50 border border-gray-200 p-8 rounded-xl sticky top-32">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Ready to start your project?</h3>
                    <p class="text-sm text-gray-600 mb-6">
                        Speak directly with our technical team to discuss your architecture requirements, timelines, and deployment strategy.
                    </p>
                    <a href="/contact" class="block w-full text-center bg-red-600 text-white font-bold py-3.5 rounded hover:bg-red-700 transition-colors uppercase tracking-wide text-sm">
                        Consult With An Engineer
                    </a>
                    
                    <hr class="my-8 border-gray-200">
                    
                    <h4 class="text-sm font-bold text-gray-900 uppercase tracking-widest mb-4">Other Services</h4>
                    <div class="space-y-3 text-sm">
                        <a href="/services/web-application" class="block text-gray-600 hover:text-red-600 transition-colors">Web Application Development &rarr;</a>
                        <a href="/services/mobile-application" class="block text-gray-600 hover:text-red-600 transition-colors">Mobile Application Development &rarr;</a>
                        <a href="/services/hosting" class="block text-gray-600 hover:text-red-600 transition-colors">Hosting Service &rarr;</a>
                        <a href="/services/e-commerce" class="block text-gray-600 hover:text-red-600 transition-colors">E-Commerce &rarr;</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection