<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $href = null,
        public string $type = "button",
        public string $variant = "primary",
        public string $size = "md",
        public ?bool $extend = false,
        public ?string $height = "",
    ) {
        // Added size prop
    }

    public function getStyles(): string
    {
        $base =
            "inline-flex items-center justify-center text-center rounded-full border font-bold transition ease-in-out duration-150 self-center shadow-sm active:scale-95";

        $sizes = match ($this->size) {
            "sm" => "px-4 py-1.5 text-xs min-w-24",
            "lg" => "px-8 py-3 text-lg min-w-64",
            default => "px-6 py-2 text-sm min-w-48", // Your current standard
        };

        $colors = match ($this->variant) {
            "primary"
                => "bg-red-800 hover:bg-red-700 text-white border-transparent",
            "secondary"
                => "bg-white hover:bg-zinc-50 text-red-800 border-red-800 border-2",
            "danger"
                => "bg-rose-600 hover:bg-rose-500 text-white border-transparent",
            "green"
                => "bg-green-600 hover:bg-green-500 text-white border-transparent",
            "ghost"
                => "bg-transparent hover:bg-zinc-100 text-zinc-600 border-transparent",
            default => "bg-red-800 text-white border-transparent",
        };

        return $this->extend
            ? "{$base} {$sizes} {$colors} {$this->height} w-full"
            : "{$base} {$sizes} {$colors} {$this->height}";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view("components.button");
    }
}
