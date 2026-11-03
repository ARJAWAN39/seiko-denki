@extends('layouts.app')

@section('title', 'Events & News | Seiko Denki (M) Sdn. Bhd. - Japanese Wire Harness Precision')

@section('content')

<!-- 1. Hero Section: Full-Width Ambient Grade with Floating Royal Blue Badge -->
<x-page-hero 
    title="Corporate Announcements &amp; Milestones"
    image="{{ asset('images/hd/hero_news.jpg') }}"
    badgeWord1="News &amp; Events"
    badgeWord2="Seiko Denki"
/>

<!-- 2. Main News Section -->
<div class="py-16 sm:py-24 bg-white min-h-screen select-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-16">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4 gsap-fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200/60 text-[#1b54a5] text-xs font-bold uppercase tracking-wider">
                <i data-lucide="newspaper" class="w-3.5 h-3.5 text-[#1b54a5]"></i>
                <span>Corporate Announcements &amp; Milestones</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight">
                Events &amp; News
            </h2>
            <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-normal">
                Stay updated with the latest technological upgrades, audit accomplishments, and industry participations from Seiko Denki (M) Sdn. Bhd.
            </p>
        </div>

        <!-- Clean News Grid (2 Columns) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10 gsap-fade-up">
            @foreach($newsItems as $item)
                <article class="bg-white rounded-3xl overflow-hidden border border-slate-200/90 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col sm:flex-row group">
                    
                    <!-- Thumbnail -->
                    <div class="sm:w-2/5 relative h-56 sm:h-auto overflow-hidden bg-slate-100 flex-shrink-0">
                        <img
                            src="{{ $item['image'] }}"
                            alt="{{ $item['title'] }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out will-change-transform"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent pointer-events-none"></div>
                        <div class="absolute top-3 left-3 sm:hidden">
                            <span class="px-3 py-1 rounded-lg bg-[#1b54a5]/90 backdrop-blur-md text-white text-[11px] font-bold">
                                {{ $item['date'] }}
                            </span>
                        </div>
                    </div>

                    <!-- Content body -->
                    <div class="p-6 sm:p-8 sm:w-3/5 flex flex-col justify-between space-y-4">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between text-xs text-slate-500 font-semibold">
                                <span class="px-2.5 py-1 rounded-md bg-blue-50 text-[#1b54a5] font-bold uppercase tracking-wider text-[10px] border border-blue-100">
                                    {{ $item['category'] }}
                                </span>
                                <span class="hidden sm:flex items-center gap-1 font-semibold text-slate-400">
                                    <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                                    {{ $item['date'] }}
                                </span>
                            </div>

                            <h3 class="text-lg sm:text-xl font-bold text-slate-900 leading-snug group-hover:text-[#1b54a5] transition-colors">
                                {{ $item['title'] }}
                            </h3>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                                {{ $item['summary'] }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                            <span class="font-mono text-[11px] font-bold text-slate-400">Corporate Desk</span>
                            <span class="text-emerald-600 font-bold flex items-center gap-1">
                                <i data-lucide="bell" class="w-3.5 h-3.5"></i> Published
                            </span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Media Contact Callout -->
        <div class="rounded-3xl bg-slate-50 border border-slate-200/80 p-6 sm:p-8 text-center text-xs sm:text-sm text-slate-600 max-w-2xl mx-auto space-y-2 gsap-fade-up">
            <p class="font-normal">
                For official media inquiries, press accreditation, or high-resolution corporate photography assets, please reach out to our corporate communications desk at:
            </p>
            <a href="mailto:info@seikodenki.com.my" class="text-[#1b54a5] font-bold text-sm hover:underline block">
                info@seikodenki.com.my
            </a>
        </div>

    </div>
</div>

<!-- 3. Shared CTA Partner Ribbon Component -->
<x-cta-partner-ribbon />

<!-- 4. Shared Dual Location Cards Component -->
<x-location-cards />

@endsection
