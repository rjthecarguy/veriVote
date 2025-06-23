<style>
    ul { list-style: none; padding: 10px; border: 1px solid #ccc; min-height: 100px; width: 250px; margin-bottom: 20px; }
    li { padding: 8px; background: #eee; margin-bottom: 4px; cursor: grab; }
    .roleContainer { display: flex; gap: 20px; }
</style>



<x-app-layout>

   
    <div class="container px-[20px] bg-white -mt-[25px] pt-[60px]">

        <h2 class="text-3xl mb-4">Manage User</h2>

<div class="container">  <!-- Main container -->

        <div class ="row bg-gray-200 rounded"> <!-- Row -->
                        
             <div class="col-md-4 py-4 px-2" > <!-- Info col -->
                <!-- Wrapper -->
                <div class="border-solid border-2 border-gray-400 bg-gray-300 p-2 rounded">

                <!-- Info box -->
                <div class="p-[20px] bg-white/70 rounded font-bold shadow-2xl">

                    <p class="">Name: &nbsp;<span class="text-blue-600">{{$user->name}}</span></p>
                    <p class="mt-2">Email: &nbsp;<span class="text-blue-600">{{$user->email}}</span></p>
                    <p class="mt-2">Phone: &nbsp;<span class="text-blue-600">{{$user->phone}}</span></p>

                </div>

                <!-- resources/views/users/edit.blade.php -->
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                <!-- Control container -->    
                <div class="flex gap-4 mt-4">

                        <!-- Status control -->
                        <div class="p-6 bg-white/70 rounded shadow-2xl">

                            <label>Status:</label><br>
                            <div class="mb-2"></div>
                            <label>
                                <input type="radio" name="active" value=1 {{ $user->active == 1 ? 'checked' : '' }}>
                                &nbsp;Active
                            </label><br>
                            <div class="mb-2"></div>
                            <label>
                                <input type="radio" name="active" value=0 {{ $user->active == 0 ? 'checked' : '' }}>
                                &nbsp;Inactive
                            </label><br><br>

                        </div> <!-- Control -->

                        <!-- Role control -->
                        <div class="p-6 bg-white/70 rounded shadow-2xl">
                                <label>Role:</label><br>
                                <div class="mb-2"></div>
                                <label>
                                    <input type="radio" name="role" value="user" {{ $user->role === 'user' ? 'checked' : '' }}>
                                    &nbsp;User
                                </label><br>
                                <div class="mb-2"></div>
                                <label>
                                    <input type="radio" name="role" value="admin" {{ $user->role === 'admin' ? 'checked' : '' }}>
                                    &nbsp;Admin
                                </label><br><br>
                        </div> <!-- Control -->

                    </div> <!-- Control container -->

                
                    <!-- Button container -->
                    <div class="mt-4">    
                            <button class="bg-blue-800 rounded p-4 text-white" type="submit">Save User Info</button>
                    </div>

                </form>


                </div> <!-- Wrapper -->
            </div> <!-- Info col -->

            <!-- County col -->
            <div class="col-md-8 py-4 px-2">  
                <!-- Wrapper -->
                <div class="border-solid border-2 border-gray-400 bg-gray-300 p-2 rounded">

                <h2 class="text-2xl mb-4">Assign Counties to {{ $user->name }}</h2>

                <div class="roleContainer">
                    <div>
                        <h3 class="font-bold mb-2">Available Counties</h3>
                        <ul id="availableRoles">
                            @foreach($roles as $role)
                                @unless($user->roles->contains($role))
                                    <li data-id="{{ $role->id }}">{{ $role->name }}</li>
                                @endunless
                            @endforeach
                        </ul>
                    </div>
            
                    <div>
                        <h3 class="font-bold mb-2">Assigned Counties</h3>
                        <ul id="assignedRoles">
                            @foreach($user->roles as $role)
                                <li data-id="{{ $role->id }}">{{ $role->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            
                <button class="bg-blue-800 text-white p-4 rounded mt-2" onclick="saveRoles()">Save Counties</button>
            
                <script>
                    new Sortable(availableRoles, {
                        group: 'roles',
                        animation: 150
                    });
            
                    new Sortable(assignedRoles, {
                        group: 'roles',
                        animation: 150
                    });
            
                    function saveRoles() {
                        const roleItems = document.querySelectorAll('#assignedRoles li');
                        const roleIds = Array.from(roleItems).map(el => el.dataset.id);
            
                        fetch("{{ url('/users/' . $user->id . '/roles') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ roles: roleIds })
                        }).then(res => res.json())
                        .then(data => {
                                        Toastify({
                                            text: data.message,
                                            duration: 3000,
                                            close: true,
                                            gravity: "top",
                                            position: "right",
                                            backgroundColor: "#4CAF50", // green
                                        }).showToast();
                                    });
                    }
                </script>
                
                </div> <!-- Wrapper -->
            </div> <!-- Col -->

    </div> <!-- End of row --> 

</div> <!-- Main container --> 



</x-app-layout>