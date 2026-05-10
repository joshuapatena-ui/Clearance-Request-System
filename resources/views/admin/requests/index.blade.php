<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Clearance Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-6 border-b border-gray-50">
                    <h3 class="text-lg font-black text-gray-800">Pending & Recent Requests</h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Student</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Department</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-right text-xs font-bold text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-50">
                            @forelse($requests as $req)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900">{{ $req->user->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $req->user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-700">{{ $req->department->name }}</div>
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
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        @if($req->status === 'pending')
                                            <div class="flex justify-end space-x-2">
                                                <form action="{{ route('admin.requests.update', $req->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="cleared">
                                                    <button type="submit" class="px-3 py-1 bg-green-600 text-white rounded-lg text-xs font-bold hover:bg-green-700 transition-colors">Approve</button>
                                                </form>
                                                
                                                <button onclick="toggleRejectModal({{ $req->id }})" class="px-3 py-1 bg-red-600 text-white rounded-lg text-xs font-bold hover:bg-red-700 transition-colors">Reject</button>
                                            </div>
                                        @else
                                            <span class="text-gray-400 italic text-xs">Processed</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-20 text-center text-gray-400">
                                        <p>No clearance requests found.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple Reject Modal Script (can be improved with components) -->
    <script>
        function toggleRejectModal(id) {
            const remarks = prompt("Enter reason for rejection (optional):");
            if (remarks !== null) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/requests/${id}`;
                
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                form.innerHTML = `
                    <input type="hidden" name="_token" value="${csrfToken}">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="status" value="rejected">
                    <input type="hidden" name="remarks" value="${remarks}">
                `;
                
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</x-app-layout>
