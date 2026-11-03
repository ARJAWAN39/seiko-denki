@extends('layouts.app')

@section('title', 'Seiko Denki (M) Sdn. Bhd. | Reliable Manufacturing Solution - Wire Harness Specialist')

@section('content')

<!-- 1. Hero Section (Figma 100% Exact: Dynamic Clean Carousel with Parallax) -->
<section 
    id="hero-section"
    class="relative min-h-[660px] h-[92vh] max-h-[960px] w-full flex items-center overflow-hidden bg-slate-950 select-none" 
    x-data="{ 
        activeSlide: 0, 
        slides: [
            {
                image: '{{ asset('images/hd/hero_slide_1.jpg') }}',
                headline: 'Precision Custom Wire Harness<br>&amp; Cable Assembly Manufacturer',
                subtitle: 'Delivering Build-to-Print OEM & ODM wire harness manufacturing solutions from Johor Bahru, Malaysia to global electronics and industrial leaders.',
                cta2Text: 'Our Capabilities',
                cta2Url: '{{ route('products') }}'
            },
            {
                image: '{{ asset('images/hd/hero_slide_2.jpg') }}',
                headline: 'Advanced Automated Processing<br>&amp; High-Precision Production',
                subtitle: 'Equipped with state-of-the-art crimping, soldering, and 100% electrical testing facilities across two manufacturing plants in Senai and Tebrau, Johor.',
                cta2Text: 'Facilities &amp; Capabilities',
                cta2Url: '{{ route('facilities') }}'
            },
            {
                image: '{{ asset('images/hd/hero_slide_3.jpg') }}',
                headline: 'Certified Quality Standards<br>for Global Supply Chains',
                subtitle: 'Fully compliant with RoHS, REACH, and international quality management standards, supporting export-grade manufacturing across Southeast Asia and worldwide.',
                cta2Text: 'Compliance &amp; Standards',
                cta2Url: '{{ route('achievements') }}'
            }
        ]
    }"
>
    <!-- Background Slide Images Container with Parallax Support -->
    <div id="hero-bg-parallax" class="absolute inset-0 w-full h-full">
        <template x-for="(slide, idx) in slides" :key="idx">
            <div 
                class="absolute inset-0 transition-opacity duration-700 ease-in-out pointer-events-none"
                :class="activeSlide === idx ? 'opacity-100' : 'opacity-0'"
            >
                <img 
                    :src="slide.image" 
                    :alt="'Seiko Denki Manufacturing Slide ' + (idx + 1)" 
                    class="w-full h-full object-cover object-center select-none"
                >
            </div>
        </template>
    </div>

    <!-- Dark Gradient Vignette for Editorial Typography Contrast -->
    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/25 lg:to-transparent pointer-events-none z-10"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-transparent to-black/60 pointer-events-none z-10"></div>

    <!-- 30-canvas-animation: Ambient Precision Wire Circuit Canvas -->
    <canvas id="ambient-circuit-canvas" class="absolute inset-0 w-full h-full pointer-events-none z-10 opacity-35"></canvas>

    <div class="relative max-w-[1300px] mx-auto px-6 sm:px-12 w-full z-20 flex items-center justify-between">
        
        <!-- Left Editorial Typography Column -->
        <div class="max-w-2xl text-left pt-16 sm:pt-12 hero-float-element">
            <!-- White Accent Bar Indicator -->
            <div class="w-14 h-1 bg-white mb-6 rounded-full shadow-sm"></div>

            <!-- Dynamic Headline based on Active Slide -->
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.12] mb-5 drop-shadow-md min-h-[140px] sm:min-h-[160px] flex items-center" x-html="slides[activeSlide].headline"></h1>

            <!-- Dynamic Subtitle -->
            <p class="text-sm sm:text-base lg:text-lg text-white/90 font-normal leading-relaxed mb-10 max-w-xl drop-shadow-md min-h-[56px]" x-text="slides[activeSlide].subtitle"></p>

            <!-- Hero CTAs: Authentic Seiko Denki Oscilloscope Waveform Signature Buttons -->
            <div class="pt-4 flex flex-wrap items-center gap-10 sm:gap-14 select-none">
                <!-- Primary Action: Request Custom Quotation -->
                <button 
                    @click="chatOpen = true; chatInquiry = 'Request a Custom Quotation / RFQ'" 
                    class="group inline-flex flex-col items-start cursor-pointer transition-all duration-300 ease-out select-none focus:outline-none"
                >
                    <span class="text-base sm:text-lg font-bold tracking-tight mb-2 text-white group-hover:text-sky-300 transform transition-all duration-300 ease-out group-hover:translate-x-2">
                        Request a Quote
                    </span>
                    <div class="w-48 sm:w-56 transform transition-all duration-300 ease-out group-hover:-translate-x-2 overflow-hidden">
                        <svg class="w-full h-3.5 block" viewBox="0 0 200 14" fill="none">
                            <line x1="0" y1="7" x2="120" y2="7" stroke="rgba(255,255,255,0.45)" class="group-hover:stroke-sky-300 transition-colors duration-300" stroke-width="1.6"/>
                            <path d="M120 7 L124 7 L126.5 1.5 L130 12.5 L133.5 1.5 L137 12.5 L140.5 1.5 L143 7 L147 7" stroke="#38bdf8" class="group-hover:stroke-white transition-colors duration-300" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"/>
                            <line x1="147" y1="7" x2="200" y2="7" stroke="rgba(255,255,255,0.45)" class="group-hover:stroke-sky-300 transition-colors duration-300" stroke-width="1.6"/>
                        </svg>
                    </div>
                </button>

                <!-- Secondary Action: Capabilities Scope -->
                <a 
                    :href="slides[activeSlide].cta2Url" 
                    class="group inline-flex flex-col items-start cursor-pointer transition-all duration-300 ease-out select-none"
                >
                    <span class="text-base sm:text-lg font-bold tracking-tight mb-2 text-white group-hover:text-sky-300 transform transition-all duration-300 ease-out group-hover:translate-x-2" x-html="slides[activeSlide].cta2Text">
                    </span>
                    <div class="w-48 sm:w-56 transform transition-all duration-300 ease-out group-hover:-translate-x-2 overflow-hidden">
                        <svg class="w-full h-3.5 block" viewBox="0 0 200 14" fill="none">
                            <line x1="0" y1="7" x2="120" y2="7" stroke="rgba(255,255,255,0.45)" class="group-hover:stroke-sky-300 transition-colors duration-300" stroke-width="1.6"/>
                            <path d="M120 7 L124 7 L126.5 1.5 L130 12.5 L133.5 1.5 L137 12.5 L140.5 1.5 L143 7 L147 7" stroke="#38bdf8" class="group-hover:stroke-white transition-colors duration-300" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"/>
                            <line x1="147" y1="7" x2="200" y2="7" stroke="rgba(255,255,255,0.45)" class="group-hover:stroke-sky-300 transition-colors duration-300" stroke-width="1.6"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        <!-- Right Vertical Carousel Slide Indicator (Figma Exact: 01 / 03) -->
        <div class="hidden lg:flex flex-col items-center gap-1.5 text-white select-none mr-6 hero-float-element">
            <button 
                @click="activeSlide = (activeSlide === 0 ? slides.length - 1 : activeSlide - 1)" 
                class="p-1 text-white/60 hover:text-white transition-colors" 
                title="Previous Slide"
            >
                <i data-lucide="chevron-up" class="w-6 h-6 stroke-[2.5]"></i>
            </button>
            <span class="text-3xl font-bold tracking-tight text-white font-sans leading-none" x-text="String(activeSlide + 1).padStart(2, '0')">01</span>
            <span class="text-sm font-medium text-white/40 tracking-wider font-sans leading-none" x-text="String(slides.length).padStart(2, '0')">03</span>
            <button 
                @click="activeSlide = (activeSlide + 1) % slides.length" 
                class="p-1 text-white/60 hover:text-white transition-colors" 
                title="Next Slide"
            >
                <i data-lucide="chevron-down" class="w-6 h-6 stroke-[2.5]"></i>
            </button>
        </div>

    </div>
