<?php if(!$app['device']->isMobile() && !$app['device']->isTablet()): ?>
    <?= $view->render($params->get('navbar.style')) ?>
<?php else: ?>
    <?= $view->render($params->get('mobile.style')) ?>
    <?= $view->render($params->get('offcanvas.style')) ?>
<?php endif ?>