<script
src="https://code.jquery.com/jquery-3.7.1.min.js"
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css"/>

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

<script>

    new DataTable('#sbVoters');

</script>

</x-app-layout>