</section>

<!-- 2. Section: Trusted Wire Harness Manufacturing Partner (100% Figma Replica with Scenic Sky & Cinematic Aggressive Parallax) -->
<section id="trusted-partner" class="relative overflow-hidden border-t border-slate-200/60 bg-slate-900 select-none">
    
    <!-- Parallax Sky Layer: Hardware-accelerated GPU plane with aggressive scrubbed depth -->
    <div class="absolute inset-0 w-full h-[160%] -top-[30%] overflow-hidden pointer-events-none z-0">
        <img 
            src="{{ asset('images/sec2-sky.webp') }}" 
            alt="Seiko Denki Sky Backdrop" 
            class="w-full h-full object-cover object-top sec2-sky-img will-change-transform"
        >
    </div>

    <!-- Editorial Header & Tabs (Lifting layer during scroll) -->
    <div class="sec2-text-content max-w-4xl mx-auto text-center px-4 sm:px-8 pt-16 sm:pt-20 lg:pt-24 pb-8 relative z-20 will-change-transform">
        
        <!-- Headline -->
        <div class="relative inline-block mb-3">
            <h2 class="text-3xl sm:text-5xl lg:text-[54px] font-extrabold tracking-tight leading-[1.12]">
                <span class="text-[#1b54a5] block">Trusted Wire Harness</span>
                <span class="text-slate-900 block mt-1">Manufacturing Partner</span>
            </h2>
        </div>

        <!-- Sub-headline -->
        <h3 class="text-sm sm:text-base lg:text-lg font-bold text-slate-900 tracking-tight mb-3">
            Build-to-Print Wire Processing &amp; Electronic Assembly Solutions in Tebrau &amp; Senai
        </h3>

        <!-- Description Paragraph -->
        <p class="text-xs sm:text-[13px] lg:text-sm text-slate-600 max-w-3xl mx-auto font-normal leading-relaxed mb-8">
            With over three decades of engineering excellence, Seiko Denki delivers world-class wire harness manufacturing and assembly solutions from Johor, Malaysia. Driven by Japanese quality management and certified to ISO/IATF standards, our production plants in Tebrau and Senai serve Tier-1 OEMs worldwide across medical, industrial equipment, consumer electronics, and automotive sectors.
        </p>

        <!-- 3 Interactive Navigation Buttons (Authentic Seiko Denki Oscilloscope Waveform Signature Style) -->
        <div class="flex flex-wrap items-center justify-center gap-10 sm:gap-14 pt-5 select-none">
            
            <!-- Button 1: About Us -->
            <a 
                href="{{ route('about') }}"
                class="group inline-flex flex-col items-start cursor-pointer transition-all duration-300 ease-out select-none py-1"
            >
                <span class="text-sm sm:text-base font-bold tracking-tight mb-2 text-slate-800 group-hover:text-[#1b54a5] transform transition-all duration-300 ease-out group-hover:translate-x-1.5">About Us</span>
                <div class="w-36 sm:w-44 transform transition-all duration-300 ease-out group-hover:-translate-x-1.5 overflow-hidden">
                    <svg class="w-full h-3.5 block" viewBox="0 0 180 14" fill="none">
                        <line x1="0" y1="7" x2="110" y2="7" stroke="currentColor" class="text-slate-300 group-hover:text-[#1b54a5] transition-colors duration-300" stroke-width="1.6"/>
                        <path d="M110 7 L114 7 L116.5 1.5 L120 12.5 L123.5 1.5 L127 12.5 L130.5 1.5 L133 7 L137 7" stroke="#1b54a5" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"/>
                        <line x1="137" y1="7" x2="180" y2="7" stroke="currentColor" class="text-slate-300 group-hover:text-[#1b54a5] transition-colors duration-300" stroke-width="1.6"/>
                    </svg>
                </div>
            </a>

            <!-- Button 2: Why Us -->
            <a 
                href="{{ route('about') }}#company-profile"
                class="group inline-flex flex-col items-start cursor-pointer transition-all duration-300 ease-out select-none py-1"
            >
                <span class="text-sm sm:text-base font-bold tracking-tight mb-2 text-slate-800 group-hover:text-[#1b54a5] transform transition-all duration-300 ease-out group-hover:translate-x-1.5">Why Us</span>
                <div class="w-36 sm:w-44 transform transition-all duration-300 ease-out group-hover:-translate-x-1.5 overflow-hidden">
                    <svg class="w-full h-3.5 block" viewBox="0 0 180 14" fill="none">
                        <line x1="0" y1="7" x2="110" y2="7" stroke="currentColor" class="text-slate-300 group-hover:text-[#1b54a5] transition-colors duration-300" stroke-width="1.6"/>
                        <path d="M110 7 L114 7 L116.5 1.5 L120 12.5 L123.5 1.5 L127 12.5 L130.5 1.5 L133 7 L137 7" stroke="#1b54a5" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"/>
                        <line x1="137" y1="7" x2="180" y2="7" stroke="currentColor" class="text-slate-300 group-hover:text-[#1b54a5] transition-colors duration-300" stroke-width="1.6"/>
                    </svg>
                </div>
            </a>

            <!-- Button 3: Contact Us -->
            <a 
                href="{{ route('contact') }}"
                class="group inline-flex flex-col items-start cursor-pointer transition-all duration-300 ease-out select-none py-1"
            >
                <span class="text-sm sm:text-base font-bold tracking-tight mb-2 text-slate-800 group-hover:text-[#1b54a5] transform transition-all duration-300 ease-out group-hover:translate-x-1.5">Contact Us</span>
                <div class="w-36 sm:w-44 transform transition-all duration-300 ease-out group-hover:-translate-x-1.5 overflow-hidden">
                    <svg class="w-full h-3.5 block" viewBox="0 0 180 14" fill="none">
                        <line x1="0" y1="7" x2="110" y2="7" stroke="currentColor" class="text-slate-300 group-hover:text-[#1b54a5] transition-colors duration-300" stroke-width="1.6"/>
                        <path d="M110 7 L114 7 L116.5 1.5 L120 12.5 L123.5 1.5 L127 12.5 L130.5 1.5 L133 7 L137 7" stroke="#1b54a5" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"/>
                        <line x1="137" y1="7" x2="180" y2="7" stroke="currentColor" class="text-slate-300 group-hover:text-[#1b54a5] transition-colors duration-300" stroke-width="1.6"/>
                    </svg>
                </div>
            </a>

        </div>

    </div>

    <!-- Authentic Transparent Cutout of the Seiko Denki Plant Building with Aggressive Upward Parallax -->
    <div class="w-full flex justify-center -mt-4 sm:-mt-8 lg:-mt-12 mb-0 relative z-10 px-4 sec2-building-container overflow-visible">
        <img 
            src="{{ asset('images/sec2-building.webp') }}" 
            alt="Seiko Denki Johor Bahru Plant" 
            class="w-full max-w-[1240px] h-auto object-contain object-bottom pointer-events-none select-none drop-shadow-2xl sec2-building-img will-change-transform"
        >
    </div>

    <!-- Gradient Blend Transition between Building Cutout & Section 2.2 for Seamless Merge -->
    <div class="w-full h-32 bg-gradient-to-b from-transparent via-white/80 to-white -mt-24 relative z-10 pointer-events-none"></div>

    <!-- Section 2.2: See the Precision Behind Every Connection (Figma Prototype Exact Layout) -->
    <div id="precision-connection" class="relative w-full bg-white pt-16 sm:pt-20 lg:pt-28 pb-20 sm:pb-28 overflow-hidden z-20">
        
        <!-- Max-width Content Frame -->
        <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-12 relative">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                
                <!-- Left Column (5 Cols): Editorial Headline & Video Trigger (Lines Removed per Request) -->
                <div class="lg:col-span-5 relative z-10 flex flex-col justify-center sec2-fade-element">
                    
                    <!-- Main Editorial Headline with Kinetic Line Mask Reveals -->
                    <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold tracking-tight leading-[1.2] text-slate-900 mb-8 relative z-10 kinetic-heading">
                        <span class="block overflow-hidden"><span class="inline-block kinetic-word">See the</span></span>
                        <span class="block overflow-hidden"><span class="inline-block kinetic-word">Precision Behind</span></span>
                        <span class="block overflow-hidden"><span class="inline-block kinetic-word text-[#1b54a5]">Every Connection</span></span>
                    </h2>

                    <!-- Watch Our Story Interactive Trigger with Oscilloscope Waveform (Harmonized with More Details button style) -->
                    <div class="pt-2 relative z-10">
                        <a 
                            href="#video-story" 
                            class="group inline-flex flex-col items-start cursor-pointer select-none transition-all duration-300 ease-out"
                        >
                            <!-- Text & Icon shift right on hover -->
                            <div class="inline-flex items-center gap-3 text-slate-800 group-hover:text-[#1b54a5] transform transition-all duration-300 ease-out group-hover:translate-x-1.5">
                                <span class="w-7 h-5 rounded-md bg-[#e60000] flex items-center justify-center text-white shadow-sm group-hover:bg-red-700 transition-colors duration-300">
                                    <svg class="w-2.5 h-2.5 fill-current ml-0.5" viewBox="0 0 10 10">
                                        <path d="M1 1 L9 5 L1 9 Z"/>
                                    </svg>
                                </span>
                                <span class="text-xs sm:text-sm font-bold tracking-tight">Watch Our Story</span>
                            </div>

                            <!-- Horizontal Line with Oscilloscope Waveform Accent: Seamless unified vector, shifts left on hover -->
                            <div class="w-40 sm:w-48 mt-3 transform transition-all duration-300 ease-out group-hover:-translate-x-1.5 overflow-hidden">
                                <svg class="w-full h-3.5 block" viewBox="0 0 190 14" fill="none">
                                    <line x1="0" y1="7" x2="115" y2="7" stroke="currentColor" class="text-slate-300 group-hover:text-[#1b54a5] transition-colors duration-300" stroke-width="1.6"/>
                                    <path d="M115 7 L119 7 L121.5 1.5 L125 12.5 L128.5 1.5 L132 12.5 L135.5 1.5 L138 7 L142 7" stroke="#1b54a5" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"/>
                                    <line x1="142" y1="7" x2="190" y2="7" stroke="currentColor" class="text-slate-300 group-hover:text-[#1b54a5] transition-colors duration-300" stroke-width="1.6"/>
                                </svg>
                            </div>
                        </a>
                    </div>

                </div>

                <!-- Right Column (7 Cols): The 2x2 Offset Staggered Stat Cards Grid (Equalized Uniform Hover, No Hidden Line) -->
                <div class="lg:col-span-7 relative">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-14 sm:gap-y-16 relative z-10 pt-8">
                        
                        <!-- Card 1: 30++ Years of Experience (Royal Blue Card) -->
                        <div class="group relative bg-[#1b54a5] text-white rounded-2xl p-7 pt-9 shadow-lg shadow-blue-900/10 hover:shadow-2xl hover:shadow-blue-900/20 hover:-translate-y-2 transition-all duration-300 cursor-default flex flex-col justify-between min-h-[175px] sec2-stat-card overflow-visible">
                            <!-- Floating Circular Badge with Milestone Trophy Icon -->
                            <div class="absolute -top-7 right-8 w-14 h-14 rounded-full bg-white text-[#1b54a5] shadow-lg border-[3px] border-[#1b54a5] flex items-center justify-center transition-transform duration-300 group-hover:scale-110 z-20">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/>
                                    <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/>
                                    <path d="M4 22h16"/>
                                    <path d="M10 14.66V17c0 .55-.45 1-1 1H8c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1h8c.55 0 1-.45 1-1v-1c0-.55-.45-1-1-1h-1c-.55 0-1-.45-1-1v-2.34"/>
                                    <path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/>
                                </svg>
                            </div>

                            <div>
                                <div class="text-3xl sm:text-4xl font-extrabold tracking-tight flex items-baseline gap-1">
                                    <span class="count-up" data-target="30">30</span>
                                    <span class="text-xl sm:text-2xl font-bold text-blue-200">++</span>
                                </div>
                                <p class="text-xs sm:text-sm font-medium text-blue-100 mt-2">
                                    Years of Experience
                                </p>
                            </div>
                        </div>

                        <!-- Card 2: 100% Quality Tested (Off-White/Warm Card) - Shifted Down -->
                        <div class="group relative bg-[#f8f9fa] border border-slate-200/90 rounded-2xl p-7 pt-9 shadow-sm hover:shadow-xl hover:border-blue-300 hover:-translate-y-2 transition-all duration-300 cursor-default flex flex-col justify-between min-h-[175px] sm:translate-y-8 sec2-stat-card overflow-visible">
                            <!-- Floating Circular Badge with Award Rosette Ribbon Icon -->
                            <div class="absolute -top-7 right-8 w-14 h-14 rounded-full bg-[#1b54a5] text-white shadow-lg border-[3px] border-[#f8f9fa] flex items-center justify-center transition-transform duration-300 group-hover:scale-110 z-20">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="6"/>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
                                    <polyline points="9.5 8 11.5 10 14.5 6.5"/>
                                </svg>
                            </div>

                            <div>
                                <div class="text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-900 flex items-baseline gap-1">
                                    <span class="count-up" data-target="100">100</span>
                                    <span class="text-xl sm:text-2xl font-bold text-slate-700">%</span>
                                </div>
                                <p class="text-xs sm:text-sm font-medium text-slate-600 mt-2">
                                    Quality Tested
                                </p>
                            </div>
                        </div>

                        <!-- Card 3: 2 Manufacturing Plants (Off-White/Warm Card) -->
                        <div class="group relative bg-[#f8f9fa] border border-slate-200/90 rounded-2xl p-7 pt-9 shadow-sm hover:shadow-xl hover:border-blue-300 hover:-translate-y-2 transition-all duration-300 cursor-default flex flex-col justify-between min-h-[175px] sm:-translate-y-2 sec2-stat-card overflow-visible">
                            <!-- Floating Circular Badge with Plant/Factory Icon -->
                            <div class="absolute -top-7 right-8 w-14 h-14 rounded-full bg-[#1b54a5] text-white shadow-lg border-[3px] border-[#f8f9fa] flex items-center justify-center transition-transform duration-300 group-hover:scale-110 z-20">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/>
                                    <path d="M17 18h1"/>
                                    <path d="M12 18h1"/>
                                    <path d="M7 18h1"/>
                                </svg>
                            </div>

                            <div>
                                <div class="text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-900">
                                    <span class="count-up" data-target="2">2</span>
                                </div>
                                <p class="text-xs sm:text-sm font-medium text-slate-600 mt-2">
                                    Manufacturing Plants
                                </p>
                            </div>
                        </div>

                        <!-- Card 4: ISO, IATF Certified (Royal Blue Card) - Shifted Down -->
                        <div class="group relative bg-[#1b54a5] text-white rounded-2xl p-7 pt-9 shadow-lg shadow-blue-900/10 hover:shadow-2xl hover:shadow-blue-900/20 hover:-translate-y-2 transition-all duration-300 cursor-default flex flex-col justify-between min-h-[175px] sm:translate-y-6 sec2-stat-card overflow-visible">
                            <!-- Floating Circular Badge with ISO Document Stamp Icon -->
                            <div class="absolute -top-7 right-8 w-14 h-14 rounded-full bg-white text-[#1b54a5] shadow-lg border-[3px] border-[#1b54a5] flex items-center justify-center transition-transform duration-300 group-hover:scale-110 z-20">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                    <text x="12" y="16" text-anchor="middle" font-size="5.5" font-weight="900" fill="currentColor" stroke="none" letter-spacing="0.5">ISO</text>
                                </svg>
                            </div>

                            <div>
                                <div class="text-xl sm:text-2xl font-extrabold tracking-tight leading-snug">
                                    ISO, IATF<br/>
                                    Certified
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- 3. Wire Harness Process Flow (100% Figma Replica with Dual-State Hover & Stage Transitions) -->
<section id="process-flow" class="py-24 sm:py-32 bg-white relative overflow-hidden border-t border-slate-100 select-none">
    <div class="max-w-[1400px] mx-auto px-6 sm:px-10 lg:px-12">
        
        <!-- Section Header with Blue Top Line Accent (Figma Exact) -->
        <div class="mb-14 sm:mb-18">
            <div class="w-16 h-1.5 bg-[#1b54a5] mb-5 rounded-full"></div>
            
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                <div>
                    <h2 class="text-3xl sm:text-4xl lg:text-[44px] font-extrabold tracking-tight leading-[1.15]">
                        <span class="text-[#1b54a5] block">Wire Harness</span>
                        <span class="text-slate-900 block mt-1">Process Flow</span>
                    </h2>
                </div>

                <div class="max-w-xl">
                    <h3 class="text-sm sm:text-base font-bold text-slate-900 mb-1.5 tracking-tight">
                        High-Precision Manufacturing Capabilities
                    </h3>
                    <p class="text-xs sm:text-[13px] text-slate-600 leading-relaxed font-normal">
                        From automated wire processing to 100% electrical continuity testing, our facilities in Johor ensure zero-defect quality across every production stage.
                    </p>
                </div>
            </div>
        </div>

        <!-- Horizontal Process Stage Carousel / Staggered Cards (Interactive 4 Stages with Prev / Next & Carousel) -->
        <div 
            class="relative" 
            x-data="{ 
                activeStep: 0,
                steps: [
                    {
                        title: 'Automated Wire Processing',
                        desc: 'High-precision automated cutting, stripping, and wire preparation ensuring tight tolerances and consistent bundle lengths for complex multi-core assemblies.',
                        image: '{{ asset('images/hd/process_step1.jpg') }}',
                        icon: 'processing'
                    },
                    {
                        title: 'Precision Terminal Crimping & Connector Assembly',
                        desc: 'Dedicated semi-automatic and manual crimping tooling with continuous cross-section inspection to guarantee secure, pull-resistant electrical terminations.',
                        image: '{{ asset('images/hd/process_step2.jpg') }}',
                        icon: 'crimping'
                    },
                    {
                        title: 'Manual Soldering & Custom Harness Layup',
                        desc: 'Skilled assembly along custom 1:1 jig boards, including delicate soldering, heat-shrinking, braiding, and overmoulding tailored to exact customer drawings.',
                        image: '{{ asset('images/hd/process_step3.jpg') }}',
                        icon: 'soldering'
                    },
                    {
                        title: '100% Quality Testing & Final Inspection',
                        desc: 'Rigorous 100% testing on dedicated electronic testing boards for continuity, pinout configuration, insulation resistance, and mechanical pull strength.',
                        image: '{{ asset('images/hd/process_step4.jpg') }}',
                        icon: 'testing'
                    }
                ],
                next() {
                    this.activeStep = (this.activeStep + 1) % this.steps.length;
                },
                prev() {
                    this.activeStep = (this.activeStep - 1 + this.steps.length) % this.steps.length;
                }
            }"
        >
            
            <!-- Process Step Tab Indicators & Navigation Arrows -->
            <div class="flex items-center justify-between mb-8 sm:mb-10 pb-4 border-b border-slate-100">
                <!-- Step Tabs -->
                <div class="flex flex-wrap items-center gap-2 sm:gap-3">
                    <template x-for="(step, index) in steps" :key="index">
                        <button 
                            type="button"
                            @click="activeStep = index"
                            class="px-3.5 py-1.5 sm:px-4 sm:py-2 rounded-full text-xs sm:text-sm font-bold tracking-tight transition-all duration-300 flex items-center gap-2"
                            :class="activeStep === index 
                                ? 'bg-[#1b54a5] text-white shadow-md shadow-blue-500/20' 
                                : 'bg-slate-100 text-slate-600 hover:bg-slate-200/80 hover:text-slate-900'"
                        >
                            <span class="w-4 h-4 rounded-full flex items-center justify-center text-[10px]"
                                  :class="activeStep === index ? 'bg-white text-[#1b54a5]' : 'bg-slate-300 text-slate-700'" 
                                  x-text="index + 1"></span>
                            <span x-text="step.title.split('&')[0].trim()" class="hidden md:inline"></span>
                            <span x-text="'Step 0' + (index + 1)" class="md:hidden"></span>
                        </button>
                    </template>
                </div>

                <!-- Prev / Next Controller Arrows -->
                <div class="flex items-center gap-2">
                    <button 
                        type="button"
                        @click="prev()" 
                        aria-label="Previous step"
                        class="w-10 h-10 rounded-full border border-slate-200 bg-white hover:bg-[#1b54a5] hover:text-white hover:border-[#1b54a5] flex items-center justify-center text-slate-700 transition-colors shadow-sm"
                    >
                        <i data-lucide="chevron-left" class="w-5 h-5"></i>
                    </button>
                    <button 
                        type="button"
                        @click="next()" 
                        aria-label="Next step"
                        class="w-10 h-10 rounded-full border border-slate-200 bg-white hover:bg-[#1b54a5] hover:text-white hover:border-[#1b54a5] flex items-center justify-center text-slate-700 transition-colors shadow-sm"
                    >
                        <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <!-- Cards Container: 2 Interactive Asymmetric Cards (Active Main Step + Next Step Peek) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
                
                <!-- Primary Stage Card (8 Cols - Active Step View matching Figma Exact) -->
                <div class="lg:col-span-8 group relative cursor-pointer">
                    
                    <!-- Main Production Photo Container -->
                    <div class="relative w-full h-[320px] sm:h-[400px] lg:h-[450px] rounded-2xl overflow-hidden bg-slate-100 shadow-md">
                        <img 
                            :src="steps[activeStep].image" 
                            :alt="steps[activeStep].title" 
                            class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out"
                        >
                    </div>

                    <!-- Overlapping Floating Card with Dual-State Hover (White Default -> Royal Blue Hover) -->
                    <div class="relative z-10 -mt-20 sm:-mt-24 ml-auto mr-4 sm:mr-8 w-[90%] sm:w-[68%] rounded-2xl p-6 sm:p-8 transition-all duration-300 shadow-xl border border-slate-200/80 group-hover:border-transparent group-hover:bg-[#1b54a5] bg-white group-hover:text-white text-slate-900">
                        
                        <!-- Circular Floating Icon Badge (Blue Default -> White on Hover) -->
                        <div class="absolute -top-7 right-8 w-14 sm:w-16 h-14 sm:h-16 rounded-full shadow-lg flex items-center justify-center transition-all duration-300 border-[3px] bg-[#1b54a5] text-white border-white group-hover:bg-white group-hover:text-[#1b54a5] group-hover:border-[#1b54a5]">
                            <!-- Icon 1: Wire Processing -->
                            <template x-if="steps[activeStep].icon === 'processing'">
                                <svg class="w-8 h-8 sm:w-9 sm:h-9" viewBox="0 0 32 32" fill="none">
                                    <rect x="11" y="16" width="10" height="9" rx="2" fill="currentColor"/>
                                    <path d="M11 20 H7 C6 20 5 19 5 17 V13 C5 10 7 7 12 7 H13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M21 20 H25 C26 20 27 19 27 17 V13 C27 10 25 7 20 7 H19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M16 16 V6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M13 16 L10 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                    <path d="M19 16 L22 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                    <circle cx="16" cy="20.5" r="1.5" fill="white" class="group-hover:fill-[#1b54a5] transition-colors"/>
                                </svg>
                            </template>

                            <!-- Icon 2: Terminal Crimping Tool -->
                            <template x-if="steps[activeStep].icon === 'crimping'">
                                <svg class="w-7 h-7 sm:w-8 sm:h-8" viewBox="0 0 32 32" fill="currentColor">
                                    <path d="M9.5 7.5L12 5L27 20L24.5 22.5L9.5 7.5Z" />
                                    <path d="M5 12L7.5 9.5L22.5 24.5L20 27L5 12Z" />
                                    <circle cx="16" cy="16" r="3" fill="white" class="group-hover:fill-[#1b54a5]" />
                                    <path d="M22 6L26 10" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </template>

                            <!-- Icon 3: Soldering Iron / Wire Tip -->
                            <template x-if="steps[activeStep].icon === 'soldering'">
                                <svg class="w-7 h-7 sm:w-8 sm:h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 4l6 6"/>
                                    <path d="M18 8l-8 8H6v-4l8-8"/>
                                    <line x1="2" y1="22" x2="6" y2="18"/>
                                    <circle cx="8" cy="16" r="1" fill="currentColor"/>
                                </svg>
                            </template>

                            <!-- Icon 4: Quality Inspection Checklist -->
                            <template x-if="steps[activeStep].icon === 'testing'">
                                <svg class="w-7 h-7 sm:w-8 sm:h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 11l3 3L22 4"/>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                                </svg>
                            </template>
                        </div>

                        <h4 class="text-base sm:text-lg lg:text-xl font-bold tracking-tight mb-2.5 transition-colors duration-300" x-text="steps[activeStep].title">
                        </h4>
                        
                        <p class="text-xs sm:text-[13px] leading-relaxed transition-colors duration-300 group-hover:text-blue-100 text-slate-600 max-w-xl font-normal" x-text="steps[activeStep].desc">
                        </p>
                    </div>

                </div>

                <!-- Secondary Stage Card (4 Cols - Next Stage Peek, Clickable to Advance) -->
                <div class="lg:col-span-4 group relative cursor-pointer" @click="next()">
                    
                    <!-- Secondary Photo Container -->
                    <div class="relative w-full h-[320px] sm:h-[400px] lg:h-[450px] rounded-2xl overflow-hidden bg-slate-100 shadow-md">
                        <img 
                            :src="steps[(activeStep + 1) % steps.length].image" 
                            :alt="steps[(activeStep + 1) % steps.length].title" 
                            class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out"
                        >
                        <!-- Next Step Overlay Hint -->
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors"></div>
                    </div>

                    <!-- Overlapping Floating Card with Dual-State Hover -->
                    <div class="relative z-10 -mt-20 sm:-mt-24 ml-auto mr-4 w-[90%] sm:w-[75%] rounded-2xl p-6 sm:p-8 transition-all duration-300 shadow-xl border border-slate-200/80 group-hover:border-transparent group-hover:bg-[#1b54a5] bg-white group-hover:text-white text-slate-900">
                        
                        <!-- Circular Floating Icon Badge (Terminal / Next Step) -->
                        <div class="absolute -top-7 right-6 w-14 sm:w-16 h-14 sm:h-16 rounded-full shadow-lg flex items-center justify-center transition-all duration-300 border-[3px] bg-[#1b54a5] text-white border-white group-hover:bg-white group-hover:text-[#1b54a5] group-hover:border-[#1b54a5]">
                            <!-- Stage Specific Icon matching active next step -->
                            <svg class="w-6 h-6 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="10" rx="2"/>
                                <circle cx="12" cy="5" r="3"/>
                                <path d="M12 8v3"/>
                            </svg>
                        </div>

                        <div class="text-[11px] font-extrabold uppercase tracking-wider text-blue-600 group-hover:text-blue-200 mb-1">
                            Next Stage &rarr;
                        </div>

                        <h4 class="text-base sm:text-lg font-bold tracking-tight mb-2.5 transition-colors duration-300 line-clamp-1" x-text="steps[(activeStep + 1) % steps.length].title">
                        </h4>
                        
                        <p class="text-xs sm:text-[13px] leading-relaxed transition-colors duration-300 group-hover:text-blue-100 text-slate-600 font-normal line-clamp-2" x-text="steps[(activeStep + 1) % steps.length].desc">
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

