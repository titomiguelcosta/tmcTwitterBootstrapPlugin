<?php

/**
 * tmcTwitterBootstrapPlugin configuration.
 *
 * @package     tmcTwitterBootstrapPlugin
 * @subpackage  generator
 * @author      Tito Miguel Costa <symfony@titomiguelcosta.com>
 */
class tmcTwitterBootstrapDoctrineGenerator extends sfDoctrineGenerator
{

    /**
     * Returns HTML code for a field.
     *
     * @param sfModelGeneratorConfigurationField $field The field
     *
     * @return string HTML code
     */
    public function renderField($field)
    {
        $html = $this->getColumnGetter($field->getName(), true);

        if ($renderer = $field->getRenderer())
        {
            $html = sprintf("$html ? call_user_func_array(%s, array_merge(array(%s), %s)) : '&nbsp;'", $this->asPhp($renderer), $html, $this->asPhp($field->getRendererArguments()));
        }
        else if ($field->isComponent())
        {
            return sprintf("get_component('%s', '%s', array('type' => 'list', '%s' => \$%s))", $this->getModuleName(), $field->getName(), $this->getSingularName(), $this->getSingularName());
        }
        else if ($field->isPartial())
        {
            return sprintf("get_partial('%s/%s', array('type' => 'list', '%s' => \$%s))", $this->getModuleName(), $field->getName(), $this->getSingularName(), $this->getSingularName());
        }
        else if ('Date' == $field->getType())
        {

//            $html = sprintf("false !== strtotime($html) ? format_date(%s, \"%s\") : '&nbsp;'", $html, $field->getConfig('date_format', 'f'));
        }
        else if ('Boolean' == $field->getType())
        {
            $html = sprintf("get_partial('%s/list_field_boolean', array('value' => %s))", $this->getModuleName(), $html);
        }

        if ($field->isLink())
        {
            $html = sprintf("link_to(%s, '%s', \$%s)", $html, $this->getUrlForAction('edit'), $this->getSingularName());
        }

        return $html;
    }

    /**
     * Returns the configuration for fields in a given context.
     *
     * @param  string $context The Context
     *
     * @return array An array of configuration for all the fields in a given context
     */
    public function getFieldsConfiguration($context)
    {
        $fields = array();

        $i18n_fields = $this->getTranslationFields();

        foreach ($i18n_fields as $i18n_field)
        {
            if (isset($this->config[$context]['fields']))
            {
                foreach ($this->config[$context]['fields'] as $name => $params)
                {
                    if (!array_key_exists($name, $this->config[$context]['fields']))
                    {
                        $this->config[$context]['fields'][$i18n_field] = is_array($params) ? $params : array();
                        $fields[$name] = $this->config[$context]['fields'][$i18n_field];
                    }
                }
            }
        }

        $fields = array_merge($fields, parent::getFieldsConfiguration($context));

        return $fields;
    }

    /**
     * Returns an array with the i18n fields of a model
     *
     * @return array Name of i18n fields
     */
    public function getTranslationFields()
    {
        $i18n_fields = array();
        if (Doctrine_Core::getTable($this->getModelClass())->hasRelation('Translation'))
        {
            $i18n_template = Doctrine_Core::getTable($this->getModelClass())->getTemplate('Doctrine_Template_I18n');
            $i18n_options = $i18n_template->getOptions();

            $i18n_fields = array_key_exists('fields', $i18n_options) ? $i18n_options['fields'] : array();
        }

        return $i18n_fields;
    }

}