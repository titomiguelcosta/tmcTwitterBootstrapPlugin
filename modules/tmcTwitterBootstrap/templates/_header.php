<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="<?php echo url_for("@homepage") ?>"><?php echo sfConfig::get('app_tmcTwitterBootstrapPlugin_dashboard_name', 'Administration') ?></a>
            <?php if ($sf_user->isAuthenticated()): ?>
            <div class="nav-collapse">
                <ul class="nav">
                    <?php foreach ($menus as $k => $menu): ?>
                        <?php $is_current_module = false; ?>
                        <?php $is_current_route = false; ?>
                        <?php if (isset($menu['module_name']) && $menu['module_name'] == $sf_context->getModuleName()): ?>
                            <?php $is_current_module = true; ?>
                        <?php endif; ?>

                        <?php $credentials = isset($menu['credentials']) ? $menu['credentials'] : null; ?>
                        <?php if ($credentials): ?>
                            <?php if (!$sf_user->hasCredential($credentials)): ?>
                                <?php continue; ?>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (!array_key_exists('dropdown', $menu)): ?>
                            <?php $name = $k; ?>
                            <?php $route = $menu['route']; ?>
                            <?php if (!array_key_exists($route, $routes)): ?>
                                <?php continue; ?>
                            <?php endif; ?>
                            <?php $is_current_route = preg_match('/^'.$route.'/', $current_route) ?>
                            <li class="<?php echo $is_current_route || $is_current_module ? 'active' : '' ?>"><a href="<?php echo url_for('@' . $route); ?>"><?php echo __($name) ?></a></li>
                        <?php else: ?>
                            <?php $submenus = $menu['dropdown']; ?>
                            <li class="dropdown <?php echo $is_current_route || $is_current_module ? 'active' : '' ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __($k) ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <?php foreach ($submenus as $k => $menu): ?>
                                        <?php $name = $k; ?>
                                        <?php $route = $menu['route']; ?>
                                        <?php $divider = isset($menu['divider']) ? $menu['divider'] : null; ?>
                                        <?php $credentials = isset($menu['credentials']) ? $menu['credentials'] : null; ?>
                                        <?php if ($credentials): ?>
                                            <?php if (!$sf_user->hasCredential($credentials)): ?>
                                                <?php continue; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if (!array_key_exists($route, $routes)): ?>
                                            <?php continue; ?>
                                        <?php endif; ?>
                                        <?php $is_current_route = preg_match('/^'.$route.'/', $current_route) ?>
                                        <li class="<?php echo $is_current_route ? 'active' : '' ?>"><a href="<?php echo url_for('@' . $route); ?>"><?php echo __($name) ?></a></li>
                                        <?php if ($divider): ?>
                                            <li class="divider"></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <p class="navbar-text pull-right"><?php echo __('Logged in as', null, 'tmcTwitterBootstrapPlugin') ?> <a href="<?php echo url_for(sfConfig::get('app_tmcTwitterBootstrapPlugin_profile_route', '@homepage?username=').$sf_user->getGuardUser()->getUsername()) ?>"><?php echo $sf_user->getGuardUser() ?></a> | <a href="<?php echo url_for('@sf_guard_signout') ?>"><?php echo __('Logout', null, 'tmcTwitterBootstrapPlugin') ?></a></p>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>