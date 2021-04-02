<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $sale = Sale::whereDate('created_at', \Carbon\Carbon::today())->get();
        return view('admin.dashboard.index', compact('sale'));
    }
}
