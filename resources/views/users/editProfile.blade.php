<x-layout>
<x-user-layout>
<div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full"> 
    <div class="mb-5">
        <a href="{{route('dashboard')}}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        </a>
    </div>
    @if (session('success'))
        <div class="bg-green-600 px-2 py-2 text-white rounded-xl">
            <p class= text-xl">{{session('success')}}</p>
        </div>
    @endif 
    <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900 mt-10"> Edit Profile </h3>
    <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST" class="w-1/2 space-y-6 my-10">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm text-gray-700" required />
            @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
            <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm text-gray-700"/>
            <p class="text-sm text-gray-500 mt-1">Leave blank if you don't want to change your password.</p>
            @error('password')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input type="password" name="password_confirmation" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm text-gray-700" placeholder="Confirm Password">
        </div>
        
        <div>
            <button type="submit" class="w-full bg-green-900 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-150">
                Save Changes
            </button>
        </div>
    </form>

</div>
</x-user-layout>
</x-layout>