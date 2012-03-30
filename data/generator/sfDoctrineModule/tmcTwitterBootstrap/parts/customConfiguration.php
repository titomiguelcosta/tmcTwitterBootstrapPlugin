public function getGlobalSidebarStatus() {
    return <?php echo $this->asPhp(isset($this->config['sidebar']) ? $this->config['sidebar'] : false) ?>;
    <?php unset($this->config['sidebar']) ?>
}
public function getListSidebarStatus() {
    return <?php echo isset($this->config['list']['sidebar']) ? $this->asPhp($this->config['list']['sidebar']) : '$this->getGlobalSidebarStatus()' ?>;
    <?php unset($this->config['list']['sidebar']) ?>
}
public function getShowSidebarStatus() {
    return <?php echo isset($this->config['show']['sidebar']) ? $this->asPhp($this->config['show']['sidebar']) : '$this->getGlobalSidebarStatus()' ?>;
    <?php unset($this->config['show']['sidebar']) ?>
}
public function getEditSidebarStatus() {
    return <?php echo isset($this->config['edit']['sidebar']) ? $this->asPhp($this->config['edit']['sidebar']) : '$this->getGlobalSidebarStatus()' ?>;
    <?php unset($this->config['edit']['sidebar']) ?>
}
public function getNewSidebarStatus() {
    return <?php echo isset($this->config['new']['sidebar']) ? $this->asPhp($this->config['new']['sidebar']) : '$this->getGlobalSidebarStatus()' ?>;
    <?php unset($this->config['new']['sidebar']) ?>
}