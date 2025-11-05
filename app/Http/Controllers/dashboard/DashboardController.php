<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.home-dashboard');
    }

    public function products()
    {
        return view('dashboard.pages.products');
    }

    public function orders()
    {
        return view('dashboard.pages.orders');
    }
    public function dashboardsettings()
    {
        return view('dashboard.pages.dashboard-settings');
    }
}