




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

        <div class="mb-3" id="optionsBox" style="display:none;">
            <label>Options (One per line)</label>
            <textarea name="options[]" class="form-control" rows="4"></textarea>
        </div>

        <button class="btn btn-success">Add Question</button>
    </form>
</div>

<script>
    document.getElementById('questionType').addEventListener('change', function() {
        const show = this.value === 'multiple_choice';
        document.getElementById('optionsBox').style.display = show ? 'block' : 'none';
    });
</script>

