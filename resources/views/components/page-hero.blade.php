@props([
    'title' => 'Seiko Denki',
    'subtitle' => '',
    'image' => asset('images/hd/about_hero.jpg'),
    'badgeWord1' => 'About',
    'badgeWord2' => 'Seiko Denki'
])

<!-- Full-Bleed Page Hero Section (Image starts below floating navbar so faces are never blocked) -->
<section class="relative w-full bg-[#0b2545] pt-24 sm:pt-28 overflow-hidden select-none">
    
    <div class="relative min-h-[440px] h-[62vh] sm:h-[70vh] max-h-[720px] w-full flex items-end overflow-hidden bg-slate-950">
        <!-- Edge-to-Edge Hero Photograph positioned with object-top so faces stay clear -->
        <div class="absolute inset-0 w-full h-full overflow-hidden">
            <img 
                src="{{ $image }}" 
                alt="{{ $title }} - Seiko Denki (M) Sdn. Bhd." 
                class="w-full h-full object-cover object-center select-none pointer-events-none transform will-change-transform hero-parallax-img"
            >
        </div>

        <!-- Subtle Gradient Vignettes for Badge Contrast -->
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/20 via-transparent to-slate-950/55 pointer-events-none z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/35 via-transparent to-slate-950/25 pointer-events-none z-10"></div>

        <!-- Floating Royal Blue Badge -->
        <div class="relative z-20 w-full max-w-[1400px] mx-auto px-6 sm:px-12 pointer-events-none">
            <div class="inline-block bg-[#1b54a5] text-white p-6 sm:p-8 lg:p-10 shadow-2xl rounded-t-2xl sm:rounded-t-3xl border-t-2 border-white/20 will-change-transform pointer-events-auto">
                <span class="w-2.5 h-2.5 sm:w-3 sm:h-3 bg-white block mb-2 sm:mb-3"></span>
                <h1 class="text-2xl sm:text-4xl lg:text-[44px] font-extrabold text-white tracking-tight leading-[1.12]">
                    {!! $badgeWord1 !!}<br>
                    <span class="font-normal text-white/95">{!! $badgeWord2 !!}</span>
                </h1>
            </div>
        </div>
    </div>

</section>
