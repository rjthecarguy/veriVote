<section>
    <header>


        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        
        @foreach($rolesList as $r)
            {{$r->name}}
        @endforeach

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>



       

        <label for="role">County:</label>
            <select class="w-[200px] ml-2 px-2" name="countySelect" id="countySelect">
                @foreach($counties as $county)
                    <option value="{{$county->id}}" {{$county->id == $user->county_id ? 'selected' : ''}}>{{$county->name}}</option> 
                @endforeach
            </select>

            <script>
                document.getElementById('countySelect').value = {{$user->county_id}}; // selects "User"
              </script>
    

        @if ($user->role == 'admin')
        <div class="mt-4 mb-4">
            <p>Role:&nbsp;  <b>Admin</b></p>
        </div>
      

        @else
        <div class="mt-4 mb-4">
            <p>Role: &nbsp; <b>User</b></p>
        </div>
        @endif

        @if ($user->active == 1)
        <div class="mt-4 mb-4">
            <p>Status:&nbsp;  <b><span class="text-green-600">Active</span></b></p>
        </div>

        @else
        <div class="mt-4 mb-4">
            <p>Status:&nbsp;  <b><span class="text-red-600">Inactive</span></b></p>
            <p class="mt-2 bg-red-100 py-2 px-2 rounded"><i>You currently do not have search capabilities enabled.  &nbsp; Please contact your manager for approval.
            </i></p>
        </div>
        @endif


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
