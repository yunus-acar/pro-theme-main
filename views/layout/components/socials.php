<?php if($params->get('general.socials')): ?>
    <ul id="social-media" class="uk-navbar-item uk-grid">
        <?php foreach($params->get('general.socials') as $social): ?>
            <li><a href="<?= $social['url'] ?>" uk-icon="<?= $social['icon'] ?: 'link' ?>" target="_blank" ref="nofollow"></a></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>