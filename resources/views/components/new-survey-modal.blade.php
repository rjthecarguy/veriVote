<div>
   <div>
     <div x-show="open" class="fixed inset-0 flex items-center bg-gray-900 justify-center bg-opacity-50">
                <div class="bg-white shadow-md p-6 rounded-lg w-full max-w-md">
                    <h3 class="text-lg font-semibold mb-4">New Survey</h3>

                        <form enctype="multipart/form-data"
                            method = "POST"
                            action="{{route('surveys.store')}}">
                            @csrf
                            <label for="title" class="font-semibold">Title</label>
                            <input required type="text" id="title"name="title" class="mb-2 block w-full"/>
                             
                            <label for="description" class=" font-semibold">Description</label>
                            <input required type="text" id="description" name="description" class="mb-2 block w-full"/>

                            <button type="submit" class="btn btn-primary">Submit</button>
                                <button @click = "open = false" class="btn btn-secondary">Cancel</button>
                        </form>
                </div>
        </div>
</div>
</div>