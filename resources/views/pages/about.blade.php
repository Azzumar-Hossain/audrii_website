@extends('layouts.app')

@section('title', 'About Us | ' . config('app.name'))

@section('content')

<style>
    /* --- ENOSIS-STYLE ABOUT PAGE UI --- */
    body { background-color: #ffffff; }

    /* Hero Section */
    .eno-about-hero {
        position: relative;
        /* Updated to match 'hero_image' */
        background-image: url('{{ isset($aboutSetting->hero_image) && $aboutSetting->hero_image ? asset('storage/' . $aboutSetting->hero_image) : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80' }}');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        padding: 160px 0;
        text-align: center;
    }
    .eno-hero-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.65);
        z-index: 1;
    }
    .eno-hero-text {
        position: relative; z-index: 2;
    }
    .eno-hero-title {
        color: #ffffff; font-size: 3.5rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 2px; margin: 0 0 10px 0;
    }
    .eno-hero-subtitle {
        color: #e5e7eb; font-size: 1.2rem; font-weight: 500;
    }

    /* General Section Styling */
    .eno-section { padding: 100px 0; }
    
    /* Who We Are */
    .eno-who-we-are {
        display: grid; grid-template-columns: 1fr 2fr; gap: 60px; align-items: flex-start;
        max-width: 900px; margin: 0 auto;
    }
    .eno-who-left { text-align: right; line-height: 1.1; text-transform: uppercase; }
    .eno-who-left .red-text { color: #FF0000; font-size: 3.5rem; font-weight: 800; }
    .eno-who-left .dark-text { color: #374151; font-size: 3.5rem; font-weight: 800; }
    .eno-who-right { color: #4b5563; line-height: 1.8; font-size: 1.05rem; }

    /* Our Story Section */
    .eno-bg-gray { background-color: #f9fafb; border-top: 1px solid #f3f4f6; border-bottom: 1px solid #f3f4f6; }
    .eno-story-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
    .eno-story-title { font-size: 2rem; font-weight: 800; text-transform: uppercase; color: #111827; margin-bottom: 25px; }
    .eno-story-img { width: 100%; border-radius: 4px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }

    /* Mission & Vision */
    .eno-section-header { text-align: center; margin-bottom: 60px; }
    .eno-section-header h2 { font-size: 1.8rem; font-weight: 800; text-transform: uppercase; color: #111827; }
    
    .eno-mv-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 60px; max-width: 1000px; margin: 0 auto; }
    .eno-mv-card { display: flex; flex-direction: column; align-items: flex-start; }
    .eno-mv-icon {
        width: 80px; height: 80px; border: 2px solid #FF0000; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: #FF0000; font-size: 2rem; margin-bottom: 25px;
    }
    .eno-mv-title { color: #FF0000; font-size: 1.3rem; font-weight: 700; margin-bottom: 15px; text-transform: uppercase; }
    .eno-mv-desc { color: #4b5563; line-height: 1.8; font-size: 0.95rem; }

    /* Contact Section */
    .eno-contact-split { display: flex; align-items: center; max-width: 900px; margin: 0 auto; }
    .eno-contact-left { flex: 1; text-align: right; border-right: 3px solid #FF0000; padding-right: 40px; }
    .eno-contact-left h2 { font-size: 3rem; font-weight: 800; line-height: 1.1; color: #111827; text-transform: uppercase; margin: 0; }
    .eno-contact-left h2 span { color: #FF0000; }
    
    .eno-contact-right { flex: 1.5; padding-left: 40px; }
    
    /* UPDATED: Added select styling to match the Contact page */
    .eno-form input, .eno-form textarea, .eno-form select { 
        width: 100%; padding: 15px; border: 1px solid #e5e7eb; border-radius: 4px; margin-bottom: 15px; font-family: inherit; 
    }
    .eno-form select {
        cursor: pointer;
        appearance: auto;
    }
    .eno-form input:focus, .eno-form textarea:focus, .eno-form select:focus { 
        outline: none; border-color: #FF0000; 
    }
    .eno-btn-submit {
        background: #FF0000; color: #ffffff; border: none; padding: 15px 40px;
        font-weight: 700; font-size: 1.1rem; text-transform: uppercase; cursor: pointer; transition: 0.3s;
    }
    .eno-btn-submit:hover { background: #cc0000; }

    /* NEW: Success Message Alert styling */
    .alert-success {
        background-color: #ecfdf5;
        border: 1px solid #10b981;
        color: #065f46;
        padding: 15px 20px;
        border-radius: 4px;
        margin-bottom: 20px;
        text-align: center;
        font-weight: 500;
    }

    @media (max-width: 900px) {
        .eno-who-we-are { grid-template-columns: 1fr; text-align: center; }
        .eno-who-left { text-align: center; }
        .eno-story-grid, .eno-mv-grid { grid-template-columns: 1fr; gap: 40px; }
        .eno-contact-split { flex-direction: column; text-align: center; }
        .eno-contact-left { border-right: none; padding-right: 0; border-bottom: 3px solid #FF0000; padding-bottom: 30px; margin-bottom: 30px; text-align: center; }
        .eno-contact-right { padding-left: 0; width: 100%; }
        .eno-hero-title { font-size: 2.5rem; }
    }
</style>

<section class="eno-about-hero">
    <div class="eno-hero-overlay"></div>
    <div class="container eno-hero-text">
        <h1 class="eno-hero-title">{{ strtoupper($aboutSetting->hero_title ?? 'WE ARE ' . config('app.name')) }}</h1>
    </div>
</section>

<section class="eno-section">
    <div class="container">
        <div class="eno-who-we-are">
            <div class="eno-who-left">
                <div class="red-text">WHO</div>
                <div class="dark-text">WE</div>
                <div class="dark-text">ARE</div>
            </div>
            <div class="eno-who-right">
                {!! $aboutSetting->who_we_are ?? 'Please fill out the Who We Are section in your admin panel.' !!}
            </div>
        </div>
    </div>
</section>

<section class="eno-section eno-bg-gray">
    <div class="container">
        <div class="eno-story-grid">
            <div>
                @if(isset($aboutSetting->story_image) && $aboutSetting->story_image)
                    <img src="{{ asset('storage/' . $aboutSetting->story_image) }}" alt="Our Story" class="eno-story-img">
                @else
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Our Story Fallback" class="eno-story-img">
                @endif
            </div>
            <div>
                <h2 class="eno-story-title">{{ $aboutSetting->story_title ?? 'Story' }}</h2>
                <div class="eno-who-right">
                    {!! $aboutSetting->story_content ?? 'Please fill out the Story Content in your admin panel.' !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="eno-section">
    <div class="container">
        <div class="eno-section-header">
            <h2>Our Core Ideology</h2>
        </div>

        <div class="eno-mv-grid">
            <div class="eno-mv-card">
                <div class="eno-mv-icon"><i class="fas fa-rocket"></i></div>
                <h3 class="eno-mv-title">{{ $aboutSetting->mission_title ?? 'Mission' }}</h3>
                <div class="eno-mv-desc">
                    {!! $aboutSetting->mission_description ?? 'Please fill out the Mission Statement in your admin panel.' !!}
                </div>
            </div>
            
            <div class="eno-mv-card">
                <div class="eno-mv-icon"><i class="fas fa-bullseye"></i></div>
                <h3 class="eno-mv-title">{{ $aboutSetting->vision_title ?? 'Vision' }}</h3>
                <div class="eno-mv-desc">
                    {!! $aboutSetting->vision_description ?? 'Please fill out the Vision Statement in your admin panel.' !!}
                </div>
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