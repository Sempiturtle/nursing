@section('title', 'Control Center')

<x-admin-layout>
    <x-slot name="header">Platform Overview</x-slot>

    {{-- Premium Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-12 animate-slide-up-fade">
        <div class="space-y-2">
            <h1 class="text-4xl lg:text-5xl font-black tracking-tighter font-outfit gradient-text">
                Mission Control, {{ explode(' ', auth()->user()->name)[0] }}
            </h1>
            <p class="text-slate-400 font-medium flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-accent-emerald animate-pulse"></span>
                System status: Operational — {{ now()->format('M d, Y') }}
            </p>
        </div>
        
        <div class="flex items-center gap-4 bg-white/5 p-2 rounded-2xl border border-white/5 backdrop-blur-md">
            <div class="flex -space-x-3">
                @for($i=1; $i<=4; $i++)
                    <div class="w-10 h-10 rounded-xl border-2 border-slate-900 gradient-accent p-0.5 shadow-lift transition-transform hover:-translate-y-1 cursor-pointer">
                        <div class="w-full h-full bg-slate-900 rounded-[10px] flex items-center justify-center text-[10px] font-bold text-white uppercase">
                             MW
                        </div>
                    </div>
                @endfor
            </div>
            <div class="pr-4 border-l border-white/10 pl-4">
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] block">Active Controllers</span>
                <span class="text-sm font-black text-white font-outfit">12 Members Online</span>
            </div>
        </div>
    </div>

    {{-- Stats Grid (Heavily Animated) --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        @php
            $stats = [
                ['label' => 'Total Mothers', 'value' => $totalUsers, 'trend' => '+12.5%', 'icon' => 'users', 'color' => 'purple', 'delay' => 'stagger-1'],
                ['label' => 'Knowledge Base', 'value' => $totalArticles, 'trend' => '+4.2%', 'icon' => 'file-text', 'color' => 'blue', 'delay' => 'stagger-2'],
                ['label' => 'Net Coverage', 'value' => $totalClinics, 'trend' => 'Stable', 'icon' => 'map-pin', 'color' => 'emerald', 'delay' => 'stagger-3'],
                ['label' => 'Satisfaction', 'value' => number_format($avgFeedback, 1), 'trend' => '98.2%', 'icon' => 'message-square', 'color' => 'rose', 'delay' => 'stagger-4'],
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="group relative glass rounded-3xl p-8 hover:shadow-lift transition-all duration-700 hover:-translate-y-2 border-white/5 hover:border-white/10 overflow-hidden {{ $stat['delay'] }} animate-slide-up-fade">
            {{-- Background Glow --}}
            <div class="absolute -top-12 -right-12 w-32 h-32 bg-accent-{{ $stat['color'] }}/10 blur-[60px] group-hover:bg-accent-{{ $stat['color'] }}/20 transition-all duration-700"></div>
            
            <div class="flex items-start justify-between mb-8 relative z-10">
                <div class="w-14 h-14 rounded-2xl bg-accent-{{ $stat['color'] }}/10 border border-accent-{{ $stat['color'] }}/20 flex items-center justify-center text-accent-{{ $stat['color'] }} group-hover:scale-110 transition-transform duration-500 shadow-glow-{{ $stat['color'] }}">
                    @if($stat['icon'] == 'users')
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                    @elseif($stat['icon'] == 'file-text')
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                    @elseif($stat['icon'] == 'map-pin')
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    @else
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                    @endif
                </div>
                <div class="flex flex-col items-end">
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">{{ $stat['label'] }}</span>
                    <div class="flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-white/5 border border-white/5">
                        <span class="w-1.5 h-1.5 rounded-full bg-accent-{{ $stat['color'] }}"></span>
                        <span class="text-[10px] font-black text-white italic tracking-tighter">{{ $stat['trend'] }}</span>
                    </div>
                </div>
            </div>

            <div class="relative z-10">
                <div class="flex items-baseline gap-2">
                    <h4 class="text-5xl font-black text-white font-outfit tabular-nums animate-count-up">{{ $stat['value'] }}</h4>
                    <span class="text-slate-550 text-xs font-bold font-outfit uppercase">Total</span>
                </div>
                
                {{-- Mini Sparkline Mockup --}}
                <div class="mt-6 h-12 w-full">
                    <svg class="w-full h-full" viewBox="0 0 100 40" preserveAspectRatio="none">
                        <path d="M0,35 Q10,10 20,30 T40,15 T60,25 T80,5 T100,20" fill="none" class="stroke-accent-{{ $stat['color'] }}" stroke-width="2" stroke-linecap="round"/>
                        <circle cx="100" cy="20" r="2" class="fill-accent-{{ $stat['color'] }} animate-pulse"/>
                    </svg>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Charts & Analytics Window --}}
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-8 mb-12">
        {{-- Growth Chart --}}
        <div class="xl:col-span-8 glass rounded-[2.5rem] p-10 relative overflow-hidden group border-white/5 hover:border-white/10 transition-all duration-700 stagger-2 animate-slide-up-fade">
            <div class="flex items-center justify-between mb-10 relative z-10">
                <div>
                    <h3 class="text-2xl font-black text-white tracking-tighter font-outfit">Community Growth Matrix</h3>
                    <p class="text-sm text-slate-500 font-medium mt-1">Real-time analytical trends of platform engagement</p>
                </div>
                <div class="flex p-1 bg-white/5 rounded-xl border border-white/10">
                    <button class="px-4 py-1.5 bg-accent-purple text-white text-[10px] font-bold uppercase rounded-lg shadow-glow-purple">7 Days</button>
                    <button class="px-4 py-1.5 text-slate-500 text-[10px] font-bold uppercase hover:text-white transition-colors">30 Days</button>
                </div>
            </div>

            <div class="h-[350px] relative z-10">
                <canvas id="growthChart"></canvas>
            </div>
        </div>

        {{-- Distribution Donut --}}
        <div class="xl:col-span-4 glass rounded-[2.5rem] p-10 relative overflow-hidden group border-white/5 hover:border-white/10 transition-all duration-700 stagger-3 animate-slide-up-fade">
            <h3 class="text-2xl font-black text-white tracking-tighter font-outfit mb-8">Resource Hub</h3>
            <div class="h-[280px] flex items-center justify-center">
                <canvas id="resourceDistribution"></canvas>
            </div>
            <div class="mt-8 space-y-4">
                <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/5 hover:bg-white/10 transition-all cursor-default">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-accent-purple shadow-glow-purple"></div>
                        <span class="text-xs font-bold text-slate-300">Articles</span>
                    </div>
                    <span class="text-xs font-black text-white">42%</span>
                </div>
                <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/5 hover:bg-white/10 transition-all cursor-default">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-accent-blue shadow-glow-blue"></div>
                        <span class="text-xs font-bold text-slate-300">Videos</span>
                    </div>
                    <span class="text-xs font-black text-white">35%</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Data Feed --}}
    <div class="glass rounded-[2.5rem] p-10 border-white/5 hover:border-white/10 transition-all duration-700 stagger-4 animate-slide-up-fade overflow-hidden">
        <div class="flex items-center justify-between mb-10">
            <div>
                <h3 class="text-2xl font-black text-white tracking-tighter font-outfit">Real-time Feedback Signal</h3>
                <p class="text-sm text-slate-500 font-medium mt-1">Pulse of the community sentiment</p>
            </div>
            <a href="{{ route('admin.feedback.index') }}" class="group flex items-center gap-3 px-6 py-3 bg-white/5 border border-white/10 rounded-2xl text-[10px] font-black uppercase tracking-widest text-white hover:bg-accent-purple hover:border-accent-purple transition-all shadow-lift">
                View Full Signal
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($recentFeedback as $item)
                <div class="group relative bg-white/5 p-8 rounded-3xl border border-white/5 hover:border-white/20 transition-all duration-500 hover:-translate-y-1">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="w-12 h-12 rounded-2xl gradient-accent p-0.5 shadow-lift">
                            <div class="w-full h-full bg-slate-900 rounded-[14px] flex items-center justify-center font-black text-sm text-white">
                                {{ strtoupper(substr($item->user->name ?? 'U', 0, 1)) }}
                            </div>
                        </div>
                        <div>
                            <h5 class="text-sm font-black text-white font-outfit truncate">{{ $item->user->name ?? 'Anonymous User' }}</h5>
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-tighter bg-white/5 px-2 py-0.5 rounded-lg">
                                {{ $item->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    
                    <p class="text-sm text-slate-400 font-medium leading-relaxed mb-6 italic line-clamp-3">
                        "{{ $item->comment }}"
                    </p>
                    
                    <div class="flex items-center justify-between pt-6 border-t border-white/5">
                        <div class="flex gap-1.5">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-3.5 h-3.5 {{ $i <= $item->rating ? 'text-accent-amber drop-shadow-[0_0_8px_rgba(245,158,11,0.4)]' : 'text-slate-800' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>
                        <button class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-500 hover:text-white hover:bg-white/10 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/></svg>
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center glass rounded-3xl border-dashed border-white/10">
                    <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-slate-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <p class="text-slate-500 font-bold uppercase tracking-widest">No signals received from the constellation</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Script for Charts --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ctxGrowth = document.getElementById('growthChart').getContext('2d');
            const purpleGradient = ctxGrowth.createLinearGradient(0, 0, 0, 400);
            purpleGradient.addColorStop(0, 'rgba(168, 85, 247, 0.4)');
            purpleGradient.addColorStop(1, 'rgba(168, 85, 247, 0)');

            new Chart(ctxGrowth, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Community Expansion',
                        data: [12, 19, 15, 25, 22, 30, 45],
                        borderColor: '#a855f7',
                        borderWidth: 4,
                        backgroundColor: purpleGradient,
                        fill: true,
                        tension: 0.4,
                        pointRadius: 0,
                        pointHoverRadius: 6,
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: '#a855f7',
                        pointHoverBorderWidth: 4,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: 'rgba(2, 6, 23, 0.9)',
                            titleFont: { family: 'Outfit', size: 14, weight: 'bold' },
                            bodyFont: { family: 'Inter', size: 12 },
                            padding: 12,
                            cornerRadius: 12,
                            displayColors: false,
                            borderWidth: 1,
                            borderColor: 'rgba(255, 255, 255, 0.1)'
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { color: '#64748b', font: { weight: 'bold', size: 10 } }
                        },
                        y: {
                            grid: { color: 'rgba(255, 255, 255, 0.03)', borderDash: [5, 5] },
                            ticks: { color: '#64748b', font: { weight: 'bold', size: 10 } }
                        }
                    }
                }
            });

            const ctxDist = document.getElementById('resourceDistribution').getContext('2d');
            new Chart(ctxDist, {
                type: 'doughnut',
                data: {
                    labels: ['Articles', 'Videos'],
                    datasets: [{
                        data: [{{ $totalArticles }}, {{ $totalVideos ?? 10 }}],
                        backgroundColor: ['#a855f7', '#3b82f6'],
                        borderWidth: 0,
                        hoverOffset: 20
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '85%',
                    plugins: {
                        legend: { display: false }
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                }
            });
        });
    </script>
</x-admin-layout>
