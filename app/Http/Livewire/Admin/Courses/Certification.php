<?php

namespace App\Http\Livewire\Admin\Courses;

use App\Models\Courses\Certification as CoursesCertification;
use App\Models\Courses\Question;
use Livewire\Component;

class Certification extends Component
{
    public $course;

    public $question;
    public $answer1;
    public $answer2;
    public $answer3;
    public $answer4;
    public $answer5;
    public $correct = 1;

    public $options;
    public $editQuestion = 0;

    public function mount()
    {
        $out = array(
            '1' => 'Respuesta 1',
            '2' => 'Respuesta 2',
            '3' => 'Respuesta 3',
            '4' => 'Respuesta 4',
            '5' => 'Respuesta 5'
        );
        $this->options = $out;
    }

    public function render()
    {
        $questions = Question::whereCourse_id($this->course->id)->get();

        $certifications = CoursesCertification::whereCourse_id($this->course->id)->get();


        return view('livewire.admin.courses.certification', ['questions' => $questions, 'certifications' => $certifications]);
    }

    public function saveQuestion()
    {
        $question = new Question();
        $question->question = $this->question;
        $question->answer1 = $this->answer1;
        $question->answer2 = $this->answer2;
        $question->answer3 = $this->answer3;
        $question->answer4 = $this->answer4;
        $question->answer5 = $this->answer5;
        $question->correct = $this->correct;
        $question->course_id = $this->course->id;
        $question->save();

        $this->question = '';
        $this->answer1 = '';
        $this->answer2 = '';
        $this->answer3 = '';
        $this->answer4 = '';
        $this->answer5 = '';
        $this->correct = 1;

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Pregunta creada']);
    }

    public function editQuestion($item_id)
    {
        $question = Question::find($item_id);
        $this->question = $question->question;
        $this->answer1 = $question->answer1;
        $this->answer2 = $question->answer2;
        $this->answer3 = $question->answer3;
        $this->answer4 = $question->answer4;
        $this->answer5 = $question->answer5;
        $this->correct = $question->correct;
        $this->editQuestion = $item_id;

    }

    public function updateQuestion()
    {
        $question = Question::find($this->editQuestion);
        $question->question = $this->question;
        $question->answer1 = $this->answer1;
        $question->answer2 = $this->answer2;
        $question->answer3 = $this->answer3;
        $question->answer4 = $this->answer4;
        $question->answer5 = $this->answer5;
        $question->correct = $this->correct;
        $question->save();

        $this->question = '';
        $this->answer1 = '';
        $this->answer2 = '';
        $this->answer3 = '';
        $this->answer4 = '';
        $this->answer5 = '';
        $this->correct = 1;
        $this->editQuestion = 0;

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Pregunta editada']);

    }
}
