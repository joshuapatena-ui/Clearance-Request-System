<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Clearance Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Status Card -->
                <div class="md:col-span-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl p-6 border border-gray-100">
                        <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-2">Overall Status</h3>
                        <div class="flex items-center space-x-2">
                            @if($overallStatus === 'Fully Cleared')
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">{{ $overallStatus }}</span>
                            @else
                                <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-xs font-bold">{{ $overallStatus }}</span>
                            @endif
                        </div>

                        <div class="mt-6">
                            @if($requests->count() == 0)
                                <form action="{{ route('clearance.request') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full py-3 bg-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-indigo-100 hover:scale-105 transition-transform">
                                        Submit All Requests
                                    </button>
                                </form>
                            @else
                                <div class="text-center p-4 bg-gray-50 rounded-xl">
                                    <p class="text-xs text-gray-500 font-medium">Request already submitted.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Departments Table -->
                <div class="md:col-span-3">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                        <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                            <h3 class="text-lg font-black text-gray-800">Clearance Status per Department</h3>
                            <span class="text-xs font-bold text-gray-400">{{ $requests->count() }} / {{ $departments->count() }} Active</span>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-100">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Department</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-50">
                                    @forelse($requests as $req)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-bold text-gray-900">{{ $req->department->name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($req->status === 'cleared')
                                                    <span class="px-2 py-1 bg-green-50 text-green-600 rounded-lg text-[10px] font-black uppercase">Cleared</span>
                                                @elseif($req->status === 'rejected')
                                                    <span class="px-2 py-1 bg-red-50 text-red-600 rounded-lg text-[10px] font-black uppercase">Rejected</span>
                                                @else
                                                    <span class="px-2 py-1 bg-amber-50 text-amber-600 rounded-lg text-[10px] font-black uppercase">Pending</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-500 italic">{{ $req->remarks ?? 'No remarks' }}</div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-6 py-20 text-center text-gray-400">
                                                <svg class="w-12 h-12 mx-auto mb-4 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                <p>No clearance requests submitted yet.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
