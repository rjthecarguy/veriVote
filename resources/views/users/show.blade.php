<x-app-layout>

    <div class="container px-[20px]">

        <h2 class="text-3xl mt-4 mb-4">Manage User</h2>

        <div class="ml-[30px] p-[30px] bg-white/50 rounded w-[600px]">

        <p class="text-2xl">Name: &nbsp;<span class="text-blue-600">{{$user->name}}</span></p>
        <p class="text-2xl mt-2">Email: &nbsp;<span class="text-blue-600">{{$user->email}}</span></p>
        <p class="text-2xl mt-2">Phone: &nbsp;<span class="text-blue-600">{{$user->phone}}</span></p>

        </div>

    </div>


</x-app-layout>