@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-8">
            <h1 class="text-3xl font-bold mb-6">Edit Company</h1>

            <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium">Company Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $company->name) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email', $company->email) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Website</label>
                    <input type="url" name="website" value="{{ old('website', $company->website) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium">Logo (leave blank to keep current)</label>
                    @if($company->logo)
                        <div class="mb-2">
                            <img src="{{ Storage::url($company->logo) }}" class="w-20 h-20 object-cover rounded">
                        </div>
                    @endif
                    <input type="file" name="logo" class="mt-1 block w-full">
                </div>

                <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                    Update Company
                </button>
            </form>
        </div>
    </div>
</div>
@endsection