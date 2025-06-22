<x-app-layout>

    <div class="container px-[20px]">

        <h2 class="text-3xl mt-4 mb-4">Manage User</h2>

        <div class="ml-[30px] p-[30px] bg-white/50 rounded w-[600px]">

        <p class="text-2xl">Name: &nbsp;<span class="text-blue-600">{{$user->name}}</span></p>
        <p class="text-2xl mt-2">Email: &nbsp;<span class="text-blue-600">{{$user->email}}</span></p>
        <p class="text-2xl mt-2">Phone: &nbsp;<span class="text-blue-600">{{$user->phone}}</span></p>

        </div>

        <!-- resources/views/users/edit.blade.php -->
<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
<div class="flex gap-4 mt-4 px-[20px]">

   

    <div class="p-6 bg-white/50 rounded">

    <label>Status:</label><br>
    <div class="mb-2"></div>
    <label>
        <input type="radio" name="active" value=1 {{ $user->active == 1 ? 'checked' : '' }}>
        Active
    </label><br>
    <div class="mb-2"></div>
    <label>
        <input type="radio" name="active" value=0 {{ $user->active == 0 ? 'checked' : '' }}>
        Inactive
    </label><br><br>

    </div>


    <div class="p-6 bg-white/50 rounded">
    <label>Role:</label><br>
    <div class="mb-2"></div>
    <label>
        <input type="radio" name="role" value="user" {{ $user->role === 'user' ? 'checked' : '' }}>
        User
    </label><br>
    <div class="mb-2"></div>
    <label>
        <input type="radio" name="role" value="admin" {{ $user->role === 'admin' ? 'checked' : '' }}>
        Admin
    </label><br><br>
    </div>

    </div>
</div>

<div class="ml-[40px] mt-4">    
    <button class="bg-blue-800 rounded p-4 text-white" type="submit">Save</button>
</div>

</form>


    

</x-app-layout>