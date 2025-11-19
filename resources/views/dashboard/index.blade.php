@extends('layout-be.master')
@section('title', 'Dashboard')
@section('content')
@php
    use Illuminate\Support\Facades\DB;
    use App\Models\Product;
    use App\Models\User;
    use App\Models\Blog;
    use App\Models\Member;

    // Products by category (accurate counts)
    $prodData = Product::select('category', DB::raw('count(*) as cnt'))
        ->groupBy('category')
        ->orderBy('cnt', 'desc')
        ->get();
    $prodLabels = $prodData->pluck('category')->map(function($c){ return $c ?: 'Uncategorized'; })->toArray();
    $prodCounts = $prodData->pluck('cnt')->toArray();

    // Users per day for last 7 days (accurate timeline)
    $days = collect();
    for ($i = 6; $i >= 0; $i--) {
        $days->push(now()->subDays($i)->format('Y-m-d'));
    }

    $userCountsAssoc = User::where('created_at', '>=', now()->subDays(6))
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as cnt'))
        ->groupBy('date')
        ->pluck('cnt', 'date')
        ->toArray();

    $userCounts = [];
    foreach ($days as $d) {
        $userCounts[] = isset($userCountsAssoc[$d]) ? (int) $userCountsAssoc[$d] : 0;
    }
    $userLabels = $days->map(function($d){ return \Carbon\Carbon::parse($d)->format('d M'); })->toArray();

    // Blog posts per day for last 7 days
    $blogCountsAssoc = Blog::where('created_at', '>=', now()->subDays(6))
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as cnt'))
        ->groupBy('date')
        ->pluck('cnt', 'date')
        ->toArray();
    $blogCounts = [];
    foreach ($days as $d) {
        $blogCounts[] = isset($blogCountsAssoc[$d]) ? (int) $blogCountsAssoc[$d] : 0;
    }
    $blogLabels = $userLabels; // same 7-day timeline labels

    // Totals for statistics cards (use accurate counts)
    $totalUsers = User::count();
    $totalProducts = Product::count();
    $totalMembers = Member::count();
    $totalBlogs = Blog::count();
