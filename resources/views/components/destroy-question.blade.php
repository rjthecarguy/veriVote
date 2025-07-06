@props(['questionID'])

<form action="{{ route('questions.destroy', $questionID) }}" method="POST" onsubmit="return confirm('Delete this question?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger inline">Delete</button>
</form>