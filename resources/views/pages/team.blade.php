@extends('layouts.app')

@section('title', 'Our Team | ' . config('app.name'))

@push('styles')
<style>
    /* Styling for the Our Team Page */
    .page-header-dark {
        background-color: #2b2b36; 
        color: #ffffff;
        padding: 80px 0;
        text-align: center;
        margin-top: var(--nav-height, 72px); 
    }
    
    .page-header-dark h1 {
        font-family: var(--font-display, sans-serif);
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .breadcrumbs {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #a0a0ab;
    }
    
    .breadcrumbs a {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s;
    }
    
    .breadcrumbs a:hover {
        color: var(--brand-accent, #FF0000);
    }

    .content-section {
        padding: 80px 0 120px 0;
        max-width: 1000px; 
        margin: 0 auto;
    }

    .team-intro {
        margin-bottom: 60px;
    }

    .team-intro .eyebrow {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--text-muted, #8b8b9e);
        font-weight: 600;
        display: block;
        margin-bottom: 10px;
    }

    .team-intro h2 {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 25px;
        color: var(--text-main, #111827);
    }

    .team-intro p {
        color: var(--text-muted, #5a5a6e);
        line-height: 1.8;
        font-size: 1.05rem;
        margin-bottom: 20px;
    }

    /* Circular Team Layout from your screenshot */
    .team-display-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 40px;
        margin-top: 50px;
    }

    .team-card-profile {
        text-align: left;
    }

    .avatar-wrapper {
        width: 220px;
        height: 220px;
        margin-bottom: 20px;
        overflow: hidden;
        border-radius: 50%; /* Makes the image perfectly round */
        border: 1px solid #e5e7eb;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .avatar-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .team-card-profile h5 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-main, #111827);
        margin-bottom: 4px;
    }

    .team-card-profile span {
        font-size: 0.9rem;
        color: var(--text-muted, #8b8b9e);
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 500;
    }
</style>
@endpush

@section('content')

<div class="page-header-dark">
    <div class="container">
        <h1>Our Team</h1>
        <div class="breadcrumbs">
            <a href="{{ url('/') }}">Home</a> &gt; Our Team
        </div>
    </div>
</div>

<section class="content-section">
    <div class="container">
        
        <div class="team-intro">
            <span class="eyebrow">Management</span>
            <h2>Management Team of MB "Audrii"</h2>
            <p>MB "Audrii" is led by a dedicated management team responsible for overseeing the company's strategic direction, operational integrity, and service excellence. Our leadership ensures that all business activities are conducted in alignment with professional standards, cybersecurity best practices, and applicable Lithuanian and European Union regulations.</p>
            <p>The management team brings a strong commitment to transparency, accountability, and delivering high-quality cybersecurity and IT consulting services to clients across various industries.</p>
        </div>

        <div class="team-display-grid">
            
            <div class="team-card-profile">
                <div class="avatar-wrapper">
                    <img src="{{ file_exists(public_path('images/hasib.jpg')) ? asset('images/hasib.jpg') : 'https://ui-avatars.com/api/?name=Md+Hasib+Hossain&background=006a4e&color=fff&size=300' }}" alt="Md Hasib Hossain">
                </div>
                <h5>Md Hasib Hossain</h5>
                <span>Director</span>
            </div>

            <div class="team-card-profile">
                <div class="avatar-wrapper">
                    <img src="{{ file_exists(public_path('images/burhan.jpg')) ? asset('images/burhan.jpg') : 'https://ui-avatars.com/api/?name=Noshin+Ferdous+Labonno&background=006a4e&color=fff&size=300' }}" alt="Noshin Ferdous Labonno">
                </div>
                <h5>Noshin Ferdous Labonno</h5>
                <span>Shareholder</span>
            </div>

            <div class="team-card-profile">
                <div class="avatar-wrapper">
                    <img src="{{ file_exists(public_path('images/burhan.jpg')) ? asset('images/burhan.jpg') : 'https://ui-avatars.com/api/?name=Farhan+Safin+Hridoy&background=006a4e&color=fff&size=300' }}" alt="Farhan Safin Hridoy">
                </div>
                <h5>Farhan Safin Hridoy</h5>
                <span>Shareholder</span>
            </div>

        </div>

    </div>
</section>

@endsection