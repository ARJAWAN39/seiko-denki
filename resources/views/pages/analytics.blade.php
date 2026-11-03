@extends('layouts.app')

@section('title', 'Executive Website Traffic & Lead Report | Seiko Denki (M) Sdn. Bhd.')

@section('content')

<div class="py-16 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-10">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-slate-200">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-bold uppercase tracking-wider mb-2">
                    <i data-lucide="bar-chart-3" class="w-3.5 h-3.5 text-blue-600"></i>
                    <span>Feature 2: Management Intelligence</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                    Executive Website Traffic & Analytics Report
                </h1>
                <p class="text-xs sm:text-sm text-slate-500">
                    Telemetry metrics, visitor origins, high-interest products, and WhatsApp lead conversions for Seiko Denki.
                </p>
            </div>

            <!-- Weekly / Monthly Toggle -->
            <div class="flex items-center bg-slate-200 p-1.5 rounded-2xl border border-slate-300/80 self-start md:self-auto">
                <a
                    href="{{ route('analytics', ['period' => 'weekly']) }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $analytics['period'] === 'weekly' ? 'bg-blue-600 text-white shadow-md' : 'text-slate-700 hover:text-slate-900' }}"
                >
                    Weekly Summary
                </a>
                <a
                    href="{{ route('analytics', ['period' => 'monthly']) }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $analytics['period'] === 'monthly' ? 'bg-blue-600 text-white shadow-md' : 'text-slate-700 hover:text-slate-900' }}"
                >
                    Monthly Summary
                </a>
            </div>
        </div>

        <!-- 4 Top KPI Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            
            <div class="p-6 rounded-3xl bg-white border border-slate-200/90 shadow-sm flex flex-col justify-between">
                <div class="flex items-center justify-between text-blue-700 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Visitors</span>
                    <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center">
                        <i data-lucide="users" class="w-4 h-4"></i>
                    </div>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900 font-mono">{{ number_format($analytics['totalVisits']) }}</div>
                    <div class="text-[11px] text-emerald-600 font-semibold flex items-center gap-0.5 mt-1">
                        <i data-lucide="arrow-up-right" class="w-3 h-3"></i>
                        <span>{{ $analytics['growthRate'] }} vs prev period</span>
                    </div>
                </div>
            </div>

            <div class="p-6 rounded-3xl bg-white border border-slate-200/90 shadow-sm flex flex-col justify-between">
                <div class="flex items-center justify-between text-emerald-700 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">WhatsApp Leads</span>
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center">
                        <i data-lucide="message-square" class="w-4 h-4"></i>
                    </div>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900 font-mono">{{ $analytics['whatsAppLeads'] }}</div>
                    <div class="text-[11px] text-emerald-600 font-semibold flex items-center gap-0.5 mt-1">
                        <i data-lucide="arrow-up-right" class="w-3 h-3"></i>
                        <span>High conversion rate</span>
                    </div>
                </div>
            </div>

            <div class="p-6 rounded-3xl bg-white border border-slate-200/90 shadow-sm flex flex-col justify-between">
                <div class="flex items-center justify-between text-sky-700 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Desktop Users</span>
                    <div class="w-8 h-8 rounded-lg bg-sky-50 flex items-center justify-center">
                        <i data-lucide="monitor" class="w-4 h-4"></i>
                    </div>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900 font-mono">{{ $analytics['desktopPercent'] }}%</div>
                    <div class="text-[11px] text-slate-500 mt-1">Corporate procurement buyers</div>
                </div>
            </div>

            <div class="p-6 rounded-3xl bg-white border border-slate-200/90 shadow-sm flex flex-col justify-between">
                <div class="flex items-center justify-between text-amber-700 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Mobile Users</span>
                    <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center">
                        <i data-lucide="smartphone" class="w-4 h-4"></i>
                    </div>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900 font-mono">{{ $analytics['mobilePercent'] }}%</div>
                    <div class="text-[11px] text-slate-500 mt-1">Field engineers & mobile inquiries</div>
                </div>
            </div>

        </div>

        <!-- Daily Traffic & Lead Distribution Bar Chart -->
        <div class="p-6 sm:p-8 rounded-3xl bg-white border border-slate-200/90 shadow-sm space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                    <i data-lucide="trending-up" class="w-4 h-4 text-blue-600"></i>
                    <span>Daily Traffic Distribution & Quote Activity</span>
                </h3>
                <span class="text-xs text-slate-500">Peak Days: Wednesday & Thursday</span>
            </div>

            <div class="grid grid-cols-7 gap-2 pt-4 items-end h-44 border-b border-slate-100 pb-2">
                @foreach($analytics['dailyTraffic'] as $d)
                    @php
                        $heightPercent = ($d['visits'] / 750) * 100;
                    @endphp
                    <div class="flex flex-col items-center gap-1.5 h-full justify-end group">
                        <div class="text-[10px] font-bold text-slate-600 font-mono">{{ $d['visits'] }}</div>
                        <div
                            style="height: {{ $heightPercent }}%;"
                            class="w-full max-w-[48px] rounded-t-xl bg-gradient-to-t from-blue-700 to-sky-500 transition-all group-hover:opacity-80 shadow-md"
                            title="{{ $d['day'] }}: {{ $d['visits'] }} visits, {{ $d['leads'] }} WhatsApp inquiries"
                        ></div>
                        <div class="text-xs font-bold text-slate-600 font-mono">{{ $d['day'] }}</div>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center justify-between text-[11px] text-slate-400 pt-1">
                <span>Height reflects relative visitor traffic volume</span>
                <span>Includes direct search & referral visits</span>
            </div>
        </div>

        <!-- Bottom Grid: Most Viewed Pages / Products & Geographical Origin -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Top Pages -->
            <div class="p-6 rounded-3xl bg-white border border-slate-200/90 shadow-sm space-y-4">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700 flex items-center gap-1.5">
                    <i data-lucide="eye" class="w-3.5 h-3.5 text-blue-600"></i>
                    <span>Most Viewed Pages</span>
                </h4>
                <div class="space-y-3 text-xs">
                    @foreach($analytics['topPages'] as $page)
                        <div class="space-y-1">
                            <div class="flex justify-between font-medium text-slate-700">
                                <span>{{ $page['name'] }}</span>
                                <span class="font-mono text-slate-500">{{ number_format($page['views']) }}</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-1.5">
                                <div
                                    class="bg-blue-600 h-1.5 rounded-full"
                                    style="width: {{ $page['percent'] }}%;"
                                ></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Top Inquired Products -->
            <div class="p-6 rounded-3xl bg-white border border-slate-200/90 shadow-sm space-y-4">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700 flex items-center gap-1.5">
                    <i data-lucide="bar-chart-3" class="w-3.5 h-3.5 text-emerald-600"></i>
                    <span>Top Inquired Products</span>
                </h4>
                <div class="space-y-2.5 text-xs">
                    @foreach($analytics['topProducts'] as $prod)
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-between">
                            <span class="font-semibold text-slate-800 truncate mr-2">{{ $prod['name'] }}</span>
                            <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 font-mono font-bold text-[10px]">
                                {{ $prod['views'] }} views
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Visitor Geography -->
            <div class="p-6 rounded-3xl bg-white border border-slate-200/90 shadow-sm space-y-4">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700 flex items-center gap-1.5">
                    <i data-lucide="globe-2" class="w-3.5 h-3.5 text-sky-600"></i>
                    <span>Visitor Geography</span>
                </h4>
                <div class="space-y-2 text-xs">
                    @foreach($analytics['visitorLocations'] as $loc)
                        <div class="flex items-center justify-between py-2 border-b border-slate-100 last:border-0">
                            <span class="flex items-center gap-2">
                                <span class="text-base">{{ $loc['flag'] }}</span>
                                <span class="text-slate-700 font-medium">{{ $loc['country'] }}</span>
                            </span>
                            <span class="font-mono text-slate-500 font-semibold">{{ number_format($loc['visitors']) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
