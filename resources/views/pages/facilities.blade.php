@extends('layouts.app')

@section('title', 'Facilities | Seiko Denki (M) Sdn. Bhd. - Photo Gallery, Videos & Downloads')

@section('content')

<!-- 1. Hero Section -->
<x-page-hero 
    title="Manufacturing Facilities"
    image="{{ asset('images/real/seiko_pmx150_optical.png') }}"
    badgeWord1="Facilities"
    badgeWord2="Seiko Denki"
/>

<!-- 2. Main Facilities Section (Matched to Old Website: Photo Gallery, Company Videos, Download) -->
<div class="py-16 sm:py-24 bg-white min-h-screen select-none" x-data="{ activeTab: 'gallery' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-16">
        
        <!-- Header & Section Switcher -->
        <div class="text-center max-w-3xl mx-auto space-y-6 gsap-fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200/60 text-[#1b54a5] text-xs font-bold uppercase tracking-wider">
                <i data-lucide="factory" class="w-3.5 h-3.5 text-[#1b54a5]"></i>
                <span>Tebrau 1 &amp; Senai Fasa 3 Plants</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight">
                Plant <span class="text-[#1b54a5]">Facilities</span>
            </h2>
            <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-normal">
                Explore our manufacturing photo albums, corporate factory tour videos, and official quality certification downloads.
            </p>

            <!-- 3 Old-Website Category Tabs -->
            <div class="flex flex-wrap items-center justify-center gap-3 pt-2">
                <button
                    type="button"
                    @click="activeTab = 'gallery'"
                    :class="activeTab === 'gallery' ? 'bg-[#1b54a5] text-white shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                    class="px-6 py-2.5 rounded-full text-xs sm:text-sm font-bold transition-all cursor-pointer inline-flex items-center gap-2"
                >
                    <i data-lucide="images" class="w-4 h-4"></i>
                    <span>Photo Gallery</span>
                </button>
                <button
                    type="button"
                    @click="activeTab = 'videos'"
                    :class="activeTab === 'videos' ? 'bg-[#1b54a5] text-white shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                    class="px-6 py-2.5 rounded-full text-xs sm:text-sm font-bold transition-all cursor-pointer inline-flex items-center gap-2"
                >
                    <i data-lucide="video" class="w-4 h-4"></i>
                    <span>Company Videos</span>
                </button>
                <button
                    type="button"
                    @click="activeTab = 'download'"
                    :class="activeTab === 'download' ? 'bg-[#1b54a5] text-white shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                    class="px-6 py-2.5 rounded-full text-xs sm:text-sm font-bold transition-all cursor-pointer inline-flex items-center gap-2"
                >
                    <i data-lucide="download" class="w-4 h-4"></i>
                    <span>Download</span>
                </button>
            </div>
        </div>

        <!-- TAB 1: Photo Gallery (7 Albums from Old Website) -->
        <div id="photo-gallery" x-show="activeTab === 'gallery'" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($photoAlbums as $album)
                <div class="bg-[#f8fafc] hover:bg-white rounded-3xl overflow-hidden border border-slate-200/90 shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col group">
                    <div class="relative h-60 overflow-hidden bg-slate-100">
                        <img
                            src="{{ $album['image'] }}"
                            alt="{{ $album['title'] }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-transparent to-transparent pointer-events-none"></div>
                        <span class="absolute top-4 right-4 px-3 py-1 rounded-full bg-white/95 text-[#1b54a5] text-xs font-extrabold shadow-sm">
                            {{ $album['count'] }} {{ $album['count'] === 1 ? 'Photo' : 'Photos' }}
                        </span>
                    </div>

                    <div class="p-6 sm:p-7 space-y-2.5 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 group-hover:text-[#1b54a5] transition-colors leading-snug">
                                {{ $album['title'] }}
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-2 font-normal">
                                {{ $album['desc'] }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- TAB 2: Company Videos -->
        <div id="company-videos" x-show="activeTab === 'videos'" x-cloak class="space-y-8">
            <div class="grid grid-cols-1 gap-8 max-w-4xl mx-auto">
                @foreach($videos as $video)
                <div class="bg-[#f8fafc] rounded-3xl overflow-hidden border border-slate-200/90 shadow-lg">
                    <div class="aspect-video w-full bg-slate-950">
                        <iframe 
                            class="w-full h-full"
                            src="https://www.youtube.com/embed/{{ $video['youtubeId'] }}" 
                            title="{{ $video['title'] }}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen
                        ></iframe>
                    </div>
                    <div class="p-6 sm:p-8 space-y-3">
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <span class="px-3 py-1 rounded-full bg-blue-50 text-[#1b54a5] text-xs font-bold uppercase tracking-wider">
                                {{ $video['category'] }}
                            </span>
                            <a href="{{ $video['url'] }}" target="_blank" rel="noopener" class="text-xs font-bold text-[#1b54a5] hover:underline inline-flex items-center gap-1.5">
                                <span>Watch on YouTube</span>
                                <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                            </a>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900">
                            {{ $video['title'] }}
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            {{ $video['desc'] }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- TAB 3: Download -->
        <div id="download" x-show="activeTab === 'download'" x-cloak class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                @foreach($downloads as $doc)
                <div class="bg-[#f8fafc] hover:bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 hover:border-blue-300 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between gap-6">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between gap-3">
                            <div class="w-11 h-11 rounded-2xl bg-blue-50 text-[#1b54a5] flex items-center justify-center">
                                <i data-lucide="file-text" class="w-5 h-5"></i>
                            </div>
                            <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-[11px] font-bold uppercase tracking-wider">
                                {{ $doc['format'] }}
                            </span>
                        </div>
                        <h3 class="text-lg sm:text-xl font-extrabold text-slate-900">
                            {{ $doc['title'] }}
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            {{ $doc['desc'] }}
                        </p>
                    </div>

                    <a href="{{ $doc['url'] }}" class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-full bg-[#1b54a5] hover:bg-[#134074] text-white text-xs font-bold shadow-sm transition-all">
                        <i data-lucide="download" class="w-4 h-4"></i>
                        <span>View / Download Document</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

<!-- 3. Shared CTA Partner Ribbon Component -->
<x-cta-partner-ribbon />

<!-- 4. Shared Dual Location Cards Component -->
<x-location-cards />

@endsection
