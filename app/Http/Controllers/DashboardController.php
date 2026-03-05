<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $companies = Company::withCount([
        'employees as total_employees',
        'employees as active_employees' => fn($q) => $q->where('status', 'active'),
        'employees as inactive_employees' => fn($q) => $q->where('status', 'inactive'),
    ])
    ->orderBy('total_employees', 'desc')   // ← This line sorts by employee count (highest first)
    ->get();

    return view('dashboard.index', compact('companies'));
}
}