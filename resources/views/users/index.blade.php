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
    <div class="container px-[20px] bg-white -mt-[25px] pt-[40px]">

        <h2 class="text-3xl mt-4 mb-[25px]">Manage Users</h2>

    <table id="example" class="table table-striped w-[90%] border">
        <thead>
            <tr class="bg-blue-100">
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>

            @forelse($users as $user)
            <tr class="hover:bg-blue-200">
                <td class="text-center text-blue-900 hover: cursor-pointer hover:font-bold"><a href="{{route('users.show', $user->id)}}">Edit</a></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{Str::title($user->role)}}</td>
                <td class="{{$user->active == 1 ? 'text-green-900' : 'text-red-900'}}"> {{$user->active == 0 ? "No" : "Yes"}}</td>
                
            </tr>

            @empty

            @endforelse
          
        </tfoot>
    </table>
</div>
    
    <script>

new DataTable('#example');



    </script>
  

</x-app-layout>


