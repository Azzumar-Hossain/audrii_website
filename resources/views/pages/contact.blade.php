@extends('layouts.app')

@section('title', 'Contact Us | ' . config('app.name'))

@section('content')

@php
    // Fetch the site settings directly for the contact info
    $siteSetting = \App\Models\SiteSetting::first();
@endphp

<style>
    /* --- ENOSIS-STYLE CONTACT PAGE UI --- */
    body { background-color: #ffffff; }

    /* Hero Section */
    .eno-contact-hero {
        position: relative;
        background: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
        padding: 180px 0 140px;
        text-align: center;
    }
    .eno-hero-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.5);
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
        color: #f3f4f6; font-size: 1.2rem; font-weight: 400; letter-spacing: 1px;
    }

    /* Main Section */
    .eno-section { padding: 100px 0; }
    
    .eno-contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        max-width: 1000px;
        margin: 0 auto;
    }

    /* Left Side: Contact Info */
    .eno-info-wrapper {
        padding-top: 10px;
    }
    .eno-info-item {
        display: flex;
        align-items: flex-start;
        gap: 25px;
        margin-bottom: 45px;
    }
    .eno-info-icon {
        font-size: 2rem;
        color: #4b5563; 
        margin-top: 5px;
    }
    .eno-info-text h4 {
        font-size: 1.3rem;
        font-weight: 400; 
        color: #374151;
        margin-bottom: 10px;
    }
    .eno-info-text p {
        color: #4b5563;
        font-size: 0.95rem;
        line-height: 1.6;
        margin: 0;
    }

    /* Right Side: Form */
    .eno-form-wrapper {
        background: #ffffff;
    }
    .eno-form input, .eno-form textarea, .eno-form select {
        width: 100%;
        padding: 18px 20px;
        border: 1px solid #e5e7eb;
        border-radius: 2px; 
        margin-bottom: 20px;
        font-family: inherit;
        font-size: 0.95rem;
        color: #374151;
        background-color: #ffffff;
        transition: border-color 0.3s;
    }
    .eno-form select {
        cursor: pointer;
        appearance: auto;
    }
    .eno-form input::placeholder, .eno-form textarea::placeholder {
        color: #9ca3af;
    }
    .eno-form input:focus, .eno-form textarea:focus, .eno-form select:focus {
        outline: none;
        border-color: #FF0000; 
    }
    .eno-btn-submit {
        background: #ed1c24; 
        color: #ffffff;
        border: none;
        padding: 16px 45px;
        font-weight: 600;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: 0.3s;
        display: inline-block;
    }
    .eno-btn-submit:hover {
        background: #c81017;
    }

    /* Success Message Alert */
    .alert-success {
        background-color: #ecfdf5;
        border: 1px solid #10b981;
        color: #065f46;
        padding: 15px 20px;
        border-radius: 4px;
        margin-bottom: 30px;
        text-align: center;
        font-weight: 500;
    }

    @media (max-width: 900px) {
        .eno-contact-grid { grid-template-columns: 1fr; gap: 50px; }
        .eno-hero-title { font-size: 2.5rem; }
        .eno-info-wrapper { text-align: center; }
        .eno-info-item { flex-direction: column; align-items: center; gap: 15px; }
    }
</style>

<section class="eno-contact-hero">
    <div class="eno-hero-overlay"></div>
    <div class="container eno-hero-text">
        <h1 class="eno-hero-title">CONTACT US</h1>
        <div class="eno-hero-subtitle">Get In Touch</div>
    </div>
</section>

<section class="eno-section">
    <div class="container">
        
        <div class="eno-contact-grid">
            
            <div class="eno-info-wrapper">
                
                <div class="eno-info-item">
                    <div class="eno-info-icon"><i class="fas fa-mobile-alt"></i></div>
                    <div class="eno-info-text">
                        <h4>Give us a call</h4>
                        <p>{{ $siteSetting->contact_phone ?? '+1 (412) 567-4498' }}(whatsapp)</p>
                    </div>
                </div>

                <div class="eno-info-item">
                    <div class="eno-info-icon"><i class="far fa-envelope"></i></div>
                    <div class="eno-info-text">
                        <h4>Send us an email</h4>
                        <p>{{ $siteSetting->contact_email ?? 'info@enosisbd.com' }}</p>
                    </div>
                </div>

                <div class="eno-info-item">
                    <div class="eno-info-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="eno-info-text">
                        <h4>Location</h4>
                        <p>{!! nl2br(e($siteSetting->contact_address ?? "House 27, Road 8\nGulshan, Dhaka 1212\nBangladesh")) !!}</p>
                    </div>
                </div>

            </div>

            <div class="eno-form-wrapper">
                
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
                    
                    <textarea name="message" rows="5" placeholder="Message" required></textarea>
                    
                    <button type="submit" class="eno-btn-submit">SEND</button>
                </form>
            </div>

        </div>

    </div>
</section>

@endsection