@extends("layouts.main")

@section("main")
    <div class="flex w-full items-center justify-center">
        <div class="flex flex-col items-center justify-center gap-4">
            <img src="/img/front-logo.png" class="h-48" />
            <form
                class="flex w-80 flex-col gap-4"
                method="POST"
                action="/signup"
            >
                @csrf
                <x-text-input
                    :type="'text'"
                    :label="'Name'"
                    :id="'name'"
                    :icon="'bi-person-lines-fill'"
                />
                <x-text-input
                    :type="'text'"
                    :label="'Username / Email'"
                    :id="'username'"
                    :icon="'bi-person-circle'"
                />
                <x-text-input
                    :type="'password'"
                    :label="'Password'"
                    :id="'password'"
                    :icon="'bi-lock-fill'"
                />
                @if ($errors->any())
                    <x-alert
                        :type="'danger'"
                        :title="'Something\'s not right!'"
                    >
                        {{ $errors->first() }}
                    </x-alert>
                @endif

                <x-button :type="'submit'">Sign Up</x-button>
            </form>
        </div>
    </div>
@endsection
