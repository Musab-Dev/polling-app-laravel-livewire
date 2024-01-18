<div>
    <div wire:model.live="polls">
        @forelse ($polls as $index => $poll)
            <div class="mt-3">
                <div>
                    <p class="text-xl font-bold">{{ $index + 1 }} - {{ $poll->title }}</p>
                </div>

                <div class="mt-3">
                    @foreach ($poll->options as $index => $option)
                        <div class="flex mb-3">
                            <button class="btn">vote</button>
                            <p class="ml-2 text-lg text-gray-600">
                                {{ $option->text }} ({{ $option->votes->count() }})
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="my-4 text-gray-400">No polls yet! Try create one</div>
        @endforelse
    </div>

</div>
