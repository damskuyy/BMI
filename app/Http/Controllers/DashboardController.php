<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalUsers' => Schema::hasTable('users') ? User::count() : 0,
            'totalProducts' => Schema::hasTable('products') ? Product::count() : 0,
            'totalMembers' => Schema::hasTable('members') ? Member::count() : 0,
            // visits: gunakan tabel visits jika ada, kalau tidak gunakan session fallback
            'totalVisits' => Schema::hasTable('visits') ? DB::table('visits')->count() : session('visit_count', 0),
            'recentUsers' => Schema::hasTable('users') ? User::latest()->take(5)->get() : collect(),
            'recentProducts' => Schema::hasTable('products') ? Product::latest()->take(5)->get() : collect(),
        ];

        return view('dashboard.index', $data);
    }
}