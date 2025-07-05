<x-app-layout>


<div class="container" >
    <h1 class="text-4xl mb-4 mt-4">Surveys</h1>

    <!-- <a href="{{ route('surveys.create') }}" class="btn btn-primary mb-3">Create New Survey</a>-->

    <div x-data= "{open : false}">
        <button @click = "open = true" class="btn btn-primary mb-4">Create New Survey</button>

      <!-- Modal for new survey -->
      <x-new-survey-modal/>

    </div>


    @if(session('success'))
        <div id="alert-box" class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($surveys as $survey)
                <tr>
                    <td>{{ $survey->title }}</td>
                    <td>{{ $survey->description }}</td>
                    <td class="flex gap-1">
                        <a href="{{ route('surveys.show', $survey) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('surveys.edit', $survey) }}" class="btn btn-warning btn-sm">Edit</a>
                       
                       <x-new-question-modal/>
                        <!--<a href="{{ route('survey-questions.create', $survey->id) }}" class="btn btn-secondary btn-sm">Add Question</a>-->
                        <form action="{{ route('surveys.destroy', $survey) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this survey?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">No surveys found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    // Auto-hide alert after 3 seconds
    setTimeout(function () {
        const alertBox = document.getElementById('alert-box');
        if (alertBox) {
            alertBox.style.transition = 'opacity 0.5s ease';
            alertBox.style.opacity = '0';
            setTimeout(() => alertBox.remove(), 500); // Remove after fade
        }
    }, 3000);
</script>



</x-app-layout>