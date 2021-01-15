<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    /**
     * The todo card data.
     *
     * @var string
     */
     public $cardData;


    /**
     * The todo card status.
     *
     * @var string
     */
    public $status;


    /**
     * The todo card icon.
     *
     * @var string
     */
    public $icon;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cardData)
    {
        $this->cardData = $cardData;
        $this->setStatus();
        $this->setIcon();
    }


    public function setStatus()
    {
        $this->status = config("todo.status_class.{$this->cardData->status}");
    }


    public function setIcon()
    {
        $this->icon = config("todo.status_icon.{$this->cardData->status}");
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
