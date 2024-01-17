<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePoll extends Component
{
    #[Validate('required|min:5|max:255', 
    message: [
        'required' => 'Poll title is missing',
        'min' => 'Poll title must be at least 5 characters long.',
        'max' => 'Poll title is too long',
    ])]
    public $title;

    #[Validate([
        'options' => 'required|array|min:2|max:10',
        'options.*' => 'required|string|min:1|max:255',
    ], message: [
        'options.min' => 'poll must have at least two options',
        'options.max' => 'poll options should not exceed 10 options',
        'options.required' => 'The :attribute are missing.',
        'options.*.required' => 'The :attribute is missing.',
        'options.*.min' => 'The :attribute can not be empty.',
        'options.*.max' => 'The :attribute should not exceed 255 letter'
    ], attribute: [
        'options.*' => 'option',
    ])]
    public $options = [];

    // protected $rules = [
    //     'title' => 'required|string|min:5|max:255',
    //     'options' => 'required|array|min:1|max:10',
    //     'options.*' => 'required|string|min:2|max:255'
    // ];

    // protected $messages = [
    //     'options.*' => 'Option field can not be empty',
    // ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addOption() {
        $this->options[] = '';
    }

    public function removeOption(int $index){
        unset($this->options[$index]);
        // to remove the empty elements and re-index the array
        $this->options = array_values($this->options);
    }

    public function savePoll(){

        $this->validate();

        // $poll = Poll::create([
        //     'title' => $this->title,
        // ]);

        // foreach($this->options as $option) {
        //     $poll->options()->create(['text' => $option]);
        // }

        // more fluent way of doing the 2 previous steps
        Poll::create(['title' => $this->title])
            ->options()->createMany(
                collect($this->options)
                ->map(fn($optionText) => ['text' => $optionText])
                ->all()
            );

        $this->reset();
    }

    // public function updated($propertyName) {
    //     $this->validateOnly($propertyName);
    // }

    public function render()
    {
        return view('livewire.create-poll');
    }
}
