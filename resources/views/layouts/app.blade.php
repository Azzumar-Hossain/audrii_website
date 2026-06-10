@php
    $siteSettings = \App\Models\SiteSetting::first();
    $siteName = $siteSettings->site_name ?? 'NordVela';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', $siteName . ' – IT Solutions & Digital Services')</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
  <style>
    /* ===== FULL ORIGINAL CSS ===== */
    :root {
      /* Light Backgrounds */
      --bg: #fefcf8;
      --bg2: #ffffff;
      --surface: #ffffff;
      --surface2: #f5f3ec;
      --surface3: #ebe8e0;

      /* Accent Colors (Mapped to green!) */
      --gold: #006a4e; 
      --gold-light: #008f6b;
      --gold-dark: #004d3a;
      --gold-glow: rgba(0, 106, 78, 0.15);
      --gold-border: rgba(0, 106, 78, 0.2);

      /* Text Colors */
      --text: #1e1e2a;
      --text-muted: #5a5a6e;
      --text-dim: #8b8b9e;

      /* Borders & Soft Shadows */
      --border: #e8e6e1;
      --shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);

      /* Layout Mechanics */
      --radius: 12px;
      --radius-lg: 20px;
      --nav-height: 72px;
      
      /* Typography */
      --font-display: 'Cormorant Garamond', Georgia, serif;
      --font-body: 'Inter', sans-serif;
      --transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body {
      font-family: var(--font-body);
      background: var(--bg);
      color: var(--text);
      line-height: 1.7;
      overflow-x: hidden;
      cursor: none;
    }
    a { color: inherit; text-decoration: none; }
    img { max-width: 100%; display: block; }
    ul { list-style: none; }
    input, textarea, select { font-family: var(--font-body); }

    /* ===== CUSTOM CURSOR ===== */
    #cursor {
      position: fixed; top: 0; left: 0; width: 10px; height: 10px;
      background: var(--gold); border-radius: 50%; pointer-events: none;
      z-index: 9999; transform: translate(-50%, -50%);
      transition: width 0.2s, height 0.2s, opacity 0.2s;
    }
    #cursor-ring {
      position: fixed; top: 0; left: 0; width: 36px; height: 36px;
      border: 1.5px solid rgba(0, 106, 78, 0.5); border-radius: 50%;
      pointer-events: none; z-index: 9998; transform: translate(-50%, -50%);
      transition: transform 0.12s ease-out, width 0.2s, height 0.2s;
    }
    body:has(a:hover) #cursor, body:has(button:hover) #cursor { width: 16px; height: 16px; }
    @media (max-width: 768px) { #cursor, #cursor-ring { display: none; } body { cursor: auto; } }

    /* ===== NAVIGATION (DYNAMIC DARK TO LIGHT) ===== */
    nav {
      position: fixed; top: 0; left: 0; right: 0; height: var(--nav-height);
      z-index: 1000; 
      background: #0f1016; /* Starts Solid Black */
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
      transition: background 0.4s ease, border-bottom 0.4s ease, box-shadow 0.4s ease;
    }
    
    .nav-inner {
      max-width: 1200px; margin: 0 auto; padding: 0 24px;
      height: 100%; display: flex; align-items: center; justify-content: space-between;
    }
    .nav-left, .nav-right { display: flex; align-items: center; }
    .nav-left { gap: 40px; } 
    .nav-right { gap: 20px; } 

    .nav-logo { display: flex; align-items: center; gap: 12px; cursor: pointer; }
    .logo-mark {
      width: 38px; height: 38px; background: linear-gradient(135deg, var(--gold), var(--gold-dark));
      border-radius: 10px; display: flex; align-items: center; justify-content: center;
      font-family: var(--font-display); font-weight: 700; font-size: 18px; color: var(--bg);
    }
    
    /* DEFAULT TEXT COLORS (WHITE ON BLACK) */
    .logo-text { font-family: var(--font-display); font-size: 20px; font-weight: 700; color: #ffffff; transition: color 0.4s; }
    .nav-links { display: flex; align-items: center; gap: 4px; }
    .nav-link {
      padding: 8px 16px; border-radius: 8px; font-size: 14px; font-weight: 500;
      color: #d1d5db; transition: all 0.3s; cursor: pointer; position: relative;
    }
    .nav-link:hover { color: #ffffff; background: rgba(255,255,255,0.05); }
    .nav-link.active { color: #FF0000 !important; }
    .nav-link.active::after {
      content: ''; position: absolute; bottom: 4px; left: 50%; transform: translateX(-50%);
      width: 4px; height: 4px; border-radius: 50%; background: #FF0000;
    }
    /* Mobile Active Menu Link */
    .mobile-nav-link:hover, .mobile-nav-link.active { color: #FF0000; }
    .lang-selector {
      display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 600; 
      color: #d1d5db; cursor: pointer; transition: color 0.3s;
    }
    .lang-selector:hover { color: #ffffff; }
    .lang-selector img { width: 20px; border-radius: 2px; }
    .nav-cta {
      background: transparent; color: #ffffff; padding: 8px 20px;
      border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer;
      transition: all 0.3s; border: 1.5px solid rgba(255,255,255,0.3); margin-left: 8px;
    }
    .nav-cta:hover { border-color: var(--gold); background: var(--gold); color: #ffffff; transform: translateY(-1px); }
    .hamburger span { background: #ffffff; transition: 0.4s; }
    
    /* ===== SCROLLED STATE (WHITE BACKGROUND, BLACK TEXT) ===== */
    nav.scrolled {
      background: #ffffff; 
      border-bottom: 1px solid #e5e7eb;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    nav.scrolled .logo-text { color: #111827; }
    nav.scrolled .nav-link { color: #4b5563; }
    nav.scrolled .nav-link:hover { color: #111827; background: rgba(0,0,0,0.04); }
    nav.scrolled .lang-selector { color: #4b5563; }
    nav.scrolled .lang-selector:hover { color: var(--gold); }
    nav.scrolled .nav-cta { color: #111827; border-color: #d1d5db; }
    nav.scrolled .nav-cta:hover { border-color: var(--gold); background: var(--gold-glow); color: var(--gold-dark); }
    nav.scrolled .hamburger span { background: #111827; }

    /* Hide Desktop Elements on Mobile */
    .hamburger {
      display: none; flex-direction: column; gap: 5px; cursor: pointer; padding: 8px;
      border: none; background: none; z-index: 1100;
    }
    .hamburger span { display: block; width: 24px; height: 2px; border-radius: 2px; }
    /* ===== MOBILE MENU ===== */
    #mobile-menu {
      position: fixed; inset: 0; background: rgba(254, 252, 248, 0.98);
      backdrop-filter: blur(20px); z-index: 1050; display: flex;
      flex-direction: column; align-items: center; justify-content: center;
      gap: 8px; opacity: 0; pointer-events: none; transition: opacity 0.3s ease;
    }
    #mobile-menu.open { opacity: 1; pointer-events: all; }
    .mobile-nav-link {
      font-family: var(--font-display); font-size: 28px; font-weight: 600;
      color: var(--text-muted); cursor: pointer; padding: 12px 40px;
      transition: var(--transition); width: 100%; text-align: center;
    }
    .mobile-nav-link:hover, .mobile-nav-link.active { color: var(--gold); }
    .mobile-close {
      position: absolute; top: 20px; right: 20px; width: 40px; height: 40px;
      background: var(--surface); border: 1px solid var(--border); border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      cursor: pointer; font-size: 18px; color: var(--text-muted); border: none; transition: var(--transition);
    }
    .mobile-close:hover { color: var(--text); background: var(--surface2); }

    /* ===== SCROLL ANIMATIONS ===== */
    .aos { opacity: 0; transform: translateY(30px); transition: opacity 0.7s ease, transform 0.7s ease; }
    .aos.visible { opacity: 1; transform: translateY(0); }
    .aos-left { opacity: 0; transform: translateX(-30px); transition: opacity 0.7s ease, transform 0.7s ease; }
    .aos-left.visible { opacity: 1; transform: translateX(0); }
    .aos-right { opacity: 0; transform: translateX(30px); transition: opacity 0.7s ease, transform 0.7s ease; }
    .aos-right.visible { opacity: 1; transform: translateX(0); }
    .delay-1 { transition-delay: 0.1s; } .delay-2 { transition-delay: 0.2s; } .delay-3 { transition-delay: 0.3s; }
    .delay-4 { transition-delay: 0.4s; } .delay-5 { transition-delay: 0.5s; } .delay-6 { transition-delay: 0.6s; }

    /* ===== TYPOGRAPHY & LAYOUT UTILITIES ===== */
    .section-eyebrow { font-size: 11px; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--gold); display: flex; align-items: center; gap: 10px; margin-bottom: 14px; }
    .section-eyebrow::before { content: ''; display: block; width: 30px; height: 1.5px; background: var(--gold); }
    .section-title { font-family: var(--font-display); font-size: clamp(28px, 4vw, 42px); font-weight: 700; line-height: 1.2; color: var(--text); }
    .section-title em { font-style: italic; color: var(--gold); }
    .section-desc { color: var(--text-muted); font-size: 16px; max-width: 560px; margin-top: 12px; }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
    .section { padding: 100px 0; }
    .section-header { margin-bottom: 60px; }
    .grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 32px; }
    .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 28px; }
    .grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; }

    /* ===== BUTTONS ===== */
    .btn { display: inline-flex; align-items: center; gap: 10px; padding: 14px 28px; border-radius: 10px; font-weight: 600; font-size: 15px; cursor: pointer; transition: var(--transition); border: none; font-family: var(--font-body); }
    .btn-primary { background: linear-gradient(135deg, var(--gold), var(--gold-dark)); color: var(--bg); }
    .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(0, 106, 78, 0.35); background: linear-gradient(135deg, var(--gold-light), var(--gold)); }
    .btn-outline { background: transparent; color: var(--text); border: 1.5px solid var(--border); }
    .btn-outline:hover { border-color: var(--gold-border); background: var(--gold-glow); transform: translateY(-2px); }
    .btn-ghost { background: transparent; color: var(--gold); border: 1.5px solid var(--gold-border); padding: 11px 24px; }
    .btn-ghost:hover { background: var(--gold-glow); }
    
    /* ===== FOOTER ===== */
    footer { background: var(--bg2); border-top: 1px solid var(--border); padding: 60px 0 0; }
    /* UPDATED: Changed grid from 4 columns to 3 columns since Services is gone */
    .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 40px; padding-bottom: 48px; border-bottom: 1px solid var(--border); }
    .footer-brand p { font-size: 14px; color: var(--text-muted); margin-top: 16px; line-height: 1.8; }
    .footer-legal { margin-top: 20px; font-size: 12px; color: var(--text-dim); line-height: 1.8; }
    .footer-col h5 { font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: var(--text); margin-bottom: 20px; }
    .footer-col ul { display: flex; flex-direction: column; gap: 10px; }
    .footer-col ul li a { font-size: 13px; color: var(--text-muted); transition: color 0.2s; cursor: pointer; }
    .footer-col ul li a:hover { color: var(--gold); }
    .footer-bottom { padding: 24px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .footer-bottom p { font-size: 12px; color: var(--text-dim); }
    .footer-socials { display: flex; gap: 10px; }
    .social-link { width: 36px; height: 36px; border-radius: 50%; background: var(--surface); border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; color: var(--text-muted); font-size: 14px; transition: var(--transition); cursor: pointer; }
    .social-link:hover { color: var(--gold); border-color: var(--gold-border); background: var(--gold-glow); }
    
    #btt { position: fixed; bottom: 28px; right: 28px; width: 44px; height: 44px; background: var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--bg); font-size: 18px; cursor: pointer; border: none; opacity: 0; pointer-events: none; transition: var(--transition); box-shadow: 0 4px 20px rgba(0, 106, 78, 0.4); z-index: 500; }
    #btt.visible { opacity: 1; pointer-events: all; }
    #btt:hover { transform: translateY(-3px); box-shadow: 0 8px 30px rgba(0, 106, 78, 0.5); }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
      .footer-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 768px) {
      /* Hide desktop elements on mobile */
      .nav-links, .nav-cta, .lang-selector { display: none; }
      .hamburger { display: flex; }
      .footer-grid { grid-template-columns: 1fr; }
      .footer-bottom { flex-direction: column; text-align: center; }
      .section { padding: 70px 0; }
    }
  </style>

  @stack('styles')
</head>
<body>

  <div id="cursor"></div>
  <div id="cursor-ring"></div>

  <nav id="navbar">
    <div class="nav-inner">
      
      <div class="nav-left">
        <a href="{{ url('/') }}" class="nav-logo">
          @if(isset($siteSettings) && $siteSettings->site_logo)
              <img src="{{ asset('storage/' . $siteSettings->site_logo) }}" alt="Logo" style="height: 38px; width: auto; border-radius: 8px;">
          @else
              <div class="logo-mark">{{ substr($siteName, 0, 1) }}</div>
          @endif
          <div class="logo-text">{{ $siteName }}</div>
        </a>
        
        <div class="nav-links">
          <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
          <a href="{{ url('/about') }}" class="nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
          <a href="{{ route('team') }}" class="nav-link {{ request()->is('our-team') ? 'active' : '' }}">Our Team</a>
          <a href="{{ url('/services') }}" class="nav-link {{ request()->is('services') ? 'active' : '' }}">Services</a>
          <a href="{{ url('/contact') }}" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
        </div>
      </div>

      <div class="nav-right">
        <div class="lang-selector">
          <img src="https://flagcdn.com/w20/us.png" alt="English">
          <span>English</span>
        </div>

        <a href="{{ url('/login') }}" class="nav-cta">My account</a>
        
        <button class="hamburger" id="hamburger" onclick="openMobileMenu()">
          <span></span><span></span><span></span>
        </button>
      </div>

    </div>
  </nav>

  <div id="mobile-menu">
    <button class="mobile-close" onclick="closeMobileMenu()"><i class="fa fa-times"></i></button>
    
    <a href="{{ url('/') }}" class="mobile-nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
    <a href="{{ url('/about') }}" class="mobile-nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
    
    <a href="{{ route('team') }}" class="mobile-nav-link {{ request()->is('our-team') ? 'active' : '' }}">Our Team</a>
    
    <a href="{{ url('/services') }}" class="mobile-nav-link {{ request()->is('services') ? 'active' : '' }}">Services</a>
    <a href="{{ url('/contact') }}" class="mobile-nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
    
  </div>

  <main>
    @yield('content')
  </main>

  <footer>
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="{{ url('/') }}" class="nav-logo">
            @if(isset($siteSettings) && $siteSettings->site_logo)
                <img src="{{ asset('storage/' . $siteSettings->site_logo) }}" alt="Logo" style="height: 38px; width: auto; border-radius: 8px;">
            @else
                <div class="logo-mark">{{ substr($siteName, 0, 1) }}</div>
            @endif
            <div class="logo-text">{{ $siteName }}</div>
          </a>
          <p>Comprehensive Solutions for Tech, Finance, and Global Commerce.</p>
          <div class="footer-legal">
            <strong style="color:var(--text-muted);">{{ $siteName }}</strong><br>
            {{-- UPDATED LINE BELOW: Added nl2br() to allow line breaks --}}
            {!! nl2br(e($siteSettings->contact_address ?? 'Gedimino pr. 45-3, LT-01109 Vilnius, Lithuania')) !!}
          </div>
        </div>

        {{-- The "Services" column was completely removed from here! --}}

        <div class="footer-col">
          <h5>Site Navigation</h5>
          <ul>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/services') }}">Services</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
            <li><a href="{{ route('corporate-identity') }}">Corporate Identity</a></li>
          </ul>
        </div>
        
        <div style="margin-top:24px;">
            <h5>Contact</h5>
            <ul>
              <li><a href="mailto:{{ $siteSettings->contact_email ?? 'hello@nordvela.lt' }}">{{ $siteSettings->contact_email ?? 'hello@nordvela.lt' }}</a></li>
              <li><a href="tel:{{ $siteSettings->contact_phone ?? '+37052100440' }}">{{ $siteSettings->contact_phone ?? '+370 5 210 0440' }}</a>(Whatsapp)</li>
            </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>© {{ date('Y') }} {{ $siteName }}. All rights reserved.</p>
        <div class="footer-socials">
          <div class="social-link"><i class="fab fa-linkedin-in"></i></div>
          <div class="social-link"><i class="fab fa-github"></i></div>
        </div>
      </div>
    </div>
  </footer>

  <button id="btt" onclick="window.scrollTo({top:0,behavior:'smooth'})">
    <i class="fa fa-arrow-up"></i>
  </button>

  <script>
    // ===== CURSOR =====
    const cursor = document.getElementById('cursor');
    const ring = document.getElementById('cursor-ring');
    let mx = 0, my = 0, rx = 0, ry = 0;
    document.addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; cursor.style.left = mx + 'px'; cursor.style.top = my + 'px'; });
    function animRing() {
      rx += (mx - rx) * 0.15; ry += (my - ry) * 0.15;
      ring.style.left = rx + 'px'; ring.style.top = ry + 'px';
      requestAnimationFrame(animRing);
    }
    animRing();

    // ===== MOBILE MENU =====
    function openMobileMenu() { document.getElementById('mobile-menu').classList.add('open'); document.body.style.overflow = 'hidden'; }
    function closeMobileMenu() { document.getElementById('mobile-menu').classList.remove('open'); document.body.style.overflow = ''; }

   // ===== NAVBAR SCROLL (TRIGGERS AT 50% OF HERO) =====
    const navbar = document.getElementById('navbar');
    
    window.addEventListener('scroll', () => {
      // Find the hero section on the current page
      const heroSection = document.querySelector('.hero');
      let triggerPoint = 50; // Default trigger point for pages without a hero
      
      // If a hero section exists, calculate exactly 50% of its height
      if (heroSection) {
          triggerPoint = heroSection.offsetHeight / 2;
      }

      // Toggle the 'scrolled' class when the user scrolls past the trigger point
      navbar.classList.toggle('scrolled', window.scrollY > triggerPoint);
      
      // Show/Hide Back-to-top button
      document.getElementById('btt').classList.toggle('visible', window.scrollY > 400);
    });

    // ===== SCROLL ANIMATIONS (AOS) =====
    function setupScrollAnimations() {
      const obs = new IntersectionObserver(entries => {
        entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); } });
      }, { threshold: 0.1 });
      document.querySelectorAll('.aos, .aos-left, .aos-right').forEach(el => {
        el.classList.remove('visible'); obs.observe(el);
      });
    }

    // ===== COUNTER ANIMATIONS =====
    function animateCounters(selector) {
      const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
          if (e.isIntersecting) {
            const el = e.target, target = parseInt(el.dataset.target), dur = 2000, start = performance.now();
            function update(now) {
              const prog = Math.min((now - start) / dur, 1);
              el.textContent = Math.round((1 - Math.pow(1 - prog, 3)) * target);
              if (prog < 1) requestAnimationFrame(update);
              else el.textContent = target;
            }
            requestAnimationFrame(update);
            obs.unobserve(el);
          }
        });
      }, { threshold: 0.5 });
      document.querySelectorAll(selector).forEach(el => obs.observe(el));
    }

    // ===== INIT =====
    window.addEventListener('load', () => {
      setupScrollAnimations();
      animateCounters('.counter');
      animateCounters('.counter2');
    });
  </script>

  @stack('scripts')
</body>
</html>