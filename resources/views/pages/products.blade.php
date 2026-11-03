@extends('layouts.app')

@section('title', 'Capabilities & Solutions | Seiko Denki (M) Sdn. Bhd. - Wire Harness Specialist')

@section('content')

<!-- 1. Hero Section: Full-Width Ambient Grade with Floating Royal Blue Badge -->
<x-page-hero 
    title="Capabilities & Solutions"
    image="{{ asset('images/hd/hero_products.jpg') }}"
    badgeWord1="Capabilities"
    badgeWord2="Seiko Denki"
/>

<!-- 2. Main Capabilities Catalog Section with Alpine.js Instant Reactive Filtering -->
<div 
    class="relative py-16 sm:py-24 bg-[#FCFDFF] border-t border-slate-200/70 min-h-screen" 
    x-data="{ 
        activeCategory: '{{ $category === 'All' ? 'All' : $category }}',
        searchQuery: '',
        viewMode: 'grid',
        selectedModalProduct: null,
        modalTab: 'specs',
        allProducts: {{ json_encode($allProducts) }},
        
        get filteredProducts() {
            return this.allProducts.filter(p => {
                const matchCategory = (this.activeCategory === 'All') || (p.category.toLowerCase() === this.activeCategory.toLowerCase());
                const query = this.searchQuery.toLowerCase().trim();
                if (!query) return matchCategory;
                
                const matchName = p.name.toLowerCase().includes(query);
                const matchCode = (p.code || '').toLowerCase().includes(query);
                const matchDesc = p.description.toLowerCase().includes(query);
                const matchGauge = (p.wireGauge || '').toLowerCase().includes(query);
                const matchStd = (p.standard || '').toLowerCase().includes(query);
                const matchSpecs = (p.specs || []).some(s => s.toLowerCase().includes(query));
                const matchConnectors = (p.connectors || []).some(c => c.toLowerCase().includes(query));
                
                return matchCategory && (matchName || matchCode || matchDesc || matchGauge || matchStd || matchSpecs || matchConnectors);
            });
        }
    }"
