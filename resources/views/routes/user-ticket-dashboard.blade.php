@extends("layouts.main")
@extends("layouts.user-sidebar")

@section("headerside")
    <form
        method="GET"
        class="hidden w-full max-w-[40%] md:block"
        action="{{ route("dashboard") }}"
    >
        <x-text-input
            :id="'search'"
            :icon="'bi-search'"
            :value="request('search')"
        />
    </form>
@endsection

@section("main")
    <div class="flex w-full flex-col gap-6 p-6 px-10">
        <x-page-header>
            <x-slot:header>
                <div>
                    <h1
                        class="text-3xl font-black tracking-tight text-zinc-900 uppercase"
                    >
                        My Tickets
                    </h1>
                    <p class="text-lg text-zinc-500">
                        Track and manage support requests of 
                        <span class="font-semibold text-red-800">
                            {{ auth()->user()->name }}
                        </span>
                    </p>
                </div>
            </x-slot>
            <x-slot:side>
                <x-button
                    :variant="'secondary'"
                    onclick="location.reload()"
                    class="shadow-sm"
                >
                    <i class="bi bi-arrow-clockwise mr-2"></i>
                    Refresh
                </x-button>
                <x-button :href="route('ticket-create')">New Ticket</x-button>
            </x-slot>
        </x-page-header>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
            <x-counter
                :name="'Open'"
                :value="$stats['open']"
                :color="'border-l-green-600'"
            />
            <x-counter
                :name="'In Progress'"
                :value="$stats['in_progress']"
                :color="'border-l-amber-500'"
            />
            <x-counter
                :name="'Closed'"
                :value="$stats['closed']"
                :color="'border-l-zinc-400'"
            />
        </div>
        <x-filter :filters="['status', 'category']"/>
        <x-ticket-table
            :columns="['id', 'subject', 'status']"
            :tickets="$tickets"
        />
    </div>
@endsection
