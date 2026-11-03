<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Seiko Denki (M) Sdn. Bhd. | Reliable Manufacturing Solution - Wire Harness Specialist')</title>
    <meta name="description" content="@yield('meta_description', 'Seiko Denki (M) Sdn. Bhd. provides precision wire harness manufacturing for Automotive, Medical, Consumer, Semi-Conductor, Security, and Aerospace industries.')">
    
    <!-- Google Fonts: Plus Jakarta Sans & Cinzel Serif for Authentic Logo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Cinzel:wght@600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN for instant styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        seiko: {
                            blue: '#1b54a5',
                            royal: '#1b54a5',
                            navy: '#0b2545',
                            dark: '#081c34',
                            light: '#e6f0fa',
                            cyan: '#00a3e0',
                            accent: '#134074'
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'system-ui', 'sans-serif'],
                        serif: ['Cinzel', 'Playfair Display', 'Georgia', 'serif'],
                        mono: ['JetBrains Mono', 'monospace']
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js CDN for lightweight interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Lenis Smooth Scroll -->
    <script src="https://unpkg.com/lenis@1.1.20/dist/lenis.min.js"></script>

    <!-- GSAP & ScrollTrigger for Smooth Scrolling & Parallax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <!-- Page Preloader & Smooth Transition Overlay Styles -->
    <style>
        [x-cloak] { display: none !important; }
        
        /* 24-lenis: Strict Smooth Scroll Rules (Zero Native Scroll Fighting) */
        html, body {
            scroll-behavior: auto !important;
        }
        html.lenis, html.lenis body {
            height: auto;
        }
        .lenis.lenis-smooth {
            scroll-behavior: auto !important;
        }
        .lenis.lenis-smooth [data-lenis-prevent] {
            overscroll-behavior: contain;
        }
        .lenis.lenis-stopped {
            overflow: hidden;
        }
        .lenis.lenis-smooth iframe {
            pointer-events: none;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Spotlight Hover Cards */
        .spotlight-card {
            position: relative;
            overflow: hidden;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease;
        }
        .spotlight-card::before {
            content: '';
            position: absolute;
            inset: -1px;
            background: radial-gradient(450px circle at var(--mouse-x, -999px) var(--mouse-y, -999px), rgba(0, 163, 224, 0.15), rgba(0, 83, 145, 0.05) 45%, transparent 75%);
            border-radius: inherit;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 1;
        }
        .spotlight-card:hover::before {
            opacity: 1;
        }
        .spotlight-card > * {
            position: relative;
            z-index: 2;
        }

        /* 51-animation-performance: Hardware Accelerated GPU Layer */
        .will-change-transform {
            will-change: transform;
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            transform-style: preserve-3d;
        }

        /* 40-cursor-effects: High-End Engineering Precision Reticle Cursor (Desktop Only) */
        @media (pointer: fine) {
            #custom-cursor-dot, #custom-cursor-ring {
                position: fixed;
                top: 0;
                left: 0;
                border-radius: 50%;
                pointer-events: none;
                z-index: 999999;
                will-change: transform;
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            #custom-cursor-dot {
                width: 6px;
                height: 6px;
                background-color: #1b54a5;
                margin-left: -3px;
                margin-top: -3px;
            }
            #custom-cursor-ring {
                width: 34px;
                height: 34px;
                margin-left: -17px;
                margin-top: -17px;
                border: 1.5px solid rgba(27, 84, 165, 0.45);
                transition: width 0.25s cubic-bezier(0.16, 1, 0.3, 1), height 0.25s cubic-bezier(0.16, 1, 0.3, 1), margin 0.25s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.25s ease, background-color 0.25s ease;
            }
            #custom-cursor-ring.active {
                width: 52px;
                height: 52px;
                margin-left: -26px;
                margin-top: -26px;
                border-color: #00a3e0;
                background-color: rgba(0, 163, 224, 0.08);
            }
        }

        /* 39-loading-experiences: Luxury Engineering Preloader */
        #page-preloader {
            position: fixed;
            inset: 0;
            background: #ffffff;
            z-index: 99999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            pointer-events: all;
        }
        #page-preloader.loaded {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            display: none !important;
        }

        /* 38-page-transitions: Seamless Curtain Wipe */
        #page-transition-curtain {
            position: fixed;
            inset: 0;
            background: #1b54a5;
            z-index: 99998;
            transform: translateY(100%);
            pointer-events: none;
        }

        /* 36-scroll-progress: Global Engineering Status Bar */
        #scroll-progress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: transparent;
            z-index: 9999;
            pointer-events: none;
        }
        #scroll-progress-bar {
            height: 100%;
            width: 100%;
            background: linear-gradient(90deg, #1b54a5 0%, #00a3e0 100%);
            box-shadow: 0 0 10px rgba(0, 163, 224, 0.6);
            transform-origin: 0% 50%;
            transform: scaleX(0);
            will-change: transform;
        }

        /* Modern Footer Navigation Micro-Interactions (No legacy underline, smooth beacon slide) */
        .footer-nav-link {
            position: relative;
            display: inline-flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.75);
            transition: color 0.25s cubic-bezier(0.16, 1, 0.3, 1), transform 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            text-decoration: none !important;
        }
        .footer-nav-link:hover {
            color: #ffffff;
            transform: translateX(5px);
        }
        .footer-nav-link::before {
            content: '';
            position: absolute;
            left: -8px;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background-color: #00a3e0;
            opacity: 0;
            transform: scale(0);
            transition: opacity 0.25s ease, transform 0.25s ease;
        }
        .footer-nav-link:hover::before {
            opacity: 1;
            transform: scale(1);
        }

        /* Kinetic Text split reveals */
        .char-reveal-wrap {
            display: inline-block;
            overflow: hidden;
            vertical-align: top;
        }
        .char-reveal-item {
            display: inline-block;
            transform: translateY(110%);
            opacity: 0;
            transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .char-reveal-wrap.revealed .char-reveal-item {
            transform: translateY(0%);
            opacity: 1;
        }
    </style>
</head>
<body class="font-sans bg-slate-50 text-slate-800 antialiased selection:bg-blue-600 selection:text-white flex flex-col min-h-screen" x-data="{ megaMenuOpen: false, activeMenuTab: null, activeCol2Tab: null, mobileMenuOpen: false, chatOpen: false, chatInquiry: '' }">

    <!-- 40-cursor-effects: Precision Interactive Cursor -->
    <div id="custom-cursor-dot" class="hidden md:block"></div>
    <div id="custom-cursor-ring" class="hidden md:block"></div>

    <!-- 36-scroll-progress: Global Top Progress Bar -->
    <div id="scroll-progress-container">
        <div id="scroll-progress-bar"></div>
    </div>

    <!-- 39-loading-experiences: Seiko Denki Precision Preloader -->
    <div id="page-preloader" aria-hidden="true">
        <div class="flex flex-col items-center">
            <!-- Animated Waveform SVG -->
            <div class="relative w-48 sm:w-56 h-8 overflow-hidden mb-5">
                <svg class="w-full h-full text-[#1b54a5]" viewBox="0 0 240 20" fill="none">
                    <path id="preloader-wave-path" d="M 0 10 H 22 L 26 2 L 30 18 L 34 2 L 38 18 L 42 2 L 46 18 L 50 2 L 54 18 L 58 2 L 62 18 L 66 2 L 70 18 L 74 10 H 240" stroke="#1b54a5" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" fill="none" stroke-dasharray="300" stroke-dashoffset="300"/>
                </svg>
            </div>
            
            <div class="text-[11px] font-extrabold tracking-[0.2em] text-slate-900 font-serif uppercase mb-2" style="font-family: 'Cinzel', serif;">
                SEIKO DENKI (M) SDN BHD
            </div>
            
            <div class="flex items-center gap-2 text-xs font-mono font-medium text-slate-400">
                <span class="inline-block w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                <span>SYSTEM CALIBRATION</span>
                <span id="preloader-counter" class="text-blue-600 font-bold ml-1">0%</span>
            </div>
        </div>
    </div>

    <!-- 38-page-transitions: Curtain Wipe Layer -->
    <div id="page-transition-curtain"></div>

    <!-- Floating White Pill Capsule Navbar (Figma 100% Fidelity) -->
    <header id="main-header" class="fixed top-6 left-1/2 -translate-x-1/2 w-[94%] max-w-[1300px] z-50 transition-all duration-300 select-none">
        <nav id="main-navbar" class="rounded-full bg-white/95 backdrop-blur-md shadow-xl shadow-slate-900/10 border border-slate-100/90 px-8 sm:px-12 py-3.5 sm:py-4 flex items-center justify-between min-h-[72px] sm:min-h-[78px] transition-all duration-300">
            <!-- Authentic Seiko Denki Oscilloscope Waveform Logo (Figma Exact) -->
            <a href="{{ route('home') }}" class="flex flex-col group py-0.5">
                <svg class="w-44 sm:w-52 h-4 text-[#1b54a5]" viewBox="0 0 240 20" fill="none">
                    <path d="M 0 10 H 22 L 26 2 L 30 18 L 34 2 L 38 18 L 42 2 L 46 18 L 50 2 L 54 18 L 58 2 L 62 18 L 66 2 L 70 18 L 74 10 H 240" stroke="#1b54a5" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-bold tracking-[0.16em] text-slate-900 font-serif uppercase mt-1 whitespace-nowrap" style="font-family: 'Cinzel', serif;">
                    SEIKO DENKI (M) SDN BHD
                </span>
            </a>

            <!-- Right-Side Navigation Area (Figma Exact) -->
            <div class="flex items-center">
                <!-- Nav Links with Butter-Smooth Hover Transition -->
                <div class="hidden md:flex items-center gap-7 lg:gap-10 text-[13px] sm:text-[14px]">
                    <a 
                        href="{{ route('about') }}" 
                        class="transition-colors duration-300 ease-in-out font-semibold {{ request()->routeIs('about') ? 'text-[#1b54a5] font-bold' : 'text-slate-500 hover:text-[#1b54a5]' }}"
                    >
                        About Us
                    </a>
                    <a 
                        href="{{ route('products') }}" 
                        class="transition-colors duration-300 ease-in-out font-semibold {{ request()->routeIs('products') ? 'text-[#1b54a5] font-bold' : 'text-slate-500 hover:text-[#1b54a5]' }}"
                    >
                        Capabilities
                    </a>
                    <a 
                        href="{{ route('achievements') }}" 
                        class="transition-colors duration-300 ease-in-out font-semibold {{ request()->routeIs('achievements') ? 'text-[#1b54a5] font-bold' : 'text-slate-500 hover:text-[#1b54a5]' }}"
                    >
                        Compliance &amp; ESG
                    </a>
                </div>

                <!-- Circular Deep Royal Blue Bento Button (âŠž) -->
                <button 
                    @click="megaMenuOpen = !megaMenuOpen; if (megaMenuOpen) activeMenuTab = null" 
                    class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-[#1b54a5] hover:bg-[#134074] text-white flex items-center justify-center shadow-md transition-colors duration-300 ease-in-out focus:outline-none flex-shrink-0 ml-4 sm:ml-7"
                    title="Toggle Menu"
                >
                    <svg x-show="!megaMenuOpen" class="w-5 h-5 text-white fill-current" viewBox="0 0 20 20">
                        <rect x="2.5" y="2.5" width="6" height="6" rx="1.5" />
                        <rect x="11.5" y="2.5" width="6" height="6" rx="1.5" />
                        <rect x="2.5" y="11.5" width="6" height="6" rx="1.5" />
                        <rect x="11.5" y="11.5" width="6" height="6" rx="1.5" />
                    </svg>
                    <svg x-show="megaMenuOpen" x-cloak class="w-5 h-5 text-white stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                        <path d="M18 6L6 18M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </nav>
    </header>

    <!-- Figma 100% Exact Mega-Menu Drawer (Matches Figma Prototype & Screenshots) -->
    <div 
        x-show="megaMenuOpen" 
        x-cloak
        x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-[#1b54a5] text-white flex flex-col justify-between p-8 sm:p-14 lg:p-16 select-none overflow-y-auto"
        @keydown.escape.window="megaMenuOpen = false"
    >
        <!-- Top Header: Logo on Left, Big X on Right -->
        <div class="flex items-center justify-between w-full max-w-7xl mx-auto">
            <a href="{{ route('home') }}" @click="megaMenuOpen = false" class="flex flex-col group py-0.5">
                <svg class="w-44 sm:w-52 h-4 text-white" viewBox="0 0 240 20" fill="none">
                    <path d="M 0 10 H 22 L 26 2 L 30 18 L 34 2 L 38 18 L 42 2 L 46 18 L 50 2 L 54 18 L 58 2 L 62 18 L 66 2 L 70 18 L 74 10 H 240" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
                <span class="text-xs font-bold tracking-[0.16em] text-white font-serif uppercase mt-1" style="font-family: 'Cinzel', serif;">
                    SEIKO DENKI (M) SDN BHD
                </span>
            </a>

            <!-- Big Close Button (âœ•) -->
            <button 
                @click="megaMenuOpen = false" 
                class="text-white hover:text-sky-200 transition-colors duration-200 focus:outline-none p-2"
                title="Close Menu"
            >
                <i data-lucide="x" class="w-8 h-8 stroke-[2.5]"></i>
            </button>
        </div>

        <!-- Center 3-Column Navigation Grid (Exact Figma Layout with Buttery Smooth Transitions) -->
        <div class="max-w-7xl mx-auto w-full my-auto py-8 lg:py-12 relative">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 items-start relative">
                
                <!-- Column 1: Primary Navigation (lg:col-span-4) -->
                <div class="lg:col-span-4 space-y-8 sm:space-y-10">
                    
                    <!-- 1. Home -->
                    <div 
                        @mouseenter="activeMenuTab = 'home'" 
                        class="group cursor-pointer select-none"
                    >
                        <a 
                            href="{{ route('home') }}" 
                            @click="megaMenuOpen = false"
                            class="text-xl sm:text-2xl tracking-tight block pb-3.5 sm:pb-4 transition-all duration-300 ease-out"
                            :class="activeMenuTab === 'home' ? 'text-white font-bold drop-shadow' : 'text-white/60 font-medium group-hover:text-white'"
                        >
                            Home
                        </a>
                        <div class="flex items-center w-full max-w-[280px] sm:max-w-[320px]">
                            <div 
                                class="flex-1 h-[1.5px] transition-all duration-300 ease-out"
                                :class="activeMenuTab === 'home' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                            ></div>
                            <svg 
                                class="w-10 h-2.5 transition-all duration-300 ease-out flex-shrink-0"
                                :class="activeMenuTab === 'home' ? 'text-white stroke-white' : 'text-white/30 stroke-white/30 group-hover:text-white group-hover:stroke-white'"
                                viewBox="0 0 40 10" 
                                fill="none"
                            >
                                <path d="M0 5 H8 L12 1 L16 9 L20 1 L24 9 L28 1 L32 9 L36 5 H40" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div 
                                class="w-8 sm:w-12 h-[1.5px] transition-all duration-300 ease-out flex-shrink-0"
                                :class="activeMenuTab === 'home' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                            ></div>
                        </div>
                    </div>

                    <!-- 2. About Us -->
                    <div 
                        @mouseenter="activeMenuTab = 'about'" 
                        class="group cursor-pointer select-none"
                    >
                        <a 
                            href="{{ route('about') }}" 
                            @click="megaMenuOpen = false"
                            class="text-xl sm:text-2xl tracking-tight block pb-3.5 sm:pb-4 transition-all duration-300 ease-out"
                            :class="activeMenuTab === 'about' ? 'text-white font-bold drop-shadow' : 'text-white/60 font-medium group-hover:text-white'"
                        >
                            About Us
                        </a>
                        <div class="flex items-center w-full max-w-[280px] sm:max-w-[320px]">
                            <div 
                                class="flex-1 h-[1.5px] transition-all duration-300 ease-out"
                                :class="activeMenuTab === 'about' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                            ></div>
                            <svg 
                                class="w-10 h-2.5 transition-all duration-300 ease-out flex-shrink-0"
                                :class="activeMenuTab === 'about' ? 'text-white stroke-white' : 'text-white/30 stroke-white/30 group-hover:text-white group-hover:stroke-white'"
                                viewBox="0 0 40 10" 
                                fill="none"
                            >
                                <path d="M0 5 H8 L12 1 L16 9 L20 1 L24 9 L28 1 L32 9 L36 5 H40" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div 
                                class="w-8 sm:w-12 h-[1.5px] transition-all duration-300 ease-out flex-shrink-0"
                                :class="activeMenuTab === 'about' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                            ></div>
                        </div>
                    </div>

                    <!-- 3. Capabilities -->
                    <div 
                        @mouseenter="activeMenuTab = 'capabilities'" 
                        class="group cursor-pointer select-none"
                    >
                        <a 
                            href="{{ route('products') }}" 
                            @click="megaMenuOpen = false"
                            class="text-xl sm:text-2xl tracking-tight block pb-3.5 sm:pb-4 transition-all duration-300 ease-out"
                            :class="activeMenuTab === 'capabilities' ? 'text-white font-bold drop-shadow' : 'text-white/60 font-medium group-hover:text-white'"
                        >
                            Capabilities
                        </a>
                        <div class="flex items-center w-full max-w-[280px] sm:max-w-[320px]">
                            <div 
                                class="flex-1 h-[1.5px] transition-all duration-300 ease-out"
                                :class="activeMenuTab === 'capabilities' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                            ></div>
                            <svg 
                                class="w-10 h-2.5 transition-all duration-300 ease-out flex-shrink-0"
                                :class="activeMenuTab === 'capabilities' ? 'text-white stroke-white' : 'text-white/30 stroke-white/30 group-hover:text-white group-hover:stroke-white'"
                                viewBox="0 0 40 10" 
                                fill="none"
                            >
                                <path d="M0 5 H8 L12 1 L16 9 L20 1 L24 9 L28 1 L32 9 L36 5 H40" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div 
                                class="w-8 sm:w-12 h-[1.5px] transition-all duration-300 ease-out flex-shrink-0"
                                :class="activeMenuTab === 'capabilities' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                            ></div>
                        </div>
                    </div>

                    <!-- 4. Facilities -->
                    <div 
                        @mouseenter="activeMenuTab = 'facilities'" 
                        class="group cursor-pointer select-none"
                    >
                        <a 
                            href="{{ route('facilities') }}" 
                            @click="megaMenuOpen = false"
                            class="text-xl sm:text-2xl tracking-tight block pb-3.5 sm:pb-4 transition-all duration-300 ease-out"
                            :class="activeMenuTab === 'facilities' ? 'text-white font-bold drop-shadow' : 'text-white/60 font-medium group-hover:text-white'"
                        >
                            Facilities
                        </a>
                        <div class="flex items-center w-full max-w-[280px] sm:max-w-[320px]">
                            <div 
                                class="flex-1 h-[1.5px] transition-all duration-300 ease-out"
                                :class="activeMenuTab === 'facilities' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                            ></div>
                            <svg 
                                class="w-10 h-2.5 transition-all duration-300 ease-out flex-shrink-0"
                                :class="activeMenuTab === 'facilities' ? 'text-white stroke-white' : 'text-white/30 stroke-white/30 group-hover:text-white group-hover:stroke-white'"
                                viewBox="0 0 40 10" 
                                fill="none"
                            >
                                <path d="M0 5 H8 L12 1 L16 9 L20 1 L24 9 L28 1 L32 9 L36 5 H40" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div 
                                class="w-8 sm:w-12 h-[1.5px] transition-all duration-300 ease-out flex-shrink-0"
                                :class="activeMenuTab === 'facilities' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                            ></div>
                        </div>
                    </div>

                </div>

                <!-- Column 2: Dynamic Sub-Navigation with Vertical Wave Separator (lg:col-span-5) -->
                <div class="lg:col-span-5 relative lg:pl-10 min-h-[280px] flex flex-col justify-start">
                    
                    <!-- Vertical Divider Line (Full-Height Span between Column 1 and Column 2 - Figma Exact) -->
                    <div 
                        x-show="activeMenuTab === 'about'" 
                        x-transition:enter="transition-opacity ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="hidden lg:block absolute -left-4 top-[-100vh] bottom-[-100vh] w-[1px] bg-white/20 pointer-events-none z-30"
                    ></div>

                    <!-- Vertical Wave Glyphs Centered Vertically opposite 'About Us' -->
                    <div 
                        x-show="activeMenuTab === 'about'" 
                        x-transition:enter="transition-opacity ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="hidden lg:block absolute -left-4 top-[146px] -translate-y-1/2 -translate-x-1/2 text-white z-30 pointer-events-none"
                    >
                        <svg class="w-3.5 h-12 text-white stroke-white" viewBox="0 0 14 48" fill="none">
                            <path d="M7 0 V12 L1 15 L13 18 L1 21 L13 24 L1 27 L13 30 L1 33 L7 36 V48" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <!-- State A: About Us Sub-Items (Clean Text Links with Smooth Slide-in) -->
                    <div 
                        x-show="activeMenuTab === 'about'" 
                        x-transition:enter="transition-all ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-x-3"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition-all ease-in duration-150 absolute"
                        x-transition:leave-start="opacity-100 translate-x-0"
                        x-transition:leave-end="opacity-0 translate-x-3"
                        class="space-y-6 pt-16 sm:pt-20 pl-10 sm:pl-14 text-base sm:text-lg font-medium"
                    >
                        <a href="{{ route('about') }}#company-profile" @click="megaMenuOpen = false" class="block text-white/70 hover:text-white hover:translate-x-2 transition-all duration-200 ease-out">Overview</a>
                        <a href="{{ route('about') }}#milestones" @click="megaMenuOpen = false" class="block text-white/70 hover:text-white hover:translate-x-2 transition-all duration-200 ease-out">Milestones</a>
                        <a href="{{ route('about') }}#team" @click="megaMenuOpen = false" class="block text-white/70 hover:text-white hover:translate-x-2 transition-all duration-200 ease-out">Our Team</a>
                        <a href="{{ route('about') }}#affiliations" @click="megaMenuOpen = false" class="block text-white/70 hover:text-white hover:translate-x-2 transition-all duration-200 ease-out">Our Associates</a>
                    </div>

                    <!-- State B: Default / Capabilities Items (Industries Served, Compliance & ESG, News & Insights) -->
                    <div 
                        x-show="activeMenuTab !== 'about'" 
                        x-transition:enter="transition-all ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-x-3"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition-all ease-in duration-150 absolute"
                        x-transition:leave-start="opacity-100 translate-x-0"
                        x-transition:leave-end="opacity-0 translate-x-3"
                        class="space-y-8 sm:space-y-10"
                    >
                        <!-- Industries Served -->
                        <div 
                            @mouseenter="activeCol2Tab = 'industries'" 
                            @mouseleave="activeCol2Tab = null"
                            class="group cursor-pointer select-none"
                        >
                            <a 
                                href="{{ route('products') }}#industries" 
                                @click="megaMenuOpen = false"
                                class="text-xl sm:text-2xl tracking-tight block pb-3.5 sm:pb-4 transition-all duration-300 ease-out"
                                :class="activeCol2Tab === 'industries' ? 'text-white font-bold drop-shadow' : 'text-white/60 font-medium group-hover:text-white'"
                            >
                                Industries Served
                            </a>
                            <div class="flex items-center w-full max-w-[280px] sm:max-w-[320px]">
                                <div 
                                    class="flex-1 h-[1.5px] transition-all duration-300 ease-out"
                                    :class="activeCol2Tab === 'industries' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                                ></div>
                                <svg 
                                    class="w-10 h-2.5 transition-all duration-300 ease-out flex-shrink-0"
                                    :class="activeCol2Tab === 'industries' ? 'text-white stroke-white' : 'text-white/30 stroke-white/30 group-hover:text-white group-hover:stroke-white'"
                                    viewBox="0 0 40 10" 
                                    fill="none"
                                >
                                    <path d="M0 5 H8 L12 1 L16 9 L20 1 L24 9 L28 1 L32 9 L36 5 H40" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <div 
                                    class="w-8 sm:w-12 h-[1.5px] transition-all duration-300 ease-out flex-shrink-0"
                                    :class="activeCol2Tab === 'industries' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                                ></div>
                            </div>
                        </div>

                        <!-- Compliance & ESG -->
                        <div 
                            @mouseenter="activeCol2Tab = 'compliance'" 
                            @mouseleave="activeCol2Tab = null"
                            class="group cursor-pointer select-none"
                        >
                            <a 
                                href="{{ route('achievements') }}" 
                                @click="megaMenuOpen = false"
                                class="text-xl sm:text-2xl tracking-tight block pb-3.5 sm:pb-4 transition-all duration-300 ease-out"
                                :class="activeCol2Tab === 'compliance' ? 'text-white font-bold drop-shadow' : 'text-white/60 font-medium group-hover:text-white'"
                            >
                                Compliance &amp; ESG
                            </a>
                            <div class="flex items-center w-full max-w-[280px] sm:max-w-[320px]">
                                <div 
                                    class="flex-1 h-[1.5px] transition-all duration-300 ease-out"
                                    :class="activeCol2Tab === 'compliance' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                                ></div>
                                <svg 
                                    class="w-10 h-2.5 transition-all duration-300 ease-out flex-shrink-0"
                                    :class="activeCol2Tab === 'compliance' ? 'text-white stroke-white' : 'text-white/30 stroke-white/30 group-hover:text-white group-hover:stroke-white'"
                                    viewBox="0 0 40 10" 
                                    fill="none"
                                >
                                    <path d="M0 5 H8 L12 1 L16 9 L20 1 L24 9 L28 1 L32 9 L36 5 H40" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <div 
                                    class="w-8 sm:w-12 h-[1.5px] transition-all duration-300 ease-out flex-shrink-0"
                                    :class="activeCol2Tab === 'compliance' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                                ></div>
                            </div>
                        </div>

                        <!-- News & Insights -->
                        <div 
                            @mouseenter="activeCol2Tab = 'news'" 
                            @mouseleave="activeCol2Tab = null"
                            class="group cursor-pointer select-none"
                        >
                            <a 
                                href="{{ route('news') }}" 
                                @click="megaMenuOpen = false"
                                class="text-xl sm:text-2xl tracking-tight block pb-3.5 sm:pb-4 transition-all duration-300 ease-out"
                                :class="activeCol2Tab === 'news' ? 'text-white font-bold drop-shadow' : 'text-white/60 font-medium group-hover:text-white'"
                            >
                                News &amp; Insights
                            </a>
                            <div class="flex items-center w-full max-w-[280px] sm:max-w-[320px]">
                                <div 
                                    class="flex-1 h-[1.5px] transition-all duration-300 ease-out"
                                    :class="activeCol2Tab === 'news' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                                ></div>
                                <svg 
                                    class="w-10 h-2.5 transition-all duration-300 ease-out flex-shrink-0"
                                    :class="activeCol2Tab === 'news' ? 'text-white stroke-white' : 'text-white/30 stroke-white/30 group-hover:text-white group-hover:stroke-white'"
                                    viewBox="0 0 40 10" 
                                    fill="none"
                                >
                                    <path d="M0 5 H8 L12 1 L16 9 L20 1 L24 9 L28 1 L32 9 L36 5 H40" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <div 
                                    class="w-8 sm:w-12 h-[1.5px] transition-all duration-300 ease-out flex-shrink-0"
                                    :class="activeCol2Tab === 'news' ? 'bg-white' : 'bg-white/20 group-hover:bg-white'"
                                ></div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Column 3: Others (lg:col-span-3) -->
                <div class="lg:col-span-3 space-y-4 lg:pl-6 select-none">
                    <h4 class="text-base sm:text-lg font-bold text-white tracking-tight mb-4">Others</h4>
                    <div class="space-y-3.5 text-sm sm:text-base text-white/70 font-medium">
                        <a href="{{ route('about') }}#career" @click="megaMenuOpen = false" class="block hover:text-white hover:translate-x-1.5 transition-all duration-200 ease-out">Career</a>
                        <a href="{{ route('contact') }}#faq" @click="megaMenuOpen = false" class="block hover:text-white hover:translate-x-1.5 transition-all duration-200 ease-out">FAQs</a>
                        <a href="{{ route('contact') }}" @click="megaMenuOpen = false" class="block hover:text-white hover:translate-x-1.5 transition-all duration-200 ease-out">Contact Us</a>
                        <a href="{{ route('analytics') }}" @click="megaMenuOpen = false" class="block hover:text-white transition-colors text-xs text-sky-200 pt-2">Executive Traffic Report</a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Right Floating Utility Icons (Email & Wire Harness Cable Connector - Figma Exact) -->
        <div class="fixed bottom-6 sm:bottom-8 right-6 sm:right-8 flex flex-col gap-4 items-center text-white/70 z-50">
            <a href="mailto:info@seikodenki.com.my" title="Email Seiko Denki" class="hover:text-white transition-opacity duration-200">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="16" x="2" y="4" rx="2"/>
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                </svg>
            </a>
            <a href="{{ route('products') }}" title="Wire Harness & Interconnects" class="hover:text-white transition-opacity duration-200">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 5h-4a3 3 0 0 0-3 3v8a3 3 0 0 1-3 3H5"/>
                    <rect x="18" y="3" width="5" height="4" rx="1" fill="currentColor"/>
                    <rect x="1" y="17" width="5" height="4" rx="1" fill="currentColor"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Main Content Slot: Starts at top:0 so full-bleed hero image fills the screen behind the floating menu -->
    <main class="flex-1 {{ request()->routeIs('analytics') ? 'pt-24 sm:pt-28' : '' }}">
        @yield('content')
    </main>

    <!-- Figma Exact Royal Blue Footer Section (Flawless, Clean Architectural Grid without Box Artifacts) -->
    <footer class="bg-[#1B54A5] text-white pt-16 sm:pt-20 pb-12 relative overflow-hidden select-none">
        
        <div class="max-w-[1400px] mx-auto px-4 sm:px-8 lg:px-12">
            
            <!-- Top Footer Navigation Grid (Clean 6 Columns - Exactly matching Figma Information Architecture) -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-8 sm:gap-10 pb-16 sm:pb-20">
                
                <!-- Col 1: Home -->
                <div class="space-y-3.5">
                    <h5 class="text-xs sm:text-[13px] font-bold text-white tracking-wide uppercase">Home</h5>
                    <ul class="space-y-2.5 text-xs text-white/80 font-normal">
                        <li><a href="{{ route('home') }}" class="footer-nav-link">Overview</a></li>
                        <li><a href="{{ route('products') }}" class="footer-nav-link">Capabilities</a></li>
                        <li><a href="{{ route('facilities') }}" class="footer-nav-link">Facilities</a></li>
                    </ul>
                </div>

                <!-- Col 2: Industries -->
                <div class="space-y-3.5">
                    <h5 class="text-xs sm:text-[13px] font-bold text-white tracking-wide uppercase">Industries Served</h5>
                    <ul class="space-y-2.5 text-xs text-white/80 font-normal">
                        <li><a href="{{ route('home') }}#industries-we-serve" class="footer-nav-link">Industrial Automation</a></li>
                        <li><a href="{{ route('home') }}#industries-we-serve" class="footer-nav-link">Automotive & Transport</a></li>
                        <li><a href="{{ route('home') }}#industries-we-serve" class="footer-nav-link">Medical & Healthcare</a></li>
                        <li><a href="{{ route('achievements') }}" class="footer-nav-link">Compliance & ESG</a></li>
                    </ul>
                </div>

                <!-- Col 3: About Us -->
                <div class="space-y-3.5">
                    <h5 class="text-xs sm:text-[13px] font-bold text-white tracking-wide uppercase">About Us</h5>
                    <ul class="space-y-2.5 text-xs text-white/80 font-normal">
                        <li><a href="{{ route('about') }}" class="footer-nav-link">Overview</a></li>
                        <li><a href="{{ route('about') }}#company-profile" class="footer-nav-link">Milestones</a></li>
                        <li><a href="{{ route('about') }}#team" class="footer-nav-link">Our Team</a></li>
                        <li><a href="{{ route('about') }}#associates" class="footer-nav-link">Our Associates</a></li>
                    </ul>
                </div>

                <!-- Col 4: Insights -->
                <div class="space-y-3.5">
                    <h5 class="text-xs sm:text-[13px] font-bold text-white tracking-wide uppercase">Insights</h5>
                    <ul class="space-y-2.5 text-xs text-white/80 font-normal">
                        <li><a href="{{ route('news') }}" class="footer-nav-link">Events</a></li>
                        <li><a href="{{ route('news') }}" class="footer-nav-link">Articles</a></li>
                        <li><a href="{{ route('achievements') }}" class="footer-nav-link">Standards</a></li>
                    </ul>
                </div>

                <!-- Col 5: Others -->
                <div class="space-y-3.5">
                    <h5 class="text-xs sm:text-[13px] font-bold text-white tracking-wide uppercase">Others</h5>
                    <ul class="space-y-2.5 text-xs text-white/80 font-normal">
                        <li><a href="{{ route('about') }}#career" class="footer-nav-link">Career</a></li>
                        <li><a href="{{ route('contact') }}#faq" class="footer-nav-link">FAQs</a></li>
                        <li><a href="{{ route('contact') }}" class="footer-nav-link">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Col 6: Legal -->
                <div class="space-y-3.5">
                    <h5 class="text-xs sm:text-[13px] font-bold text-white tracking-wide uppercase">Legal</h5>
                    <ul class="space-y-2.5 text-xs text-white/80 font-normal">
                        <li><a href="{{ route('contact') }}#privacy" class="footer-nav-link">Privacy Policy</a></li>
                        <li><a href="{{ route('contact') }}#terms" class="footer-nav-link">Terms of Use</a></li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Row: Social Icons, Copyright & Architectural Wave Logo (Flawless without stray box lines) -->
            <div class="pt-8 border-t border-white/20 flex flex-col md:flex-row items-center justify-between gap-8">
                
                <!-- Left: Follow Us + Circular Social Icons + Copyright -->
                <div class="space-y-4 text-center md:text-left">
                    <div class="flex items-center justify-center md:justify-start gap-4">
                        <span class="text-xs sm:text-sm font-bold text-white tracking-tight">Follow Us</span>
                        
                        <!-- Facebook -->
                        <a href="https://facebook.com" target="_blank" rel="noopener" aria-label="Facebook" class="w-8 h-8 rounded-full bg-white/20 hover:bg-white text-white hover:text-[#1B54A5] flex items-center justify-center hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>

                        <!-- Twitter / X -->
                        <a href="https://twitter.com" target="_blank" rel="noopener" aria-label="Twitter" class="w-8 h-8 rounded-full bg-white/20 hover:bg-white text-white hover:text-[#1B54A5] flex items-center justify-center hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://linkedin.com" target="_blank" rel="noopener" aria-label="LinkedIn" class="w-8 h-8 rounded-full bg-white/20 hover:bg-white text-white hover:text-[#1B54A5] flex items-center justify-center hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>

                        <!-- YouTube -->
                        <a href="https://youtube.com" target="_blank" rel="noopener" aria-label="YouTube" class="w-8 h-8 rounded-full bg-white/20 hover:bg-white text-white hover:text-[#1B54A5] flex items-center justify-center hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Copyright Notice -->
                    <p class="text-[11px] text-white/70 font-normal">
                        Copyright &copy; {{ date('Y') }} Seiko Denki (M) Sdn. Bhd. All Rights Reserved.
                    </p>
                </div>

                <!-- Right: Pure Seiko Denki Oscilloscope Wordmark Logo (Seamless Vector, Static, Non-interactive) -->
                <div class="flex flex-col items-center md:items-end select-none pointer-events-none">
                    <div class="flex items-center text-white mb-2">
                        <div class="w-8 sm:w-12 h-[1.5px] bg-white"></div>
                        <svg class="w-12 sm:w-16 h-4 text-white -mx-[0.5px] block" viewBox="0 0 40 10" fill="none">
                            <path d="M0 5 H8 L12 1 L16 9 L20 1 L24 9 L28 1 L32 9 L36 5 H40" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="round"/>
                        </svg>
                        <div class="w-32 sm:w-48 h-[1.5px] bg-white"></div>
                    </div>
                    <span class="text-sm sm:text-base font-serif font-extrabold tracking-wider text-white uppercase">
                        SEIKO DENKI (M) SDN BHD
                    </span>
                </div>
                </div>

            </div>

        </div>

    </footer>

    <!-- Floating Right Edge Action Dock (Figma Exact: Mail, Share) -->
    <div class="fixed top-1/2 -translate-y-1/2 right-4 sm:right-6 z-40 hidden sm:flex flex-col gap-3">
        <!-- Email Direct Link -->
        <a 
            href="mailto:info@seikodenki.com.my" 
            class="w-10 h-10 rounded-full bg-slate-900/60 hover:bg-slate-900 text-white backdrop-blur border border-white/20 flex items-center justify-center shadow-lg transition-colors group relative"
            title="Email Seiko Denki"
        >
            <i data-lucide="mail" class="w-4 h-4"></i>
            <span class="hidden group-hover:block absolute right-full mr-3 whitespace-nowrap px-2.5 py-1 rounded-md bg-slate-900 text-white text-[11px] font-medium shadow-md">
                info@seikodenki.com.my
            </span>
        </a>

        <!-- Share Page -->
        <button 
            @click="if (navigator.share) { navigator.share({ title: document.title, url: window.location.href }); } else { navigator.clipboard.writeText(window.location.href); alert('Page URL copied to clipboard!'); }" 
            class="w-10 h-10 rounded-full bg-slate-900/60 hover:bg-slate-900 text-white backdrop-blur border border-white/20 flex items-center justify-center shadow-lg transition-colors group relative"
            title="Share Seiko Denki"
        >
            <i data-lucide="share-2" class="w-4 h-4"></i>
            <span class="hidden group-hover:block absolute right-full mr-3 whitespace-nowrap px-2.5 py-1 rounded-md bg-slate-900 text-white text-[11px] font-medium shadow-md">
                Share Link
            </span>
        </button>
    </div>

    <!-- Floating WhatsApp Assistant Button (Feature 1 in Document, Figma Exact) -->
    <div class="fixed bottom-6 right-6 z-40">
        <button 
            @click="chatOpen = true" 
            class="relative group w-14 h-14 rounded-full bg-[#25D366] hover:bg-emerald-500 text-white shadow-2xl shadow-emerald-600/40 transition-colors flex items-center justify-center"
            title="Chat with Seiko Denki on WhatsApp"
        >
            <i data-lucide="message-square" class="w-7 h-7"></i>
            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white rounded-full text-[11px] font-bold flex items-center justify-center shadow">1</span>
            <span class="hidden group-hover:block absolute right-full mr-3 whitespace-nowrap px-3 py-1.5 rounded-xl bg-slate-900 text-white text-xs font-semibold shadow-lg">
                Chat on WhatsApp
            </span>
        </button>
    </div>

    <!-- WhatsApp Qualifying Live Chatbox Modal (Feature 1 in Document) -->
    @include('components.whatsapp-chatbox')

    <!-- Global Motion & Interaction Engine (Lenis + GSAP ScrollTrigger + Spotlight Tracking) -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Initialize Lucide Icons
            if (window.lucide) {
                lucide.createIcons();
                setTimeout(() => lucide.createIcons(), 200);
            }

            // 2. 24-lenis: Initialize Ultra-Smooth Lenis Scroll with Higher Inertial Glide
            if (typeof Lenis !== 'undefined') {
                const lenis = new Lenis({
                    lerp: 0.088, // Optimal sweet spot for fluid, natural inertial momentum
                    wheelMultiplier: 1.0,
                    touchMultiplier: 1.5,
                    smoothWheel: true,
                    smoothTouch: false, // Let native OS handle touch momentum on mobile/touch screens
                    autoResize: true,
                    prevent: (node) => node.classList?.contains('lenis-prevent') || node.closest?.('[data-lenis-prevent]')
                });

                window.lenis = lenis;

                // 36-scroll-progress: Accelerated ScaleX Progress Update
                const progressBar = document.getElementById('scroll-progress-bar');
                if (progressBar) {
                    lenis.on('scroll', ({ progress }) => {
                        progressBar.style.transform = `scaleX(${progress})`;
                    });
                }

                // Sync Lenis with GSAP ScrollTrigger
                if (typeof ScrollTrigger !== 'undefined' && typeof gsap !== 'undefined') {
                    gsap.registerPlugin(ScrollTrigger);
                    
                    // Lenis scroll event drives ScrollTrigger
                    lenis.on('scroll', ScrollTrigger.update);

                    // GSAP Ticker drives Lenis RAF loop
                    gsap.ticker.add((time) => {
                        lenis.raf(time * 1000);
                    });

                    // CRITICAL: Disable GSAP lag smoothing to eliminate desync, frame jumps, and rubber-banding
                    gsap.ticker.lagSmoothing(0);
                } else {
                    function raf(time) {
                        lenis.raf(time);
                        requestAnimationFrame(raf);
                    }
                    requestAnimationFrame(raf);
                }
            }

            // 3. 39-loading-experiences: Precision Calibration Preloader Animation
            const preloader = document.getElementById('page-preloader');
            const preloaderCounter = document.getElementById('preloader-counter');
            const preloaderWave = document.getElementById('preloader-wave-path');
            
            if (preloader) {
                let progress = 0;
                const interval = setInterval(() => {
                    progress += Math.floor(Math.random() * 18) + 8;
                    if (progress > 100) progress = 100;
                    
                    if (preloaderCounter) {
                        preloaderCounter.textContent = progress + '%';
                    }
                    if (preloaderWave) {
                        const offset = 300 - (300 * (progress / 100));
                        preloaderWave.style.strokeDashoffset = offset;
                    }
                    
                    if (progress >= 100) {
                        clearInterval(interval);
                        setTimeout(() => {
                            preloader.classList.add('loaded');
                            // Trigger initial hero text entrance animations
                            document.querySelectorAll('.char-reveal-wrap').forEach((wrap, i) => {
                                setTimeout(() => wrap.classList.add('revealed'), i * 80);
                            });
                        }, 250);
                    }
                }, 35);
            }

            // 4. 38-page-transitions: Intercept internal clicks for smooth page transitions
            const curtain = document.getElementById('page-transition-curtain');
            document.querySelectorAll('a[href]').forEach((link) => {
                const href = link.getAttribute('href');
                if (
                    href && 
                    !href.startsWith('#') && 
                    !href.startsWith('javascript:') && 
                    !href.startsWith('mailto:') && 
                    !href.startsWith('tel:') && 
                    link.target !== '_blank' &&
                    (href.startsWith('/') || href.includes(window.location.host))
                ) {
                    link.addEventListener('click', (e) => {
                        if (e.metaKey || e.ctrlKey) return;
                        e.preventDefault();
                        if (curtain && typeof gsap !== 'undefined') {
                            gsap.to(curtain, {
                                y: '0%',
                                duration: 0.45,
                                ease: 'power3.inOut',
                                onComplete: () => {
                                    window.location.href = href;
                                }
                            });
                        } else {
                            window.location.href = href;
                        }
                    });
                }
            });

            // 5. 36-scroll-progress: Fallback progress bar update if Lenis is absent
            if (!window.lenis) {
                const progressBar = document.getElementById('scroll-progress-bar');
                if (progressBar) {
                    window.addEventListener('scroll', () => {
                        const scrollTop = window.scrollY || document.documentElement.scrollTop;
                        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                        const scrollPercent = docHeight > 0 ? (scrollTop / docHeight) : 0;
                        progressBar.style.transform = `scaleX(${scrollPercent})`;
                    }, { passive: true });
                }
            }

            // 6. 40-cursor-effects: High-End Precision Cursor & Magnetic Interactions (Desktop Only, Pure GPU Compositor)
            if (window.matchMedia('(pointer: fine)').matches) {
                const cursorDot = document.getElementById('custom-cursor-dot');
                const cursorRing = document.getElementById('custom-cursor-ring');
                
                if (cursorDot && cursorRing) {
                    let mouseX = window.innerWidth / 2;
                    let mouseY = window.innerHeight / 2;
                    let ringX = mouseX;
                    let ringY = mouseY;
                    let isVisible = false;

                    window.addEventListener('mousemove', (e) => {
                        mouseX = e.clientX;
                        mouseY = e.clientY;
                        cursorDot.style.transform = `translate3d(${mouseX}px, ${mouseY}px, 0)`;
                        
                        if (!isVisible) {
                            cursorDot.style.opacity = '1';
                            cursorRing.style.opacity = '1';
                            isVisible = true;
                        }
                    }, { passive: true });

                    window.addEventListener('mouseleave', () => {
                        cursorDot.style.opacity = '0';
                        cursorRing.style.opacity = '0';
                        isVisible = false;
                    });

                    // Butter-smooth GPU compositor lerp loop for cursor ring
                    function renderCursor() {
                        ringX += (mouseX - ringX) * 0.22;
                        ringY += (mouseY - ringY) * 0.22;
                        cursorRing.style.transform = `translate3d(${ringX}px, ${ringY}px, 0)`;
                        requestAnimationFrame(renderCursor);
                    }
                    requestAnimationFrame(renderCursor);

                    // Expand ring and snap magnetic elements on hover
                    const interactiveTargets = 'a, button, [role="button"], input, select, textarea, .spotlight-card, .magnetic-target';
                    document.querySelectorAll(interactiveTargets).forEach((el) => {
                        el.addEventListener('mouseenter', () => {
                            cursorRing.classList.add('active');
                        });
                        el.addEventListener('mouseleave', () => {
                            cursorRing.classList.remove('active');
                        });
                    });

                    // 37-micro-interactions: Subtle Magnetic pull on special badges
                    document.querySelectorAll('.magnetic-target').forEach((target) => {
                        target.addEventListener('mousemove', (e) => {
                            const rect = target.getBoundingClientRect();
                            const x = e.clientX - rect.left - rect.width / 2;
                            const y = e.clientY - rect.top - rect.height / 2;
                            target.style.transform = `translate3d(${x * 0.28}px, ${y * 0.28}px, 0)`;
                        });
                        target.addEventListener('mouseleave', () => {
                            target.style.transform = 'translate3d(0, 0, 0)';
                        });
                    });
                }
            }

            // 7. Spotlight Card Hover Tracker (Fluxora / Visor style - Clean radial highlight without transform conflict)
            document.querySelectorAll('.spotlight-card').forEach((card) => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    card.style.setProperty('--mouse-x', `${x}px`);
                    card.style.setProperty('--mouse-y', `${y}px`);
                });
            });

            // 8. Dynamic Navbar Floating Depth on Scroll (State-guarded to prevent layout thrashing)
            const mainHeader = document.getElementById('main-header');
            const mainNavbar = document.getElementById('main-navbar');
            if (mainHeader && mainNavbar && typeof ScrollTrigger !== 'undefined') {
                let isNavbarScrolled = false;
                ScrollTrigger.create({
                    start: 'top -50',
                    onUpdate: (self) => {
                        const shouldBeScrolled = self.progress > 0;
                        if (shouldBeScrolled !== isNavbarScrolled) {
                            isNavbarScrolled = shouldBeScrolled;
                            if (isNavbarScrolled) {
                                mainHeader.classList.add('top-3');
                                mainHeader.classList.remove('top-6');
                                mainNavbar.classList.add('shadow-2xl', 'shadow-slate-900/15', 'py-2.5', 'sm:py-3', 'bg-white/98');
                                mainNavbar.classList.remove('py-3.5', 'sm:py-4', 'bg-white/95');
                            } else {
                                mainHeader.classList.add('top-6');
                                mainHeader.classList.remove('top-3');
                                mainNavbar.classList.add('py-3.5', 'sm:py-4', 'bg-white/95');
                                mainNavbar.classList.remove('shadow-2xl', 'shadow-slate-900/15', 'py-2.5', 'sm:py-3', 'bg-white/98');
                            }
                        }
                    }
                });
            }

            // 8. Global Utility GSAP Reveals
            if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
                gsap.utils.toArray('.gsap-fade-up').forEach((elem) => {
                    gsap.from(elem, {
                        scrollTrigger: {
                            trigger: elem,
                            start: 'top 88%',
                            toggleActions: 'play none none none'
                        },
                        y: 35,
                        opacity: 0,
                        duration: 0.85,
                        ease: 'power3.out'
                    });
                });
            }
        });
    </script>
</body>
</html>
