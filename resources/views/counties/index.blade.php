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


</x-app-layout>