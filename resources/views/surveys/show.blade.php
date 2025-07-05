<x-app-layout>

<style>
    [x-cloak] { display: none !important; }
</style>

<div class="container">

    <h1 class="text-4xl mb-4 mt-4">Survey Details</h1>

    <!-- Show Survey information -->
    <p><span class="font-bold">Survey Name:</span>&nbsp; {{ $survey->title }}</p>
    <p><span class="font-bold mb-6">Survey Description:</span>&nbsp;{{ $survey->description }}</p>

    <h2 class="text-2xl mb-2 mt-6">Survey Questions</h2>

        <!-- Create table to hold questions -->
       <table class="table table-bordered mb-4 ">
        <thead>
            <tr>
                <th>Survey Question(s)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <body>
    <!-- Loop through questions -->
    @foreach($survey->questions as $question)

    <tr>
        <td>{{$question->question_text}}</td>
        <td><a href="{{route('questions.edit',$question->id)}}" class="btn btn-info mr-2">Edit</a> <a href="" class="btn btn-danger">Delete</a></td>
    </tr>
    @endforeach

  

        </tbody>

       </table>

    <div class="flex gap-1">
        <a href="{{ route('surveys.edit', $survey) }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{ route('surveys.index') }}" class="btn btn-secondary btn-sm">Back</a>
        <x-new-question-modal :surveyID="$survey->id"/>
    </div>
   
</div>

</x-app-layout>
