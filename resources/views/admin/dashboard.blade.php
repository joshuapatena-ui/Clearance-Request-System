<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Welcome to the Administrator Dashboard.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-bold">Quick Actions</h4>
                            <ul class="mt-2 space-y-1 text-sm text-blue-600">
                                <li><a href="{{ route('departments.index') }}" class="hover:underline">Manage Departments</a></li>
                                <li><a href="{{ route('admin.requests.index') }}" class="hover:underline">View Clearance Requests</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
