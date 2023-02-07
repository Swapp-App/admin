<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class ShowQuestions extends Component
{
    public $questions = [];

    // Modal Create
    public $new_modal_open = false;
    public $question = "";
    public $answer = "";
    public $general_cat = false;
    public $tech_cat = false;
    public $usage_cat = false;
    public $cards_cat = false;
    public $others_cat = false;

    protected $listeners = ['updateQuestionList' => 'updateQuestions'];

    protected $rules = [
        'question' => ['string', 'required', 'max:200', 'min:10', 'unique:' . Question::class],
        'answer' => ['string', 'required', 'max:1000', 'min:10'],
        'general_cat' => ['boolean', 'required'],
        'tech_cat' => ['boolean', 'required'],
        'usage_cat' => ['boolean', 'required'],
        'cards_cat' => ['boolean', 'required'],
        'others_cat' => ['boolean', 'required'],
    ];

    public function updateQuestions()
    {
        $this->questions = Question::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validatedData = $this->validate();
        Question::create($validatedData);
        $this->new_modal_open = false;
        $this->emit('update-question-list');
        $this->reset();
    }

    public function render()
    {
        $this->questions = Question::all();
        return view('livewire.show-questions');
    }
}
