@props([
    'title' => 'Seiko Denki',
    'subtitle' => '',
    'image' => asset('images/hd/about_hero.jpg'),
    'badgeWord1' => 'About',
    'badgeWord2' => 'Seiko Denki'
])

<!-- Full-Bleed Page Hero Section (100% Full-Width & Cinematic Height matching Homepage Hero) -->
<section class="relative min-h-[580px] h-[80vh] sm:h-[85vh] max-h-[880px] w-full flex items-end overflow-hidden bg-slate-950 select-none">
    
    <!-- Edge-to-Edge Hero Photograph with High-Definition Ambient Grade & Smooth Parallax -->
    <div class="absolute inset-0 w-full h-full overflow-hidden">
        <img 
            src="{{ $image }}" 
            alt="{{ $title }} - Seiko Denki (M) Sdn. Bhd." 
            class="w-full h-full object-cover object-center select-none pointer-events-none transform will-change-transform hero-parallax-img scale-105"
        >
    </div>

    <!-- Dark Gradient Vignettes for Menu & Badge Contrast (matching Homepage) -->
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950/60 via-slate-950/15 to-slate-950/50 pointer-events-none z-10"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/40 via-transparent to-slate-950/30 pointer-events-none z-10"></div>

    <!-- Floating Royal Blue Badge (Figma Exact Placement & Geometry) -->
    <div class="relative z-20 w-full max-w-[1400px] mx-auto px-6 sm:px-12 pointer-events-none">
        <div class="inline-block bg-[#1b54a5] text-white p-6 sm:p-8 lg:p-10 shadow-2xl rounded-t-2xl sm:rounded-t-3xl border-t-2 border-white/20 will-change-transform pointer-events-auto">
            <span class="w-2.5 h-2.5 sm:w-3 sm:h-3 bg-white block mb-2 sm:mb-3"></span>
            <h1 class="text-2xl sm:text-4xl lg:text-[44px] font-extrabold text-white tracking-tight leading-[1.12]">
                {!! $badgeWord1 !!}<br>
                <span class="font-normal text-white/95">{!! $badgeWord2 !!}</span>
            </h1>
        </div>
    </div>

</section>
