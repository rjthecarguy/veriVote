<x-app-layout>

<form action="{{ route('surveys.questions.store', $survey) }}" method="POST">
    @csrf
    <label>Question:</label>
    <input type="text" name="question" required>

    <label>Type:</label>
    <select name="type" id="question-type">
        <option value="text">Text</option>
        <option value="multiple_choice">Multiple Choice</option>
    </select>

    <div id="options-container" style="display: none;">
        <label>Options:</label>
        <input type="text" name="options[]" placeholder="Option 1">
        <input type="text" name="options[]" placeholder="Option 2">
        <input type="text" name="options[]" placeholder="Option 3">
    </div>

    <button type="submit">Add Question</button>
</form>

<script>
document.getElementById('question-type').addEventListener('change', function () {
    document.getElementById('options-container').style.display = 
        this.value === 'multiple_choice' ? 'block' : 'none';
});
</script>

</x-app-layout>