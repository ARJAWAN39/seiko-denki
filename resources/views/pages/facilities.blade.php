@extends('layouts.app')

@section('title', 'Facilities & Plant Tour | Seiko Denki (M) Sdn. Bhd. - Japanese Wire Harness Precision')

@section('content')

<!-- 1. Hero Section: Full-Width Ambient Grade with Floating Royal Blue Badge -->
<x-page-hero 
    title="Manufacturing Facilities &amp; Technology"
    image="{{ asset('images/hd/hero_facilities.jpg') }}"
    badgeWord1="Facilities"
    badgeWord2="Seiko Denki"
/>

<!-- 2. Main Facilities Section -->
<div class="py-16 sm:py-24 bg-white min-h-screen select-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-16">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4 gsap-fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200/60 text-[#1b54a5] text-xs font-bold uppercase tracking-wider">
                <i data-lucide="factory" class="w-3.5 h-3.5 text-[#1b54a5]"></i>
                <span>Manufacturing Infrastructure</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight">
                Facilities &amp; Plant Technology
            </h2>
            <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-normal">
                Take a virtual tour through Seiko Denki's Johor Bahru manufacturing facility. Engineered for precision, traceability, and high-volume scalability.
            </p>
        </div>

        <!-- Facility Highlights Grid (2 Columns) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10 gsap-fade-up">
            @foreach($facilities as $idx => $facility)
                <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/90 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col group">
                    <div class="relative h-64 sm:h-72 overflow-hidden bg-slate-100">
                        <img
                            src="{{ $facility['image'] }}"
                            alt="{{ $facility['title'] }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out will-change-transform"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent pointer-events-none"></div>
                        <div class="absolute top-4 left-4">
                            <span class="px-3.5 py-1.5 rounded-xl bg-[#1b54a5]/90 backdrop-blur-md text-white text-xs font-bold uppercase tracking-wider shadow-sm">
                                {{ $facility['tag'] }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 space-y-4 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl sm:text-2xl font-bold text-slate-900 group-hover:text-[#1b54a5] transition-colors leading-snug">
                                {{ $facility['title'] }}
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-2.5 font-normal">
                                {{ $facility['desc'] }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                            <span class="flex items-center gap-1.5 text-emerald-600 font-bold">
                                <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-500"></i>
                                <span>Audited &amp; Certified Process</span>
                            </span>
                            <span class="font-mono text-slate-400 font-bold bg-slate-50 px-2.5 py-1 rounded-lg border border-slate-200/60">Station 0{{ $idx + 1 }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Corporate Video Tour Banner -->
        <div class="rounded-3xl bg-[#1b54a5] text-white p-8 sm:p-12 shadow-2xl flex flex-col md:flex-row items-center justify-between gap-8 gsap-fade-up">
            <div class="space-y-2 text-center md:text-left">
                <span class="text-xs uppercase font-extrabold tracking-widest text-sky-300">
                    Interactive Multimedia Presentation
                </span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Watch Seiko Denki Factory Production Tour Video
                </h3>
                <p class="text-white/85 text-xs sm:text-sm max-w-xl leading-relaxed">
                    Experience our automated high-speed wire crimping, harness loom taping, and zero-defect quality inspection process in action.
                </p>
            </div>

            <x-waveform-button 
                href="https://www.youtube.com" 
                text="Launch Video Presentation" 
                theme="dark" 
                target="_blank"
                class="flex-shrink-0"
            />
        </div>

    </div>
</div>

<!-- 3. Shared CTA Partner Ribbon Component -->
<x-cta-partner-ribbon />

<!-- 4. Shared Dual Location Cards Component -->
<x-location-cards />

@endsection
