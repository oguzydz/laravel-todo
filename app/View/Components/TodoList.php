<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TodoList extends Component
{
    /**
     * The todo listing type.
     *
     * @var string
     */
    public $type;

    /**
     * The todo listing data.
     *
     * @var string
     */
    public $todoData;

    /**
     * The todo listing title.
     *
     * @var string
     */
    public $title;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $todoData, $title)
    {
        $this->type = $type;
        $this->todoData = $todoData;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.todo-list');
    }
}
