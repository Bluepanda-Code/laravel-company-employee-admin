<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('companies.index') }}" class="flex items-center">
                    <span class="text-2xl font-bold text-blue-600">Admin Panel</span>
                </a>
            </div>

            <!-- Menu -->
            <div class="flex items-center space-x-8">
                <a href="{{ route('dashboard') }}" 
                   class="text-gray-700 hover:text-blue-600 font-medium {{ request()->routeIs('dashboard') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('companies.index') }}" 
                   class="text-gray-700 hover:text-blue-600 font-medium {{ request()->routeIs('companies.*') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                    Companies
                </a>
                <a href="{{ route('employees.index') }}" 
                   class="text-gray-700 hover:text-blue-600 font-medium {{ request()->routeIs('employees.*') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                    Employees
                </a>
            </div>

            <!-- User & Logout -->
            <div class="flex items-center">
                <div class="px-4 py-2 text-sm text-gray-700">
                    {{ Auth::user()->name ?? 'Admin' }}
                </div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="text-red-600 hover:text-red-700 font-medium px-4 py-2">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>