<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Counter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $value,
        public ?string $color = "green-600",
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view("components.counter");
    }

    public function getStyle(): string
    {
        $base =
            "flex flex-1 flex-col gap-1 rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm transition-all hover:shadow-md border-l-4 bg-white shadow-sm";

        $borderColor = match ($this->color) {
            "red-600" => "border-l-red-600",
            "zinc-400" => "border-l-zinc-400",
            "amber-500" => "border-l-amber-500",
            "green-600" => "border-l-green-600",
            "blue-600" => "border-l-blue-600",
            default => "border-l-green-600", // Your default
        };

        return "{$base} {$borderColor}";
    }
}
