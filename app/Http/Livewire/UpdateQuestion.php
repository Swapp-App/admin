<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateQuestion extends Component
{
    public $open = false;
    public $question = "";
    public $answer = "";
    public $general_cat = false;
    public $tech_cat = false;
    public $usage_cat = false;
    public $cards_cat = false;
    public $others_cat = false;

    public $old_id = 0;
    public $question_id = 0;

    protected $rules = [
        'question' => ['string', 'required', 'max:200', 'min:10'],
        'answer' => ['string', 'required', 'max:1000', 'min:10'],
        'general_cat' => ['boolean', 'required'],
        'tech_cat' => ['boolean', 'required'],
        'usage_cat' => ['boolean', 'required'],
        'cards_cat' => ['boolean', 'required'],
        'others_cat' => ['boolean', 'required'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function delete()
    {
        Question::find($this->question_id)
            ->delete();
        $this->emit('updateQuestionList');
        $this->open = false;
    }

    public function save()
    {
        $validatedData = $this->validate([
            'question' => ['string', 'required', 'max:200', 'min:10', Rule::unique('questions', 'question')->ignore($this->question_id)],
            'answer' => ['string', 'required', 'max:1000', 'min:10'],
            'general_cat' => ['boolean', 'required'],
            'tech_cat' => ['boolean', 'required'],
            'usage_cat' => ['boolean', 'required'],
            'cards_cat' => ['boolean', 'required'],
            'others_cat' => ['boolean', 'required'],
        ]);
        
        Question::find($this->question_id)
            ->update($validatedData);
        $this->emit('updateQuestionList');
        $this->open = false;
    }
    

    public function render()
    {
        if($this->old_id != $this->question_id)
        {
            $this->old_id = $this->question_id;

            $question = Question::where('id', $this->question_id)->first();
            if($question != null)
            {
                $this->question = $question->question;
                $this->answer = $question->answer;
                $this->general_cat = (boolean)$question->general_cat;
                $this->usage_cat = (boolean)$question->usage_cat;
                $this->tech_cat = (boolean)$question->tech_cat;
                $this->cards_cat = (boolean)$question->cards_cat;
                $this->others_cat = (boolean)$question->others_cat;
            }

            error_log($question);
        }
        return view('livewire.update-question');
    }
}
