@section('title', 'Dashboard')

<x-admin-layout>

    {{-- Page header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 animate-fade-up">
        <div>
            <h1 class="text-2xl font-bold text-zinc-900 tracking-tight font-outfit">Overview</h1>
            <p class="text-sm text-zinc-500 mt-0.5">Welcome back, Admin. Here's what's happening today.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-[12px] text-zinc-400 font-medium mr-2">{{ now()->format('M d, Y') }}</span>
            <a href="{{ route('admin.articles.create') }}" id="btn-new-article"
               class="inline-flex items-center gap-1.5 px-4 py-2 bg-[var(--maternal-brown)] text-white text-[13px] font-semibold rounded-xl hover:bg-zinc-800 active:scale-[0.97] transition-all shadow-md shadow-zinc-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                New Article
            </a>
        </div>
    </div>

    {{-- Metric cards --}}
    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4 mb-8">

        @php
            $metrics = [
                ['label' => 'Registered Users', 'value' => $totalUsers, 'change' => '+3%', 'up' => true, 'color' => '#B5838D'], // Rose Dark
                ['label' => 'Total Articles', 'value' => $stats['articles'], 'change' => '+12%', 'up' => true, 'color' => '#D19A9A'], // Rose
                ['label' => 'Videos', 'value' => $stats['videos'], 'change' => '+8%', 'up' => true, 'color' => '#B7B7A4'], // Sage
                ['label' => 'Active Clinics', 'value' => $stats['clinics'], 'change' => '+5%', 'up' => true, 'color' => '#3D3028'], // Brown
                ['label' => 'Feedback', 'value' => $stats['feedback'], 'change' => '+23%', 'up' => true, 'color' => '#E8B4B8'], // Soft pink
            ];
            $sparklines = [
                [25,40,55,45,65,50,80],
                [30,60,45,80,55,90,70],
                [40,35,65,50,75,60,85],
                [50,70,40,60,80,55,65],
                [20,50,35,70,45,85,95],
            ];
        @endphp

        @foreach($metrics as $idx => $m)
            <div class="bg-white border border-zinc-200 rounded-2xl p-6 card-lift ambient-glow animate-fade-up delay-{{ $idx + 1 }}">
                <div class="flex items-center justify-between mb-5">
                    <p class="text-[14px] text-zinc-500 font-semibold font-outfit uppercase tracking-wide">{{ $m['label'] }}</p>
                    <p class="flex items-center gap-0.5">
                        <svg class="w-3 h-3 {{ $m['up'] ? 'text-emerald-500' : 'text-red-500' }}" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $m['up'] ? 'M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25' : 'M4.5 4.5l15 15m0 0V8.25m0 11.25H8.25' }}"/></svg>
                        <span class="text-[12px] font-semibold {{ $m['up'] ? 'text-emerald-600' : 'text-red-500' }}">{{ $m['change'] }}</span>
                    </p>
                </div>
                <div class="flex items-end justify-between">
                    <p class="text-4xl font-bold text-zinc-900 tracking-tight leading-none animate-count delay-{{ $idx + 2 }} font-outfit">{{ $m['value'] }}</p>
                    {{-- Animated sparkline --}}
                    <div class="flex items-end gap-[3px] h-9">
                        @foreach($sparklines[$idx] as $si => $sv)
                            <div class="w-[5px] rounded-sm spark-bar" style="height: {{ $sv }}%; background: {{ $m['color'] }}; opacity: {{ 0.2 + ($si * 0.1) }}; animation-delay: {{ ($idx * 100) + ($si * 60) }}ms"></div>
                        @endforeach
                    </div>
                </div>
                <p class="text-[11px] text-zinc-400 mt-3">from last month</p>
            </div>
        @endforeach

    </div>

    {{-- Two-column grid --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- Recent Feedback --}}
        <div class="xl:col-span-2 bg-white border border-zinc-200 rounded-xl overflow-hidden animate-fade-up delay-5">
            <div class="flex items-center justify-between px-5 py-4 border-b border-zinc-100">
                <div class="flex items-center gap-3">
                    <h2 class="text-sm font-semibold text-zinc-900">Recent Feedback</h2>
                    <span class="text-[10px] font-semibold text-zinc-400 bg-zinc-100 px-2 py-0.5 rounded-md">Last 30 days</span>
                </div>
                <a href="#" class="text-[12px] text-zinc-400 font-medium hover:text-zinc-900 transition-colors">View all</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-zinc-100 bg-zinc-50/50">
                            <th class="pl-5 pr-3 py-2.5 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">User</th>
                            <th class="px-3 py-2.5 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">Rating</th>
                            <th class="px-3 py-2.5 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">Comment</th>
                            <th class="px-3 pr-5 py-2.5 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider text-right">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-50">
                        @forelse($recentFeedback as $fi => $fb)
                            <tr class="hover:bg-zinc-50/70 transition-colors animate-slide-in" style="animation-delay: {{ 400 + ($fi * 80) }}ms">
                                <td class="pl-5 pr-3 py-3.5">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-7 h-7 bg-zinc-100 rounded-full flex items-center justify-center text-[11px] font-semibold text-zinc-500 flex-shrink-0">
                                            {{ strtoupper(substr($fb->name, 0, 1)) }}
                                        </div>
                                        <span class="text-[13px] font-medium text-zinc-800">{{ $fb->name }}</span>
                                    </div>
                                </td>
                                <td class="px-3 py-3.5">
                                    <div class="flex items-center gap-2">
                                        <div class="flex gap-[2px]">
                                            @for($i = 1; $i <= 5; $i++)
                                                <div class="w-[14px] h-[3px] rounded-full {{ $i <= $fb->rating ? 'bg-zinc-800' : 'bg-zinc-200' }} transition-colors"></div>
                                            @endfor
                                        </div>
                                        <span class="text-[12px] font-medium text-zinc-400">{{ $fb->rating }}.0</span>
                                    </div>
                                </td>
                                <td class="px-3 py-3.5">
                                    <p class="text-[13px] text-zinc-500 truncate max-w-[280px]">{{ $fb->comment }}</p>
                                </td>
                                <td class="px-3 pr-5 py-3.5 text-right">
                                    <span class="text-[12px] text-zinc-400 font-medium">{{ $fb->created_at->diffForHumans(null, true, true) }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-5 py-16 text-center">
                                    <p class="text-sm text-zinc-400">No feedback received yet</p>
                                    <p class="text-xs text-zinc-300 mt-1">Feedback will appear here as mothers share their experience</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Right column --}}
        <div class="space-y-6">

            {{-- Performance --}}
            <div class="bg-white border border-zinc-200 rounded-xl p-5 animate-fade-up delay-5">
                <div class="flex items-center justify-between mb-5">
                    <h2 class="text-[15px] font-bold text-zinc-900 font-outfit tracking-tight">Performance</h2>
                    <span class="flex items-center gap-1.5 text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full uppercase tracking-wider">
                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full status-pulse"></span>
                        Live
                    </span>
                </div>

                <div class="space-y-5">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[13px] text-zinc-600 font-medium">Satisfaction</span>
                            <span class="text-[13px] text-zinc-900 font-semibold tabular-nums">{{ $avgRating }}<span class="text-zinc-400 font-normal">/5.0</span></span>
                        </div>
                        <div class="w-full bg-zinc-100 h-2.5 rounded-full overflow-hidden shadow-inner">
                            <div class="bg-[var(--maternal-rose)] h-full rounded-full animate-bar-grow" style="width: {{ $avgRating * 20 }}%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[13px] text-zinc-600 font-medium">Content coverage</span>
                            <span class="text-[13px] text-zinc-900 font-semibold tabular-nums">82<span class="text-zinc-400 font-normal">%</span></span>
                        </div>
                        <div class="w-full bg-zinc-100 h-2.5 rounded-full overflow-hidden shadow-inner">
                            <div class="bg-[var(--maternal-sage)] h-full rounded-full animate-bar-grow" style="width: 82%; animation-delay: 200ms"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[13px] text-zinc-600 font-medium">Clinic utilization</span>
                            <span class="text-[13px] text-zinc-900 font-semibold tabular-nums">67<span class="text-zinc-400 font-normal">%</span></span>
                        </div>
                        <div class="w-full bg-zinc-100 h-2.5 rounded-full overflow-hidden shadow-inner">
                            <div class="bg-[var(--maternal-brown)] h-full rounded-full animate-bar-grow" style="width: 67%; animation-delay: 400ms"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 pt-5 border-t border-zinc-100 grid grid-cols-2 gap-4">
                    <div class="bg-zinc-50 rounded-lg p-3.5 transition-colors hover:bg-zinc-100">
                        <p class="text-xl font-semibold text-zinc-900 tracking-tight tabular-nums animate-count delay-4">{{ $totalUsers }}</p>
                        <p class="text-[11px] text-zinc-400 font-medium mt-0.5">Registered users</p>
                    </div>
                    <div class="bg-zinc-50 rounded-lg p-3.5 transition-colors hover:bg-zinc-100">
                        <p class="text-xl font-semibold text-zinc-900 tracking-tight tabular-nums animate-count delay-5">{{ $avgRating }}</p>
                        <p class="text-[11px] text-zinc-400 font-medium mt-0.5">Avg. rating</p>
                    </div>
                </div>
            </div>

            {{-- Quick actions --}}
            <div class="bg-white border border-zinc-200 rounded-xl p-5 animate-fade-up delay-6">
                <h2 class="text-sm font-semibold text-zinc-900 mb-4">Quick actions</h2>
                <div class="space-y-1">
                    @php
                        $actions = [
                            ['label' => 'Create Article', 'route' => 'admin.articles.create', 'icon' => '<path stroke-linecap="round" d="M12 4.5v15m7.5-7.5h-15"/>', 'color' => 'var(--maternal-rose)'],
                            ['label' => 'Upload Video', 'route' => 'admin.videos.create', 'icon' => '<polygon points="5,3 19,12 5,21" stroke-linecap="round" stroke-linejoin="round"/>', 'color' => 'var(--maternal-sage)'],
                            ['label' => 'Add Clinic', 'route' => 'admin.clinics.create', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>', 'color' => 'var(--maternal-rose-dark)'],
                        ];
                    @endphp

                    @foreach($actions as $action)
                        <a id="action-{{ Str::slug($action['label']) }}" href="{{ route($action['route']) }}"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13.5px] font-semibold text-zinc-600 hover:text-zinc-900 hover:bg-zinc-50 active:bg-zinc-100 transition-all group">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-sm" style="background: {{ $action['color'] }}20; color: {{ $action['color'] }}">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">{!! $action['icon'] !!}</svg>
                            </div>
                            {{ $action['label'] }}
                            <svg class="w-3.5 h-3.5 text-zinc-300 ml-auto -translate-x-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</x-admin-layout>
