<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class PaginationControl extends Component
{
    public $paginator;
    public $perPageBinding;

    public function __construct(LengthAwarePaginator $paginator, $perPageBinding)
    {
        $this->paginator = $paginator;
        $this->perPageBinding = $perPageBinding;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pagination-control');
    }
}
