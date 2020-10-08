<?php $layer = $params['protheme']->getPositionOption($params->get('positions')[$name] ?? array_merge($params['default_theme_option'] , $params['default_positions_option'])) ?>
<section <?= $layer->sectionId ?> class="<?= $layer->sectionClass ?>" <?= $layer->sectionDom ?>>
    <div <?= $layer->containerId ?> class="<?= $layer->containerClass ?>" <?= $layer->containerDom ?>>
        <div <?= $layer->positionId ?> class="<?= $layer->positionClass ?>" <?= $layer->positionDom ?>>
            <?php foreach ($widgets as $widget) : ?>
                <div>
                    <?php $layer = $params['protheme']->getWidgetOption($widget->theme) ?>
                    <div <?= $layer->cardId ?> class="<?= $layer->cardClass ?>" <?= $layer->cardDom ?>>
                        <?php if ($layer->title_hide) : ?>
                            <h4><?= $layer->alias_title ?: $widget->title ?></h4>
                        <?php endif ?>
                        <?= $widget->get('result') ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>