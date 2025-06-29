<x-app-layout>


<div class="container">
    <h1>Create Survey</h1>
    <form action="{{ route('surveys.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('surveys.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</x-app-layout>