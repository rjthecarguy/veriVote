<x-app-layout>

<div class="container px-4">
    <h2 class="text-3xl text-blue-700 mb-4 mt-4 font-bold">Add Question to "{{ $survey->title }}"</h2>
    <form method="POST" action="{{ route('survey-questions.store') }}">
        @csrf
        <input type="hidden" name="survey_id" value="{{ $survey->id }}">

        <div class="mb-3">
            <label class="mb-2">Question Text</label>
            <input type="text" name="question_text" class="form-control w-[60%]" required>
        </div>

        <div class="mb-3">
            <label class="mb-2">Question Type</label>
            <select name="question_type" class="form-control w-[200px]" id="questionType">
                <option value="open_ended">Open Ended</option>
                <option value="multiple_choice">Multiple Choice</option>
            </select>
        </div>

        <div id="optionFields" class="mt-4 mb-4">
    <div><input type="text" name="options[]" class="form-control mb-2"></div>
</div>
<button type="button" class="mr-4" onclick="addOption()">+ Add Option</button>

<script>

function addOption() {
    const div = document.createElement('div');
    div.innerHTML = '<input type="text" name="options[]" class="form-control mb-2">';
    document.getElementById('optionFields').appendChild(div);
}


 document.addEventListener('DOMContentLoaded', function() {
    const select = document.getElementById('questionType');
    const toggleDiv = document.getElementById('optionFields');

    function toggleVisibility() {
      if (select.value === 'multiple_choice') {
        toggleDiv.style.display = 'block';
      } else {
        toggleDiv.style.display = 'none';
      }
    }

    select.addEventListener('change', toggleVisibility);

    // Optional: run on page load to match initial selection
    toggleVisibility();
  });

</script>


        <button class="btn btn-success">Add Question</button>
    </form>
</div>

<script>
    document.getElementById('questionType').addEventListener('change', function() {
        const show = this.value === 'multiple_choice';
        document.getElementById('optionsBox').style.display = show ? 'block' : 'none';
    });
</script>

</x-app-layout>