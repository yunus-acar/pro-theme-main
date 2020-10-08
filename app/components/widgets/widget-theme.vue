<template>
    <div>
        <div class="uk-child-width-1-2@xl uk-child-width-1-2@m" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body uk-card-small">
                    <div class="uk-margin">
                        <h5 class="uk-heading-divider">{{ 'Card' | trans }}</h5>
                    </div>
                    
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Alias Title' | trans }}</label>
                        <div class="uk-form-controls">
                            <input v-model="widget.theme.alias_title" class="uk-input" type="text" :placeholder="widget.title">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-form-controls uk-form-controls-text">
                            <label class="uk-form-label"><input v-model="widget.theme.title_hide" class="uk-checkbox" type="checkbox"> {{ 'Show Title' | trans }}</label>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Card' | trans }}</label>
                        <div class="uk-form-controls">
                            <select class="uk-select" v-model="widget.theme.card.card">
                                <option value="uk-card">{{ 'Default' | trans }}</option>
                                <option value="uk-card uk-card-primary">{{ 'Primary' | trans }}</option>
                                <option value="uk-card uk-card-secondary">{{ 'Secondary' | trans }}</option>
                                <option value="uk-card uk-card-muted">{{ 'Muted' | trans }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Size' | trans }}</label>
                        <div class="uk-form-controls">
                            <select class="uk-select" v-model="widget.theme.card.size">
                                <option value="uk-card-body">{{ 'Default' | trans }}</option>
                                <option value="uk-card-body uk-card-small">{{ 'Small' | trans }}</option>
                                <option value="uk-card-body uk-card-large">{{ 'Large' | trans }}</option>
                                <option value="uk-padding-remove">{{ 'Not Size' | trans }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'ID' | trans }}</label>
                        <div class="uk-form-controls">
                            <input type="input" v-model="widget.theme.card.id" class="uk-input">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Class' | trans }}</label>
                        <div class="uk-form-controls">
                            <input type="input" v-model="widget.theme.card.class" class="uk-input">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'DOM' | trans }}</label>
                        <div class="uk-form-controls">
                            <textarea v-model="widget.theme.card.dom" class="uk-height-small uk-textarea uk-width-expand" style="resize:none"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body uk-card-small">
                    <div class="uk-margin">
                        <h5 class="uk-heading-divider">{{ 'Background' | trans }}</h5>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Image' | trans }}</label>
                        <div class="uk-form-controls">
                            <input-image-meta v-model="widget.theme.background.image" :image.sync="widget.theme.background.image" class="pk-image-max-height" />
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Size' | trans }}</label>
                        <div class="uk-form-controls">
                            <select class="uk-select" v-model="widget.theme.background.size" :disabled="!widget.theme.background.image.src">
                                <option value="uk-background-cover">{{ 'Cover' | trans }}</option>
                                <option value="uk-background-contain">{{ 'Contain' | trans }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Blend' | trans }}</label>
                        <div class="uk-form-controls">
                            <select class="uk-select" v-model="widget.theme.background.blend" :disabled="!widget.theme.background.image.src">
                                <option v-for="(blend , id) in getBlends" :key="id" :value="id">{{blend}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Position' | trans }}</label>
                        <div class="uk-form-controls">
                            <select class="uk-select" v-model="widget.theme.background.position" :disabled="!widget.theme.background.image.src">
                                <option v-for="(position , id) in getPositions" :key="id" :value="id">{{position}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin uk-grid-small uk-grid-divider uk-child-width-1-2" uk-grid>
                        <div class="uk-text-center"><label class="uk-form-label"><input type="checkbox" class="uk-checkbox uk-margin-small-right" v-model="widget.theme.background.repeat" :disabled="!widget.theme.background.image.src">{{ 'Repeat' | trans }}</label></div>
                        <div class="uk-text-center"><label class="uk-form-label"><input type="checkbox" class="uk-checkbox uk-margin-small-right" v-model="widget.theme.background.fixed" :disabled="!widget.theme.background.image.src">{{ 'Fixed' | trans }}</label></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    const Theme = {
        props: ['widget'],

        section: {
            label: 'Theme',
            priority: 10
        },

        mixins: [Computed]
    }
    import Computed from '../node/computed'
    export default Theme

    window.Widgets.components['widget-theme'] = Theme;
</script>