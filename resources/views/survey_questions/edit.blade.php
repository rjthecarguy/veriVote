<x-app-layout>


<div class="container px-4">
    <h1 class="text-4xl mt-4 mb-4">Edit Question</h1>

   
    <form action="{{route('questions.update', $question)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="mb-2" for="question_text">Question Text</label>
           <input type="text" name="question_text" class="form-control" value="{{ $question->question_text }}" required> 
        </div>

       

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back to Surveys</a>
    </form>
</div>

</x-app-layout>
