@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Employees</h1>
                <a href="{{ route('employees.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                    + Add New Employee
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <form method="GET" class="mb-6 flex gap-4">
    <input type="text" name="search" value="{{ request('search') }}" 
           placeholder="Search by name or email..." 
           class="flex-1 border-gray-300 rounded-lg px-4 py-3">

    <select name="company_id" class="border-gray-300 rounded-lg px-4 py-3">
        <option value="">All Companies</option>
        @foreach($companies as $company)
            <option value="{{ $company->id }}" {{ request('company_id') == $company->id ? 'selected' : '' }}>
                {{ $company->name }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg">Search / Filter</button>
    <a href="{{ route('employees.index') }}" class="bg-gray-500 text-white px-8 py-3 rounded-lg">Clear</a>
</form>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Company</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td class="px-6 py-4">{{ $employee->full_name }}</td>
                        <td class="px-6 py-4">{{ $employee->company->name ?? '—' }}</td>
                        <td class="px-6 py-4">{{ $employee->email }}</td>
                        <td class="px-6 py-4">{{ $employee->phone ?? '—' }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('employees.edit', $employee) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline ml-4"
                                  onsubmit="return confirm('Soft delete this employee?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-6">{{ $employees->links() }}</div>
        </div>
    </div>
</div>
@endsection