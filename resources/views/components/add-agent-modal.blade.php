<div x-data="{ show: false }" class="flex items-center justify-center">
    <x-button class="shadow-sm hover:shadow" @click="show = true">
        <i class="bi bi-plus mr-2"></i>
        Add New User
    </x-button>

    <template x-teleport="body">
        <div
            x-show="show"
            x-transition.opacity
            class="fixed inset-0 z-[100] flex items-center justify-center bg-black/40 backdrop-blur-sm"
        >
            <form method="POST" action="/agent/add">
                @csrf
                @method("PUT")

                <div
                    class="flex flex-col gap-4 rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm"
                >
                    <div>
                        <x-page-header>
                            <x-slot:header>
                                <div>
                                    <h1
                                        class="text-3xl font-black tracking-tight text-zinc-900 uppercase"
                                    >
                                        Add New Agent
                                    </h1>
                                    <p class="text-lg text-zinc-500">
                                        Please provide the email of the user to
                                        change their role as Agent.
                                    </p>
                                </div>
                            </x-slot>
                            <x-slot:side></x-slot>
                        </x-page-header>
                    </div>
                    <div class="flex flex-col gap-4">
                        <x-text-input
                            :type="'email'"
                            :label="'Email'"
                            :id="'email'"
                            :icon="'bi-envelope'"
                        />
                    </div>

                    <div
                        class="mt-4 flex w-full flex-col items-center justify-center gap-4 md:flex-row"
                    >
                        <x-button :variant="'secondary'" @click="show = false">
                            Close
                        </x-button>
                        <x-button :type="'submit'">Add</x-button>
                    </div>
                </div>
            </form>
        </div>
    </template>
</div>
