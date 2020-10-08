<!DOCTYPE html>
<html lang="<?= str_replace('_', '-', $app['translator']->getLocale()) ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $view->render('head') ?>
    <?php $view->style('theme', 'theme:assets/dist/css/pro.theme.main.min.css') ?>
    <?php $view->script('theme', 'theme:app/bundle/theme.js') ?>
</head>

<body>
    <?= $view->render('layout/navbar/nav.php') ?>

    <?php if ($params['protheme']->existsPosition('top')) : ?>
        <?php $layer = $params['protheme']->getLayer($params->get('layers.top')) ?>
        <section <?= $layer->sectionId ?> class="<?= $layer->sectionClass ?>" <?= $layer->sectionDom ?>>
            <div <?= $layer->containerId ?> class="<?= $layer->containerClass ?>" <?= $layer->containerDom ?>>
                <?php foreach ($params['protheme']->getPosition('top') as $name => $values) : ?>
                    <?php if ($view->position()->exists($name)) : ?>
                        <?= $view->position($name, 'layout/position/position.php', compact('name')) ?>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </section>
    <?php endif ?>

    <?php $layer = $params['protheme']->getLayer($params->get('layers.main')) ?>
    <section <?= $layer->sectionId ?> class="<?= $layer->sectionClass ?>" <?= $layer->sectionDom ?>>
        <div <?= $layer->containerId ?> class="<?= $layer->containerClass ?>" <?= $layer->containerDom ?>>
            <div uk-grid>
                <main class="uk-width-expand@m">
                    <?php if ($view->position()->exists('contenttop')) : ?>
                        <?= $view->position('contenttop', 'layout/position/position.php', ['name' => 'contenttop']) ?>
                    <?php endif ?>
                    <div>
                        <?= $view->render('content') ?>
                    </div>
                    <?php if ($view->position()->exists('contentbottom')) : ?>
                        <?= $view->position('contentbottom', 'layout/position/position.php', ['name' => 'contentbottom']) ?>
                    <?php endif ?>
                </main>
                <?php if ($view->position()->exists('sidebarright')) : ?>
                    <div class="uk-width-medium@m">
                        <?= $view->position('sidebarright', 'layout/position/sidebar.php') ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>

    <?php if ($params['protheme']->existsPosition('bottom')) : ?>
        <?php $layer = $params['protheme']->getLayer($params->get('layers.bottom')) ?>
        <section <?= $layer->sectionId ?> class="<?= $layer->sectionClass ?>" <?= $layer->sectionDom ?>>
            <div <?= $layer->containerId ?> class="<?= $layer->containerClass ?>" <?= $layer->containerDom ?>>
                <?php foreach ($params['protheme']->getPosition('bottom') as $name => $values) : ?>
                    <?php if ($view->position()->exists($name)) : ?>
                        <?= $view->position($name, 'layout/position/position.php', compact('name')) ?>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </section>
    <?php endif ?>

    <?php if ($view->position()->exists('footer')) : ?>
        <?php $layer = $params['protheme']->getLayer($params->get('layers.footer')) ?>
        <section <?= $layer->sectionId ?> class="<?= $layer->sectionClass ?>" <?= $layer->sectionDom ?>>
            <div <?= $layer->containerId ?> class="<?= $layer->containerClass ?>" <?= $layer->containerDom ?>>        
                <?= $view->position('footer', 'layout/position/position.php', ['name' => 'footer']) ?>
            </div>
        </section>
    <?php endif ?>

    <footer class="uk-section uk-section-xsmall uk-section-secondary">
        <div class="uk-container">
            <div class="uk-child-width-1-2@s" uk-grid>
                <?php if ($params->get('general.socials') && $params->get('general.social_access.footer')) : ?>
                    <div class="uk-flex uk-flex-right@s uk-flex-center">
                        <ul id="social-media-footer" class="uk-grid">
                            <?php foreach ($params->get('general.socials') as $social) : ?>
                                <li><a href="<?= $social['url'] ?>" uk-icon="<?= $social['icon'] ?: 'link' ?>" target="_blank" ref="nofollow"></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>
                <div class="uk-flex uk-flex-left@s uk-flex-center uk-flex-first@s">
                    <p class="uk-text-small uk-text-left@s uk-text-center"><?= __('%heart% Made by %brand% with love and caffeine.', ['%heart%' => '💚', '%brand%' => '<a href="https://greencheap.net" target="_blank">GreenCheap</a>']) ?></p>
                </div>
            </div>
        </div>
    </footer>
    <?= $view->render('footer') ?>
</body>

</html>