<x-app-layout>


<div class="container">

    <h1 class="text-4xl mb-4 mt-4">Survey Details</h1>

    <p><span class="font-bold">Survey Name:</span>&nbsp; {{ $survey->title }}</p>
    <p><span class="font-bold mb-6">Survey Description:</span>&nbsp;{{ $survey->description }}</p>

    <h2 class="text-2xl mb-2 mt-6">Survey Questions</h2>

       <table class="table table-bordered mb-4 ">
        <thead>
            <tr>
                <th>Survey Question(s)</th>
               
            </tr>
        </thead>
        <body>
    @foreach($survey->questions as $question)

    <tr>
        <td>{{$question->question_text}}</td>
    </tr>
    @endforeach

  

        </tbody>

       </table>

         <a href="{{ route('surveys.edit', $survey) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('surveys.index') }}" class="btn btn-secondary">Back</a>
</div>

</x-app-layout>
