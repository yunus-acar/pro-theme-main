<?php $view->script('theme-configure', 'theme:app/bundle/theme-configure.js', ['vue' , 'input-tree' , 'editor']) ?>
<style>
    .uk-tab > * > a{
        text-transform: none;
    }
</style>
<form id="app" @submit.prevent="save" v-cloak>
    <div uk-grid>
        <div class="uk-width-medium@m" v-show="sections.length > 1">
            <div class="uk-panel">
                <ul class="uk-tab uk-tab-left" ref="tab" id="tab">
                    <li v-for="section in sections" :key="section.name"><a>{{ section.label | trans }}</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-width-expand@m">
            <div ref="content" class="uk-switcher uk-margin" id="content">
                <div v-for="section in sections" :key="section.name">
                    <div class="uk-child-width-1-2 uk-margin-bottom" uk-grid>
                        <div class="uk-text-left">
                            <h1 class="uk-h3 uk-margin-remove">{{ section.label | trans }}</h1>
                        </div>
                        <div class="uk-text-right">
                            <button type="submit" class="uk-button uk-button-primary">{{ 'Save' | trans }}</button>
                        </div>
                    </div>
                    <component :is="section.name" :config.sync="config" :options.sync="options" :name="name"></component>
                </div>
            </div>
        </div>
    </div>
</form>