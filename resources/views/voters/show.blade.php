<script
src="https://code.jquery.com/jquery-3.7.1.min.js"
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>

#dt-length-0 {
    padding: 10px;
    margin-left: 10px;
    width: 80px;
    margin-right: 10px;
}

#dt-search-0 {
    margin-left: 10px;
}

.dt-column-order {
    color: navy;
}

tr {
  border-bottom: 1pt solid lightgray;
}

table tr:nth-child(even) {
  background-color: lightgrey!important;
}
.min-h-screen {
    background-color: white!important;
}


</style>

<x-app-layout>

    <div class="container">

        <h2 class="text-2xl font-bold mt-[30px] mb-4">San Bernardino Results</h2>

        <table id="sbVoters" class="table table-striped w-[90%] border">
            <thead>
                <tr class="bg-blue-100">
                    
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>House Number</th>
                    <th>Street</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
    
                @forelse($sbVoters as $sbVoter)
                <tr class="hover:bg-blue-200">
                   
                    <td>{{$sbVoter->name_last}}</td>
                    <td>{{$sbVoter->name_first}}</td>
                    <td>{{$sbVoter->house_number}}</td>
                    <td>{{$sbVoter->street}}</td>
                    <td>{{$sbVoter->city}}</td>
                     
                </tr>
              
                
                @empty
    
                @endforelse
              
            </tfoot>
        </table>

    </div>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Expand</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sbVoters as $user)
                <tr class="border-b user-row" data-user-id="{{ $user->id }}">
                    <td class="border px-4 py-2 text-center">
                        <button class="toggle-row" data-id="{{ $user->id }}">▶</button>
                    </td>
                    <td class="border px-4 py-2">{{ $user->name_last }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                </tr>
                <tr class="details-row hidden" id="details-{{ $user->id }}">
                    <td colspan="3" class="px-4 py-2 bg-gray-100 text-sm text-gray-700">
                        <strong>Details:</strong><br>
                        Role: {{ $user->city}}<br>
                      
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-2 text-center text-gray-500">
                        No users found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('.toggle-row').click(function () {
                let id = $(this).data('id');
                $('#details-' + id).toggle(); // toggle the details row
                let icon = $(this).text();
                $(this).text(icon === '▶' ? '▼' : '▶');
            });
        });
    </script>
    

<script>

  //new DataTable('#sbVoters');

</script>



</x-app-layout>

