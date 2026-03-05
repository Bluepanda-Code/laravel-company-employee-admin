@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Companies</h1>
                <a href="{{ route('companies.create') }}" 
                   class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                    + Add New Company
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Logo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Website</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Employees</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($companies as $company)
                    <tr>
                        <td class="px-6 py-4">
                            @if($company->logo)
                                <img src="{{ Storage::url($company->logo) }}" alt="logo" class="w-10 h-10 object-cover rounded">
                            @else
                                <span class="text-gray-400">No logo</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium">{{ $company->name }}</td>
                        <td class="px-6 py-4">{{ $company->email ?? '—' }}</td>
                        <td class="px-6 py-4">{{ $company->website ?? '—' }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                                {{ $company->employees_count }} employees
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('companies.show', $company) }}" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('companies.edit', $company) }}" class="text-yellow-600 hover:underline ml-4">Edit</a>
                            <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline ml-4" 
                                  onsubmit="return confirm('Delete this company? (Only if no employees)')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</div>
@endsection