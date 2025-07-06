<x-app-layout>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<!-- Stop modal flicker -->
<style>
    [x-cloak] { display: none !important; }
</style>


<!-- Main container -->
<div class="container">

    <h1 class="text-4xl mb-4 mt-4">Survey Details</h1>

    <!-- Show Survey information -->
    <p><span class="font-bold">Survey Name:</span>&nbsp; {{ $survey->title }}</p>
    <p><span class="font-bold mb-6">Survey Description:</span>&nbsp;{{ $survey->description }}</p>

    <h2 class="text-2xl mb-4 mt-6">Survey Questions</h2>

     
    <!-- Loop through questions -->
    @foreach($survey->questions as $question)

        <!-- Question card -->
        <x-question-card :question="$question"/>
    
    @endforeach

    <div class="flex gap-1 mb-4 bg-white rounded p-2 w-[215px]">
        <a href="{{ route('surveys.edit', $survey) }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{ route('surveys.index') }}" class="btn btn-secondary btn-sm">Back</a>
       
        <!-- Modal to create new question -->
        <x-new-question-modal :surveyID="$survey->id"/>
    </div>
   
</div>



</x-app-layout>


