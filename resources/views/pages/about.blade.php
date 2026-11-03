@extends('layouts.app')

@section('title', 'About Us | Seiko Denki (M) Sdn. Bhd. - Japanese Wire Harness Precision')

@section('content')

<x-page-hero 
    title="About Seiko Denki" 
    image="{{ asset('images/hd/about_hero.jpg') }}" 
    badgeWord1="About" 
    badgeWord2="Seiko Denki" 
/>

<!-- 2. Section: Quality Wire Harness Experts & High-Bay Warehouse (Figma Exact Replica with Internet Photography) -->
<section class="relative bg-white pt-20 sm:pt-28 lg:pt-36 pb-16 sm:pb-20 overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-8">
        
        <!-- Editorial Header -->
        <div class="max-w-4xl space-y-4 mb-8 sm:mb-12 gsap-fade-up">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">
                Quality Wire Harness Experts
            </h2>
            <p class="text-xs sm:text-sm lg:text-[15px] text-slate-600 leading-relaxed font-normal">
                Seiko Denki (M) Sdn. Bhd. was established in 01 March 1991 by Mr. Tatsuyuki Yamamoto. We are Malaysian based Japanese manufacturer located at No.8, Jalan Firma 1/1, Plo 94, Kawasan Perindustrian Tebrau 1, 81100 Johor Bahru, Johor, Malaysia. SEIKO DENKI has an authorized capital of RM2,000,000 and paid up capital is RM600,000.
            </p>
        </div>

            </div>

    <!-- Full-Bleed High-Bay Warehouse Facility Photograph (Edge-to-Edge matching Homepage Hero) -->
    <div class="relative w-full h-[480px] sm:h-[580px] lg:h-[680px] overflow-hidden group select-none mt-8 sm:mt-12">
        <img 
            src="{{ asset('images/hd/about_warehouse.jpg') }}" 
            alt="Seiko Denki High-Bay Automated Warehouse and FIFO Material Distribution Facility" 
            class="w-full h-full object-cover object-center transform group-hover:scale-[1.02] transition-transform duration-700 ease-out will-change-transform warehouse-parallax-img"
        >
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/25 via-transparent to-slate-950/10 pointer-events-none"></div>
    </div>
</section>

<!-- 3. Section: Capabilities Overview & Certification Track Record (Figma Exact Replica) -->
<section class="relative bg-white py-12 sm:py-16 overflow-hidden border-t border-slate-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-8">
        
        <!-- Two Editorial Paragraphs -->
        <div class="space-y-6 text-xs sm:text-sm lg:text-[15px] text-slate-600 leading-relaxed font-normal max-w-5xl gsap-fade-up">
            <p>
                SEIKO DENKI provides a wide range of excellent quality wire harness for audio &amp; video, Industrial Equipment, Medical, Transformer, Security, environmental Products and Consumer Products. SEIKO DENKI produce wire harness for local and oversea market ( re-export via customer ). Priority in putting customer satisfaction first and always strive to make good products with reasonable cost has placed SEIKO DENKI in the global market. Today, SEIKO DENKI has experienced phenomenal growth from our customers support.
            </p>
            <p>
                We are certified as UL Harness House, UL wire Processed No: E 144845 (H) and wiring Harness No: E 144844 (H). We are commited to our "Quality Standard" with continuous product quality enhancements. We obtained ISO 9002 : 1994 from AOQC Moody International Limited, United Kingdom on September 1999. Striving to achieve for better Quality and Management, we obtained ISO 9001 : 2000 Certification on October 2002, ISO 14001 :2004 Certification on April 2013, ISO/TS 16949 :2009 Certification on August 2013.
            </p>
        </div>

    </div>
</section>

