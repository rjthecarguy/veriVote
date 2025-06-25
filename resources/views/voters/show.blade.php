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

         
            <x-nav-link class="md:hidden -mb-[40px] mt-1" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <span class="text-blue-600">{{ __('Back to Dashboard') }}</span>
            </x-nav-link>
        

        <h2 class="text-2xl font-bold mt-[30px] mb-4">San Bernardino Results</h2>
        
       


    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 w-[50px]"></th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2 ">Address</th>
               
            </tr>
        </thead>
        <tbody>
            @forelse ($sbVoters as $voter)
                <tr class="border-b user-row {{ $loop->odd ? 'bg-white' : 'bg-gray-100' }}" data-user-id="{{ $voter->id }}">
                    <td class="border px-4 py-2 text-center">
                        <button class="toggle-row" data-id="{{ $voter->id }}"><span class="text-green-500 text-2xl icon"></span></button>
                    </td>
                    <td class="border px-4 py-2">{{ $voter->name_last }},<br> {{$voter->name_first}}</td>
                    <td class="border px-4 py-2">{{ $voter->house_number }}&nbsp;{{ $voter->street }},&nbsp; {{ $voter->city}} </td>
               
                </tr>
                <tr class="details-row hidden" id="details-{{ $voter->id }}">
                    <td colspan="3" class="px-4 py-2 bg-gray-100 text-sm text-gray-700">
                        <strong>Details:</strong><br>
                        <div class="pl-4">
                            Party: {{ $voter->party}}<br>
                            Gender: {{ $voter->gender}}<br>
                            Birth Date: {{ \Carbon\Carbon::parse($voter->birth_date)->format('Y-m-d') }}
                            <br>
                            Birth Place: {{ $voter->birth_place}}<br>
                        </div>    
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
</div>
    <script>
        $(document).ready(function () {
            $('.toggle-row').click(function () {
                let id = $(this).data('id');
                $('#details-' + id).toggle(); // toggle the details row
                let icon = $(this).text();
                //$(this).text(icon === '▶' ? '▼' : '▶');
                const $icon = $(this).find('.icon');

                $icon.toggleClass('text-red-600');
            });
        });
    </script>
    

<script>
 $('.icon').html('<i class="fa-solid fa-circle-info"></i>');
  //new DataTable('#sbVoters');

</script>



</x-app-layout>

