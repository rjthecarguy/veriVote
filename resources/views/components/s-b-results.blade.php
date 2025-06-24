<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="container">
                    <h2 class="mb-4 text-2xl font-bold">Search San Bernardino Voters</h2>
                    <form action="{{ url('/sbvoters/search') }}" method="GET">
                        @csrf
                        <div class="mb-3">
                            <label for="name_last" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="name_last" name="name_last" placeholder="e.g. Smith">
                        </div>
                        <div class="mb-3">
                            <label for="name_first" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="name_first" name="name_first" placeholder="e.g. John">
                        </div>
                        <div class="mb-3">
                            <label for="house_number" class="form-label">House Number</label>
                            <input type="text" class="form-control" id="house_number" name="house_number" placeholder="e.g. 123">
                        </div>
                        <div class="mb-3">
                            <label for="street" class="form-label">Street</label>
                            <input type="text" class="form-control" id="street" name="street" placeholder="e.g. Main">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="e.g. Riverside">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                
                  
                </div>
            </div>
        </div>
    </div>
</div>
