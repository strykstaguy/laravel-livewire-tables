<?php

namespace Rappasoft\LaravelLivewireTables\Filters;

class BaseFilter
{
    public $title;

    public $id;

    public function __construct(?string $id = null, ?string $title = null)
    {
        $this->id = $id ?? $this->getId();
        $this->title = $title;
    }

    public function selected()
    {
        $request = request();
        $selected = '';

        if (! empty(request()->has('filters'))) {
            $filters = $request->get('filters');

            if (isset($filters[$this->id])) {
                $value = $filters[$this->id];
                if ($value != "" && $value != null) {
                    $selected = $value;
                    if (is_array($selected)) {
                        foreach ($selected as $key => $value) {
                            $selected[$key] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
                        }
                    }
                }
            }
        }

        return [
            'selected' => $selected,
        ];
    }

    public function value()
    {
        return $this->selected()['selected'];
    }

    /**
     * Get filter title
     */
    public function getTitle()
    {
        if (! $this->title) {
            return $this->camelToTitle((new \ReflectionClass($this))->getShortName());
        }

        return $this->title;
    }

    public function getId()
    {
        if (! $this->id) {
            return $this->camelToDashCase((new \ReflectionClass($this))->getShortName());
        }

        return $this->id;
    }

    private function camelToTitle($camelStr)
    {
        $intermediate = preg_replace('/(?!^)([[:upper:]][[:lower:]]+)/', ' $0', $camelStr);
        $titleStr = preg_replace('/(?!^)([[:lower:]])([[:upper:]])/', '$1 $2', $intermediate);

        return $titleStr;
    }

    private function camelToDashCase($camelStr)
    {
        return strtolower(preg_replace('%([a-z])([A-Z])%', '\1-\2', $camelStr));
    }

    public function passValuesFromRequestToFilter($values)
    {
        return $values;
    }
}
