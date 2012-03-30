<?php

/**
 * Project doctrine form base class.
 *
 * @package    tmcTwitterBootstrapPlugin
 * @subpackage form
 * @author     Tito Miguel Costa <symfony@titomiguelcosta.com>
 */
abstract class tmcTwitterBootstrapFormDoctrine extends sfFormDoctrine
{

    public function setup()
    {
        foreach ($this->getWidgetSchema()->getFields() as $name => $field)
        {
            if ($field instanceof sfWidgetFormInputText)
            {
                $this->getWidget($name)->setAttribute('class', 'input-xlarge');
            }
            if ($field instanceof sfWidgetFormTextArea)
            {
                $this->getWidget($name)->setAttribute('class', 'richtext');
            }
            if ($field instanceof sfWidgetFormDate)
            {
                $this->widgetSchema[$name]->setOption('format', '%year%-%month%-%day%');
                $this->getWidget($name)->setAttribute('class', 'date');
            }

            if (in_array($name, $this->getUnsetFields()))
            {
                unset($this[$name]);
            }

            if ($this->isI18n())
            {
                $this->embedI18n(array_keys(sfConfig::get('app_langs_enabled', array())));
            }

            $this->getWidgetSchema()->getFormFormatter()->setTranslationCatalogue('messages');
        }
    }

    protected function getUnsetFields()
    {
        array('slug', 'created_at', 'updated_at', 'created_by', 'updated_by');
    }

}