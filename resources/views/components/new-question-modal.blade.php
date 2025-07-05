<div>
     <div x-data= "{open : false}">
        <button @click = "open = true" class="btn btn-primary mb-4">Create New Survey</button>

      <!-- Modal for new survey -->
      <x-new-survey-modal/>

    </div>

</div>