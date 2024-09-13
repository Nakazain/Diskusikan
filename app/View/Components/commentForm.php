<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommentForm extends Component
{
    public $action;
    public $method;
    public $buttonText;
    public $placeholder;

    public function __construct($action = '#', $method = 'POST', $buttonText = 'Komentar', $placeholder = 'Ikut berdiskusi...')
    {
        $this->action = $action;
        $this->method = $method;
        $this->buttonText = $buttonText;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.comment-form');
    }
}
