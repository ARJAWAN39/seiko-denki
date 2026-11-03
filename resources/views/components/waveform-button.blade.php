@props([
    'href' => '#',
    'text' => 'Explore Details',
    'theme' => 'light',
    'target' => '_self'
])

@php
    $isDark = $theme === 'dark';
    $textColor = $isDark ? 'text-white group-hover:text-sky-300' : 'text-slate-900 group-hover:text-[#1b54a5]';
    $baseStroke = $isDark ? 'rgba(255,255,255,0.45)' : 'currentColor';
    $baseClass = $isDark ? 'group-hover:stroke-sky-300' : 'text-slate-300 group-hover:text-[#1b54a5]';
    $pulseStroke = $isDark ? '#38bdf8' : '#1b54a5';
    $pulseHover = $isDark ? 'group-hover:stroke-white' : '';
@endphp

<!-- Homepage Exact Oscilloscope Waveform Signature Button -->
<a 
    href="{{ $href }}" 
    target="{{ $target }}"
    {{ $attributes->merge(['class' => 'group inline-flex flex-col items-start cursor-pointer select-none transition-all duration-300 ease-out will-change-transform']) }}
>
    <!-- Text label: shifts right on hover -->
    <span class="text-xs sm:text-sm lg:text-base font-bold tracking-tight mb-2 {{ $textColor }} transform transition-all duration-300 ease-out group-hover:translate-x-1.5">
        {{ $text }}
    </span>
    
    <!-- Oscilloscope Waveform Line: shifts left on hover (Homepage Exact Vector) -->
    <div class="w-48 sm:w-56 transform transition-all duration-300 ease-out group-hover:-translate-x-1.5 overflow-hidden">
        <svg class="w-full h-3.5 block" viewBox="0 0 200 14" fill="none">
            <line x1="0" y1="7" x2="120" y2="7" stroke="{{ $baseStroke }}" class="{{ $baseClass }} transition-colors duration-300" stroke-width="1.6"/>
            <path d="M120 7 L124 7 L126.5 1.5 L130 12.5 L133.5 1.5 L137 12.5 L140.5 1.5 L143 7 L147 7" stroke="{{ $pulseStroke }}" class="{{ $pulseHover }} transition-colors duration-300" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"/>
            <line x1="147" y1="7" x2="200" y2="7" stroke="{{ $baseStroke }}" class="{{ $baseClass }} transition-colors duration-300" stroke-width="1.6"/>
        </svg>
    </div>
</a>
