<x-app-layout>


<div class="container">
    <h1>Edit Survey</h1>
    <form action="{{ route('surveys.update', $survey) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $survey->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $survey->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('surveys.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</x-app-layout>
