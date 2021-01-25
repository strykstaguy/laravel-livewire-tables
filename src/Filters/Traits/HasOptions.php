<?php

namespace Rappasoft\LaravelLivewireTables\Filters\Traits;

trait HasOptions
{
    /**
     * @var array|Illuminate\Support\Collection
     */
    public $options = [];

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return self
     */
    public function addOption(string $key, $value): self
    {
        $this->options[$key] = $value;

        return $this;
    }

    /**
     * @param array|Illuminate\Support\Collection $options
     * @return self
     */
    public function withOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return array|Illuminate\Support\Collection
     */
    public function options()
    {
        return $this->options;
    }
}
