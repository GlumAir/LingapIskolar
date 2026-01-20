<div
    class="flex flex-col gap-4 rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm"
>
    <div>
        <h2
            class="mb-4 text-xs font-black tracking-widest text-zinc-500 uppercase"
        >
            Ticket Lifecycle
        </h2>
        <div class="flex flex-col gap-8">
            <div class="flex flex-col gap-2">
                <label
                    class="text-xs font-bold tracking-wider text-zinc-500 uppercase"
                >
                    Status
                </label>
                <form
                    class="flex w-full"
                    method="POST"
                    action="/ticket/{{ $ticket["id"] }}/status"
                >
                    @csrf
                    @method("PUT")

                    {{-- Change on data to send, instead of name, send ID --}}
                    <input 
                    type="hidden" 
                    name="status_id" 
                    value="{{ $statuses->where('name', 'Resolved')->first()->id }}" 
                    />

                    <x-button
                        :height="'h-16'"
                        :variant="'green'"
                        :extend="true"
                        :type="'submit'"
                    >
                        Mark as Resolved
                    </x-button>
                </form>
                <div
                    class="flex w-full flex-row items-center justify-between gap-4"
                >
                    <div class="h-[2px] flex-1 rounded-2xl bg-zinc-500"></div>
                    <p class="font-bold text-zinc-500">OR</p>
                    <div class="h-[2px] flex-1 rounded-2xl bg-zinc-500"></div>
                </div>
                <form
                    method="POST"
                    action="/ticket/{{ $ticket["id"] }}/status"
                >
                    @csrf
                    @method("PUT")
                    <x-select-input
                        id="status_id"
                        name="status_id"
                        onchange="this.form.submit()"
                    >
                        @foreach($statuses as $status)
                            <option 
                                value="{{ $status->id }}"
                                @selected($raw_ticket->status_id == $status->id)
                            >
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </x-select-input>
                </form>
            </div>
            <form method="POST" action="/ticket/{{ $ticket["id"] }}/status">
                @csrf
                @method("PUT")

                <x-select-input
                    id="priority_id"
                    name="priority_id"
                    label="'Priority'"
                    onchange="this.form.submit()"
                >
                   @foreach($priorities as $priority)
                        <option 
                            value="{{ $priority->id }}"
                            @selected($raw_ticket->priority_id == $priority->id)
                        >
                            {{ $priority->name }}
                        </option>
                    @endforeach
                </x-select-input>
            </form>
        </div>
    </div>
</div>
