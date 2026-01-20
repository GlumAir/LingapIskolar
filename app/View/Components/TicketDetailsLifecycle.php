<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Ticket;


class TicketDetailsLifecycle extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array  $ticket,
        public Ticket $raw_ticket,
        public $statuses,
        public $priorities,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view("components.ticket-details-lifecycle");
    }
}
