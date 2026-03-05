@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-10">Admin Dashboard</h1>

        <!-- Overall Summary Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-sm text-gray-500">Total Companies</p>
                <p class="text-5xl font-bold text-blue-600">{{ $companies->count() }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-sm text-gray-500">Total Employees</p>
                <p class="text-5xl font-bold text-gray-900">{{ $companies->sum('total_employees') }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-sm text-gray-500">Active Employees</p>
                <p class="text-5xl font-bold text-green-600">{{ $companies->sum('active_employees') }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-sm text-gray-500">Inactive Employees</p>
                <p class="text-5xl font-bold text-red-600">{{ $companies->sum('inactive_employees') }}</p>
            </div>
        </div>

        <!-- Per Company Breakdown -->
        <h2 class="text-2xl font-semibold mb-6">Companies Overview</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($companies as $company)
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-lg mb-4">{{ $company->name }}</h3>
                @if($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" class="w-12 h-12 object-cover rounded mb-4">
                @endif
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Employees</span>
                        <span class="font-bold text-xl">{{ $company->total_employees ?? 0 }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-green-600">Active</span>
                        <span class="font-medium">{{ $company->active_employees ?? 0 }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-red-600">Inactive</span>
                        <span class="font-medium">{{ $company->inactive_employees ?? 0 }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($companies->isEmpty())
            <p class="text-center text-gray-500 mt-12">No companies yet. Go to Companies page and create some!</p>
        @endif
    </div>
</div>
@endsection