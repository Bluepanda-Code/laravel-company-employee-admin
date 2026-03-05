@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-8">
            <h1 class="text-3xl font-bold mb-4">{{ $company->name }}</h1>

            @if($company->logo)
                <img src="{{ Storage::url($company->logo) }}" class="w-32 h-32 object-cover rounded mb-6">
            @endif

            <p><strong>Email:</strong> {{ $company->email ?? '—' }}</p>
            <p><strong>Website:</strong> {{ $company->website ?? '—' }}</p>
            <p><strong>Total Employees:</strong> {{ $company->employees_count }} (from withCount)</p>

            <hr class="my-6">

            <h2 class="text-2xl font-semibold mb-4">Employees</h2>
            @if($company->employees->count())
                <ul class="space-y-2">
                    @foreach($company->employees as $employee)
                        <li class="bg-gray-50 p-4 rounded">
                            {{ $employee->full_name }} ({{ $employee->email }})
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No employees yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection