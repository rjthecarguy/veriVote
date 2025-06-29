


<h2>{{ $survey->title }}</h2>
<p>{{ $survey->description }}</p>

<form action="{{ route('surveys.submit', $survey->id) }}" method="POST">
    @csrf

    @foreach($survey->questions as $question)
        <div class="mb-4">
            <label><strong>{{ $question->question_text }}</strong></label>

            @if($question->question_type === 'multiple_choice')
                @foreach($question->options as $option)
                    <div>
                        <label>
                            <input type="radio" name="answers[{{ $question->id }}][option_id]" value="{{ $option->id }}">
                            {{ $option->option_text }}
                        </label>
                    </div>
                @endforeach
            @else
                <textarea name="answers[{{ $question->id }}][text]" class="form-control"></textarea>
            @endif
        </div>
    @endforeach

    <button class="btn btn-primary">Submit Answers</button>
</form>

