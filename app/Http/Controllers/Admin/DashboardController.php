<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerOrder;
class DashboardController extends Controller
{
    public function index(){
        $orders = CustomerOrder::all();
        $data['pending_orders'] = $orders->where('status', 'pending')->count();
        $data['all_orders'] = $orders->count();
        $data['registered_customer'] = $orders->whereNotNull('customer_id')->count();
        $data['total_sales'] = $orders->sum('total');
        return view('admin.dashboard',$data);
    }
}
