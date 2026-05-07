@extends('layouts.app')

@section('title', 'Services | ' . config('app.name'))

@section('content')

<style>
    /* --- ENOSIS-STYLE SERVICES PAGE UI --- */
    body { background-color: #ffffff; }

    /* Hero Section */
    .eno-hero {
        position: relative;
        background: url('https://images.unsplash.com/photo-1497215728101-856f4ea42174?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
        padding: 140px 0;
        text-align: center;
    }
    .eno-hero-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.6); z-index: 1;
    }
    .eno-hero-title {
        position: relative; z-index: 2; color: #ffffff; font-size: 3rem;
        font-weight: 800; text-transform: uppercase; letter-spacing: 2px; margin: 0;
    }

    /* Section Titles */
    .eno-section { padding: 100px 0; }
    .eno-bg-gray { background-color: #f9fafb; border-top: 1px solid #f3f4f6; border-bottom: 1px solid #f3f4f6; }
    .eno-section-header { text-align: center; margin-bottom: 70px; }
    .eno-section-title {
        font-size: 1.8rem; font-weight: 800; text-transform: uppercase;
        color: #111827; margin-bottom: 20px; letter-spacing: 1px;
    }
    .eno-section-desc {
        max-width: 900px; margin: 0 auto; color: #4b5563; line-height: 1.8; font-size: 1.05rem;
    }

    /* 2x2 Services Grid */
    .eno-grid-2x2 {
        display: grid; grid-template-columns: repeat(2, 1fr); gap: 60px 80px;
    }
    .eno-service-card { display: flex; flex-direction: column; align-items: flex-start; }
    .eno-icon-wrap { width: 80px; height: 80px; margin-bottom: 25px; display: flex; align-items: center; justify-content: flex-start; }
    .eno-icon-wrap img { max-width: 100%; max-height: 100%; filter: invert(16%) sepia(99%) saturate(7404%) hue-rotate(356deg) brightness(97%) contrast(116%); }
    .eno-icon-wrap i { font-size: 4rem; color: #FF0000; }
    .eno-card-title { color: #FF0000; font-size: 1.6rem; font-weight: 700; line-height: 1.3; margin-bottom: 15px; }
    .eno-card-desc { color: #4b5563; line-height: 1.8; font-size: 1rem; }

    /* Engagement Model */
    .eno-engagement-bg { background-color: #f8fafc; border-top: 1px solid #f1f5f9; border-bottom: 1px solid #f1f5f9; }
    .eno-engage-row { display: flex; align-items: center; gap: 40px; margin-bottom: 50px; }
    .eno-engage-text { flex: 1; }
    .eno-engage-title { color: #FF0000; font-size: 1.4rem; font-weight: 700; margin-bottom: 15px; }
    .eno-engage-icon { flex: 0 0 150px; text-align: center; }
    .eno-engage-icon i { font-size: 5rem; color: #111827; }

    /* Contact Section (Updated to match About & Contact pages) */
    .eno-contact-split { display: flex; align-items: center; max-width: 900px; margin: 0 auto; }
    .eno-contact-left { flex: 1; text-align: right; border-right: 3px solid #FF0000; padding-right: 40px; }
    .eno-contact-left h2 { font-size: 3rem; font-weight: 800; line-height: 1.1; color: #111827; text-transform: uppercase; margin: 0; }
    .eno-contact-left h2 span { color: #FF0000; }
    
    .eno-contact-right { flex: 1.5; padding-left: 40px; }
    .eno-form input, .eno-form textarea, .eno-form select { 
        width: 100%; padding: 15px; border: 1px solid #e5e7eb; border-radius: 4px; margin-bottom: 15px; font-family: inherit; 
    }
    .eno-form select { cursor: pointer; appearance: auto; }
    .eno-form input:focus, .eno-form textarea:focus, .eno-form select:focus { outline: none; border-color: #FF0000; }
    .eno-btn-submit {
        background: #FF0000; color: #ffffff; border: none; padding: 15px 40px;
        font-weight: 700; font-size: 1.1rem; text-transform: uppercase; cursor: pointer; transition: 0.3s;
    }
    .eno-btn-submit:hover { background: #cc0000; }

    /* Success Message Alert */
    .alert-success {
        background-color: #ecfdf5; border: 1px solid #10b981; color: #065f46;
        padding: 15px 20px; border-radius: 4px; margin-bottom: 20px; text-align: center; font-weight: 500;
    }

    @media (max-width: 900px) {
        .eno-grid-2x2 { grid-template-columns: 1fr; gap: 40px; }
        .eno-engage-row { flex-direction: column-reverse; text-align: center; gap: 20px; }
        .eno-contact-split { flex-direction: column; text-align: center; }
        .eno-contact-left { border-right: none; padding-right: 0; border-bottom: 3px solid #FF0000; padding-bottom: 30px; margin-bottom: 30px; text-align: center; }
        .eno-contact-right { padding-left: 0; width: 100%; }
    }
</style>

<section class="eno-hero">
    <div class="eno-hero-overlay"></div>
    <div class="container">
        <h1 class="eno-hero-title">Our Services</h1>
    </div>
</section>

<section class="eno-section">
    <div class="container">
        <div class="eno-section-header">
            <h2 class="eno-section-title">Our Services</h2>
            <p class="eno-section-desc">
                From early-stage startups to established enterprises, we provide the full spectrum of IT services your business needs to scale rapidly and securely. Our expert team delivers measurable results across every layer of your digital stack.
            </p>
        </div>

        <div class="eno-grid-2x2">
            @if(isset($services) && $services->count() > 0)
                @foreach($services as $service)
                <div class="eno-service-card">
                    <div class="eno-icon-wrap">
                        @if($service->icon)
                            <img src="{{ asset('storage/' . $service->icon) }}" alt="Icon">
                        @else
                            <i class="fas fa-desktop"></i>
                        @endif
                    </div>
                    <h3 class="eno-card-title">{{ $service->title }}</h3>
                    <div class="eno-card-desc">
                        {!! $service->description !!}
                    </div>
                </div>
                @endforeach
            @else
                <div class="eno-service-card">
                    <div class="eno-icon-wrap"><i class="fas fa-laptop-code"></i></div>
                    <h3 class="eno-card-title">Custom Software Development</h3>
                    <div class="eno-card-desc">We build bespoke, high-performance software tailored perfectly to your specific business workflows.</div>
                </div>
                <div class="eno-service-card">
                    <div class="eno-icon-wrap"><i class="fas fa-window-maximize"></i></div>
                    <h3 class="eno-card-title">Web Application Development</h3>
                    <div class="eno-card-desc">Develop robust, secure, and scalable web applications backed by powerful server-side architecture.</div>
                </div>
                <div class="eno-service-card">
                    <div class="eno-icon-wrap"><i class="fas fa-mobile-alt"></i></div>
                    <h3 class="eno-card-title">Mobile Application Development</h3>
                    <div class="eno-card-desc">Create intuitive and highly engaging mobile experiences for iOS and Android.</div>
                </div>
                <div class="eno-service-card">
                    <div class="eno-icon-wrap"><i class="fas fa-search-dollar"></i></div>
                    <h3 class="eno-card-title">Quality Assurance & Testing</h3>
                    <div class="eno-card-desc">Ensure flawless performance with rigorous automated and manual testing protocols.</div>
                </div>
            @endif
        </div>
    </div>
</section>

<section class="eno-section eno-engagement-bg">
    <div class="container">
        <div class="eno-section-header">
            <h2 class="eno-section-title">Our Engagement Model</h2>
            <p class="eno-section-desc">We offer flexible partnership models designed to integrate seamlessly with your business operations.</p>
        </div>

        <div style="max-width: 800px; margin: 0 auto;">
            <div class="eno-engage-row">
                <div class="eno-engage-text">
                    <h3 class="eno-engage-title">Full-time Engagement Model</h3>
                    <p class="eno-card-desc">Integrate our dedicated experts directly into your workflow. They work exclusively on your projects.</p>
                </div>
                <div class="eno-engage-icon"><i class="fas fa-user-clock"></i></div>
            </div>
            <div class="eno-engage-row">
                <div class="eno-engage-text">
                    <h3 class="eno-engage-title">Project Based Model</h3>
                    <p class="eno-card-desc">Perfect for projects with clearly defined scopes. We manage the entire lifecycle within a fixed budget.</p>
                </div>
                <div class="eno-engage-icon"><i class="fas fa-folder-open"></i></div>
            </div>
        </div>
    </div>
</section>

<section class="eno-section eno-bg-gray">
    <div class="container">
        <div class="eno-contact-split">
            <div class="eno-contact-left">
                <h2>WANT US<br>TO <span>CALL</span><br>YOU?</h2>
            </div>
            <div class="eno-contact-right">
                
                @if(session('success'))
                    <div class="alert-success">
                        <i class="fas fa-check-circle" style="margin-right: 8px;"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="eno-form">
                    @csrf
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="text" name="company" placeholder="Company">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="phone" placeholder="Phone">
                    
                    <select name="primary_interest" required>
                        <option value="" disabled selected>Select Primary Interest</option>
                        <option value="Custom Software Development">Custom Software Development</option>
                        <option value="Web Application Development">Web Application Development</option>
                        <option value="Mobile Application Development">Mobile Application Development</option>
                        <option value="Cloud & DevOps">Cloud & DevOps</option>
                        <option value="Quality Assurance & Testing">Quality Assurance & Testing</option>
                        <option value="Other">Other</option>
                    </select>
                    
                    <textarea name="message" rows="4" placeholder="Message" required></textarea>
                    <button type="submit" class="eno-btn-submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection