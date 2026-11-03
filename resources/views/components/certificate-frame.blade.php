<section class="py-24 sm:py-32 bg-white relative overflow-hidden" id="committed-to-quality">
    <!-- Ambient Technical Watermark Trace -->
    <div class="absolute -right-20 top-1/3 w-[500px] h-[250px] pointer-events-none opacity-[0.035] sec5-bg-watermark will-change-transform">
        <svg class="w-full h-full text-[#1b54a5]" viewBox="0 0 240 40" fill="none">
            <path d="M 0 20 H 30 L 36 4 L 42 36 L 48 4 L 54 36 L 60 4 L 66 36 L 72 4 L 78 36 L 84 20 H 240" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

    <div class="max-w-[1400px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
        
        <!-- Section Header (Figma Exact Typography and Scale) -->
        <div class="mb-14 sm:mb-16 max-w-2xl pl-2 sm:pl-4">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
                Committed to Quality.
                <span class="block text-[#1b54a5]">Responsible for Tomorrow.</span>
            </h2>
            <p class="text-xs sm:text-[13px] text-slate-500 font-normal leading-relaxed mt-3">
                Upholding the highest standards in quality, compliance and sustainable manufacturing for a better future.
            </p>
        </div>

        <!-- Alpine.js Carousel Slider for the 4 Continuous Cards -->
        <div 
            class="relative"
            x-data="{ 
                currentSlide: 0,
                slides: [
                    {
                        titleLine1: 'Quality Built',
                        titleLine2: 'Into Every Process',
                        desc: 'Driven by internationally recognised quality management standards to ensure consistency, reliability and excellence.',
                        isCert: true,
                        image: '{{ asset('images/hd/cert_quality.jpg') }}'
                    },
                    {
                        titleLine1: 'Safer Materials',
                        titleLine2: 'Smarter Manufacturing',
                        desc: 'Committed to responsible manufacturing practices through compliance with hazardous substance requirements.',
                        isCert: false,
                        image: '{{ asset('images/hd/cert_rohs.jpg') }}'
                    },
                    {
                        titleLine1: 'Responsible Materials',
                        titleLine2: 'for a Better Future',
                        desc: 'Supporting responsible chemical management and safer materials throughout our manufacturing processes.',
                        isCert: false,
                        image: '{{ asset('images/hd/cert_reach.jpg') }}'
                    },
                    {
                        titleLine1: 'Engineering a More',
                        titleLine2: 'Sustainable Tomorrow',
                        desc: 'Creating long-term value through responsible environmental, social and governance practices.',
                        isCert: false,
                        image: '{{ asset('images/hd/cert_esg.jpg') }}'
                    }
                ],
                next() {
                    this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                },
                prev() {
                    this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
                }
            }"
        >
            <!-- Carousel Horizontal Slider Viewport with Peek of Next Card -->
            <div class="relative w-full overflow-hidden">
                <div 
                    class="flex items-stretch gap-6 sm:gap-8 transition-transform duration-500 ease-out"
                    :style="'transform: translateX(-' + (currentSlide * 73) + '%);'"
                >
                    <template x-for="(slide, index) in slides" :key="index">
                        <div class="w-[70vw] max-w-[960px] min-w-[310px] sm:min-w-[620px] flex-shrink-0 relative py-12">
                            
                            <!-- White Main Card Container (Default Rectangular Size) -->
                            <div class="relative z-10 w-full min-h-[380px] sm:min-h-[400px] rounded-3xl bg-slate-50/70 border border-slate-200/80 p-8 sm:p-12 lg:p-14 shadow-sm flex flex-col md:flex-row items-center justify-between gap-8">
                                
                                <!-- Architectural Technical Line Design (Inside the card, matching Figma screenshot) -->
                                <!-- 1. Top Royal Blue Vertical Stem Drop flush from the top edge -->
                                <div class="hidden sm:block absolute top-0 left-[48%] w-[2.5px] h-16 bg-[#1b54a5] z-0"></div>

                                <!-- 2. Top-Right Light Grey Stepped Bracket -->
                                <div class="hidden sm:block absolute top-0 right-14 w-36 h-14 border-b-2 border-l-2 border-slate-300/80 z-0 pointer-events-none"></div>

                                <!-- 3. Bottom-Left Light Grey Stepped Bracket -->
                                <div class="hidden sm:block absolute bottom-12 left-[48%] w-32 h-16 border-t-2 border-l-2 border-slate-300/80 z-0 pointer-events-none"></div>

                                <!-- 4. Prominent Royal Blue L-Bracket Framing Guide anchored flush at the bottom edge -->
                                <div class="hidden sm:block absolute bottom-0 left-[67%] w-32 h-26 border-t-2 border-l-2 border-[#1b54a5] z-0 pointer-events-none"></div>

                                <!-- Left Text Area -->
                                <div class="w-full md:w-1/2 space-y-4 relative z-10">
                                    <h3 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight leading-tight">
                                        <span class="text-slate-900 block" x-text="slide.titleLine1"></span>
                                        <span class="text-[#1b54a5] block" x-text="slide.titleLine2"></span>
                                    </h3>

                                    <p class="text-xs sm:text-[13px] text-slate-600 leading-relaxed font-normal max-w-md" x-text="slide.desc">
                                    </p>

                                    <!-- More Details with Seamless Oscilloscope Wave Underline (Zero gaps, harmonized hover interaction) -->
                                    <div class="pt-4">
                                        <a 
                                            href="{{ route('achievements') }}" 
                                            class="group inline-flex flex-col items-start cursor-pointer transition-all duration-300 ease-out select-none"
                                        >
                                            <!-- Text shifts right on hover -->
                                            <span class="text-xs sm:text-sm font-bold tracking-tight mb-2 text-slate-800 group-hover:text-[#1b54a5] transform transition-all duration-300 ease-out group-hover:translate-x-1.5">More Details</span>
                                            
                                            <!-- Underline bar: Single continuous unified SVG vector line with zero possibility of gap or misalignment -->
                                            <div class="w-44 sm:w-48 transform transition-all duration-300 ease-out group-hover:-translate-x-1.5 overflow-hidden">
                                                <svg class="w-full h-3.5 block" viewBox="0 0 190 14" fill="none">
                                                    <!-- Left horizontal leader line -->
                                                    <line x1="0" y1="7" x2="115" y2="7" stroke="currentColor" class="text-slate-300 group-hover:text-[#1b54a5] transition-colors duration-300" stroke-width="1.6"/>
                                                    <!-- Precision Oscilloscope Resistor waveform directly joined to line at (115,7) -->
                                                    <path d="M115 7 L119 7 L121.5 1.5 L125 12.5 L128.5 1.5 L132 12.5 L135.5 1.5 L138 7 L142 7" stroke="#1b54a5" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"/>
                                                    <!-- Right horizontal trailing line directly joined at (142,7) -->
                                                    <line x1="142" y1="7" x2="190" y2="7" stroke="currentColor" class="text-slate-300 group-hover:text-[#1b54a5] transition-colors duration-300" stroke-width="1.6"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <!-- Right Visual Representation Area: Popping 3D Element & Blue Wing -->
                                <div class="w-full md:w-1/2 flex items-center justify-end relative z-20">
                                    
                                    <!-- Slide 1: Realistic Framed Certificate with bevelled border and authentic certificate styling -->
                                    <template x-if="slide.isCert">
                                        <div class="cert-3d-frame will-change-transform relative w-full max-w-[260px] sm:max-w-[290px] mr-4 sm:mr-8 bg-white p-3.5 sm:p-4 rounded-xl shadow-2xl border-[6px] border-slate-200/90 transition-transform duration-500 hover:scale-105">
                                            <div class="w-full bg-white border border-slate-200 p-4 rounded text-left space-y-3 font-serif">
                                                <div class="flex items-center justify-between border-b pb-2 border-slate-100">
                                                    <span class="px-2 py-0.5 rounded bg-[#48286a] text-white font-mono text-[9px] font-bold">afaq</span>
                                                    <span class="italic text-[11px] text-amber-700">Certificat</span>
                                                </div>
                                                <div class="py-2 text-center space-y-1">
                                                    <p class="text-[8px] uppercase tracking-wider text-slate-400 font-mono">AFAQ CERTIFICATION</p>
                                                    <h5 class="text-[11px] font-extrabold text-slate-900 tracking-tight">SEIKO DENKI (M) SDN. BHD.</h5>
                                                    <div class="w-6 h-0.5 bg-blue-600 mx-auto my-1.5"></div>
                                                    <p class="text-[9px] font-bold text-slate-800">ISO 14001:2015</p>
                                                    <p class="text-[7.5px] text-slate-500 leading-tight">Environmental Management System in Manufacture of Wire Harnesses</p>
                                                </div>
                                                <div class="flex items-center justify-between border-t pt-2 border-slate-100">
                                                    <span class="text-[7px] text-slate-400 font-mono">VALIDATED 2026</span>
                                                    <div class="w-6 h-6 border border-slate-300 rounded flex items-center justify-center">
                                                        <i data-lucide="qr-code" class="w-4 h-4 text-slate-700"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- Slides 2, 3, 4: Big Circle with THICK white border, POPPING OUT with 3D shadow, nicely arranged Blue background wing (Figma Exact) -->
                                    <template x-if="!slide.isCert">
                                        <div class="relative flex items-center justify-end w-full max-w-[480px] h-[340px] sm:h-[380px]">
                                            
                                            <!-- Nicely Arranged Solid Blue Background Wing extending completely flush to the right border -->
                                            <div class="absolute -right-8 sm:-right-12 lg:-right-14 top-0 bottom-0 w-3/4 sm:w-[68%] bg-[#1b54a5] rounded-r-3xl z-0 pointer-events-none"></div>
                                            
                                            <!-- Big Circle with Thick Border POPPING OUT beyond the card boundary (3D Elevation - Exact Proportion to 2nd screenshot) -->
                                            <div class="relative z-10 w-[290px] h-[290px] sm:w-[350px] sm:h-[350px] lg:w-[390px] lg:h-[390px] aspect-square rounded-full overflow-hidden shadow-[0_25px_50px_-12px_rgba(0,0,0,0.4)] ring-[16px] sm:ring-[20px] ring-white bg-slate-100 transform -translate-y-2 sm:-translate-y-3 translate-x-4 sm:translate-x-8 transition-transform duration-500 hover:scale-[1.02] flex-shrink-0">
                                                <img 
                                                    :src="slide.image" 
                                                    :alt="slide.titleLine1" 
                                                    class="w-full h-full object-cover object-center"
                                                >
                                            </div>

                                        </div>
                                    </template>

                                </div>

                            </div>

                        </div>
                    </template>
                </div>
            </div>

            <!-- Carousel Controls: Technical Minimalist Arrows (Figma Exact) -->
            <div class="flex items-center gap-6 mt-8 sm:mt-10 pl-4">
                <button 
                    type="button" 
                    @click="prev()" 
                    aria-label="Previous slide"
                    class="group flex items-center text-slate-800 hover:text-[#1b54a5] transition-colors cursor-pointer"
                >
                    <svg class="w-8 h-6 group-hover:-translate-x-1 transition-transform" viewBox="0 0 32 20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="28" y1="10" x2="4" y2="10"></line>
                        <polyline points="12 4 4 10 12 16"></polyline>
                    </svg>
                </button>

                <button 
                    type="button" 
                    @click="next()" 
                    aria-label="Next slide"
                    class="group flex items-center text-slate-800 hover:text-[#1b54a5] transition-colors cursor-pointer"
                >
                    <svg class="w-8 h-6 group-hover:translate-x-1 transition-transform" viewBox="0 0 32 20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" y1="10" x2="28" y2="10"></line>
                        <polyline points="20 4 28 10 20 16"></polyline>
                    </svg>
                </button>
            </div>

            <!-- Figma Exact: "Looking for a Reliable Manufacturing Partner?" Bottom Callout Banner (Node 1729:4407) -->
            <div class="mt-14 sm:mt-20 relative">
                <a 
                    href="{{ route('contact') }}"
                    class="cta-banner-card group relative flex items-center bg-[#F4F4F4] hover:bg-[#eaeaea] rounded-2xl sm:rounded-[20px] transition-all duration-300 shadow-sm hover:shadow-md pl-24 sm:pl-32 lg:pl-36 pr-6 sm:pr-12 lg:pr-14 py-6 sm:py-7 min-h-[100px] sm:min-h-[120px] overflow-visible block cursor-pointer"
                >
                    <!-- Floating Circular Blue Headset Badge (Static & silent, exactly identical to other pages) -->
                    <div class="cta-headset-badge absolute -left-6 sm:-left-8 top-1/2 -translate-y-1/2 w-24 h-24 sm:w-28 sm:h-28 lg:w-32 lg:h-32 rounded-full bg-[#1B54A5] ring-[9px] sm:ring-[12px] ring-[#F4F4F4] shadow-xl flex items-center justify-center transition-transform duration-300 ease-out group-hover:scale-105 z-10 flex-shrink-0">
                        <!-- Crisp HD Vector Headset Support Icon (No Figma raster screenshots) -->
                        <svg class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 text-white relative z-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 18v-6a9 9 0 0 1 18 0v6"/>
                            <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/>
                            <path d="M14 19a2 2 0 0 1-2 2h-1"/>
                            <circle cx="12" cy="11" r="0.8" fill="currentColor"/>
                            <circle cx="9" cy="11" r="0.8" fill="currentColor"/>
                            <circle cx="15" cy="11" r="0.8" fill="currentColor"/>
                        </svg>
                    </div>

                    <!-- Text Area (Figma Exact Typography: Node 1729:4410 & 1729:4411) -->
                    <div class="flex-grow pr-4">
                        <h4 class="text-base sm:text-lg lg:text-xl font-extrabold text-[#333333] tracking-tight group-hover:text-[#1B54A5] transition-colors duration-200">
                            Looking for a Reliable Manufacturing Partner?
                        </h4>
                        <p class="text-xs sm:text-[13px] lg:text-sm text-slate-500 font-normal mt-1 leading-relaxed max-w-2xl">
                            Let's discuss how our expertise and precision manufacturing capabilities can support your next project.
                        </p>
                    </div>

                    <!-- Right Long Arrow CTA (Figma Exact: Node 1729:4412 with smooth hover slide) -->
                    <div class="flex-shrink-0 text-[#333333] group-hover:text-[#1B54A5] transition-colors duration-200">
                        <svg class="w-10 sm:w-14 lg:w-16 h-5 transform transition-transform duration-300 ease-out group-hover:translate-x-2" viewBox="0 0 80 20" fill="none">
                            <path d="M60.8142 9.53281C60.8731 9.5941 60.9198 9.66689 60.9517 9.74704C60.9836 9.82719 61 9.91311 61 9.99989C61 10.0867 60.9836 10.1726 60.9517 10.2527C60.9198 10.3329 60.8731 10.4057 60.8142 10.467L54.666 16.8445C54.5775 16.937 54.4647 17.0001 54.3419 17.0256C54.219 17.0512 54.0917 17.0381 53.9759 16.9881C53.8602 16.938 53.7614 16.8533 53.6919 16.7446C53.6224 16.6359 53.5854 16.5081 53.5856 16.3775V11.3193L1.26505 11.3193C0.929543 11.3193 0.607769 11.1803 0.370529 10.9329C0.133286 10.6854 3.8147e-06 10.3498 3.8147e-06 9.99989C3.8147e-06 9.64996 0.133286 9.31436 0.370529 9.06692C0.607769 8.81948 0.929543 8.68047 1.26505 8.68047L53.5856 8.68047V3.62231C53.5854 3.49166 53.6224 3.36389 53.6919 3.25518C53.7614 3.14648 53.8602 3.06174 53.9759 3.01171C54.0917 2.96168 54.219 2.94861 54.3419 2.97417C54.4647 2.99972 54.5775 3.06274 54.666 3.15524L60.8142 9.53281Z" fill="currentColor"/>
                        </svg>
                    </div>
                </a>
            </div>

        </div>

    </div>
</section>
