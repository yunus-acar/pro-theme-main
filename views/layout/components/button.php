<?php if($params->get('general.navbar_button.active')): ?>
    <div class="<?= isset($not_navbar) && $not_navbar ? null:'uk-navbar-item uk-margin-left' ?>">
        <a id="navbar-button" href="<?= $params->get('general.navbar_button.url') ?>" class="uk-button uk-button-primary"><?= $params->get('general.navbar_button.title') ?></a>
    </div>
<?php endif ?>