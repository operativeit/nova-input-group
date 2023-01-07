<?php

namespace EomPlus\NovaInputGroup;

use Laravel\Nova\Fields\Field;

class InputGroup extends Field
{
    protected $position = 'before';

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-group';

    /**
     * Set the heroicon to be appended
     *
     * @param string $text
     * @return $this
     */
    public function appendIcon(string $text, $position = 'before')
    {
        return $this->withMeta(['appendIcon' => $text, 'appendIconPosition' => $position]);
    }

    /**
     * Set the heroicon to be prepended
     *
     * @param string $text
     * @return $this
     */
    public function prependIcon(string $text, $position = 'before')
    {
        return $this->withMeta(['prependIcon' => $text, 'prependIconPosition' => $position]);
    }

    /**
     * Render the text as HTML
     *
     * @param string $text
     * @return $this
     */
    public function asHtml()
    {
        return $this->withMeta(['asHtml' => true]);
    }

    /**
     * Set the text to be appended.
     *
     * @param string $text
     * @return $this
     */
    public function append(string $text)
    {
        return $this->withMeta(['append' => $text]);
    }

    /**
     * Set the text to be prepended.
     *
     * @param string $text
     * @return $this
     */
    public function prepend(string $text)
    {
        return $this->withMeta(['prepend' => $text]);
    }

    /**
     * Set extra CSS classes to be prepended
     *
     * @param string $text
     * @return $this
     */
    public function prependExtraClasses(string $extraClasses)
    {
        return $this->withMeta(['prependExtraClasses' => $extraClasses]);
    }

    /**
     *  Set extra CSS classes to be appended
     *
     * @param string $text
     * @return $this
     */
    public function appendExtraClasses(string $extraClasses)
    {
        return $this->withMeta(['appendExtraClasses' => $extraClasses]);
    }

    /**
     * Set the position where the prefix/suffix must be placed
     *
     * @param string $position
     * @return $this
     * @deprecated use only for backward compatibility 
     */
    public function position(string $position)
    {
        $this->position = $position;
    }

    /**
     * Set the text to be displayed
     *
     * @param string $text
     * @return $this
     * @deprecated use only for backward compatibility
     */
    public function text(string $value)
    {
        if ($this->position == 'before') {
            return $this->withMeta(['prepend' => $value]);
        } else if ($this->position == 'after') {
            return $this->withMeta(['append' => $value]);
        }
    }

}
