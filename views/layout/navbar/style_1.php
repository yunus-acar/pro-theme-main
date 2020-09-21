<div id="desktopNavbar" class="uk-navbar-container">
    <nav class="uk-container uk-container-large" uk-navbar="<?= $params->get("theme-navbar-components") ?>">
        <div class="uk-navbar-left">
            <a class="uk-navbar-brand" href="<?= $view->url()->get() ?>" title="<?= $params->get('title') ?>">
                <img src="<?= $view->url()->getStatic($params->get('logo')) ?>" width="200" alt="<?= $params->get('title') ?>">
            </a>
            <?= $view->menu('main', 'defined/menu/navbar-nav.php') ?>
        </div>

        <div class="uk-navbar-right">
            <?php if($params->get('general.social_access.navbar')): ?>
                <?= $view->render('layout/components/socials.php') ?>
            <?php endif ?>
            <?= $view->render('layout/components/button.php') ?>
        </div>
    </nav>
</div>