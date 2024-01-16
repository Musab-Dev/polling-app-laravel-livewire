<div>
    <form>
        <label for="title">Poll Title</label>
        <input type="text" id="title" wire:model.live="title" placeholder="type the poll title here..." required />
        <hr class="my-3" />
        <p>title: {{ $title }}</p>

        <div>
            <button class="btn" wire:click.prevent="addOption">Add Option</button>
        </div>

        <div>
            @foreach ($options as $index => $option)
                <div class="my-2">
                    <label>Option {{ $index + 1 }}</label>
                    <div class="flex gap-2">
                        <input type="text" wire:model="options.{{ $index }}" />
                        <button class="btn" wire:click.prevent="removeOption({{ $index }})">Remove</button>
                    </div>
                </div>
            @endforeach
        </div>
    </form>
</div>
