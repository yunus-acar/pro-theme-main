<div id="desktopNavbar" class="uk-navbar-container">
    <nav class="uk-container uk-container-large" uk-navbar="<?= $params->get("theme-navbar-components") ?>">
        <div class="uk-navbar-left">
            <?php if ($params->get('general.social_access.navbar')) : ?>
                <?= $view->render('layout/components/socials.php') ?>
            <?php endif ?>
            <?= $view->render('layout/components/button.php') ?>
        </div>

        <div class="uk-navbar-center">
            <a class="uk-navbar-brand" href="<?= $view->url()->get() ?>" title="<?= $params->get('title') ?>">
                <img src="<?= $view->url()->getStatic($params->get('logo')) ?>" width="200" alt="<?= $params->get('title') ?>">
            </a>
        </div>

        <div class="uk-navbar-right">
            <a class="uk-navbar-item" href="#navbar-style3-modal" uk-toggle>
                <span uk-icon="icon:menu;ratio:1.4"></span>
            </a>
        </div>
    </nav>
</div>

<div id="navbar-style3-modal" class="uk-modal-full" uk-modal>
    <div class="uk-modal-dialog">
        <div uk-height-viewport>
            <div class="uk-navbar-container uk-navbar-transparent">
                <nav class="uk-container uk-container-large" uk-navbar="<?= $params->get("theme-navbar-components") ?>">
                    <div class="uk-navbar-left">
                        <?php if ($params->get('general.social_access.navbar')) : ?>
                            <?= $view->render('layout/components/socials.php') ?>
                        <?php endif ?>
                        <?= $view->render('layout/components/button.php') ?>
                    </div>

                    <div class="uk-navbar-center">
                        <a class="uk-navbar-brand" href="<?= $view->url()->get() ?>" title="<?= $params->get('title') ?>">
                            <img src="<?= $view->url()->getStatic($params->get('logo')) ?>" width="200" alt="<?= $params->get('title') ?>">
                        </a>
                    </div>

                    <div class="uk-navbar-right">
                        <a class="uk-navbar-item" href="#navbar-style3-modal" uk-toggle>
                            <span uk-icon="icon:close;ratio:1.4"></span>
                        </a>
                    </div>
                </nav>
            </div>
            <div class="uk-section uk-section-large uk-flex uk-flex-middle uk-flex-center">
                <div uk-scrollspy="cls: uk-animation-slide-bottom; target: li , p; delay: 100; repeat: true">
                    <?= $view->menu('main', 'defined/menu/nav-nav.php', ['class' => 'uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical']) ?>
                    <?php if ($view->menu()->exists('second')) : ?>
                        <p class="uk-margin-top uk-text-center uk-text-uppercase uk-text-small"><?= __('Other Menu') ?></p>
                        <?= $view->menu('second', 'defined/menu/nav-nav.php', ['class' => 'uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical']) ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>