<div>

    <label for="title">Poll Title</label>
    <input type="text" id="title" wire:model.live="title" placeholder="type the poll title here..." required />

    <p>title: {{ $title }}</p>
</div>
