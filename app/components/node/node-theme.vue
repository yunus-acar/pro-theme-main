<template>
    <div>
        <div v-for="(layer , id) in node.theme.layers" :key="id">
            <h3 class="uk-h1 uk-heading-line uk-margin-large-top uk-margin-large-bottom uk-text-capitalize"><span>{{id | trans}}</span></h3>
            <div class="uk-child-width-1-3@xl uk-child-width-1-3@m" uk-grid>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-card-small">
                        <div class="uk-margin">
                            <h5 class="uk-heading-divider">{{ 'Section' | trans }}</h5>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Section' | trans }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" v-model="layer.section.section">
                                    <option value="uk-section">{{ 'Default' | trans }}</option>
                                    <option value="uk-section uk-section-primary">{{ 'Primary' | trans }}</option>
                                    <option value="uk-section uk-section-secondary">{{ 'Secondary' | trans }}</option>
                                    <option value="uk-section uk-section-muted">{{ 'Muted' | trans }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Size' | trans }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" v-model="layer.section.size">
                                    <option value="">{{ 'Default' | trans }}</option>
                                    <option value="uk-section-xsmall">{{ 'XSmall' | trans }}</option>
                                    <option value="uk-section-small">{{ 'Small' | trans }}</option>
                                    <option value="uk-section-large">{{ 'Large' | trans }}</option>
                                    <option value="uk-section-xlarge">{{ 'xLarge' | trans }}</option>
                                    <option value="uk-padding-remove">{{ 'Not Size' | trans }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'ID' | trans }}</label>
                            <div class="uk-form-controls">
                                <input type="input" v-model="layer.section.id" class="uk-input">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Class' | trans }}</label>
                            <div class="uk-form-controls">
                                <input type="input" v-model="layer.section.class" class="uk-input">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'DOM' | trans }}</label>
                            <div class="uk-form-controls">
                                <textarea v-model="layer.section.dom" class="uk-height-small uk-textarea uk-width-expand" style="resize:none"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-card-small">
                        <div class="uk-margin">
                            <h5 class="uk-heading-divider">{{ 'Container' | trans }}</h5>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Container' | trans }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" v-model="layer.container.container">
                                    <option value="uk-container">{{ 'Default' | trans }}</option>
                                    <option value="uk-container uk-container-xsmall">{{ 'XSmall' | trans }}</option>
                                    <option value="uk-container uk-container-small">{{ 'Small' | trans }}</option>
                                    <option value="uk-container uk-container-large">{{ 'Large' | trans }}</option>
                                    <option value="uk-container uk-container-xlarge">{{ 'xLarge' | trans }}</option>
                                    <option value="uk-container uk-container-expand">{{ 'Expand' | trans }}</option>
                                    <option value="">{{ 'Not Container' | trans }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'ID' | trans }}</label>
                            <div class="uk-form-controls">
                                <input type="input" v-model="layer.container.id" class="uk-input">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Class' | trans }}</label>
                            <div class="uk-form-controls">
                                <input type="input" v-model="layer.container.class" class="uk-input">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'DOM' | trans }}</label>
                            <div class="uk-form-controls">
                                <textarea v-model="layer.container.dom" class="uk-height-small uk-textarea uk-width-expand" style="resize:none"></textarea>
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
                                <input-image-meta v-model="layer.background.image" :image.sync="layer.background.image" class="pk-image-max-height" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Size' | trans }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" v-model="layer.background.size" :disabled="!layer.background.image.src">
                                    <option value="uk-background-cover">{{ 'Cover' | trans }}</option>
                                    <option value="uk-background-contain">{{ 'Contain' | trans }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Blend' | trans }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" v-model="layer.background.blend" :disabled="!layer.background.image.src">
                                    <option v-for="(blend , id) in getBlends" :key="id" :value="id">{{blend}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Position' | trans }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" v-model="layer.background.position" :disabled="!layer.background.image.src">
                                    <option v-for="(position , id) in getPositions" :key="id" :value="id">{{position}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-margin uk-grid-small uk-grid-divider uk-child-width-1-2" uk-grid>
                            <div class="uk-text-center"><label class="uk-form-label"><input type="checkbox" class="uk-checkbox uk-margin-small-right" v-model="layer.background.repeat" :disabled="!layer.background.image.src">{{ 'Repeat' | trans }}</label></div>
                            <div class="uk-text-center"><label class="uk-form-label"><input type="checkbox" class="uk-checkbox uk-margin-small-right" v-model="layer.background.fixed" :disabled="!layer.background.image.src">{{ 'Fixed' | trans }}</label></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const Theme = {
    props: ['node'],

    mixins: [Define],

    section:{
        label: 'Layers',
        priority: 15
    }
}

import Define from './define'

export default Theme

window.Site.components['node-theme'] = Theme
</script>