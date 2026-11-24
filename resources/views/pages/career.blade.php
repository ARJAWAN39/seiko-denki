@extends('layouts.app')

@section('title', 'Career | Seiko Denki (M) Sdn. Bhd. - Join Our Team')

@section('content')

<x-page-hero 
    title="Career Opportunities" 
    image="{{ asset('images/real/seiko_assembly_operator.png') }}" 
    badgeWord1="Career" 
    badgeWord2="Opportunities" 
/>

<section class="relative bg-white py-16 sm:py-24 overflow-hidden select-none" x-data="{ filterType: 'All' }">
    <div class="max-w-6xl mx-auto px-4 sm:px-8">

        <div class="text-center max-w-3xl mx-auto space-y-4 mb-12 gsap-fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200/60 text-[#1b54a5] text-xs font-bold uppercase tracking-wider">
                <i data-lucide="briefcase" class="w-3.5 h-3.5 text-[#1b54a5]"></i>
                <span>We Are Hiring • Johor &amp; Singapore</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold text-slate-900 tracking-tight">
                Build Your <span class="text-[#1b54a5]">Career</span> With Us
            </h2>
            <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-normal">
                Explore current full-time and internship openings at Seiko Denki (M) Sdn. Bhd. across our Tebrau 1 and Senai Fasa 3 plants.
            </p>
        </div>

        <!-- Filter Pills -->
        <div class="flex flex-wrap items-center justify-center gap-3 mb-10 gsap-fade-up">
            @foreach (['All', 'Full-Time', 'Internship'] as $type)
            <button
                type="button"
                @click="filterType = '{{ $type }}'"
                :class="filterType === '{{ $type }}' ? 'bg-[#1b54a5] text-white shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                class="px-5 py-2 rounded-full text-xs sm:text-sm font-bold transition-all cursor-pointer"
            >
                {{ $type }}
            </button>
            @endforeach
        </div>

        <!-- Job Listings Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($jobs as $job)
            <div 
                x-show="filterType === 'All' || filterType === '{{ $job['type'] }}'"
                class="bg-[#f8fafc] hover:bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 hover:border-blue-300 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between gap-5 gsap-fade-up"
            >
                <div class="space-y-3">
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider {{ $job['type'] === 'Internship' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-blue-50 text-[#1b54a5] border border-blue-200' }}">
                            {{ $job['type'] }}
                        </span>
                        <span class="text-xs font-semibold text-slate-500 flex items-center gap-1.5">
                            <i data-lucide="map-pin" class="w-3.5 h-3.5 text-[#1b54a5]"></i>
                            {{ $job['location'] }}
                        </span>
                    </div>

                    <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight">
                        {{ $job['title'] }}
                    </h3>

                    <p class="text-xs font-semibold text-[#1b54a5]">
                        {{ $job['level'] }} &bull; {{ $job['department'] }}
                    </p>

                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                        {{ $job['summary'] }}
                    </p>
                </div>

                <div class="pt-4 border-t border-slate-200/80 flex items-center justify-between gap-4">
                    <a 
                        href="mailto:info@seikodenki.com.my?subject={{ rawurlencode('Job Application: ' . $job['title']) }}"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[#1b54a5] hover:bg-[#134074] text-white text-xs font-bold shadow-sm hover:shadow-md transition-all"
                    >
                        <span>Apply Now</span>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                    <a 
                        href="{{ route('contact') }}"
                        class="text-xs font-semibold text-slate-500 hover:text-[#1b54a5] transition-colors"
                    >
                        HR Inquiry
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<x-cta-partner-ribbon />
<x-location-cards />

@endsection
