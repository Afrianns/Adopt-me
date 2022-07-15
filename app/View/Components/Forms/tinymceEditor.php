<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class tinymceEditor extends Component
{
    public $library;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($library)
    {
        $this->library = $library;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.form-editor');
    }
}
