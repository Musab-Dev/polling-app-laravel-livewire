<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Livewire\Attributes\On;
use Livewire\Component;

class Polls extends Component
{
    // protected $listeners = [
    //     'pollCreated' => 'render',
    // ];

    public function vote(Option $option){
        $option->votes()->create();
    }

    #[On('pollCreated')]
    public function render()
    {
        $polls = Poll::with(['options.votes'])->latest()->get();
        return view('livewire.polls', compact('polls'));
    }
}
