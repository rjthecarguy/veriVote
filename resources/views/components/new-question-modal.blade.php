<div>
     <!-- DATA div -->
     <div x-data= "{open : false}">  

        <!-- Button that opens model -->
        <button @click = "open = true" class="inline btn btn-secondary btn-sm">Add Qustion</button>

    
            <!-- Modal main div -->
            <div x-show="open" class="fixed inset-0 flex items-center bg-gray-900 justify-center bg-opacity-50">
               
                <!-- Inner MODAL div -->
                <div class="bg-white shadow-md p-6 rounded-lg w-full max-w-md">

                   
                        <h2 class="text-3xl text-blue-700 mb-4 mt-4 font-bold">Add Question to Survey</h2>
                            <form method="POST" action="{{ route('survey-questions.store') }}">
                             @csrf
                            
                            <!-- Input div --> 
                            <div class="mb-3">
                                <!-- Get question text -->
                                <label class="mb-2">Question Text</label>
                                <input type="text" name="question_text" class="form-control w-[60%]" required>
                            </div>  <!-- End of input div -->

                            <!-- Select div -->
                            <div class="mb-3">
                                <!-- Get question type -->
                                <label class="mb-2">Question Type</label>
                                <select name="question_type" class="form-control w-[200px]" id="questionType">
                                    <option value="open_ended">Open Ended</option>
                                    <option value="multiple_choice">Multiple Choice</option>
                                </select>
                            </div> <!-- End of Select div -->

                            <!--Option div -->
                            <div id="optionFields" class="mt-4 mb-4">
                                <div><input type="text" name="options[]" class="form-control mb-2"></div>
                            </div>  <!-- End of option div -->
                            <button id="option" type="button" class="mr-4 mb-2 " onclick="addOption()">+ Add Option</button>


                    <script>

function addOption() {
    const div = document.createElement('div');
    div.innerHTML = '<input type="text" name="options[]" class="form-control mb-2">';
    document.getElementById('optionFields').appendChild(div);
}


 document.addEventListener('DOMContentLoaded', function() {
    const select = document.getElementById('questionType');
    const toggleDiv = document.getElementById('optionFields');
    const option = document.getElementById('option');

    
    function toggleVisibility() {
      if (select.value === 'multiple_choice') {
        toggleDiv.style.display = 'block';
        option.style.display = 'block';
        
      } else {
        toggleDiv.style.display = 'none';
        option.style.display = 'none';
      }
    }

    select.addEventListener('change', toggleVisibility);

    // Optional: run on page load to match initial selection
    toggleVisibility();
  });

</script>


    <button class="btn btn-success">Add Question</button>
    </form>

    <script>
    document.getElementById('questionType').addEventListener('change', function() {
        const show = this.value === 'multiple_choice';
        document.getElementById('optionsBox').style.display = show ? 'block' : 'none';
    });

</script>
                </div> <!-- End of inner modal div -->
            </div>  <!-- end of modal open div -->
        </div> <!-- End of data div -->
    </div>  <!-- end main div -->

