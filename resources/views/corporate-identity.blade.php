@extends('layouts.app')

@section('title', 'Corporate Identity | ' . config('app.name'))

@push('styles')
<style>
    /* Custom Styling for the Corporate Identity Page */
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
        padding: 60px 0 100px 0;
        max-width: 900px; 
        margin: 0 auto;
    }

    .corporate-info h2 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 30px;
        color: var(--text-main, #111827);
    }

    .corporate-info h3 {
        font-size: 1.25rem;
        font-weight: 700;
        margin-top: 40px;
        margin-bottom: 20px;
        color: var(--text-main, #111827);
        border-bottom: 1px solid var(--border-color, #e5e7eb);
        padding-bottom: 10px;
    }

    .corporate-info h4 {
        font-size: 1.1rem;
        font-weight: 700;
        margin-top: 25px;
        margin-bottom: 15px;
        color: var(--text-main, #111827);
    }

    .corporate-info p {
        margin-bottom: 15px;
        color: var(--text-muted, #4b5563);
        line-height: 1.8;
    }

    .corporate-info ul {
        list-style: none;
        padding: 0;
        margin-bottom: 25px;
    }

    .corporate-info ul li {
        margin-bottom: 8px;
        color: var(--text-muted, #4b5563);
    }

    .corporate-info ul li strong {
        color: var(--text-main, #111827);
        font-weight: 600;
        display: inline-block;
        min-width: 280px; /* Aligns the data neatly */
    }

    /* Team Grid Layout */
    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 40px;
        margin-top: 40px;
        margin-bottom: 50px;
    }

    .team-member {
        text-align: left;
    }

    /* ADDED: Circular Avatar Wrapper styles matching team.blade.php */
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

    .team-member h5 {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 5px;
        color: var(--text-main, #111827);
    }

    .team-member span {
        display: block;
        font-size: 0.9rem;
        color: var(--text-muted, #6b7280);
    }

    @media(max-width: 768px) {
        .corporate-info ul li strong {
            display: block;
            min-width: auto;
            margin-bottom: 2px;
        }
    }
</style>
@endpush

@section('content')

<div class="page-header-dark">
    <div class="container">
        <h1>Corporate Identity</h1>
        <div class="breadcrumbs">
            <a href="{{ url('/') }}">Home</a> &gt; Corporate Identity
        </div>
    </div>
</div>

<section class="content-section">
    <div class="container">
        <div class="corporate-info">
            
            <h2>Corporate Identity</h2>

            <h3>Company Information</h3>
            <ul>
                <li><strong>Company Name:</strong> MB Audrii</li>
                <li><strong>Legal Form:</strong> Small Partnership (Mažoji bendrija)</li>
                <li><strong>Register Code:</strong> 307646126</li>
                <li><strong>Date of Registration:</strong> 16.04.2026</li>
                <li><strong>Status:</strong> Registered</li>
                <li><strong>Status Start Date:</strong> 16.04.2026</li>
            </ul>
            <p>MB Audrii is a Lithuania-registered company providing professional IT solutions, software development, and digital services. The company operates in accordance with Lithuanian and European Union commercial regulations.</p>

            <h3>Registered Office Address</h3>
            <p>
                Vilnius, Girulių g. 5, LT-12124<br>
                <span style="font-size: 0.9em; color: var(--text-muted);">Address start date: 16.04.2026</span><br><br>
                This address serves as the official legal correspondence location of MB Audrii.
            </p>

            <h3>Directors / Management / Shareholders</h3>
            
            <h4>Director</h4>
            <ul>
                <li><strong>Name:</strong> Md Hasib Hossain</li>
                <li><strong>Nationality:</strong> People's Republic of Bangladesh</li>
                <li><strong>Authorization Start Date:</strong> 16.04.2026</li>
            </ul>
            <p>The Director is authorized to represent the company and make operational and strategic decisions on behalf of MB Audrii in accordance with Lithuanian law.</p>

            <h4>Shareholder</h4>
            <ul>
                <li><strong>Name:</strong> Noshin Ferdous Labonno</li>
                <li><strong>Nationality:</strong> People's Republic of Bangladesh</li>
            </ul>
            <p>The Member participates in ownership and governance of the company in accordance with the company's founding documents and Lithuanian corporate regulations.</p>
            
            <h4>Shareholder</h4>
            <ul>
                <li><strong>Name:</strong> Farhan Safin Hridoy</li>
                <li><strong>Nationality:</strong> People's Republic of Bangladesh</li>
            </ul>
            <p>The Member participates in ownership and governance of the company in accordance with the company's founding documents and Lithuanian corporate regulations.</p>

            <div class="team-grid">
                <div class="team-member">
                    <div class="avatar-wrapper">
                        <img src="{{ file_exists(public_path('assets/images/hasib.jpg')) ? asset('assets/images/hasib.jpg') : 'https://ui-avatars.com/api/?name=Md+Hasib+Hossain&background=006a4e&color=fff&size=300' }}" alt="Md Hasib Hossain">
                    </div>
                    <h5>Md Hasib Hossain</h5>
                    <span>Director</span>
                </div>
                
                <div class="team-member">
                    <div class="avatar-wrapper">
                        <img src="{{ file_exists(public_path('assets/images/labonno.jpg')) ? asset('assets/images/labonno.jpg') : 'https://ui-avatars.com/api/?name=Noshin+Ferdous+Labonno&background=006a4e&color=fff&size=300' }}" alt="Noshin Ferdous Labonno">
                    </div>
                    <h5>Noshin Ferdous Labonno</h5>
                    <span>Shareholder</span>
                </div>
                
                <div class="team-member">
                    <div class="avatar-wrapper">
                        <img src="{{ file_exists(public_path('assets/images/hridoy.jpg')) ? asset('assets/images/hridoy.jpg') : 'https://ui-avatars.com/api/?name=Farhan+Safin+Hridoy&background=006a4e&color=fff&size=300' }}" alt="Farhan Safin Hridoy">
                    </div>
                    <h5>Farhan Safin Hridoy</h5>
                    <span>Shareholder</span>
                </div>
            </div>

            <h3>Business Structure</h3>
            <p>MB Audrii operates as a Small Partnership (Mažoji bendrija) under Lithuanian corporate law. The company is focused on delivering high-quality digital innovation and retail excellence solutions to businesses and organizations globally.</p>

            <h3>Official Contact Information</h3>
            <ul>
                <li><strong>Email:</strong> hasib@audrii.com (Business Email)</li>
                <li><strong>Phone:</strong> +880 1714-029484(Whatsapp),+880 1713-248567 (Business Phone)</li>
                <li><strong>Address:</strong> Vilnius, Girulių g. 5, LT-12124, Lithuania</li>
                <li><strong>Website:</strong> <a href="{{ url('/') }}" style="color:var(--brand-accent); text-decoration:none;">www.audrii.com</a></li>
            </ul>

        </div>
    </div>
</section>

@endsection