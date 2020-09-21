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
    
    <?= $view->render('content') ?>

    <footer class="uk-section uk-section-xsmall uk-section-secondary">
        <div class="uk-container">
            <div class="uk-child-width-1-2@s" uk-grid>
                <?php if ($params->get('general.socials')) : ?>
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