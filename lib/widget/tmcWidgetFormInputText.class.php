<?php

class tmcWidgetFormInputText extends sfWidgetFormInputText
{

    /**
     * Configures the current widget.
     *
     * @param array $options     An array of options
     * @param array $attributes  An array of default HTML attributes
     *
     * @see sfWidgetForm
     */
    protected function configure($options = array(), $attributes = array())
    {
        parent::configure($options, $attributes);

        $this->addOption('prepend_text', false);
        $this->addOption('append_text', false);
    }

    /**
     * Renders the widget.
     *
     * @param  string $name        The element name
     * @param  string $value       The value displayed in this widget
     * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
     * @param  array  $errors      An array of errors for the field
     *
     * @return string An HTML tag string
     *
     * @see sfWidgetForm
     */
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        $widget = parent::render($name, $value, $attributes, $errors);

        $class = '';

        if ($this->getOption('prepend_text'))
        {
            $widget = sprintf('<span class="add-on">%s</span>%s', $this->getOption('prepend_text'), $widget);
            $class .= 'input-prepend';
        }
        if ($this->getOption('append_text'))
        {
            $widget = sprintf('%s<span class="add-on">%s</span>', $widget, $this->getOption('append_text'));
            $class .= ' input-append';
        }

        if ($class)
        {
            $widget = sprintf('<div class="text-%s %s">%s</div>', $this->generateId($name), trim($class), $widget);
        }

        return $widget;
    }
}