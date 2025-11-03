@extends('layout-be.master')
@section('title', 'Dashboard')
@section('content')
    <!-- Statistics Cards -->
    <div class="row">
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
        <div class="col-xl-3 col-md-6">
            <div class="stats-card">
                <h3>{{ $totalVisits ?? '0' }}</h3>
                <p><i class="fas fa-chart-line"></i> Website Visits</p>
            </div>
        </div>
    </div>

    <!-- Recent Data Tables -->
    <div class="row mt-4">
        <!-- Recent Users -->
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Recent Users</h5>
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
                <div class="card-header">
                    <h5 class="card-title mb-0">Recent Products</h5>
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