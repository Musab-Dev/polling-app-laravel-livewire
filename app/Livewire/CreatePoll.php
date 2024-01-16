<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = [];

    protected $rules = [
        'title' => 'required|string|min:5|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|string|min:2|max:255'
    ];

    // protected $messages = [
    //     'options.*' => 'Option field can not be empty',
    // ];

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

    public function render()
    {
        return view('livewire.create-poll');
    }
}
