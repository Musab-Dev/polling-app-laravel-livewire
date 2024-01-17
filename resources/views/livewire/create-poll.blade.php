<div>
    <form wire:submit.prevent="savePoll">
        <label for="title">Poll Title</label>
        <input type="text" id="title" wire:model.live="title" placeholder="type the poll title here..." required />
        @error('title')
            <p class="text-sm text-red-700">{{ $message }}</p>
        @enderror

        <hr class="my-3" />

        <div>
            <button class="btn" wire:click.prevent="addOption">Add Option</button>
        </div>

        <div>
            @foreach ($options as $index => $option)
                <div class="my-2">
                    <label>Option {{ $index + 1 }}</label>
                    <div class="flex gap-2">
                        <input type="text" wire:model.live="options.{{ $index }}" />
                        <button class="btn" wire:click.prevent="removeOption({{ $index }})">Remove</button>
                    </div>
                    @error("options.{$index}")
                        <p class="text-sm text-red-700">{{ $message }}</p>
                    @enderror

                </div>
            @endforeach
            @error('options')
                <p class="text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn bg-gray-200 transition-all my-4">Save Poll</button>
    </form>
</div>
