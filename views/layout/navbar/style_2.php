<div id="desktopNavbar" class="uk-navbar-container">
    <nav class="uk-container uk-container-large" uk-navbar="<?= $params->get("theme-navbar-components") ?>">
        <div class="uk-navbar-left">
            <?php if ($params->get('general.social_access.navbar')) : ?>
                <?= $view->render('layout/components/socials.php') ?>
            <?php endif ?>
        </div>

        <div class="uk-navbar-center">
            <?= $view->menu('main', 'defined/menu/navbar-nav.php') ?>
            <a class="uk-navbar-brand" href="<?= $view->url()->get() ?>" title="<?= $params->get('title') ?>">
                <img src="<?= $view->url()->getStatic($params->get('logo')) ?>" width="200" alt="<?= $params->get('title') ?>">
            </a>
            <?= $view->menu('second', 'defined/menu/navbar-nav.php') ?>
        </div>

        <div class="uk-navbar-right">
            <?= $view->render('layout/components/button.php') ?>
        </div>
    </nav>
</div>