<x-app-layout>





<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<style>
    [x-cloak] { display: none !important; }
</style>

<div class="container">

    <h1 class="text-4xl mb-4 mt-4">Survey Details</h1>

    <!-- Show Survey information -->
    <p><span class="font-bold">Survey Name:</span>&nbsp; {{ $survey->title }}</p>
    <p><span class="font-bold mb-6">Survey Description:</span>&nbsp;{{ $survey->description }}</p>

    <h2 class="text-2xl mb-4 mt-6">Survey Questions</h2>

     
    <!-- Loop through questions -->
    @foreach($survey->questions as $question)

     

        <div class="p-2 bg-white shadow-lg rounded mx-auto w-[95%] mb-2">

             <span class="text-2xl text-blue-700">{{$question->question_text}}</span>
                <hr class="mb-2">
                <p class="mb-2 ml-2">Options</p>

                @foreach($question->options as $option)
                    <div class='block bg-gray-300 rounded p-2 ml-2 mb-2'>
                        {{$option->option_text}}
                    </div>
                @endforeach

             <span class="flex gap-1 mt-2"><a href="{{route('questions.edit',$question->id)}}" class="btn btn-info mr-2">Edit</a>  
             <x-destroy-question :questionID="$question->id"/></span>
               
               
        </div>
    
    @endforeach

  

        

    <div class="flex gap-1 mb-4 bg-white rounded p-2 w-[215px]">
        <a href="{{ route('surveys.edit', $survey) }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{ route('surveys.index') }}" class="btn btn-secondary btn-sm">Back</a>
        <x-new-question-modal :surveyID="$survey->id"/>
    </div>
   
</div>



</x-app-layout>