<!-- 4. Section: Company Vision & Marketing Strategy Split Grid (Figma Exact Replica with Internet Photography) -->
<section class="relative bg-white py-12 sm:py-20 overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-center">
            
            <!-- Left Column (5 Cols): Oscilloscope Logo & Two Strategy Cards -->
            <div class="lg:col-span-5 space-y-6 gsap-fade-up">
                
                <!-- Authentic Seiko Denki Oscilloscope Wordmark Logo -->
                <div class="mb-4">
                    <div class="flex items-center gap-1.5 w-64 text-[#1b54a5]">
                        <svg class="w-full h-8 block" viewBox="0 0 280 32" fill="none">
                            <line x1="0" y1="16" x2="60" y2="16" stroke="#00a3e0" stroke-width="2"/>
                            <path d="M60 16 L65 16 L68 4 L73 28 L78 4 L83 28 L88 4 L93 28 L98 4 L101 16 L106 16" stroke="#00a3e0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <line x1="106" y1="16" x2="280" y2="16" stroke="#00a3e0" stroke-width="2"/>
                        </svg>
                    </div>
                    <span class="text-[13px] sm:text-sm font-black tracking-widest text-[#1b54a5] font-serif block -mt-1 uppercase">
                        SEIKO DENKI (M) SDN BHD
                    </span>
                </div>

                <!-- Blue Card: Company Vision -->
                <div class="bg-[#1b54a5] text-white p-6 sm:p-8 rounded-2xl shadow-xl relative z-10 transition-transform duration-300 hover:-translate-y-1">
                    <h3 class="text-lg sm:text-xl font-bold tracking-tight mb-2 text-white">
                        Company Vision
                    </h3>
                    <p class="text-xs sm:text-sm text-white/90 leading-relaxed font-normal">
                        SEIKO DENKI vision is to gain the trust and to dedicate whole heartily support to customers.
                    </p>
                </div>

                <!-- White Card: Marketing Strategy -->
                <div class="bg-[#f8fafc] sm:bg-white p-6 sm:p-8 rounded-2xl border border-slate-200/90 shadow-md relative z-10 transition-transform duration-300 hover:-translate-y-1">
                    <h3 class="text-lg sm:text-xl font-bold tracking-tight mb-2.5 text-slate-900">
                        Marketing Strategy
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                        The marketing strategy of our Sales and Planning Department is to grasp the product needs of the users as promptly as possible and provide accurate feedback so that our products that meet the needs and can be developed in advance for our customer. We do perform sales and marketing activities through online sales over the internet.
                    </p>
                </div>

                <!-- Horizontal Blue Accent Leader -->
                <div class="w-48 sm:w-64 h-1 bg-[#1b54a5] rounded-full mt-4"></div>

            </div>

            <!-- Right Column (7 Cols): Wire Harness Assembly Operator Photo -->
            <div class="lg:col-span-7 gsap-fade-up">
                <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden shadow-2xl border border-slate-200/80 group">
                    <img 
                        src="{{ asset('images/hd/about_operator.jpg') }}" 
                        alt="Seiko Denki Production Technician Assembling Precision Wire Harness in Cleanroom" 
                        class="w-full h-auto max-h-[560px] object-cover object-center transform group-hover:scale-[1.02] transition-transform duration-700 ease-out select-none"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/15 via-transparent to-transparent pointer-events-none"></div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- 5. Section: General Wire Harness Process Flow (16-Step Serpentine Circuit Schematic - 100% Figma Replica with Circuit Animation) -->
