<x-layout>
<div class="flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-2xl font-bold mb-4">Verify Your Email</h1>
        <p class="mb-4">
            A verification link has been sent to your email. Please check your inbox.
        </p>
        <div class="mt-10">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-green-900 hover:bg-green-700 text-white rounded">Resend Verification Email</button>
            </form>
        </div>
    </div>
</div> 
</x-layout>
