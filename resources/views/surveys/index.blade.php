
<x-app-layout>

<div class="px-4 py-4">
    <h1 class="text-3xl font-bold mb-4">Manage Surveys</h1>
    <a class="bg-blue-700 text-white mt-2 px-1 py-1 rounded font-bold" href="{{ route('surveys.create') }}">Create Survey</a>
    

    <table id="sbVoters" class="table table-striped w-[600px] mt-4 border">
        <thead>
            <tr class="bg-blue-100">
            
                <th class="w-[250px]">Survey</th>
                <th class="w-[100px]"></th>
                <th class="w-[100px]"></th>
                
            </tr>
        </thead>
        <tbody>
        @foreach ($surveys as $survey)
            <tr>
                <td>{{ $survey->title }}</td>
                <td><a class="font-bold text-blue-600" href="{{ route('surveys.edit', $survey) }}">Edit</a></td>
                <td><form method="POST" action="{{ route('surveys.destroy', $survey) }}" style="display:inline;">
                    @csrf @method('DELETE') 
                    <button class="font-bold text-red-600" type="submit">Delete</button>
                </form>
                </td>
            </tr>
        @endforeach
    </tfoot>
</table>


</div>
</x-app-layout>
