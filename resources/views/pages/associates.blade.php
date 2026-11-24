@extends('layouts.app')

@section('title', 'Associates | Seiko Denki (M) Sdn. Bhd. - Global Network')

@section('content')

<x-page-hero 
    title="Our Associates" 
    image="{{ asset('images/real/seiko_team_management.png') }}" 
    badgeWord1="Our" 
    badgeWord2="Associates" 
/>

<section class="relative bg-white py-16 sm:py-24 overflow-hidden select-none">
    <div class="max-w-6xl mx-auto px-4 sm:px-8">

        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16 gsap-fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200/60 text-[#1b54a5] text-xs font-bold uppercase tracking-wider">
                <i data-lucide="globe" class="w-3.5 h-3.5 text-[#1b54a5]"></i>
                <span>Regional &amp; Global Presence</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold text-slate-900 tracking-tight">
                Global <span class="text-[#1b54a5]">Associates</span>
            </h2>
            <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-normal">
                Supported by our parent headquarters in Japan and regional associate offices across Singapore, China, and Vietnam.
            </p>
        </div>

        <div class="space-y-10">
            @foreach ($associates as $group)
            <div class="gsap-fade-up">
                <div class="flex items-center gap-3 mb-5">
                    <span class="text-2xl">{{ $group['flag'] }}</span>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                        {{ $group['country'] }}
                    </h3>
                    <div class="flex-grow h-px bg-slate-200"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($group['companies'] as $company)
                    <div class="bg-[#f8fafc] hover:bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 hover:border-blue-300 shadow-sm hover:shadow-xl transition-all duration-300 space-y-4">
                        <div class="flex items-start justify-between gap-3">
                            <h4 class="text-base sm:text-lg font-extrabold text-[#1b54a5] tracking-tight">
                                {{ $company['name'] }}
                            </h4>
                            <span class="px-3 py-1 rounded-full bg-blue-50 text-[#1b54a5] text-[11px] font-bold uppercase tracking-wider flex-shrink-0">
                                {{ $group['country'] }}
                            </span>
                        </div>

                        <div class="space-y-2.5 text-xs sm:text-sm text-slate-600">
                            <div class="flex items-start gap-2.5">
                                <i data-lucide="map-pin" class="w-4 h-4 text-[#1b54a5] flex-shrink-0 mt-0.5"></i>
                                <span>{{ $company['address'] }}</span>
                            </div>

                            @if (!empty($company['tel']))
                            <div class="flex items-center gap-2.5">
                                <i data-lucide="phone" class="w-4 h-4 text-[#1b54a5] flex-shrink-0"></i>
                                <span>Tel: {{ $company['tel'] }} @if(!empty($company['fax'])) &nbsp;|&nbsp; Fax: {{ $company['fax'] }} @endif</span>
                            </div>
                            @endif

                            @if (!empty($company['email']))
                            <div class="flex items-center gap-2.5">
                                <i data-lucide="mail" class="w-4 h-4 text-[#1b54a5] flex-shrink-0"></i>
                                <a href="mailto:{{ $company['email'] }}" class="text-[#1b54a5] font-semibold hover:underline">{{ $company['email'] }}</a>
                            </div>
                            @endif

                            @if (!empty($company['contact']))
                            <div class="flex items-center gap-2.5">
                                <i data-lucide="building-2" class="w-4 h-4 text-[#1b54a5] flex-shrink-0"></i>
                                <span>Contact: {{ $company['contact'] }}</span>
                            </div>
                            @endif

                            @if (!empty($company['website']))
                            <div class="flex items-center gap-2.5">
                                <i data-lucide="external-link" class="w-4 h-4 text-[#1b54a5] flex-shrink-0"></i>
                                <a href="{{ $company['website'] }}" target="_blank" rel="noopener" class="text-[#1b54a5] font-semibold hover:underline">{{ $company['website'] }}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<x-cta-partner-ribbon />
<x-location-cards />

@endsection