<section id="process-flow" class="relative bg-white py-16 sm:py-24 overflow-hidden border-t border-slate-200/70 select-none">
    <div class="max-w-6xl mx-auto px-4 sm:px-8">
        
        <!-- Section Title & Subtitle -->
        <div class="text-center max-w-2xl mx-auto mb-16 sm:mb-20 gsap-fade-up">
            <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold tracking-tight text-slate-900 mb-3">
                Process <span class="text-[#1b54a5]">Flow</span>
            </h2>
            <p class="text-xs sm:text-sm lg:text-[15px] text-slate-500 font-normal leading-relaxed">
                The image below displays our company's general wire harness process flow to help customers understand it better.
            </p>
        </div>

        <!-- Serpentine 4x4 Circuit Diagram Grid -->
        <div class="relative w-full max-w-5xl mx-auto space-y-16 sm:space-y-20 circuit-flow-container">
            
            <!-- ROW 1: Steps 1 to 4 (Left to Right: Receiving -> XRF Testing -> Storage -> Kitting) -->
            <div class="relative circuit-row">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 sm:gap-4 relative z-10">
                    
                    <!-- Step 1: Receiving -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="1">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <path d="M4 17h12M4 7h7l2 4h3a2 2 0 0 1 2 2v4M4 7v10M17 17a2 2 0 1 0 4 0 2 2 0 0 0-4 0M6 17a2 2 0 1 0 4 0 2 2 0 0 0-4 0"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">1</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Receiving</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                    <!-- Step 2: XRF Testing -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <rect x="3" y="4" width="18" height="16" rx="2"/>
                                <path d="M7 8h10M7 12h4m-4 4h7"/>
                                <circle cx="16" cy="14" r="2"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">2</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">XRF Testing</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                    <!-- Step 3: Storage -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="3">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <path d="M3 21h18M4 18V7l8-4 8 4v11M9 18v-6h6v6"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">3</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Storage</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                    <!-- Step 4: Kitting -->
                    <div class="flex flex-col items-center group cursor-pointer relative" data-step="4">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/>
                                <path d="m3.3 7 8.7 5 8.7-5M12 22V12"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">4</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Kitting</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                </div>

                <!-- Circuit Trace Line Behind Row 1 (Desktop) -->
                <div class="hidden sm:block absolute bottom-1 left-[12.5%] right-[12.5%] h-4 pointer-events-none z-0">
                    <svg class="w-full h-4 circuit-svg" preserveAspectRatio="none" viewBox="0 0 600 14" fill="none">
                        <line x1="0" y1="7" x2="80" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M80 7 L84 7 L86 2 L89 12 L92 2 L95 12 L98 2 L100 7 L104 7" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="104" y1="7" x2="200" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <line x1="200" y1="7" x2="280" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M280 7 L284 7 L286 2 L289 12 L292 2 L295 12 L298 2 L300 7 L304 7" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="304" y1="7" x2="400" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <line x1="400" y1="7" x2="480" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M480 7 L484 7 L486 2 L489 12 L492 2 L495 12 L498 2 L500 7 L504 7" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="504" y1="7" x2="600" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                    </svg>
                </div>

                <!-- Vertical Down Connector: Kitting (Row 1) -> Cutting/Stripping (Row 2) -->
                <div class="hidden sm:block absolute -bottom-16 right-[12.5%] translate-x-1.5 w-4 h-16 pointer-events-none z-0">
                    <svg class="w-4 h-full" preserveAspectRatio="none" viewBox="0 0 14 64" fill="none">
                        <line x1="7" y1="0" x2="7" y2="20" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M7 20 L7 23 L2 26 L12 29 L2 32 L12 35 L2 38 L7 41 L7 44" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="7" y1="44" x2="7" y2="64" stroke="#cbd5e1" stroke-width="1.5"/>
                    </svg>
                </div>
            </div>

            <!-- ROW 2: Steps 8 to 5 (Right to Left: Cutting/Stripping <- Crimping <- Visual Inspection <- Assembly) -->
            <div class="relative circuit-row">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 sm:gap-4 relative z-10">
                    
                    <!-- Step 8: Assembly (Far Left) -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="8">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <path d="M2 20h20M5 20V8l5 3V8l5 3V4l5 4v12"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">8</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Assembly</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                    <!-- Step 7: Visual Inspection -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="7">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="7"/>
                                <path d="m21 21-4.3-4.3M11 8v6M8 11h6"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">7</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Visual Inspection</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                    <!-- Step 6: Crimping -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="6">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <path d="m14 10 4-4 2 2-4 4M10 14l-4 4-2-2 4-4M18 4l2 2M4 18l2 2M9 15l6-6"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">6</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Crimping</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                    <!-- Step 5: Cutting / Stripping (Far Right) -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="5">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <circle cx="6" cy="6" r="3"/>
                                <circle cx="6" cy="18" r="3"/>
                                <line x1="20" y1="4" x2="8.12" y2="15.88"/>
                                <line x1="14.47" y1="14.48" x2="20" y2="20"/>
                                <line x1="8.12" y1="8.12" x2="12" y2="12"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">5</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Cutting / Stripping</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                </div>

                <!-- Circuit Trace Line Behind Row 2 (Desktop) -->
                <div class="hidden sm:block absolute bottom-1 left-[12.5%] right-[12.5%] h-4 pointer-events-none z-0">
                    <svg class="w-full h-4 circuit-svg" preserveAspectRatio="none" viewBox="0 0 600 14" fill="none">
                        <line x1="0" y1="7" x2="80" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M80 7 L84 7 L86 2 L89 12 L92 2 L95 12 L98 2 L100 7 L104 7" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="104" y1="7" x2="200" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <line x1="200" y1="7" x2="280" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M280 7 L284 7 L286 2 L289 12 L292 2 L295 12 L298 2 L300 7 L304 7" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="304" y1="7" x2="400" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <line x1="400" y1="7" x2="480" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M480 7 L484 7 L486 2 L489 12 L492 2 L495 12 L498 2 L500 7 L504 7" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="504" y1="7" x2="600" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                    </svg>
                </div>

                <!-- Vertical Down Connector: Assembly (Row 2) -> Visual Inspection (Row 3) -->
                <div class="hidden sm:block absolute -bottom-16 left-[12.5%] -translate-x-1 w-4 h-16 pointer-events-none z-0">
                    <svg class="w-4 h-full" preserveAspectRatio="none" viewBox="0 0 14 64" fill="none">
                        <line x1="7" y1="0" x2="7" y2="20" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M7 20 L7 23 L2 26 L12 29 L2 32 L12 35 L2 38 L7 41 L7 44" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="7" y1="44" x2="7" y2="64" stroke="#cbd5e1" stroke-width="1.5"/>
                    </svg>
                </div>
            </div>

            <!-- ROW 3: Steps 9 to 12 (Left to Right: Visual Inspection -> Over Moulding -> Visual Inspection -> Electrical Test) -->
            <div class="relative circuit-row">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 sm:gap-4 relative z-10">
                    
                    <!-- Step 9: Visual Inspection -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="9">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                                <rect x="8" y="2" width="8" height="4" rx="1"/>
                                <path d="m9 14 2 2 4-4"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">9</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Visual Inspection</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                    <!-- Step 10: Over Moulding -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="10">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <rect x="4" y="4" width="16" height="16" rx="2"/>
                                <path d="M9 9h6v6H9zM9 4v2m6-2v2M4 9h2m-2 6h2m14-6h2m-2 6h2m-11 3v2m6-2v2"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">10</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Over Moulding</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                    <!-- Step 11: Visual Inspection -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="11">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">11</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Visual Inspection</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                    <!-- Step 12: Electrical Test -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="12">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <path d="M5 18H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3.19M15 6h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-3.19"/>
                                <circle cx="12" cy="12" r="3"/>
                                <path d="m10 14 4-4"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">12</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Electrical Test</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                </div>

                <!-- Circuit Trace Line Behind Row 3 (Desktop) -->
                <div class="hidden sm:block absolute bottom-1 left-[12.5%] right-[12.5%] h-4 pointer-events-none z-0">
                    <svg class="w-full h-4 circuit-svg" preserveAspectRatio="none" viewBox="0 0 600 14" fill="none">
                        <line x1="0" y1="7" x2="80" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M80 7 L84 7 L86 2 L89 12 L92 2 L95 12 L98 2 L100 7 L104 7" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="104" y1="7" x2="200" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <line x1="200" y1="7" x2="280" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M280 7 L284 7 L286 2 L289 12 L292 2 L295 12 L298 2 L300 7 L304 7" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="304" y1="7" x2="400" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <line x1="400" y1="7" x2="480" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M480 7 L484 7 L486 2 L489 12 L492 2 L495 12 L498 2 L500 7 L504 7" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="504" y1="7" x2="600" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                    </svg>
                </div>

                <!-- Vertical Down Connector: Electrical Test (Row 3) -> Final Inspection (Row 4) -->
                <div class="hidden sm:block absolute -bottom-16 right-[12.5%] translate-x-1.5 w-4 h-16 pointer-events-none z-0">
                    <svg class="w-4 h-full" preserveAspectRatio="none" viewBox="0 0 14 64" fill="none">
                        <line x1="7" y1="0" x2="7" y2="20" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M7 20 L7 23 L2 26 L12 29 L2 32 L12 35 L2 38 L7 41 L7 44" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="7" y1="44" x2="7" y2="64" stroke="#cbd5e1" stroke-width="1.5"/>
                    </svg>
                </div>
            </div>

            <!-- ROW 4: Steps 16 to 13 (Right to Left: Final Inspection <- Packing <- Outgoing Inspection <- Delivery) -->
            <div class="relative circuit-row">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 sm:gap-4 relative z-10">
                    
                    <!-- Step 16: Delivery (Far Left) -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="16">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/>
                                <path d="M15 18H9"/>
                                <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62l-3.48-4.35A1 1 0 0 0 17.52 8H14"/>
                                <circle cx="17" cy="18" r="2"/>
                                <circle cx="7" cy="18" r="2"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">16</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Delivery</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                    <!-- Step 15: Outgoing Inspection -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="15">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                <path d="m9 12 2 2 4-4"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">15</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Outgoing Inspection</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                    <!-- Step 14: Packing -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="14">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <path d="m7.5 4.27 9 5.15M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/>
                                <path d="m3.3 7 8.7 5 8.7-5M12 22V12"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">14</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Packing</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                    <!-- Step 13: Final Inspection (Far Right) -->
                    <div class="flex flex-col items-center group cursor-pointer" data-step="13">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:shadow-[#1b54a5]/40 transition-all duration-300 relative">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-none stroke-white stroke-[1.8]" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="7"/>
                                <path d="m21 21-4.3-4.3"/>
                                <path d="M11 7v8M7 11h8"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-white text-[#1b54a5] text-[10px] font-black flex items-center justify-center shadow-sm">13</span>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight mt-3 text-center group-hover:text-[#1b54a5] transition-colors">Final Inspection</span>
                        <div class="w-2.5 h-2.5 bg-[#1b54a5] mt-3 group-hover:scale-125 transition-transform"></div>
                    </div>

                </div>

                <!-- Circuit Trace Line Behind Row 4 (Desktop) -->
                <div class="hidden sm:block absolute bottom-1 left-[12.5%] right-[12.5%] h-4 pointer-events-none z-0">
                    <svg class="w-full h-4 circuit-svg" preserveAspectRatio="none" viewBox="0 0 600 14" fill="none">
                        <line x1="0" y1="7" x2="80" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M80 7 L84 7 L86 2 L89 12 L92 2 L95 12 L98 2 L100 7 L104 7" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="104" y1="7" x2="200" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <line x1="200" y1="7" x2="280" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M280 7 L284 7 L286 2 L289 12 L292 2 L295 12 L298 2 L300 7 L304 7" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="304" y1="7" x2="400" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <line x1="400" y1="7" x2="480" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                        <path d="M480 7 L484 7 L486 2 L489 12 L492 2 L495 12 L498 2 L500 7 L504 7" stroke="#1b54a5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="504" y1="7" x2="600" y2="7" stroke="#cbd5e1" stroke-width="1.5"/>
                    </svg>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- 6. Section: Two Circular Visual Feature Sections (100% Figma Replica with Crescent Wings & Internet Photography) -->
<section class="relative bg-white py-16 sm:py-24 overflow-hidden space-y-24 sm:space-y-32">
    
    <!-- Feature 1: "Precision That Powers Possibilities" (Right Circular Masked Machine) -->
    <div class="max-w-6xl mx-auto px-4 sm:px-8">
        <div class="relative bg-[#f8fafc] rounded-3xl p-8 sm:p-12 lg:p-16 border border-slate-200/90 shadow-sm overflow-hidden grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <!-- Left Editorial Text Content (6 Cols) -->
            <div class="lg:col-span-6 relative z-10 space-y-6 gsap-fade-up">
                <!-- Vertical Blue Architectural Bar -->
                <div class="w-1.5 h-12 bg-[#1b54a5] rounded-full"></div>

                <h3 class="text-3xl sm:text-4xl lg:text-[44px] font-extrabold text-slate-900 tracking-tight leading-[1.14]">
                    Precision That<br>
                    <span class="text-[#1b54a5]">Powers Possibilities</span>
                </h3>

                <p class="text-xs sm:text-sm lg:text-[15px] text-slate-600 leading-relaxed font-normal max-w-lg">
                    Discover our comprehensive manufacturing capabilities, engineered to deliver reliable and customised solutions for diverse applications.
                </p>

                <!-- Signature Oscilloscope Waveform Button: Explore Our Capabilities -->
                <div class="pt-4">
                    <x-waveform-button 
                        href="{{ route('products') }}" 
                        text="Explore Our Capabilities" 
                    />
                </div>

                <!-- Architectural L-Bracket Blueprint Guide (Bottom Right of Left Col) -->
                <div class="w-12 h-12 border-b-2 border-r-2 border-[#1b54a5]/40 ml-auto mr-4 hidden sm:block"></div>
            </div>

            <!-- Right Circular Mask & Royal Blue Crescent Wing (6 Cols) -->
            <div class="lg:col-span-6 relative flex items-center justify-center lg:justify-end">
                
                <!-- Royal Blue Crescent Wing Extension -->
                <div class="absolute -right-16 sm:-right-24 w-72 sm:w-96 h-72 sm:h-96 bg-[#1b54a5] rounded-l-full pointer-events-none z-0 hidden sm:block"></div>

                <!-- Circular Masked Machinery Image with Thick White Border -->
                <div class="relative z-10 w-64 h-64 sm:w-80 sm:h-80 lg:w-96 lg:h-96 rounded-full overflow-hidden border-8 sm:border-[12px] border-white shadow-2xl group cursor-pointer bg-white">
                    <img 
                        src="{{ asset('images/hd/about_machinery.jpg') }}" 
                        alt="High-Speed Japanese Wire Terminal Processing and Crimping Machine" 
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out select-none will-change-transform"
                    >
                </div>

            </div>

        </div>
    </div>

    <!-- Feature 2: "Built for Performance Designed for Excellence" (Left Circular Masked Technician) -->
    <div class="max-w-6xl mx-auto px-4 sm:px-8">
        <div class="relative bg-[#f8fafc] rounded-3xl p-8 sm:p-12 lg:p-16 border border-slate-200/90 shadow-sm overflow-hidden grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <!-- Left Circular Mask & Royal Blue Crescent Wing (6 Cols) -->
            <div class="lg:col-span-6 relative flex items-center justify-center lg:justify-start order-2 lg:order-1">
                
                <!-- Royal Blue Crescent Wing Extension -->
                <div class="absolute -left-16 sm:-left-24 w-72 sm:w-96 h-72 sm:h-96 bg-[#1b54a5] rounded-r-full pointer-events-none z-0 hidden sm:block"></div>

                <!-- Circular Masked Technician Image with Thick White Border -->
                <div class="relative z-10 w-64 h-64 sm:w-80 sm:h-80 lg:w-96 lg:h-96 rounded-full overflow-hidden border-8 sm:border-[12px] border-white shadow-2xl group cursor-pointer bg-white">
                    <img 
                        src="{{ asset('images/hd/about_technician.jpg') }}" 
                        alt="Seiko Denki Certified Quality Specialist Validating Wire Harness Terminal Tolerances" 
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out select-none will-change-transform"
                    >
                </div>

            </div>

            <!-- Right Editorial Text Content (6 Cols) -->
            <div class="lg:col-span-6 relative z-10 space-y-6 order-1 lg:order-2 gsap-fade-up">
                <!-- Vertical Blue Architectural Bar -->
                <div class="w-1.5 h-12 bg-[#1b54a5] rounded-full"></div>

                <h3 class="text-3xl sm:text-4xl lg:text-[44px] font-extrabold text-slate-900 tracking-tight leading-[1.14]">
                    Built for Performance<br>
                    <span class="text-[#1b54a5]">Designed for Excellence</span>
                </h3>

                <p class="text-xs sm:text-sm lg:text-[15px] text-slate-600 leading-relaxed font-normal max-w-lg">
                    Explore our advanced manufacturing facilities, where technology, expertise and quality come together in every process.
                </p>

                <!-- Signature Oscilloscope Waveform Button: Explore Our Facilities -->
                <div class="pt-4">
                    <x-waveform-button 
                        href="{{ route('facilities') }}" 
                        text="Explore Our Facilities" 
                    />
                </div>

                <!-- Architectural L-Bracket Blueprint Guide (Bottom Right) -->
                <div class="w-12 h-12 border-b-2 border-r-2 border-[#1b54a5]/40 ml-auto mr-4 hidden sm:block"></div>
            </div>

        </div>
    </div>

</section>

<!-- 7. Shared CTA Partner Ribbon Component -->
<x-cta-partner-ribbon />

<!-- 8. Shared Dual Location Cards Component -->
<x-location-cards />

<!-- Interactive Process Flow Tooltip Modal & Micro-Interactions Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Process Flow Node Interactive Tooltip Feedback
        const stepDescriptions = {
            '1': 'Receiving: Rigorous incoming raw material validation, supplier certificate of analysis (COA) verification.',
            '2': 'XRF Testing: Spectrometric heavy metal screening ensuring full RoHS, REACH, and Halogen-Free compliance.',
            '3': 'Storage: High-bay climate-monitored warehouse with strict First-In-First-Out (FIFO) terminal & spool management.',
            '4': 'Kitting: Precision automated barcode bin allocation preparing job orders for production lines.',
            '5': 'Cutting / Stripping: High-precision computerized Japanese automated wire cut and strip to sub-millimeter tolerances.',
            '6': 'Crimping: Automated and semi-automated terminal crimp with integrated digital real-time Crimp Force Monitoring (CFM).',
            '7': 'Visual Inspection: In-line magnification visual verification of strip length, bellmouth, and crimp height.',
            '8': 'Assembly: Dedicated ergonomic harness assembly pin boards with guided wiring layout routing.',
            '9': 'Visual Inspection: Intermediate secondary quality check ensuring connector seating and pin terminal orientation.',
            '10': 'Over Moulding: Custom low-pressure and thermoplastic injection moulding for ruggedized strain relief.',
            '11': 'Visual Inspection: Post-moulding flash inspection, cosmetic surface review, and wire retention integrity.',
            '12': 'Electrical Test: 100% computer-automated continuity, pinout configuration, open/short, and high-pot hipot dielectric testing.',
            '13': 'Final Inspection: Final quality audit against IPC/WHMA-A-620 Class 3 specifications and customer assembly drawings.',
            '14': 'Packing: Antistatic ESD-safe protective bagging, moisture desiccant packaging, and custom corrugated carton packing.',
            '15': 'Outgoing Inspection: Final QA lot sampling and QA stamp release certification prior to warehouse loading.',
            '16': 'Delivery: Scheduled JIT express dispatch to Tier-1 OEMs worldwide across ASEAN, North America, and Europe.'
        };

        const flowNodes = document.querySelectorAll('#process-flow [data-step]');
        flowNodes.forEach(node => {
            const stepNum = node.getAttribute('data-step');
            if (stepDescriptions[stepNum]) {
                node.setAttribute('title', stepDescriptions[stepNum]);
            }
        });

        // Initialize Lucide Icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        // GSAP ScrollTrigger Animations for About Us Page
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            // Hero Image Parallax
            const heroImg = document.querySelector('.hero-parallax-img');
            if (heroImg) {
                gsap.to(heroImg, {
                    yPercent: 12,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: heroImg,
                        start: 'top top',
                        end: 'bottom top',
                        scrub: 0.5
                    }
                });
            }

            // Warehouse Image Parallax
            const warehouseImg = document.querySelector('.warehouse-parallax-img');
            if (warehouseImg) {
                gsap.to(warehouseImg, {
                    yPercent: 8,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: warehouseImg.parentElement,
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: 0.5
                    }
                });
            }

            // Circuit Flow Nodes Sequential Entrance Animation
            gsap.from('.circuit-row', {
                opacity: 0,
                y: 35,
                stagger: 0.25,
                duration: 0.9,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: '#process-flow',
                    start: 'top 75%'
                }
            });
        }
    });
</script>

@endsection
