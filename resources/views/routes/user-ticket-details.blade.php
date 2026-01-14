@extends("layouts.main")

@section("main")
    <div class="flex w-full flex-col gap-6 bg-zinc-50/50 p-6 px-10">
        <x-page-header>
            <x-slot:header>
                <h1
                    class="text-3xl font-black tracking-tight text-zinc-900 uppercase"
                >
                    Ticket
                    <span class="text-red-800">#{{ $ticket["id"] }}</span>
                </h1>
                <x-ticket-status :status="$ticket['status']" />
            </x-slot:header>
            <x-slot:side>
                <x-button
                    :variant="'secondary'"
                    :href="route('dashboard')"
                    class="shadow-sm"
                >
                    <i class="bi bi-arrow-left mr-2"></i>
                    Back to Dashboard
                </x-button>
            </x-slot:side>
        </x-page-header>

        <div class="flex flex-col items-start gap-8 md:flex-row">
            <div class="flex flex-1 flex-col gap-6">
                <div
                    class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm"
                >
                    <h2
                        class="mb-4 text-xs font-black tracking-widest text-zinc-500 uppercase"
                    >
                        Ticket Overview
                    </h2>
                    <div class="grid grid-cols-2 gap-y-4">
                        <div class="col-span-2">
                            <p
                                class="text-xs font-bold text-zinc-400 uppercase"
                            >
                                Subject
                            </p>
                            <p class="text-lg font-bold text-zinc-900">
                                {{ $ticket["subject"] }}
                            </p>
                        </div>
                        <div>
                            <p
                                class="text-xs font-bold text-zinc-400 uppercase"
                            >
                                Category
                            </p>
                            <span
                                class="inline-flex items-center rounded-md bg-zinc-100 px-2.5 py-0.5 text-xs font-semibold text-zinc-700 ring-1 ring-zinc-200 ring-inset"
                            >
                                {{ $ticket["category"] }}
                            </span>
                        </div>
                    </div>
                    <div
                        class="mt-6 rounded-xl border border-zinc-100 bg-zinc-50 p-4"
                    >
                        <p
                            class="mb-2 text-xs font-bold text-zinc-400 uppercase"
                        >
                            Issue Description
                        </p>
                        <p class="leading-relaxed text-zinc-700">
                            {{ $ticket["description"] }}
                        </p>
                    </div>
                </div>

                <div
                    class="flex flex-col overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm"
                >
                    <div class="border-b border-zinc-200 bg-zinc-50 px-6 py-4">
                        <h2
                            class="text-xs font-black tracking-widest text-zinc-500 uppercase"
                        >
                            Reply Thread
                        </h2>
                    </div>

                    <div
                        class="h-[500px] space-y-4 overflow-y-auto bg-zinc-50/30 p-6"
                    >
                        <x-message-bubble
                            :name="'User'"
                            :date="'12 Jan 2026'"
                            :content="'I am having trouble with my scholarship application...'"
                            :me="true"
                        />
                        <x-message-bubble
                            :name="'Support'"
                            :date="'13 Jan 2026'"
                            :content="'Hello! I can certainly help with that. Could you provide your ID?'"
                            :me="false"
                        />
                    </div>

                    <div class="border-t border-zinc-200 bg-white p-6">
                        <form
                            method="POST"
                            class="flex flex-col gap-3"
                            action="/ticket/{{ $ticket["id"] }}/reply"
                        >
                            @csrf
                            <x-text-box-input
                                :id="'message'"
                                :placeholder="'Type your message here...'"
                            />
                            <div class="flex justify-end">
                                <x-button
                                    :type="'submit'"
                                    class="min-w-32 shadow-md"
                                >
                                    Send Reply
                                    <i class="bi bi-send ml-2 text-xs"></i>
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="flex w-80 flex-col gap-6">
                <div
                    class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm"
                >
                    <h2
                        class="mb-4 text-xs font-black tracking-widest text-zinc-500 uppercase"
                    >
                        Assigned Agent
                    </h2>
                    <div class="flex flex-col items-center gap-4 text-center">
                        <img
                            src="/img/emu.jpg"
                            alt="Agent"
                            class="h-24 w-24 rounded-full border-4 border-white shadow-lg ring-1 ring-zinc-200"
                        />

                        <div>
                            <p
                                class="text-lg leading-tight font-black text-zinc-900"
                            >
                                {{ $ticket["assigned_to"] }}
                            </p>
                            <p class="text-sm font-medium text-zinc-500">
                                {{ $ticket["assignee_title"] }}
                            </p>
                        </div>
                    </div>
                </div>

                <!--  -->
            </div>
        </div>
    </div>
@endsection