@endphp
    {{-- <!-- Statistics Cards -->
    <div class="row" style="align-items: center">
        <div class="col-xl-3 col-md-6">
            <div class="stats-card">
                <h3>{{ $totalUsers ?? '0' }}</h3>
                <p><i class="fas fa-users"></i> Total Users</p>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stats-card">
                <h3>{{ $totalProducts ?? '0' }}</h3>
                <p><i class="fas fa-box"></i> Total Products</p>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stats-card">
                <h3>{{ $totalMembers ?? '0' }}</h3>
                <p><i class="fas fa-user-check"></i> Total Members</p>
            </div>
        </div>
    </div> --}}

    <!-- Animated Summary + Charts -->
    <div class="row mt-3">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card text-center">
                <h3 class="count" data-target="{{ $totalUsers }}">0</h3>
                <p><i class="fas fa-users"></i> Users</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card text-center">
                <h3 class="count" data-target="{{ $totalProducts }}">0</h3>
                <p><i class="fas fa-box"></i> Products</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card text-center">
                <h3 class="count" data-target="{{ $totalMembers }}">0</h3>
                <p><i class="fas fa-user-check"></i> Members</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card text-center">
                <h3 class="count" data-target="{{ $totalBlogs }}">0</h3>
                <p><i class="fas fa-newspaper"></i> Blogs</p>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-6 mb-4">
            <div class="chart-card">
                <div class="chart-title">Product Categories (recent)</div>
                <div class="chart-container">
                    <canvas id="productsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="chart-card">
                <div class="chart-title">Recent Blog Posts (last 7 days)</div>
                <div class="chart-container">
                    <canvas id="blogsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Data Tables -->
    <div class="row mt-4">
        <!-- Recent Users -->
        <div class="col-xl-6 mb-4">
            <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title mb-0">Recent Users</h5>
                            <div class="card-actions">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">View All</a>
                            </div>
                        </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentUsers ?? [] as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">No users found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Products -->
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Recent Products</h5>
                    <div class="card-actions">
                        <a href="{{ route('product_be.index') }}" class="btn btn-sm btn-primary">View All</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Added</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentProducts ?? [] as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>{{ $product->created_at->format('d M Y') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">No products found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        (function(){
            // Utility: generate distinct HSL colors
            function generatePalette(n, saturation=72, light=48) {
                var colors = [];
                for (var i = 0; i < n; i++) {
                    var hue = Math.round((360 * i) / n);
                    colors.push('hsl(' + hue + ', ' + saturation + '%, ' + light + '%)');
                }
                return colors;
            }

            // Count-up animation triggered when element is visible
            function animateCountsWhenVisible() {
                var elems = document.querySelectorAll('.count');
                if (!('IntersectionObserver' in window)) {
                    // fallback: animate immediately
                    elems.forEach(runCount);
                    return;
                }
                var obs = new IntersectionObserver(function(entries, o){
                    entries.forEach(function(entry){
                        if (entry.isIntersecting) {
                            runCount(entry.target);
                            o.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.3 });
                elems.forEach(function(el){ obs.observe(el); });
            }

            function runCount(el){
                var target = Number(el.getAttribute('data-target')) || 0;
                var duration = 1100;
                var start = 0;
                var startTs = null;
                function step(ts){
                    if (!startTs) startTs = ts;
                    var progress = Math.min((ts - startTs) / duration, 1);
                    var value = Math.floor(progress * (target - start) + start);
                    el.textContent = value.toLocaleString();
                    if (progress < 1) window.requestAnimationFrame(step);
                    else el.textContent = target.toLocaleString();
                }
                window.requestAnimationFrame(step);
            }

            // Data passed from server (accurate)
            var prodLabels = {!! json_encode($prodLabels ?? []) !!};
            var prodCounts = {!! json_encode($prodCounts ?? []) !!};
            var userLabels = {!! json_encode($userLabels ?? []) !!};
            var userCounts = {!! json_encode($userCounts ?? []) !!};
            var blogLabels = {!! json_encode($blogLabels ?? []) !!};
            var blogCounts = {!! json_encode($blogCounts ?? []) !!};

            function initCharts(){
                try {
                    // Products doughnut with generated palette
                    var pCtx = document.getElementById('productsChart');
                    if (pCtx) {
                        var pColors = prodLabels.length ? generatePalette(prodLabels.length) : ['#e9ecef'];
                        new Chart(pCtx, {
                            type: 'doughnut',
                            data: {
                                labels: prodLabels.length ? prodLabels : ['No data'],
                                datasets: [{
                                    data: prodCounts.length ? prodCounts : [1],
                                    backgroundColor: pColors,
                                    hoverOffset: 10,
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: { position: 'bottom', labels: { boxWidth: 12, padding: 8 } },
                                    tooltip: { callbacks: { label: function(ctx){
                                        var val = ctx.raw || 0; return ctx.label + ': ' + val.toLocaleString();
                                    } } }
                                }
                            }
                        });
                    }

                    // Blogs line chart (7-day trend)
                    var bCtx = document.getElementById('blogsChart');
                    if (bCtx) {
                        var ctx = bCtx.getContext('2d');
                        var grad = ctx.createLinearGradient(0, 0, 0, bCtx.height || 260);
                        grad.addColorStop(0, 'rgba(233, 30, 99, 0.85)');
                        grad.addColorStop(1, 'rgba(233, 30, 99, 0.06)');

                        new Chart(bCtx, {
                            type: 'line',
                            data: {
                                labels: blogLabels.length ? blogLabels : ['No data'],
                                datasets: [{
                                    label: 'New posts',
                                    data: blogCounts.length ? blogCounts : [0],
                                    fill: true,
                                    backgroundColor: grad,
                                    borderColor: '#e91e63',
                                    tension: 0.28,
                                    pointRadius: 4,
                                    pointBackgroundColor: '#fff',
                                    pointHoverRadius: 6
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: { legend: { display: false }, tooltip: { mode: 'index', intersect: false } },
                                scales: {
                                    x: { grid: { display: false } },
                                    y: { beginAtZero: true, ticks: { precision:0, stepSize: 1 } }
                                }
                            }
                        });
                    }
                } catch(e) { console.error(e); }
            }

            // Init on DOM ready
            document.addEventListener('DOMContentLoaded', function(){
                animateCountsWhenVisible();
                initCharts();
            });
        })();
    </script>
@endpush