<!-- 4. Industries We Serve (Former 6 Business Scopes, updated to Figma layout) -->
@include('components.business-scopes')

<!-- 5. Respective Clients (Approved Tier-1 Vendor for Global Industry Leaders) -->
@include('components.respective-clients')

<!-- 6. Quality Certificate Frame ("Committed to Quality, Responsible for Tomorrow" - From Figma) -->
@include('components.certificate-frame')

<!-- 7. Shared Dual Location Cards (Headquarters & Manufacturing Plant) -->
<x-location-cards />

<!-- Clean Scroll Parallax & Interactive Storytelling Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. 30-canvas-animation: High-Tech Ambient Electric Wire Harness Circuit Canvas
        const canvas = document.getElementById('ambient-circuit-canvas');
        if (canvas) {
            const ctx = canvas.getContext('2d');
            let width, height;
            let particles = [];
            let animationFrameId;
            let isVisible = true;

            function resizeCanvas() {
                width = canvas.width = canvas.offsetWidth;
                height = canvas.height = canvas.offsetHeight;
            }
            resizeCanvas();
            window.addEventListener('resize', resizeCanvas, { passive: true });

            // Node particles representing electrons along wire traces
            const particleCount = Math.min(Math.floor(width / 32), 42);
            for (let i = 0; i < particleCount; i++) {
                particles.push({
                    x: Math.random() * width,
                    y: Math.random() * height,
                    vx: (Math.random() - 0.5) * 0.4,
                    vy: (Math.random() - 0.5) * 0.4,
                    radius: Math.random() * 1.8 + 1,
                    alpha: Math.random() * 0.5 + 0.3
                });
            }

            function renderCircuit() {
                if (!isVisible) return;
                ctx.clearRect(0, 0, width, height);

                // Update & draw nodes
                for (let i = 0; i < particles.length; i++) {
                    const p = particles[i];
                    p.x += p.vx;
                    p.y += p.vy;
                    if (p.x < 0) p.x = width;
                    if (p.x > width) p.x = 0;
                    if (p.y < 0) p.y = height;
                    if (p.y > height) p.y = 0;

                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                    ctx.fillStyle = `rgba(0, 163, 224, ${p.alpha})`;
                    ctx.fill();

                    // Connect neighboring nodes with faint luminous wire lines
                    for (let j = i + 1; j < particles.length; j++) {
                        const p2 = particles[j];
                        const dx = p.x - p2.x;
                        const dy = p.y - p2.y;
                        const dist = Math.sqrt(dx * dx + dy * dy);
                        if (dist < 115) {
                            ctx.beginPath();
                            ctx.moveTo(p.x, p.y);
                            ctx.lineTo(p2.x, p2.y);
                            const lineAlpha = (1 - dist / 115) * 0.22;
                            ctx.strokeStyle = `rgba(56, 189, 248, ${lineAlpha})`;
                            ctx.lineWidth = 0.9;
                            ctx.stroke();
                        }
                    }
                }
                animationFrameId = requestAnimationFrame(renderCircuit);
            }

            // IntersectionObserver to pause rendering when hero is not in view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    isVisible = entry.isIntersecting;
                    if (isVisible) {
                        cancelAnimationFrame(animationFrameId);
                        renderCircuit();
                    }
                });
            }, { threshold: 0.05 });
            observer.observe(document.getElementById('hero-section') || canvas);

            renderCircuit();
        }

        // 2. GSAP & ScrollTrigger Comprehensive Cinematic Parallax Engine
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);

            // SECTION 1: HERO PARALLAX
            gsap.to('#hero-bg-parallax', {
                scrollTrigger: {
                    trigger: '#hero-section',
                    start: 'top top',
                    end: 'bottom top',
                    scrub: 1.2
                },
                yPercent: 30,
                scale: 1.15,
                ease: 'none'
            });

            gsap.to('.hero-float-element', {
                scrollTrigger: {
                    trigger: '#hero-section',
                    start: 'top top',
                    end: 'bottom top',
                    scrub: 1
                },
                y: -80,
                opacity: 0.15,
                ease: 'none'
            });

            // SECTION 2: TRUSTED PARTNER & FACTORY BUILDING CUTOUT
            // Header & Tabs entrance reveal
            gsap.fromTo('.sec2-text-content > *', 
                { y: 50, opacity: 0 },
                {
                    scrollTrigger: {
                        trigger: '#trusted-partner',
                        start: 'top 85%',
                        toggleActions: 'play none none none'
                    },
                    y: 0,
                    opacity: 1,
                    stagger: 0.12,
                    duration: 1,
                    ease: 'power3.out'
                }
            );

            // Text floats up and dims as camera descends into plant
            gsap.to('.sec2-text-content', {
                scrollTrigger: {
                    trigger: '#trusted-partner',
                    start: 'top top',
                    end: 'bottom top',
                    scrub: 1
                },
                y: -140,
                opacity: 0.1,
                ease: 'none'
            });

            // Scenic Sky Aggressive Deep Parallax
            const skyBg = document.querySelector('.sec2-sky-img');
            if (skyBg) {
                gsap.to(skyBg, {
                    scrollTrigger: {
                        trigger: '#trusted-partner',
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: 1
                    },
                    yPercent: 45,
                    scale: 1.25,
                    ease: 'none'
                });
            }

            // Factory Building Cutout: Aggressive Cinematic Drone Surge
            const sec2Building = document.querySelector('.sec2-building-img');
            if (sec2Building) {
                gsap.fromTo(sec2Building, 
                    {
                        y: 220,
                        scale: 0.90
                    },
                    {
                        scrollTrigger: {
                            trigger: '#trusted-partner',
                            start: 'top bottom',
                            end: 'bottom top',
                            scrub: 1
                        },
                        y: -120,
                        scale: 1.12,
                        ease: 'none'
                    }
                );
            }

            // SECTION 2.2: PRECISION BEHIND EVERY CONNECTION
            // Kinetic Headline
            const kineticWords = gsap.utils.toArray('.kinetic-word');
            if (kineticWords.length > 0) {
                gsap.fromTo(kineticWords,
                    { yPercent: 120, opacity: 0 },
                    {
                        scrollTrigger: {
                            trigger: '#precision-connection',
                            start: 'top 80%',
                            toggleActions: 'play none none none'
                        },
                        yPercent: 0,
                        opacity: 1,
                        stagger: 0.14,
                        duration: 1,
                        ease: 'power4.out'
                    }
                );
            }

            // High-precision count-up numbers
            document.querySelectorAll('.count-up').forEach((counter) => {
                const target = parseFloat(counter.getAttribute('data-target') || '0');
                const obj = { val: 0 };
                gsap.to(obj, {
                    scrollTrigger: {
                        trigger: counter,
                        start: 'top 85%',
                        toggleActions: 'play none none none'
                    },
                    val: target,
                    duration: 1.8,
                    ease: 'power2.out',
                    onUpdate: function () {
                        counter.textContent = Math.round(obj.val);
                    }
                });
            });

            // 4 Stat Cards: Offset Floating Differential Parallax
            const statCards = gsap.utils.toArray('.sec2-stat-card');
            statCards.forEach((card, idx) => {
                const speeds = [-30, -60, -25, -70];
                gsap.fromTo(card,
                    { y: 35 },
                    {
                        scrollTrigger: {
                            trigger: '#precision-connection',
                            start: 'top bottom',
                            end: 'bottom top',
                            scrub: 1.0
                        },
                        y: speeds[idx % speeds.length],
                        ease: 'none'
                    }
                );
            });

            // SECTION 3: WIRE HARNESS PROCESS FLOW
            gsap.fromTo('#process-flow .mb-14 > *',
                { y: 45, opacity: 0 },
                {
                    scrollTrigger: {
                        trigger: '#process-flow',
                        start: 'top 85%',
                        toggleActions: 'play none none none'
                    },
                    y: 0,
                    opacity: 1,
                    stagger: 0.14,
                    duration: 1,
                    ease: 'power3.out'
                }
            );

            // Process Flow Main Image Push-In Zoom & Depth Scrub
            const flowImages = document.querySelectorAll('#process-flow img');
            flowImages.forEach((img) => {
                gsap.fromTo(img, 
                    { scale: 1.12, yPercent: 6 },
                    {
                        scrollTrigger: {
                            trigger: img,
                            start: 'top bottom',
                            end: 'bottom top',
                            scrub: 1.0
                        },
                        scale: 1,
                        yPercent: -6,
                        ease: 'none'
                    }
                );
            });

            // Floating info card differential parallax
            const flowFloatingCard = document.querySelector('#process-flow .lg\\:col-span-8 .shadow-xl');
            if (flowFloatingCard) {
                gsap.to(flowFloatingCard, {
                    scrollTrigger: {
                        trigger: '#process-flow',
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: 1.0
                    },
                    y: -50,
                    ease: 'none'
                });
            }

            // SECTION 4: INDUSTRIES WE SERVE BENTO GRID
            // Left hero manufacturing image parallax
            const industriesHeroImg = document.querySelector('.industries-hero-img') || document.querySelector('#industries-we-serve img');
            if (industriesHeroImg) {
                gsap.fromTo(industriesHeroImg,
                    { yPercent: -12, scale: 1.08 },
                    {
                        scrollTrigger: {
                            trigger: '#industries-we-serve',
                            start: 'top bottom',
                            end: 'bottom top',
                            scrub: 1.0
                        },
                        yPercent: 12,
                        scale: 1.0,
                        ease: 'none'
                    }
                );
            }

            // 6 Industry Cards: High-Performance Multi-Plane Parallax Scrub
            const industryCards = gsap.utils.toArray('.industry-card');
            if (industryCards.length > 0) {
                industryCards.forEach((card, i) => {
                    // Column-based multi-plane parallax scrub (y is purely controlled by scrub)
                    const colSpeed = (i % 3 === 0) ? -20 : (i % 3 === 1) ? -40 : -60;
                    gsap.fromTo(card, 
                        { y: 25 },
                        {
                            scrollTrigger: {
                                trigger: '#industries-we-serve',
                                start: 'top bottom',
                                end: 'bottom top',
                                scrub: 1.0
                            },
                            y: colSpeed,
                            ease: 'none'
                        }
                    );
                });
            }

            // SECTION 5: RESPECTIVE CLIENTS (Emil Kowalski Scale-Aware Stagger)
            gsap.from('.client-spotlight-card', {
                scrollTrigger: {
                    trigger: '#clients-bento-grid',
                    start: 'top 85%',
                    toggleActions: 'play none none none'
                },
                y: 20,
                scale: 0.98,
                stagger: 0.04,
                duration: 0.5,
                ease: 'power2.out'
            });

            // SECTION 6: COMMITTED TO QUALITY & HEADSET CTA BANNER
            gsap.fromTo('#committed-to-quality .mb-14 > *',
                { y: 45, opacity: 0 },
                {
                    scrollTrigger: {
                        trigger: '#committed-to-quality',
                        start: 'top 85%',
                        toggleActions: 'play none none none'
                    },
                    y: 0,
                    opacity: 1,
                    stagger: 0.14,
                    duration: 1,
                    ease: 'power3.out'
                }
            );

            // Ambient Watermark Parallax Drift
            const sec5Watermark = document.querySelector('.sec5-bg-watermark');
            if (sec5Watermark) {
                gsap.to(sec5Watermark, {
                    scrollTrigger: {
                        trigger: '#committed-to-quality',
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: 1.0
                    },
                    xPercent: -15,
                    yPercent: 15,
                    ease: 'none'
                });
            }

            // Afaq Certificate 3D Frame: Dynamic 3D Perspective Tilt & Glide
            const certFrame = document.querySelector('.cert-3d-frame') || document.querySelector('#committed-to-quality .shadow-2xl');
            if (certFrame) {
                gsap.fromTo(certFrame,
                    { y: 60, rotationY: -6, rotationX: 3, scale: 0.96 },
                    {
                        scrollTrigger: {
                            trigger: '#committed-to-quality',
                            start: 'top bottom',
                            end: 'bottom top',
                            scrub: 1.0
                        },
                        y: -60,
                        rotationY: 4,
                        rotationX: -2,
                        scale: 1.04,
                        ease: 'none'
                    }
                );
            }

            // Headset CTA Callout Banner: Smooth Reveal (Guaranteed Full Visibility)
            const ctaBanner = document.querySelector('.cta-banner-card') || document.querySelector('#committed-to-quality a.group');
            if (ctaBanner) {
                gsap.fromTo(ctaBanner, 
                    { y: 35 },
                    {
                        scrollTrigger: {
                            trigger: ctaBanner,
                            start: 'top 95%',
                            toggleActions: 'play none none none'
                        },
                        y: 0,
                        duration: 0.7,
                        ease: 'power3.out'
                    }
                );

                // Headset badge maintains calm, stable placement (aggressive scrub removed per user specification)
            }

            // SECTION 6: FOOTER
            gsap.fromTo('footer .grid > div',
                { y: 40, opacity: 0 },
                {
                    scrollTrigger: {
                        trigger: 'footer',
                        start: 'top 90%',
                        toggleActions: 'play none none none'
                    },
                    y: 0,
                    opacity: 1,
                    stagger: 0.08,
                    duration: 0.8,
                    ease: 'power3.out'
                }
            );

            gsap.fromTo('footer a[aria-label]',
                { scale: 0, opacity: 0 },
                {
                    scrollTrigger: {
                        trigger: 'footer',
                        start: 'top 90%',
                        toggleActions: 'play none none none'
                    },
                    scale: 1,
                    opacity: 1,
                    stagger: 0.07,
                    duration: 0.6,
                    ease: 'back.out(2)'
                }
            );

            // Final refresh to ensure all triggers calculate exact document offsets
            setTimeout(() => {
                ScrollTrigger.refresh();
            }, 300);
        }
    });
</script>

@endsection
