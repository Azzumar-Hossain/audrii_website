@extends('layouts.app')

@section('title', 'Home | ' . config('app.name'))

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    /* --- GLOBAL VARIABLES & RESET --- */
    :root {
        --bg-dark: #0f1016;
        --bg-light: #ffffff;
        --brand-accent: #FF0000;       /* Replaced Purple with Red */
        --brand-accent-light: #ff3333; /* Slightly lighter red for hovers */
        --text-main: #111827;
        --text-muted: #6b7280;
        --text-light: #ffffff;
        --border-color: #e5e7eb;
    }

    body {
        background-color: var(--bg-light);
        color: var(--text-main);
        line-height: 1.6;
    }

    .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
    .section { padding: 80px 0; }
    .text-center { text-align: center; }
    .section-title { font-size: 2.5rem; font-weight: 700; margin-bottom: 15px; text-transform: uppercase; }
    .section-desc { color: var(--text-muted); max-width: 700px; margin: 0 auto 50px auto; font-size: 1.1rem; }

    /* --- FULL WIDTH VIDEO HERO --- */
    .full-width-hero {
        position: relative;
        width: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .hero-bg-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 16, 22, 0.65);
        z-index: 2;
    }

    .hero-content-wrapper {
        position: relative;
        z-index: 3;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .hero-text-box {
        max-width: 650px;
        color: #ffffff;
    }

    .hero-text-box h1 {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 25px;
    }

    /* Red accent line */
    .hero-accent-line {
        width: 3px;
        height: 24px;
        background-color: var(--brand-accent); 
        margin-bottom: 25px;
    }

    .hero-text-box p {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #e5e7eb;
        margin-bottom: 40px;
    }

    .hero-btn {
        display: inline-block;
        background-color: var(--brand-accent);
        color: #ffffff;
        padding: 14px 32px;
        border-radius: 4px;
        font-weight: 700;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .hero-btn:hover {
        background-color: #cc0000;
        transform: translateY(-2px);
    }

    /* --- WHAT WE DO (Red Cards) --- */
    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
    .brand-card { 
        background: linear-gradient(135deg, #cc0000 0%, #FF0000 100%); 
        border-radius: 8px; 
        padding: 40px; 
        color: white; 
        display: flex; 
        flex-direction: column; 
        position: relative; 
        transition: transform 0.3s; 
    }
    .brand-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(255,0,0,0.2); }
    .brand-card .arrow { position: absolute; top: 30px; right: 30px; font-size: 1.5rem; text-decoration: none; color: white; }
    .brand-card h3 { font-size: 2rem; margin-bottom: 15px; }
    .brand-card p { font-size: 1.1rem; margin-bottom: 60px; opacity: 0.9; }

    /* --- SERVICES SLIDER CARDS --- */
    .servicesSwiper { padding-bottom: 50px !important; }
    .swiper-slide { height: auto; }
    .test-card { border: 1px solid var(--border-color); border-radius: 8px; padding: 30px; background: white; display: flex; flex-direction: column; height: 100%; transition: 0.3s; }
    .test-card:hover { border-color: var(--brand-accent); box-shadow: 0 10px 30px rgba(0,0,0,0.05); transform: translateY(-3px); }
    .test-card .quote-icon { width: 40px; height: 40px; background: rgba(255,0,0,0.05); border: 1px solid rgba(255,0,0,0.1); color: var(--brand-accent); border-radius: 6px; margin-bottom: 25px; display: flex; align-items: center; justify-content: center; }
    .test-card h3 { font-size: 1.25rem; margin-bottom: 15px; color: var(--text-main); }
    .test-card p { font-size: 1rem; margin-bottom: 30px; color: var(--text-muted); flex-grow: 1; }
    .test-card .card-link { margin-top: auto; color: var(--text-main); text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: 0.3s; }
    .test-card .card-link:hover { color: var(--brand-accent); }
    .swiper-pagination-bullet-active { background: var(--brand-accent) !important; }

    /* --- PARTNERS SLIDER --- */
    .partnersSwiper { 
        border-top: 1px solid var(--border-color); 
        border-bottom: 1px solid var(--border-color); 
        padding: 40px 0 !important; 
        margin-top: 40px; 
    }
    .partnersSwiper .swiper-slide { 
        display: flex; justify-content: center; align-items: center; height: 80px; /* Increased container height */
    }
    .partnersSwiper .swiper-slide img { 
        max-height: 60px; /* Increased from 25px so logos are readable */
        max-width: 80%; width: auto; height: auto; object-fit: contain; 
        filter: grayscale(100%); opacity: 0.6; transition: 0.3s; 
    }
    .partnersSwiper .swiper-slide img:hover { filter: grayscale(0%); opacity: 1; }

    /* --- PROJECTS SLIDER --- */
    .projectsSwiper { padding-bottom: 50px !important; }
    .project-card { 
        display: flex; flex-direction: column; background: white; border: 1px solid var(--border-color); 
        border-radius: 8px; padding: 20px; height: 100%; transition: 0.3s; 
    }
    .project-card:hover { border-color: var(--brand-accent); box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    .project-img-small { height: 200px; border-radius: 4px; overflow: hidden; background: #f3f4f6; margin-bottom: 20px; }
    .project-img-small img { width: 100%; height: 100%; object-fit: cover; }
    .project-content { flex: 1; display: flex; flex-direction: column; align-items: flex-start; }
    .project-content .pill { background: rgba(255,0,0,0.05); color: var(--brand-accent); padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; margin-bottom: 15px; border: 1px solid rgba(255,0,0,0.1); }
    .project-content h3 { font-size: 1.5rem; margin-bottom: 10px; line-height: 1.2; }
    .project-content .desc { color: var(--text-muted); margin-bottom: 20px; font-size: 0.95rem; flex-grow: 1; width: 100%; }
    .project-content .desc p { margin-bottom: 0; }
    .project-link { display: flex; justify-content: space-between; color: var(--text-main); text-decoration: none; font-weight: 600; border-bottom: 1px solid var(--border-color); padding-bottom: 10px; width: 100%; transition: 0.3s; font-size: 0.9rem; }
    .project-link:hover { color: var(--brand-accent); border-color: var(--brand-accent); }

    @media (min-width: 768px) {
        .project-card { flex-direction: row; align-items: center; gap: 20px; padding: 25px; }
        .project-img-small { flex: 0 0 200px; margin-bottom: 0; }
    }

    /* --- WHY CHOOSE US (Dark Section) --- */
    .why-us-section { background-color: #0b0c10; color: white; padding: 100px 0; }
    .accordion-row { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; margin-bottom: 80px; }
    .acc-column h3 { font-size: 1.8rem; margin-bottom: 40px; display: flex; align-items: center; gap: 15px; }
    .acc-column h3 span { width: 30px; height: 30px; background: var(--brand-accent); display: flex; align-items: center; justify-content: center; border-radius: 4px; font-weight: bold; }
    .acc-item { border-bottom: 1px solid rgba(255,255,255,0.1); padding: 20px 0; }
    .acc-header { display: flex; justify-content: space-between; font-size: 1.1rem; font-weight: bold; cursor: pointer; margin-bottom: 10px; }
    .acc-content p { color: #9ca3af; font-size: 0.95rem; margin-bottom: 10px; }

    .stats-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
    .stat-box { background: var(--brand-accent); padding: 40px 20px; border-radius: 8px; text-align: left; }
    .stat-box .num { font-size: 3rem; font-weight: bold; margin-bottom: 10px; }
    .stat-box .label { font-size: 0.9rem; opacity: 0.9; }

    /* --- PROCESS SECTION --- */
    .process-section { background-color: #f9fafb; padding: 100px 0; border-top: 1px solid var(--border-color); }
    .process-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 30px; margin-top: 50px; }
    .process-step { 
        background: #ffffff; padding: 40px 30px; border-radius: 8px; text-align: center; 
        box-shadow: 0 10px 30px rgba(0,0,0,0.03); position: relative; 
        border-bottom: 3px solid var(--brand-accent); transition: 0.3s; 
    }
    .process-step:hover { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(0,0,0,0.08); }
    
    /* Circle Step Number / Icon */
    .step-icon-wrap { 
        width: 60px; height: 60px; background: rgba(255,0,0,0.05); color: var(--brand-accent); 
        font-size: 1.5rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; 
        margin: 0 auto 20px; border: 1px solid rgba(255,0,0,0.1);
    }
    .process-step h3 { font-size: 1.3rem; margin-bottom: 15px; color: var(--text-main); }
    .process-step p { font-size: 0.95rem; color: var(--text-muted); line-height: 1.6; margin: 0;}
    
    /* Dashed Connecting Line for Desktop */
    @media (min-width: 1024px) {
        .process-step::after { 
            content: ''; position: absolute; top: 70px; right: -30px; 
            width: 30px; height: 2px; background-image: linear-gradient(to right, #d1d5db 50%, transparent 50%);
            background-size: 10px 2px; background-repeat: repeat-x; z-index: 1; 
        }
        .process-step:last-child::after { display: none; }
    }

    @media (max-width: 1024px) {
        .process-grid { grid-template-columns: 1fr 1fr; gap: 40px; }
        .process-step::after { display: none; } /* Hide dashed lines on tablet/mobile */
    }
    @media (max-width: 600px) {
        .process-grid { grid-template-columns: 1fr; }
    }

    /* --- RESPONSIVE --- */
    @media (max-width: 900px) {
        .grid-2, .accordion-row, .stats-4 { grid-template-columns: 1fr; flex-direction: column; }
        .project-row { flex-direction: column; gap: 30px; } 
        .project-img { height: 250px; width: 100%; }
        .hero-text-box h1 { font-size: 2.5rem; }
        .full-width-hero { min-height: 80vh; }
    }
</style>

<section class="full-width-hero">
    
    @if(isset($homepageSetting->hero_video) && $homepageSetting->hero_video)
        <video autoplay loop muted playsinline class="hero-bg-video">
            {{-- Remove the asset('storage/...') part! Just output the variable directly --}}
            <source src="{{ $homepageSetting->hero_video }}" type="video/mp4">
        </video>
    @else
        <video autoplay loop muted playsinline class="hero-bg-video">
        <source src="https://pixabay.com/videos/download/video-177161_medium.mp4" type="video/mp4">
    </video>
    @endif

    <div class="hero-overlay"></div>

    <div class="hero-content-wrapper">
        <div class="hero-text-box">
            <h1>{!! $homepageSetting->hero_title ?? 'Engineering Digital Innovation & Retail Excellence' !!}</h1>
            
            <div class="hero-accent-line"></div>
            
            <p>{{ $homepageSetting->hero_description ?? 'Audrii delivers enterprise-grade IT solutions trusted by 50+ businesses across the Baltic region. From Vilnius to the world — we build software that scales, systems that endure, and partnerships that last.' }}</p>
            
            <a href="{{ url('/contact') }}" class="hero-btn">Start now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">{{ $homepageSetting->what_we_do_title ?? 'WHAT WE DO' }}</h2>
            <p class="section-desc">{{ $homepageSetting->what_we_do_description ?? 'Comprehensive IT Services for Modern Business. From bespoke software to cloud architecture — our team delivers measurable results across every layer of your digital stack.' }}</p>
        </div>
        
        {{-- NEW SWIPER WRAPPER --}}
        <div class="swiper whatWeDoSwiper" style="padding-bottom: 50px;">
            <div class="swiper-wrapper">
                @if(isset($homepageSetting->what_we_do_cards) && is_array($homepageSetting->what_we_do_cards) && count($homepageSetting->what_we_do_cards) > 0)
                    @foreach($homepageSetting->what_we_do_cards as $card)
                        <div class="swiper-slide" style="height: auto;">
                            <div class="brand-card" style="height: 100%;">
                                <a href="{{ $card['link'] ?? '#' }}" class="arrow">↗</a>
                                <h3>{{ $card['title'] ?? '' }}</h3>
                                <p>{{ $card['description'] ?? '' }}</p>
                                <div style="margin-top:auto;">{!! $card['price_text'] ?? '' !!}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- Fallbacks if database is empty --}}
                    <div class="swiper-slide" style="height: auto;">
                        <div class="brand-card" style="height: 100%;">
                            <a href="#" class="arrow">↗</a>
                            <h3>Plans and prices</h3>
                            <p>Explore packages full of built-in tools, services, and bonus features.</p>
                            <div style="margin-top:auto;"><strong>$2.99</strong> /month</div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="height: auto;">
                        <div class="brand-card" style="height: 100%;">
                            <a href="#" class="arrow">↗</a>
                            <h3>Vibe code websites</h3>
                            <p>Describe what you want, and we build it. No technical skills needed.</p>
                            <div style="margin-top:auto;"><strong>Try for free</strong></div>
                        </div>
                    </div>
                @endif
            </div>
            {{-- Pagination Dots --}}
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>

<section class="section" style="padding-top: 0;">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Services</h2>
            <p class="section-desc">End-to-End IT Services for Growing Businesses. From early-stage startups to established enterprises — NordVela UAB provides the full spectrum of IT services your business needs to compete in the digital age.</p>
        </div>

        <div class="swiper servicesSwiper">
            <div class="swiper-wrapper">
                
                @if(isset($services) && $services->count() > 0)
                    @foreach($services as $service)
                    <div class="swiper-slide">
                        <div class="test-card">
                            <div class="quote-icon">
                                @if($service->icon)
                                    <img src="{{ asset('storage/' . $service->icon) }}" style="width: 20px; filter: invert(16%) sepia(99%) saturate(7404%) hue-rotate(356deg) brightness(97%) contrast(116%);" alt="Icon">
                                @else
                                    <i class="fas fa-layer-group"></i>
                                @endif
                            </div>
                            <h3>{{ $service->title }}</h3>
                            <p>{{ Str::limit($service->description, 120) }}</p>
                            <a href="{{ url('/services') }}" class="card-link">Learn more →</a>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="swiper-slide">
                        <div class="test-card">
                            <div class="quote-icon"><i class="fas fa-laptop-code"></i></div>
                            <h3>Custom Software Development</h3>
                            <p>We build software development teams that grow with our clients from the early stages.</p>
                            <a href="#" class="card-link">Learn more →</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="test-card">
                            <div class="quote-icon"><i class="fas fa-window-maximize"></i></div>
                            <h3>Web Application Development</h3>
                            <p>End-to-End IT Services for Growing Businesses. From startups to enterprises.</p>
                            <a href="#" class="card-link">Learn more →</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="test-card">
                            <div class="quote-icon"><i class="fas fa-mobile-alt"></i></div>
                            <h3>Mobile Application Development</h3>
                            <p>Expertise includes front-end, backend, database, and server solutions.</p>
                            <a href="#" class="card-link">Learn more →</a>
                        </div>
                    </div>
                @endif

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>

@if(isset($brands) && $brands->count() > 0)
<section class="section" style="padding-top: 0;">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Our Partners</h2>
        </div>
        
        <div class="swiper partnersSwiper">
            <div class="swiper-wrapper">
                @foreach($brands as $brand)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}">
                </div>
                @endforeach
            </div>
            </div>

    </div>
</section>
@endif

<section class="section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title" style="margin-bottom: 60px;">Projects</h2>
        </div>

        <div class="swiper projectsSwiper">
            <div class="swiper-wrapper">
                @if(isset($projects) && $projects->count() > 0)
                    @foreach($projects as $project)
                    <div class="swiper-slide">
                        <div class="project-card">
                            <div class="project-img-small">
                                @if($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                                @else
                                    <div style="display:flex; align-items:center; justify-content:center; height:100%; color:var(--text-muted);">No Image</div>
                                @endif
                            </div>
                            <div class="project-content">
                                <span class="pill">{{ $project->badge ?? 'Case Study' }}</span>
                                <h3>{{ $project->title }}</h3>
                                <div class="desc">{!! $project->description !!}</div>
                                <a href="{{ url('/projects/' . $project->id) }}" class="project-link">
                                    <span>{{ $project->button_text ?? 'Read more' }}</span>
                                    <span>→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p class="text-center">No projects available.</p>
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<section class="why-us-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title" style="margin-bottom: 60px; color: #ffffff;">
                {{ $homepageSetting->why_us_title ?? 'Why Choose Us?' }}
            </h2>
        </div>

        <div class="accordion-row">
            
            <div class="acc-column">
                @if(isset($features) && $features->count() > 0)
                    @foreach($features->take(2) as $feature)
                    <div class="acc-item">
                        <div class="acc-header">{{ $feature->title }} <span>−</span></div>
                        <div class="acc-content">
                            <p>{{ $feature->description }}</p>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

            <div class="acc-column">
                @if(isset($features) && $features->count() > 2)
                    @foreach($features->skip(2)->take(2) as $feature)
                    <div class="acc-item">
                        <div class="acc-header">{{ $feature->title }} <span>−</span></div>
                        <div class="acc-content">
                            <p>{{ $feature->description }}</p>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            
        </div>

        <div class="stats-4">
            <div class="stat-box">
                <div class="num">{{ $homepageSetting->stat_1_number ?? '4' }}{{ $homepageSetting->stat_1_suffix ?? 'M+' }}</div>
                <div class="label">{{ $homepageSetting->stat_1_label ?? 'Clients trust us' }}</div>
            </div>
            <div class="stat-box">
                <div class="num">{{ $homepageSetting->stat_2_number ?? '150' }}{{ $homepageSetting->stat_2_suffix ?? '+' }}</div>
                <div class="label">{{ $homepageSetting->stat_2_label ?? 'Countries served' }}</div>
            </div>
            <div class="stat-box">
                <div class="num">{{ $homepageSetting->stat_3_number ?? '20' }}{{ $homepageSetting->stat_3_suffix ?? '+' }}</div>
                <div class="label">{{ $homepageSetting->stat_3_label ?? 'Years of experience' }}</div>
            </div>
            <div class="stat-box">
                <div class="num">{{ $homepageSetting->stat_4_number ?? '10' }}{{ $homepageSetting->stat_4_suffix ?? 'M+' }}</div>
                <div class="label">{{ $homepageSetting->stat_4_label ?? 'Websites created with us' }}</div>
            </div>
        </div>
    </div>
</section>

<section class="process-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">{{ $homepageSetting->process_section_title ?? 'Our Four-Step Process' }}</h2>
            <p class="section-desc">{{ $homepageSetting->process_section_description ?? 'Clear, predictable and collaborative — from first call to final delivery and beyond.' }}</p>
        </div>

        <div class="process-grid">
            
            <div class="process-step">
                <div class="step-icon-wrap">
                    @if(isset($homepageSetting->step_1_icon) && $homepageSetting->step_1_icon)
                        <i class="{{ $homepageSetting->step_1_icon }}"></i>
                    @else
                        <span>1</span>
                    @endif
                </div>
                <h3>{{ $homepageSetting->step_1_title ?? 'Discovery' }}</h3>
                <p>{{ $homepageSetting->step_1_description ?? 'Free consultation to understand your business, challenges and goals. We ask the right questions before writing a single line of code.' }}</p>
            </div>

            <div class="process-step">
                <div class="step-icon-wrap">
                    @if(isset($homepageSetting->step_2_icon) && $homepageSetting->step_2_icon)
                        <i class="{{ $homepageSetting->step_2_icon }}"></i>
                    @else
                        <span>2</span>
                    @endif
                </div>
                <h3>{{ $homepageSetting->step_2_title ?? 'Proposal' }}</h3>
                <p>{{ $homepageSetting->step_2_description ?? 'Detailed scope of work, transparent pricing and a realistic timeline. No jargon — just clear deliverables and milestones.' }}</p>
            </div>

            <div class="process-step">
                <div class="step-icon-wrap">
                    @if(isset($homepageSetting->step_3_icon) && $homepageSetting->step_3_icon)
                        <i class="{{ $homepageSetting->step_3_icon }}"></i>
                    @else
                        <span>3</span>
                    @endif
                </div>
                <h3>{{ $homepageSetting->step_3_title ?? 'Delivery' }}</h3>
                <p>{{ $homepageSetting->step_3_description ?? 'Agile sprints with weekly demos and progress reports. You are always in the loop and always in control of priorities.' }}</p>
            </div>

            <div class="process-step">
                <div class="step-icon-wrap">
                    @if(isset($homepageSetting->step_4_icon) && $homepageSetting->step_4_icon)
                        <i class="{{ $homepageSetting->step_4_icon }}"></i>
                    @else
                        <span>4</span>
                    @endif
                </div>
                <h3>{{ $homepageSetting->step_4_title ?? 'Support' }}</h3>
                <p>{{ $homepageSetting->step_4_description ?? 'Post-launch support, monitoring, updates and ongoing development. We do not disappear after go-live.' }}</p>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    // ===== INITIALIZE SERVICES SLIDER =====
    var servicesSwiper = new Swiper(".servicesSwiper", {
      slidesPerView: 1,
      spaceBetween: 20,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        768: { slidesPerView: 2, spaceBetween: 20 },
        1024: { slidesPerView: 3, spaceBetween: 30 },
      },
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      }
    });

    // ===== INITIALIZE PARTNERS SLIDER =====
    var partnersSwiper = new Swiper(".partnersSwiper", {
      slidesPerView: 2, // Default for mobile
      slidesPerGroup: 1, // Changed to 1 so it scrolls smoothly one by one
      spaceBetween: 30, 
      loop: true, 
      autoplay: {
        delay: 3000, 
        disableOnInteraction: false,
      },
      breakpoints: {
        320: { slidesPerView: 2, spaceBetween: 20 }, 
        768: { slidesPerView: 3, spaceBetween: 30 }, // Changed to 3 on tablets
        1024: { slidesPerView: 3, spaceBetween: 40 }, // Changed to 3 on desktops!
      },
      grabCursor: true 
    });

    // ===== INITIALIZE PROJECTS SLIDER =====
    var projectsSwiper = new Swiper(".projectsSwiper", {
      slidesPerView: 1, 
      spaceBetween: 20,
      pagination: {
        el: ".projectsSwiper .swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        1024: { slidesPerView: 2, spaceBetween: 30 }, 
      },
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      }
    });

    // ===== INITIALIZE "WHAT WE DO" SLIDER =====
    var whatWeDoSwiper = new Swiper(".whatWeDoSwiper", {
      slidesPerView: 1, // Shows 1 on mobile
      spaceBetween: 20,
      pagination: {
        el: ".whatWeDoSwiper .swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        768: { slidesPerView: 2, spaceBetween: 20 }, // Shows 2 on tablets
        1024: { slidesPerView: 3, spaceBetween: 30 }, // Shows 3 on desktops!
      },
      autoplay: {
        delay: 4500, // Slides automatically every 4.5 seconds
        disableOnInteraction: false,
      }
    });
</script>
@endpush