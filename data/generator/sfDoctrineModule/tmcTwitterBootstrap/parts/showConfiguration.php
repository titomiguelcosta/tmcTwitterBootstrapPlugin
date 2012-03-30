
  protected function getConfig()
  {
    $configuration = parent::getConfig();
    $configuration['show'] = $this->getFieldsShow();
    return $configuration;
  }

  public function getShowActions()
  {
    return <?php echo $this->asPhp(isset($this->config['show']['actions']) ? $this->config['show']['actions'] : array('_list' => NULL,  '_edit' => NULL, '_delete' => NULL)) ?>;
    <?php unset($this->config['show']['actions']) ?>
  }


  public function getShowTitle()
  {
    return '<?php echo isset($this->config['show']['title']) ? $this->config['show']['title'] : 'Show '.sfInflector::humanize($this->getModuleName()) ?>';
    <?php unset($this->config['show']['title']) ?>
  }

  public function getShowDisplay()
  {
    <?php if (isset($this->config['show']['display'])): ?>
      <?php $fields = $this->config['show']['display']; ?>

      <?php foreach ($fields as $index => $field): ?>
        <?php if (is_numeric($index)): ?>
            <?php unset($fields[$index]); ?>
        <?php endif ?>
      <?php endforeach ?>

      <?php if (!is_array($fields)): ?>
        return <?php echo $this->asPhp(array('NONE' => $fields)) ?>;
      <?php else: ?>
        return <?php echo $this->asPhp($fields) ?>;
      <?php endif ?>
    <?php elseif (isset($this->config['show']['hide'])): ?>
        return <?php echo $this->asPhp(array_diff($this->getAllFieldNames(false), $this->config['show']['hide'])) ?>;
    <?php else: ?>
        return array('NONE' => <?php echo $this->asPhp($this->getAllFieldNames(false)) ?>);
    <?php endif; ?>
    <?php unset($this->config['show']['display'], $this->config['show']['hide']) ?>
  }


