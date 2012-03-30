<?php

class tmcWidgetFormChoiceRenderer
{
    protected $widget;

    public function __construct(sfWidgetFormChoice $widget)
    {
        $this->widget = $widget;
        if (!$this->widget->getOption('expanded'))
        {
            throw new sfException(sprintf('The widget only renders checkboxes and radios, make sure it has the expanded option set to true'));
        }
    }
    public function render($name, $value = array(), $attributes = array(), $errors = array())
    {

        $choices = $this->widget->getChoices();
        $multiple = $this->widget->getOption('multiple');

        $html = '';
        $type = $multiple ? 'checkbox' : 'radio';

        $value = is_array($value) ? $value : array($value);
        foreach ($choices as $index => $label)
        {
            $widget = new sfWidgetFormInput(array('type' => $type), array('value' => $index));
            $widget->setParent($this->widget->getParent());

            $attributes = array();
            if (in_array($index, $value))
            {
                $attributes['checked'] = "checked";
            }
            $html .= sprintf('<label class="checkbox inline">%s %s</label>', $widget->render($name, $index, $attributes), $label);
        }

        return $html;

    }
    public function getStylesheets()
    {
        return array();
    }
    public function getJavascripts()
    {
        return array();
    }
}