>
    <!-- Architectural Subtle Blueprint Grid Background -->
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#e2e8f0_1px,transparent_1px),linear-gradient(to_bottom,#e2e8f0_1px,transparent_1px)] bg-[size:4.5rem_4.5rem] [mask-image:radial-gradient(ellipse_75%_55%_at_50%_0%,#000_70%,transparent_100%)] opacity-35 pointer-events-none"></div>

    <!-- Soft Ambient Engineering Blue Glow -->
    <div class="absolute top-1/6 left-1/2 -translate-x-1/2 w-[800px] h-[350px] bg-blue-100/35 rounded-full blur-3xl pointer-events-none -z-0"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 z-10">
        
        <!-- Engineering Spec Rail: 4-Pillar Quality Indicators -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-4 sm:p-6 bg-white rounded-2xl border border-slate-200/90 shadow-xs">
            <div class="flex items-center gap-3.5 px-3 py-2 border-r border-slate-100 last:border-r-0">
                <div class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-[#1b54a5] flex-shrink-0">
                    <i data-lucide="shield-check" class="w-5 h-5"></i>
                </div>
                <div>
                    <div class="text-xs font-bold text-slate-900 uppercase tracking-tight">IPC/WHMA-A-620</div>
                    <div class="text-[11px] text-slate-500 font-medium">Class 2 &amp; 3 Certified</div>
                </div>
            </div>

            <div class="flex items-center gap-3.5 px-3 py-2 border-r border-slate-100 last:border-r-0">
                <div class="w-10 h-10 rounded-xl bg-sky-50 border border-sky-100 flex items-center justify-center text-sky-600 flex-shrink-0">
                    <i data-lucide="zap" class="w-5 h-5"></i>
                </div>
                <div>
                    <div class="text-xs font-bold text-slate-900 uppercase tracking-tight">100% Continuity</div>
                    <div class="text-[11px] text-slate-500 font-medium">Cirris Hipot Verification</div>
                </div>
            </div>

            <div class="flex items-center gap-3.5 px-3 py-2 border-r border-slate-100 last:border-r-0">
                <div class="w-10 h-10 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-600 flex-shrink-0">
                    <i data-lucide="cpu" class="w-5 h-5"></i>
                </div>
                <div>
                    <div class="text-xs font-bold text-slate-900 uppercase tracking-tight">Sub-mm Precision</div>
                    <div class="text-[11px] text-slate-500 font-medium">CFM Monitored Crimping</div>
                </div>
            </div>

            <div class="flex items-center gap-3.5 px-3 py-2">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 flex-shrink-0">
                    <i data-lucide="box" class="w-5 h-5"></i>
                </div>
                <div>
                    <div class="text-xs font-bold text-slate-900 uppercase tracking-tight">Build-to-Print</div>
                    <div class="text-[11px] text-slate-500 font-medium">OEM &amp; ODM Capabilities</div>
                </div>
            </div>
        </div>

        <!-- Section Header: Architectural Two-Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-end">
            <!-- Left: Headline & Badge -->
            <div class="lg:col-span-7 space-y-3">
                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-[#1b54a5]/10 border border-[#1b54a5]/20 text-[#1b54a5] text-xs font-bold uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-[#1b54a5]"></span>
                    <span>Industrial Grade Custom Assemblies</span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-slate-900 leading-[1.14]">
                    Engineered Interconnects &amp;<br>
                    <span class="text-[#1b54a5]">Custom Wire Harnesses</span>
                </h2>
            </div>

            <!-- Right: Context Paragraph -->
            <div class="lg:col-span-5 space-y-3">
                <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-normal">
                    Precision wire processing, automated terminal crimping, and 100% digital electrical testing for mission-critical applications across global tier-1 supply chains.
                </p>
                <div class="flex items-center gap-4 text-xs font-mono text-slate-500 pt-1">
                    <span class="inline-flex items-center gap-1.5 text-emerald-700 font-bold">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        6 SPECIALIZED DIVISIONS
                    </span>
                    <span class="text-slate-300">|</span>
                    <span class="text-slate-500">RAPID DFM PROTOTYPING</span>
                </div>
            </div>
        </div>

        <!-- Interactive Filtering & Search Control Bar -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-sm space-y-4">
            
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                
                <!-- Category Pills (Instant Alpine Filter) -->
                <div class="flex flex-wrap items-center gap-1.5">
                    @foreach($categories as $cat)
                        <button
                            type="button"
                            @click="activeCategory = '{{ $cat }}'"
                            :class="activeCategory === '{{ $cat }}' 
                                ? 'bg-[#1b54a5] text-white shadow-sm font-bold scale-[1.02]' 
                                : 'bg-slate-50 text-slate-600 hover:bg-slate-100 hover:text-slate-900 font-medium'"
                            class="px-4 py-2 rounded-xl text-xs sm:text-sm tracking-tight border border-slate-200/70 transition-all duration-200 cursor-pointer active:scale-95"
                        >
                            {{ $cat }}
                        </button>
                    @endforeach
                </div>

                <!-- Right Toolbar: Search & View Mode Switcher -->
                <div class="flex items-center gap-3">
                    <!-- Live Search Input -->
                    <div class="relative flex-1 sm:w-64">
                        <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                        <input
                            type="text"
                            x-model="searchQuery"
                            placeholder="Filter specs, AWG, standards..."
                            class="w-full pl-9 pr-8 py-2 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#1b54a5]/20 focus:border-[#1b54a5] transition-all"
                        >
                        <button 
                            x-show="searchQuery.length > 0" 
                            @click="searchQuery = ''"
                            class="absolute right-2.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 text-xs"
                        >
                            ✕
                        </button>
                    </div>

                    <!-- Grid vs Table View Mode -->
                    <div class="hidden sm:flex items-center rounded-xl border border-slate-200 bg-slate-50/80 p-0.5">
                        <button 
                            type="button" 
                            @click="viewMode = 'grid'" 
                            :class="viewMode === 'grid' ? 'bg-white shadow-xs text-[#1b54a5] font-bold' : 'text-slate-500 hover:text-slate-900'"
                            class="p-2 rounded-lg text-xs transition-colors flex items-center gap-1.5"
                            title="Grid Cards View"
                        >
                            <i data-lucide="layout-grid" class="w-4 h-4"></i>
                            <span class="sr-only">Grid View</span>
                        </button>
                        <button 
                            type="button" 
                            @click="viewMode = 'table'" 
                            :class="viewMode === 'table' ? 'bg-white shadow-xs text-[#1b54a5] font-bold' : 'text-slate-500 hover:text-slate-900'"
                            class="p-2 rounded-lg text-xs transition-colors flex items-center gap-1.5"
                            title="Engineering Matrix Table"
                        >
                            <i data-lucide="table" class="w-4 h-4"></i>
                            <span class="sr-only">Table View</span>
                        </button>
                    </div>
                </div>

            </div>

            <!-- Dynamic Result Counter & Active Filters Display -->
            <div class="flex items-center justify-between text-xs text-slate-500 pt-2 border-t border-slate-100 font-mono">
                <div class="flex items-center gap-2">
                    <span>Displaying <strong class="text-slate-900 font-bold" x-text="filteredProducts.length"></strong> of <strong class="text-slate-900 font-bold" x-text="allProducts.length"></strong> Solutions</span>
                    <template x-if="activeCategory !== 'All'">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-blue-50 text-[#1b54a5] border border-blue-200 text-[11px] font-sans">
                            <span x-text="activeCategory"></span>
                            <button @click="activeCategory = 'All'" class="hover:text-red-600">✕</button>
                        </span>
                    </template>
                </div>
                <div class="text-slate-400">
                    Hover card for specs &bull; Click for drawing details
                </div>
            </div>

        </div>

        <!-- 3A. Products Grid View (3 Columns Bento Layout) -->
        <div 
            x-show="viewMode === 'grid'"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7"
        >
            <template x-for="product in filteredProducts" :key="product.id">
                <div 
                    class="product-card group relative bg-white rounded-3xl overflow-hidden border border-slate-200/90 shadow-[0_2px_12px_rgba(0,0,0,0.03)] hover:shadow-[0_16px_36px_rgba(27,84,165,0.12)] hover:border-[#1b54a5]/50 transition-all duration-300 flex flex-col justify-between cursor-pointer active:scale-[0.985]"
                >
                    <!-- Card Top: Visual Media with Engineering Overlay -->
                    <div class="relative h-60 bg-slate-100 overflow-hidden">
                        <img
                            :src="product.image"
                            :alt="product.name"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out will-change-transform"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/15 to-transparent pointer-events-none"></div>

                        <!-- Top Left: Category Badge -->
                        <div class="absolute top-3 left-3">
                            <span class="px-2.5 py-1 rounded-lg bg-white/95 backdrop-blur-md text-[#1b54a5] text-[11px] font-bold uppercase tracking-wider shadow-xs border border-white/50">
                                <span x-text="product.category"></span>
                            </span>
                        </div>

                        <!-- Top Right: Quality Standard Code -->
                        <div class="absolute top-3 right-3">
                            <span 
                                :class="product.standardColor || 'bg-slate-900 text-white'"
                                class="px-2.5 py-1 rounded-lg text-[10px] font-mono font-bold uppercase tracking-wider shadow-xs border"
                                x-text="product.standard"
                            ></span>
                        </div>

                        <!-- Bottom Inside Image: Part Number & Wire Gauge Monospace Pill -->
                        <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-white text-xs font-mono">
                            <span class="font-bold tracking-wider text-sky-200" x-text="'#' + product.code"></span>
                            <span class="text-[11px] text-white/90 bg-slate-900/60 backdrop-blur-xs px-2 py-0.5 rounded border border-white/20" x-text="product.wireGauge"></span>
                        </div>
                    </div>

                    <!-- Card Body: Engineering Details -->
                    <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between space-y-6">
                        <div class="space-y-3">
                            <h3 class="text-xl font-bold text-slate-900 group-hover:text-[#1b54a5] transition-colors leading-snug">
                                <span x-text="product.name"></span>
                            </h3>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal" x-text="product.description"></p>

                            <!-- Key Engineering Specifications Matrix -->
                            <div class="pt-4 border-t border-slate-100 space-y-2">
                                <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 block font-mono">
                                    Quality &amp; Processing Specs:
                                </span>
                                <template x-for="spec in (product.specs || []).slice(0, 3)" :key="spec">
                                    <div class="flex items-start gap-2 text-xs text-slate-600">
                                        <svg class="w-3.5 h-3.5 text-[#1b54a5] flex-shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <span class="font-medium text-slate-700 leading-tight" x-text="spec"></span>
                                    </div>
                                </template>
                            </div>

                            <!-- Approved Connector Ecosystem Badges -->
                            <div class="pt-3 border-t border-slate-100 flex flex-wrap items-center gap-1.5">
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-tight mr-1">Connectors:</span>
                                <template x-for="c in (product.connectors || []).slice(0, 3)" :key="c">
                                    <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-600 text-[10px] font-mono font-medium" x-text="c"></span>
                                </template>
                            </div>
                        </div>

                        <!-- Card Action Buttons (Apple HIG Alignment & Semantic Icons) -->
                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
                            <button
                                type="button"
                                @click="selectedModalProduct = product; modalTab = 'specs'"
                                class="text-xs font-bold text-slate-700 hover:text-[#1b54a5] flex items-center gap-2 transition-colors cursor-pointer py-1.5 px-2.5 rounded-xl hover:bg-slate-50 group/btn"
                            >
                                <svg class="w-4 h-4 text-[#1b54a5] group-hover/btn:scale-110 transition-transform flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <line x1="10" y1="9" x2="8" y2="9"></line>
                                </svg>
                                <span>Technical Specs</span>
                            </button>

                            <button
                                type="button"
                                @click="chatOpen = true; chatInquiry = 'Inquiry for ' + product.name + ' (' + product.code + ')'"
                                class="px-4 py-2 rounded-xl bg-[#1b54a5] hover:bg-[#134074] text-white text-xs font-bold shadow-xs hover:shadow-md transition-all flex items-center gap-2 cursor-pointer active:scale-95 group/rfq"
                            >
                                <svg class="w-3.5 h-3.5 group-hover/rfq:scale-110 transition-transform flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <span>Inquire RFQ</span>
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- 3B. Products Engineering Matrix Table View -->
        <div 
            x-show="viewMode === 'table'" 
            class="bg-white rounded-3xl border border-slate-200/90 shadow-sm overflow-hidden"
        >
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-200 font-mono text-[11px] text-slate-500 uppercase tracking-wider">
                            <th class="py-4 px-6">Part Code</th>
                            <th class="py-4 px-6">Assembly &amp; Industry</th>
                            <th class="py-4 px-6">Wire Gauge / Spec</th>
                            <th class="py-4 px-6">Compliance Standard</th>
                            <th class="py-4 px-6">Testing Protocol</th>
                            <th class="py-4 px-6 text-right">Engineering Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <template x-for="product in filteredProducts" :key="product.id">
                            <tr class="hover:bg-blue-50/30 transition-colors">
                                <td class="py-4 px-6 font-mono font-bold text-[#1b54a5]" x-text="'#' + product.code"></td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-900 text-sm" x-text="product.name"></div>
                                    <div class="text-[11px] text-slate-500 font-medium" x-text="product.category + ' Division'"></div>
                                </td>
                                <td class="py-4 px-6 font-mono text-slate-700" x-text="product.wireGauge"></td>
                                <td class="py-4 px-6">
                                    <span 
                                        :class="product.standardColor || 'bg-slate-100 text-slate-700'"
                                        class="px-2 py-0.5 rounded text-[10px] font-mono uppercase font-semibold border"
                                        x-text="product.standard"
                                    ></span>
                                </td>
                                <td class="py-4 px-6 text-slate-600" x-text="product.testing"></td>
                                <td class="py-4 px-6 text-right whitespace-nowrap space-x-2">
                                    <button
                                        type="button"
                                        @click="selectedModalProduct = product; modalTab = 'specs'"
                                        class="px-3 py-1.5 rounded-lg border border-slate-200 text-slate-700 hover:text-[#1b54a5] hover:border-[#1b54a5] font-bold text-xs transition-colors inline-flex items-center gap-1.5"
                                    >
                                        <svg class="w-3.5 h-3.5 text-[#1b54a5]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                        </svg>
                                        <span>Specs</span>
                                    </button>
                                    <button
                                        type="button"
                                        @click="chatOpen = true; chatInquiry = 'Inquiry for ' + product.name"
                                        class="px-3 py-1.5 rounded-lg bg-[#1b54a5] text-white hover:bg-[#134074] font-bold text-xs transition-colors shadow-xs inline-flex items-center gap-1.5"
                                    >
                                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                        </svg>
                                        <span>RFQ</span>
                                    </button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Empty Results Fallback -->
        <div 
            x-show="filteredProducts.length === 0" 
            class="text-center py-16 bg-white rounded-3xl border border-slate-200/80 p-8 space-y-4"
        >
            <div class="w-14 h-14 rounded-full bg-slate-100 text-slate-400 mx-auto flex items-center justify-center">
                <i data-lucide="search-x" class="w-7 h-7"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-900">No Wire Harnesses Found</h3>
            <p class="text-xs sm:text-sm text-slate-500 max-w-md mx-auto">
                No matching product assemblies for "<span class="font-mono text-slate-700" x-text="searchQuery"></span>" in the <span class="font-semibold text-slate-700" x-text="activeCategory"></span> category.
            </p>
            <button 
                type="button" 
                @click="searchQuery = ''; activeCategory = 'All'" 
                class="px-4 py-2 rounded-xl bg-slate-900 text-white text-xs font-bold hover:bg-slate-800 transition-colors"
            >
                Reset All Filters
            </button>
        </div>

        <!-- Custom Schematic Consultation Callout (Standardized Waveform CTA) -->
        <div class="relative rounded-3xl bg-[#1b54a5] text-white p-8 sm:p-12 shadow-xl overflow-hidden border border-[#1b54a5]">
            <!-- Architectural Background Grid -->
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff_1px,transparent_1px),linear-gradient(to_bottom,#ffffff_1px,transparent_1px)] bg-[size:3.5rem_3.5rem] opacity-5 pointer-events-none"></div>

            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="space-y-3 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-sky-200 text-xs font-bold uppercase tracking-wider border border-white/20">
                        <i data-lucide="file-code" class="w-3.5 h-3.5"></i>
                        <span>Build-to-Print OEM &amp; ODM Engineering</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight">
                        Need a Custom Wire Harness Built to Exact Schematics?
                    </h3>
                    <p class="text-white/85 text-xs sm:text-sm max-w-2xl leading-relaxed">
                        We accept CAD drawings, Gerber files, point-to-point schematics, and physical samples for reverse engineering. Our technical engineering team provides DFM feedback and tooling feasibility analysis within 48 hours.
                    </p>
                </div>

                <div class="flex-shrink-0">
                    <x-waveform-button 
                        href="{{ route('contact') }}" 
                        text="Upload Drawings / Talk to Engineering" 
                        theme="dark" 
                    />
                </div>
            </div>
        </div>

    </div>

    <!-- Product Full Technical Specs Modal Drawer -->
    <div 
        x-show="selectedModalProduct" 
        x-cloak 
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/70 backdrop-blur-md transition-opacity duration-300"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div 
            @click.outside="selectedModalProduct = null"
            class="bg-white rounded-3xl max-w-3xl w-full overflow-hidden shadow-2xl border border-slate-200 transform transition-all"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4"
        >
            <!-- Modal Header -->
            <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/80">
                <div class="space-y-1">
                    <div class="flex items-center gap-2">
                        <span class="font-mono text-xs font-bold text-[#1b54a5]" x-text="'#' + selectedModalProduct?.code"></span>
                        <span class="text-slate-300">&bull;</span>
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500" x-text="selectedModalProduct?.category + ' Assembly'"></span>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900" x-text="selectedModalProduct?.name"></h3>
                </div>
                <button 
                    @click="selectedModalProduct = null" 
                    class="w-9 h-9 rounded-full bg-slate-200/80 hover:bg-slate-300 text-slate-700 flex items-center justify-center text-sm font-bold transition-colors cursor-pointer"
                >
                    ✕
                </button>
            </div>

            <!-- Modal Tab Navigation -->
            <div class="px-6 pt-3 border-b border-slate-100 flex items-center gap-6 text-xs font-bold">
                <button 
                    @click="modalTab = 'specs'" 
                    :class="modalTab === 'specs' ? 'text-[#1b54a5] border-b-2 border-[#1b54a5] pb-2' : 'text-slate-500 hover:text-slate-800 pb-2'"
                    class="transition-colors cursor-pointer"
                >
                    Technical Specifications
                </button>
                <button 
                    @click="modalTab = 'qa'" 
                    :class="modalTab === 'qa' ? 'text-[#1b54a5] border-b-2 border-[#1b54a5] pb-2' : 'text-slate-500 hover:text-slate-800 pb-2'"
                    class="transition-colors cursor-pointer"
                >
                    Testing &amp; Compliance
                </button>
                <button 
                    @click="modalTab = 'connectors'" 
                    :class="modalTab === 'connectors' ? 'text-[#1b54a5] border-b-2 border-[#1b54a5] pb-2' : 'text-slate-500 hover:text-slate-800 pb-2'"
                    class="transition-colors cursor-pointer"
                >
                    Connectors &amp; Application
                </button>
            </div>

            <!-- Modal Content Body -->
            <div class="p-6 space-y-5 max-h-[70vh] overflow-y-auto">
                
                <!-- Visual & Description Overview -->
                <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                    <div class="sm:col-span-5 h-44 rounded-2xl overflow-hidden border border-slate-200 bg-slate-100">
                        <img :src="selectedModalProduct?.image" :alt="selectedModalProduct?.name" class="w-full h-full object-cover">
                    </div>
                    <div class="sm:col-span-7 space-y-2">
                        <span class="text-[10px] font-mono uppercase font-bold text-slate-400">Engineering Overview</span>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed" x-text="selectedModalProduct?.description"></p>
                        <div class="flex items-center gap-2 pt-2">
                            <span class="px-2.5 py-1 rounded bg-blue-50 text-[#1b54a5] border border-blue-200 text-xs font-mono font-bold" x-text="selectedModalProduct?.standard"></span>
                            <span class="text-xs font-mono text-slate-500" x-text="selectedModalProduct?.wireGauge"></span>
                        </div>
                    </div>
                </div>

                <!-- Tab 1: Technical Specs -->
                <div x-show="modalTab === 'specs'" class="space-y-4">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 font-mono">Verified Processing Specifications</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        <template x-for="spec in selectedModalProduct?.specs" :key="spec">
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/70 text-xs text-slate-700 flex items-start gap-2">
                                <svg class="w-4 h-4 text-[#1b54a5] flex-shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <span x-text="spec" class="font-medium"></span>
                            </div>
                        </template>
                    </div>

                    <div class="grid grid-cols-2 gap-3 pt-2 font-mono text-xs">
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                            <div class="text-[10px] uppercase text-slate-400">Tolerances</div>
                            <div class="font-bold text-slate-800 mt-0.5" x-text="selectedModalProduct?.tolerances || 'Standard Precision'"></div>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                            <div class="text-[10px] uppercase text-slate-400">Testing Protocol</div>
                            <div class="font-bold text-slate-800 mt-0.5" x-text="selectedModalProduct?.testing"></div>
                        </div>
                    </div>
                </div>

                <!-- Tab 2: QA & Compliance -->
                <div x-show="modalTab === 'qa'" class="space-y-4">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 font-mono">Quality Assurance &amp; Standards</h4>
                    <div class="p-4 rounded-2xl bg-blue-50/60 border border-blue-100 space-y-2 text-xs">
                        <div class="font-bold text-[#1b54a5] flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#1b54a5] flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                <polyline points="9 12 11 14 15 10"></polyline>
                            </svg>
                            <span>100% Digital Electrical Testing &amp; CFM</span>
                        </div>
                        <p class="text-slate-600 leading-relaxed font-normal" x-text="selectedModalProduct?.testing"></p>
                    </div>

                    <div class="space-y-2 text-xs">
                        <div class="font-bold text-slate-800">Standard Directives:</div>
                        <ul class="list-disc list-inside text-slate-600 space-y-1">
                            <li>IPC/WHMA-A-620 Class 2 &amp; 3 Acceptance Requirements</li>
                            <li>Automated Real-Time Crimp Force Monitoring (CFM) with error ejection</li>
                            <li>Cirris computerized continuity, high-voltage breakdown, and contact resistance test</li>
                            <li>Full compliance with RoHS 3 (EU 2015/863) and REACH directives</li>
                        </ul>
                    </div>
                </div>

                <!-- Tab 3: Connectors & Application -->
                <div x-show="modalTab === 'connectors'" class="space-y-4">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 font-mono">Compatible Connector Ecosystem</h4>
                    <div class="flex flex-wrap gap-2">
                        <template x-for="c in selectedModalProduct?.connectors" :key="c">
                            <span class="px-3 py-1.5 rounded-xl bg-slate-100 border border-slate-200 text-xs font-mono font-semibold text-slate-800" x-text="c"></span>
                        </template>
                    </div>

                    <div class="pt-2 space-y-1">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 font-mono">Primary Applications</h4>
                        <p class="text-xs sm:text-sm text-slate-700 bg-slate-50 p-3 rounded-xl border border-slate-200/80 leading-relaxed" x-text="selectedModalProduct?.application"></p>
                    </div>
                </div>

                <!-- Modal Action Footer -->
                <div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                    <button 
                        @click="selectedModalProduct = null" 
                        class="w-full sm:w-auto px-4 py-2 rounded-xl border border-slate-200 text-xs font-semibold text-slate-700 hover:bg-slate-100 transition-colors"
                    >
                        Close Specification View
                    </button>
                    <button 
                        @click="const name = selectedModalProduct?.name; const code = selectedModalProduct?.code; selectedModalProduct = null; chatOpen = true; chatInquiry = 'Inquiry for ' + name + ' (' + code + ')'"
                        class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-[#1b54a5] hover:bg-[#134074] text-white text-xs font-bold shadow-sm flex items-center justify-center gap-2 transition-colors cursor-pointer active:scale-95"
                    >
                        <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span>Start RFQ for this Assembly</span>
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
