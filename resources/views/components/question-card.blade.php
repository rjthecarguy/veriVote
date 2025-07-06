 @props(['question'])
 
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