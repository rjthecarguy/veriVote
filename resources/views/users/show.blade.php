<style>
    ul { list-style: none; padding: 10px; border: 1px solid #ccc; min-height: 100px; width: 250px; margin-bottom: 20px; }
    li { padding: 8px; background: #eee; margin-bottom: 4px; cursor: grab; }
    .roleContainer { display: flex; gap: 20px; }
</style>



<x-app-layout>

    
    <div class="container px-[20px] bg-white -mt-[25px] pt-[60px]">

        <h2 class="text-3xl mb-4">Manage User</h2>




               

<div class="container">  <!-- Main container -->

        <div class ="row"> <!-- Row -->
                        
             <div class="col-md-4 bg-blue-200 py-4 rounded" > <!-- Info col -->

                <!-- Info box -->
                <div class="p-[30px] bg-white/50 rounded font-bold">

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
                        <div class="p-6 bg-white/50 rounded">

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
                        <div class="p-6 bg-white/50 rounded">
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
                            <button class="bg-blue-800 rounded p-4 text-white" type="submit">Save</button>
                    </div>

                </form>



            </div> <!-- Info col -->

            <div class="col-md-8">

                <h2>Assign Roles to {{ $user->name }}</h2>

                <div class="roleContainer">
                    <div>
                        <h3>Available Roles</h3>
                        <ul id="availableRoles">
                            @foreach($roles as $role)
                                @unless($user->roles->contains($role))
                                    <li data-id="{{ $role->id }}">{{ $role->name }}</li>
                                @endunless
                            @endforeach
                        </ul>
                    </div>
            
                    <div>
                        <h3>Assigned Roles</h3>
                        <ul id="assignedRoles">
                            @foreach($user->roles as $role)
                                <li data-id="{{ $role->id }}">{{ $role->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            
                <button onclick="saveRoles()">Save Roles</button>
            
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
                        .then(data => alert(data.message));
                    }
                </script>
                
            </div>

    </div> <!-- End of row --> 

</div> <!-- Main container --> 



</x-app-layout>