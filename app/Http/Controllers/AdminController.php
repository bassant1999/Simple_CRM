<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $employees = User::where('type', 'employee')->get();
        $customers = User::where('type', 'customer')->get();

        return view('admin.dashboard', compact('employees', 'customers'));
    }
}
