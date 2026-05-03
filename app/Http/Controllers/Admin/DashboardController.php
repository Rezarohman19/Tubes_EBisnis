<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $thisMonth = Carbon::now()->startOfMonth();

        $stats = [
            'total_products'    => Product::count(),
            'low_stock'         => Product::where('stock', '<=', 5)->where('stock', '>', 0)->count(),
            'out_of_stock'      => Product::where('stock', 0)->count(),
            'total_orders'      => Order::count(),
            'pending_orders'    => Order::where('payment_status', 'pending')->count(),
            'orders_today'      => Order::whereDate('created_at', $today)->count(),
            'revenue_today'     => Order::whereDate('created_at', $today)->where('payment_status', 'paid')->sum('total'),
            'revenue_month'     => Order::where('created_at', '>=', $thisMonth)->where('payment_status', 'paid')->sum('total'),
            'total_users'       => User::where('role', 'user')->count(),
            'new_users_month'   => User::where('role', 'user')->where('created_at', '>=', $thisMonth)->count(),
        ];

        $recentOrders = Order::with('user')
            ->latest()
            ->take(8)
            ->get();

        $topProducts = Product::withCount(['items as sold_count' => function ($q) {
            $q->whereHas('order', fn ($o) => $o->where('payment_status', 'paid'));
        }])
            ->orderByDesc('sold_count')
            ->take(5)
            ->get();

        $lowStockProducts = Product::where('stock', '<=', 10)
            ->orderBy('stock')
            ->take(8)
            ->get();

        // Revenue chart — last 7 days
        $revenueChart = collect(range(6, 0))->map(function ($daysAgo) {
            $date = Carbon::today()->subDays($daysAgo);
            return [
                'date'    => $date->format('d M'),
                'revenue' => Order::whereDate('created_at', $date)
                    ->where('payment_status', 'paid')
                    ->sum('total'),
                'orders'  => Order::whereDate('created_at', $date)->count(),
            ];
        });

        return view('admin.dashboard', compact(
            'stats', 'recentOrders', 'topProducts', 'lowStockProducts', 'revenueChart'
        ));
    }
}