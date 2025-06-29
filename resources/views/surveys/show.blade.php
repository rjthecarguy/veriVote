<x-app-layout>


<div class="container">
    <h1>{{ $survey->title }}</h1>
    <p>{{ $survey->description }}</p>

    <a href="{{ route('surveys.edit', $survey) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('surveys.index') }}" class="btn btn-secondary">Back</a>
</div>

</x-app-layout>
