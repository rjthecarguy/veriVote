
<x-app-layout>


    <h1>Surveys</h1>
    <a href="{{ route('surveys.create') }}">Create Survey</a>
    <ul>
        @foreach ($surveys as $survey)
            <li>
                {{ $survey->title }}
                <a href="{{ route('surveys.edit', $survey) }}">Edit</a>
                <form method="POST" action="{{ route('surveys.destroy', $survey) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>


</x-app-layout>
