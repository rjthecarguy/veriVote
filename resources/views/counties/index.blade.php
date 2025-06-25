<style>

.min-h-screen {
    background-color: white!important;
}


</style>

<x-app-layout>

    <div class="container">

        <h2 class="text-2xl font-bold mb-4 mt-[30px]">Manage Counties</h2>

        <table id="sbVoters" class="table table-striped w-[600px] border">
            <thead>
                <tr class="bg-blue-100">
                
                    <th class="w-[250px]">County</th>
                    <th class="w-[100px]"></th>
                    <th class="w-[100px]"></th>
                    
                </tr>
            </thead>
            <tbody>
    
                @forelse($counties as $county)
                <tr class="hover:bg-blue-200">
              
                    <td>{{$county->name}}</td>
                    <td>Edit</td>
                    <td>Delete</td>
                   
                    
                </tr>
    
                @empty
    
                @endforelse
              
            </tfoot>
        </table>

    </div>

    <table class="min-w-full divide-y divide-gray-200" x-data="{ openRow: null }">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Expand</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Name</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Email</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
    
            <!-- Row 1 -->
            <tr>
                <td class="px-6 py-4">
                    <button @click="openRow === 1 ? openRow = null : openRow = 1">
                        <span x-show="openRow !== 1">▶</span>
                        <span x-show="openRow === 1">▼</span>
                    </button>
                </td>
                <td class="px-6 py-4 text-sm text-gray-900">John Doe</td>
                <td class="px-6 py-4 text-sm text-gray-500">john@example.com</td>
            </tr>
            <tr x-show="openRow === 1" x-transition>
                <td colspan="3" class="px-6 py-4 bg-gray-100 text-sm text-gray-700">
                    <strong>Details:</strong><br>
                    - Role: Admin<br>
                    - Registered: Jan 1, 2024<br>
                    - Notes: Active user with full permissions.
                </td>
            </tr>
    
            <!-- Row 2 -->
            <tr>
                <td class="px-6 py-4">
                    <button @click="openRow === 2 ? openRow = null : openRow = 2">
                        <span x-show="openRow !== 2">▶</span>
                        <span x-show="openRow === 2">▼</span>
                    </button>
                </td>
                <td class="px-6 py-4 text-sm text-gray-900">Jane Smith</td>
                <td class="px-6 py-4 text-sm text-gray-500">jane@example.com</td>
            </tr>
            <tr x-show="openRow === 2" x-transition>
                <td colspan="3" class="px-6 py-4 bg-gray-100 text-sm text-gray-700">
                    <strong>Details:</strong><br>
                    - Role: Editor<br>
                    - Registered: Feb 10, 2024<br>
                    - Notes: Has limited publishing rights.
                </td>
            </tr>
    
        </tbody>
    </table>
    
</x-app-layout>