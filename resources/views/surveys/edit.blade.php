<form method="POST" action="{{ isset($survey) ? route('surveys.update', $survey) : route('surveys.store') }}">
    @csrf
    @if(isset($survey))
        @method('PUT')
    @endif
    <label>Title:</label>
    <input type="text" name="title" value="{{ old('title', $survey->title ?? '') }}" required>

    <label>Description:</label>
    <textarea name="description">{{ old('description', $survey->description ?? '') }}</textarea>

    <button type="submit">{{ isset($survey) ? 'Update' : 'Create' }} Survey</button>
</form>
