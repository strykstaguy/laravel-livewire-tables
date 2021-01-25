<?php

namespace Rappasoft\LaravelLivewireTables\Filters;

use Rappasoft\LaravelLivewireTables\Filters\Traits\HasOptions;

class ButtonFilter extends BaseFilter
{
    use HasOptions;

    public $type = 'button';

    public $view = 'button-filter';
}
