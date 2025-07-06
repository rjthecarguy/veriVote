@props(['question'])

<div>
   <div>
     <button @click = "open = true" class="inline btn btn-secondary btn-sm">Edit Question</button>

     <div x-cloak x-show="open" class="fixed inset-0 flex items-center bg-gray-900 justify-center bg-opacity-50">
                <div class="bg-white shadow-md p-6 rounded-lg w-full max-w-md">
                    <h3 class="text-lg font-semibold mb-4">Edit Question</h3>

                        <form action="{{route('questions.update', $question->id)}}" method="POST">
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
        </div>
</div>
</div>