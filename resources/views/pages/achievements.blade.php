@extends('layouts.app')

@section('title', 'Achievements (Certificates & Awards) | Seiko Denki (M) Sdn. Bhd. - Japanese Wire Harness Precision')

@section('content')

<!-- 1. Hero Section: Full-Width Ambient Grade with Floating Royal Blue Badge -->
<x-page-hero 
    title="Certifications &amp; Accreditations"
    image="{{ asset('images/hd/hero_achievements.jpg') }}"
    badgeWord1="Compliance &amp; ESG"
    badgeWord2="Seiko Denki"
/>

<!-- 2. Main Achievements Section -->
<div class="py-16 sm:py-24 bg-white min-h-screen select-none" x-data="{ activeModalItem: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-16">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4 gsap-fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200/60 text-[#1b54a5] text-xs font-bold uppercase tracking-wider">
                <i data-lucide="award" class="w-3.5 h-3.5 text-[#1b54a5]"></i>
                <span>Combined Recognition &amp; Accreditations</span>
            </div>
            
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight">
                Certifications &amp; Awards
            </h2>
            
            <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-normal">
                Seiko Denki's commitment to zero-defect precision is backed by globally recognized quality management accreditations and international client supplier awards.
            </p>

            <!-- Filter Pills -->
            <div class="flex flex-wrap items-center justify-center gap-2 pt-6">
                <a
                    href="{{ route('achievements', ['type' => 'all']) }}"
                    class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold tracking-tight transition-all duration-300 {{ $filter === 'all' ? 'bg-[#1b54a5] text-white shadow-lg shadow-[#1b54a5]/25 scale-105' : 'bg-slate-50 text-slate-600 border border-slate-200/90 hover:bg-slate-100 hover:text-slate-900' }}"
                >
                    All Accreditations ({{ count($achievements) }})
                </a>
                <a
                    href="{{ route('achievements', ['type' => 'certificate']) }}"
                    class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold tracking-tight transition-all duration-300 flex items-center gap-1.5 {{ $filter === 'certificate' ? 'bg-[#1b54a5] text-white shadow-lg shadow-[#1b54a5]/25 scale-105' : 'bg-slate-50 text-slate-600 border border-slate-200/90 hover:bg-slate-100 hover:text-slate-900' }}"
                >
                    <i data-lucide="shield-check" class="w-4 h-4 text-emerald-500"></i>
                    <span>Certificates (ISO &amp; Technical)</span>
                </a>
                <a
                    href="{{ route('achievements', ['type' => 'award']) }}"
                    class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold tracking-tight transition-all duration-300 flex items-center gap-1.5 {{ $filter === 'award' ? 'bg-[#1b54a5] text-white shadow-lg shadow-[#1b54a5]/25 scale-105' : 'bg-slate-50 text-slate-600 border border-slate-200/90 hover:bg-slate-100 hover:text-slate-900' }}"
                >
                    <i data-lucide="award" class="w-4 h-4 text-amber-500"></i>
                    <span>Awards &amp; Honors</span>
                </a>
            </div>
        </div>

        <!-- Combined Grid (3 Columns) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 gsap-fade-up">
            @foreach($achievements as $item)
                <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group">
                    
                    <!-- Image Preview with Hover Zoom overlay -->
                    <div 
                        class="relative h-60 bg-slate-100 overflow-hidden cursor-pointer"
                        @click="activeModalItem = {{ json_encode($item) }}"
                    >
                        <img
                            src="{{ $item['image'] }}"
                            alt="{{ $item['title'] }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out will-change-transform"
                        >
                        <div class="absolute inset-0 bg-slate-950/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-2">
                            <span class="px-4 py-2 rounded-xl bg-white/95 backdrop-blur-md text-[#1b54a5] text-xs font-bold flex items-center gap-1.5 shadow-xl">
                                <i data-lucide="zoom-in" class="w-4 h-4"></i>
                                <span>View Certificate</span>
                            </span>
                        </div>

                        <!-- Badge overlay -->
                        <div class="absolute top-3 left-3">
                            <span class="px-3 py-1 rounded-lg text-[11px] font-bold tracking-wide uppercase shadow-sm {{ $item['type'] === 'certificate' ? 'bg-[#1b54a5] text-white' : 'bg-amber-500 text-white' }}">
                                {{ $item['badge'] }}
                            </span>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between space-y-4">
                        <div class="space-y-2.5">
                            <div class="flex items-center justify-between text-xs text-slate-500 font-semibold">
                                <span class="text-[#1b54a5] font-bold">{{ $item['issuer'] }}</span>
                                <span class="flex items-center gap-1 text-slate-400">
                                    <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                                    {{ $item['year'] }}
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-slate-900 leading-snug group-hover:text-[#1b54a5] transition-colors">
                                {{ $item['title'] }}
                            </h3>

                            <p class="text-xs sm:text-sm text-slate-600 line-clamp-3 leading-relaxed font-normal">
                                {{ $item['description'] }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                            <button
                                type="button"
                                @click="activeModalItem = {{ json_encode($item) }}"
                                class="text-xs font-bold text-[#1b54a5] hover:text-[#134074] flex items-center gap-1.5 transition-colors cursor-pointer"
                            >
                                <i data-lucide="zoom-in" class="w-3.5 h-3.5"></i>
                                <span>Inspect Details</span>
                            </button>

                            <span class="text-[11px] font-mono font-bold text-slate-400 bg-slate-50 px-2.5 py-1 rounded-lg border border-slate-200/60">
                                {{ $item['code'] ?? 'VALIDATED' }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- QA Verification Pack Notice -->
        <div class="rounded-3xl bg-[#1b54a5] text-white p-8 sm:p-12 shadow-2xl flex flex-col md:flex-row items-center justify-between gap-8 gsap-fade-up">
            <div class="space-y-2 text-center md:text-left">
                <span class="text-xs uppercase font-extrabold tracking-widest text-sky-300">
                    Official Quality Assurance Compliance
                </span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Need Official Certificate Copies for Vendor Onboarding?
                </h3>
                <p class="text-white/85 text-xs sm:text-sm max-w-xl leading-relaxed">
                    Our quality assurance department supplies signed and stamped AFNOR / UL audit certifications upon request.
                </p>
            </div>

            <x-waveform-button 
                href="mailto:info@seikodenki.com.my?subject=Request%20for%20Official%20Quality%20Certificates" 
                text="Request QA Certificate Pack" 
                theme="dark" 
                class="flex-shrink-0"
            />
        </div>

    </div>

    <!-- Lightbox Zoom Modal -->
    <div 
        x-show="activeModalItem" 
        x-cloak 
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/70 backdrop-blur-sm"
    >
        <div 
            @click.outside="activeModalItem = null"
            class="bg-white rounded-3xl max-w-2xl w-full overflow-hidden shadow-2xl border border-slate-200 relative"
        >
            <div class="relative h-72 sm:h-80 bg-slate-900">
                <img :src="activeModalItem?.image" :alt="activeModalItem?.title" class="w-full h-full object-cover">
                <button 
                    @click="activeModalItem = null"
                    class="absolute top-4 right-4 w-9 h-9 rounded-full bg-slate-900/80 backdrop-blur-md text-white hover:bg-slate-900 flex items-center justify-center text-sm font-bold transition-colors"
                >
                    ✕
                </button>
            </div>

            <div class="p-6 sm:p-8 space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-[#1b54a5] uppercase tracking-wider" x-text="activeModalItem?.issuer"></span>
                    <span class="text-xs text-slate-400 font-bold" x-text="activeModalItem?.year"></span>
                </div>
                
                <h3 class="text-xl sm:text-2xl font-bold text-slate-900" x-text="activeModalItem?.title"></h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal" x-text="activeModalItem?.description"></p>
                
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-xs font-mono font-bold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-lg" x-text="activeModalItem?.code || 'ACCREDITATION VERIFIED'"></span>
                    <button 
                        @click="activeModalItem = null"
                        class="px-5 py-2.5 rounded-xl bg-[#1b54a5] text-white text-xs font-bold hover:bg-[#134074] shadow-md transition-colors"
                    >
                        Close Preview
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 3. Shared CTA Partner Ribbon Component -->
<x-cta-partner-ribbon />

<!-- 4. Shared Dual Location Cards Component -->
<x-location-cards />

@endsection
