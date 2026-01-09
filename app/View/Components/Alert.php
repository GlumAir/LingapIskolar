<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public ?string $icon,
        public string $type = "info",
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view("components.alert");
    }

    public function getStyle(): string
    {
        $base = "alert flex w-full flex-row gap-2 rounded-3xl border-2 p-4";

        $colors = match ($this->type) {
            "danger" => "border-red-800 bg-red-100 text-red-800",
            "warning" => "border-yellow-800 bg-yellow-100 text-yellow-800",
            "success" => "border-green-800 bg-green-100 text-green-800",
            "info" => "border-blue-800 bg-blue-100 text-blue-800",
            default => "border-blue-800 bg-blue-100 text-blue-800",
        };

        return $base . " " . $colors;
    }

    public function getIcon(): string
    {
        $base = "bi";

        if ($this->icon) {
            return $base . " " . $this->icon;
        }

        $icons = match ($this->type) {
            "danger" => "bi-x-circle",
            "warning" => "bi-exclamation-triangle-fill",
            "success" => "bi-check-circle-fill",
            "info" => "bi-info-circle-fill",
            default => "bi-info-circle-fill",
        };

        return $base . " " . $icons;
    }
}
