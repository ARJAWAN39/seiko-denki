@extends('layouts.app')

@section('title', 'Our Team | Seiko Denki (M) Sdn. Bhd. - Leadership & Staff Assembly')

@section('content')

<x-page-hero 
    title="Our Team" 
    image="{{ asset('images/real/seiko_team_management.png') }}" 
    badgeWord1="Our" 
    badgeWord2="Team" 
/>

<section class="relative bg-white py-16 sm:py-24 overflow-hidden select-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">

        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16 gsap-fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200/60 text-[#1b54a5] text-xs font-bold uppercase tracking-wider">
                <i data-lucide="users" class="w-3.5 h-3.5 text-[#1b54a5]"></i>
                <span>People Behind Seiko Denki</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold text-slate-900 tracking-tight">
                Leadership &amp; <span class="text-[#1b54a5]">Staff Assembly</span>
            </h2>
            <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-normal">
                Our dedicated engineers, quality specialists, and production technicians uphold Japanese precision and zero-defect standards every day.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 mb-16">
            @foreach ($teamCategories as $member)
            <div class="group bg-[#f8fafc] hover:bg-white rounded-3xl overflow-hidden border border-slate-200/80 hover:border-blue-300 shadow-sm hover:shadow-2xl transition-all duration-300 flex flex-col gsap-fade-up">
                <div class="relative h-[260px] sm:h-[360px] lg:h-[420px] overflow-hidden bg-slate-900">
                    <img 
                        src="{{ $member['image'] }}" 
                        alt="{{ $member['title'] }}" 
                        class="w-full h-full object-cover object-[center_20%] group-hover:scale-105 transition-transform duration-700"
                    >
                    <span class="absolute top-4 left-4 px-3.5 py-1.5 rounded-full bg-[#1b54a5] text-white text-[11px] font-bold uppercase tracking-wider shadow-md">
                        {{ $member['tag'] }}
                    </span>
                </div>
                <div class="p-6 sm:p-8 space-y-2 flex-grow flex flex-col justify-center">
                    <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 group-hover:text-[#1b54a5] transition-colors">
                        {{ $member['title'] }}
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        {{ $member['subtitle'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Staff Assembly & Team Gallery (12 Photos from seikodenki.com.my) -->
        <div class="space-y-8">
            <div class="flex items-center gap-3">
                <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                    Staff Assembly <span class="text-[#1b54a5]">Gallery</span>
                </h3>
                <div class="flex-grow h-px bg-slate-200"></div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5 sm:gap-6">
                @foreach ($teamGallery as $photo)
                <div class="group bg-[#f8fafc] rounded-2xl overflow-hidden border border-slate-200/80 hover:border-blue-300 shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="relative h-48 sm:h-56 overflow-hidden bg-slate-100">
                        <img 
                            src="{{ $photo['image'] }}" 
                            alt="{{ $photo['title'] }}" 
                            class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
                        >
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-[#1b54a5]/90 text-white text-[10px] font-bold uppercase tracking-wider">
                            {{ $photo['tag'] }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

<x-cta-partner-ribbon />
<x-location-cards />

@endsection
