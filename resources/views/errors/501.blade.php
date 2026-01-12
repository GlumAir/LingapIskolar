@extends("layouts.main")

@section("main")
    <div class="flex w-full flex-col items-center justify-center gap-4">
        <div class="flex flex-col gap-2 text-center">
            <p class="text-8xl font-bold">501</p>
            <h1 class="text-2xl font-bold">
                Welcome, {{ auth()->user()->name }}!
            </h1>
            <p class="text-gray-600">{{ auth()->user()->email }}</p>
        </div>
        <p>Page not implemented yet.</p>

        <p>MESSAGE: {{ $exception->getMessage() }}</p>

        <x-button :href="'/logout'">Log Out</x-button>
    </div>
@endsection
