<?php foreach ($widgets as $widget) : ?>
    <div class="uk-margin-bottom">
        <?php $layer = $params['protheme']->getWidgetOption($widget->theme) ?>
        <div <?= $layer->cardId ?> class="<?= $layer->cardClass ?>" <?= $layer->cardDom ?>>
            <?php if ($layer->title_hide) : ?>
                <h4><?= $layer->alias_title ?: $widget->title ?></h4>
            <?php endif ?>
            <?= $widget->get('result') ?>
        </div>
    </div>
<?php endforeach ?>