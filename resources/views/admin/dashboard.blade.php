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
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-indigo-50 p-6 rounded-lg border border-indigo-100 shadow-sm">
                            <h3 class="text-indigo-900 font-bold text-lg">Pending Clearances</h3>
                            <p class="text-3xl font-black text-indigo-600 mt-2">0</p>
                        </div>
                        <div class="bg-green-50 p-6 rounded-lg border border-green-100 shadow-sm">
                            <h3 class="text-green-900 font-bold text-lg">Approved Students</h3>
                            <p class="text-3xl font-black text-green-600 mt-2">0</p>
                        </div>
                        <div class="bg-blue-50 p-6 rounded-lg border border-blue-100 shadow-sm">
                            <h3 class="text-blue-900 font-bold text-lg">Total Departments</h3>
                            <p class="text-3xl font-black text-blue-600 mt-2">0</p>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Recent Requests</h3>
                        <div class="bg-gray-50 p-10 rounded-xl text-center border-2 border-dashed border-gray-200">
                            <p class="text-gray-500">No clearance requests found.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
