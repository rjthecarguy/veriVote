




<div class="container">
    <h2>Add Question to "{{ $survey->title }}"</h2>
    <form method="POST" action="{{ route('survey-questions.store') }}">
        @csrf
        <input type="hidden" name="survey_id" value="{{ $survey->id }}">

        <div class="mb-3">
            <label>Question Text</label>
            <input type="text" name="question_text" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Question Type</label>
            <select name="question_type" class="form-control" id="questionType">
                <option value="open_ended">Open Ended</option>
                <option value="multiple_choice">Multiple Choice</option>
            </select>
        </div>

        <div id="optionFields">
    <div><input type="text" name="options[]" class="form-control mb-2"></div>
</div>
<button type="button" onclick="addOption()">+ Add Option</button>

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

