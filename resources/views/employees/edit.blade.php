@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-8">
            <h1 class="text-3xl font-bold mb-6">Edit Employee</h1>

            <form action="{{ route('employees.update', $employee) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium">First Name <span class="text-red-500">*</span></label>
                    <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500">
                    @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Last Name <span class="text-red-500">*</span></label>
                    <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500">
                    @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Company <span class="text-red-500">*</span></label>
                    <select name="company_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500">
                        <option value="">Select Company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" 
                                {{ old('company_id', $employee->company_id) == $company->id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('company_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email', $employee->email) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500">
                </div>
                <div class="mb-6">
    <label class="block text-sm font-medium">Status <span class="text-red-500">*</span></label>
    <select name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500">
        <option value="active" {{ old('status', $employee->status ?? 'active') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $employee->status ?? 'active') == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>

                <button type="submit" 
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium">
                    Update Employee
                </button>
            </form>
        </div>
    </div>
</div>
@endsection