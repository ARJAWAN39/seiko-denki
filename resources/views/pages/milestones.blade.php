@extends('layouts.app')

@section('title', 'Milestones | Seiko Denki (M) Sdn. Bhd. - Corporate History & Track Record')

@section('content')

<x-page-hero 
    title="Corporate Milestones" 
    image="{{ asset('images/real/seiko_formboard_assembly.jpg') }}" 
    badgeWord1="Corporate" 
    badgeWord2="Milestones" 
/>

<section class="relative bg-white py-16 sm:py-24 overflow-hidden select-none">
    <div class="max-w-5xl mx-auto px-4 sm:px-8">

        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16 gsap-fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200/60 text-[#1b54a5] text-xs font-bold uppercase tracking-wider">
                <i data-lucide="calendar-check" class="w-3.5 h-3.5 text-[#1b54a5]"></i>
                <span>Since 1991 • 30+ Years of Excellence</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold text-slate-900 tracking-tight">
                Our Growth <span class="text-[#1b54a5]">Milestones</span>
            </h2>
            <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-normal">
                From our founding in Johor Bahru in 1991 to becoming an ISO/IATF-certified Approved Vendor List (AVL) partner for global OEM leaders.
            </p>
        </div>

        <!-- Vertical Timeline -->
        <div class="relative space-y-8 before:absolute before:inset-y-0 before:left-5 sm:before:left-8 before:w-0.5 before:bg-gradient-to-b before:from-[#1b54a5] before:via-blue-200 before:to-slate-200">
            @foreach ($milestones as $item)
            <div class="relative pl-14 sm:pl-20 gsap-fade-up">
                <!-- Timeline Node -->
                <div class="absolute left-2 sm:left-5 top-6 w-6 h-6 rounded-full bg-[#1b54a5] ring-4 ring-blue-50 flex items-center justify-center shadow-md">
                    <span class="w-2 h-2 rounded-full bg-white"></span>
                </div>

                <!-- Card -->
                <div class="bg-[#f8fafc] hover:bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 hover:border-blue-300 shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="flex flex-wrap items-center justify-between gap-3 mb-3">
                        <span class="px-4 py-1.5 rounded-full bg-[#1b54a5] text-white text-xs sm:text-sm font-extrabold tracking-wide shadow-sm">
                            {{ $item['year'] }}
                        </span>
                        <span class="px-3 py-1 rounded-full bg-blue-50 border border-blue-200/70 text-[#1b54a5] text-[11px] font-bold uppercase tracking-wider">
                            {{ $item['badge'] }}
                        </span>
                    </div>

                    <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight mb-3">
                        {{ $item['title'] }}
                    </h3>

                    <ul class="space-y-2">
                        @foreach ($item['highlights'] as $highlight)
                        <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-600 leading-relaxed">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-[#1b54a5] flex-shrink-0 mt-0.5"></i>
                            <span>{{ $highlight }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<x-cta-partner-ribbon />
<x-location-cards />

@endsection
