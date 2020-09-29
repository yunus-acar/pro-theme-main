<template>
    <div>
        <div v-for="(theme , id) in themeOptions.positions" :key="id">
            <h3 class="uk-h1 uk-heading-line uk-margin-large-top uk-margin-large-bottom"><span>{{getPositionName(id)}}</span></h3>
            <div class="uk-child-width-1-4@xl uk-child-width-1-3@m" uk-grid="masonry:true;parallax: 500">
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-card-small">
                        <div class="uk-margin">
                            <h5 class="uk-heading-divider">{{ 'Grids' | trans }} <label class="uk-float-right"><input type="checkbox" class="uk-checkbox" v-model="theme.stacked"> {{ 'Use Stacked' | trans }}</label></h5>
                        </div>
                        <div v-if="theme.stacked" class="uk-padding uk-text-center">
                            <p class="uk-text-meta">{{ 'You cannot use the grid structure because you choose the Stacked option.' | trans }}</p>
                            <button class="uk-button uk-button-primary uk-button-small" @click.prevent="useGrid(id)">{{ 'Use Grid' | trans }}</button>
                        </div>
                        <div v-else>
                            <div class="uk-margin">
                                <label class="uk-form-label">{{ 'XLarge Desktop' | trans }}</label>
                                <div class="uk-form-controls-text">
                                    <select class="uk-select" v-model="theme.grids['@xl']">
                                        <option value="uk-child-width-1-1">1-1</option>
                                        <option value="uk-child-width-1-2">1-2</option>
                                        <option value="uk-child-width-1-3">1-3</option>
                                        <option value="uk-child-width-1-4">1-4</option>
                                        <option value="uk-child-width-1-5">1-5</option>
                                        <option value="uk-child-width-1-6">1-6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">{{ 'Desktop' | trans }}</label>
                                <div class="uk-form-controls-text">
                                    <select class="uk-select" v-model="theme.grids['@l']">
                                        <option value="uk-child-width-1-1">1-1</option>
                                        <option value="uk-child-width-1-2">1-2</option>
                                        <option value="uk-child-width-1-3">1-3</option>
                                        <option value="uk-child-width-1-4">1-4</option>
                                        <option value="uk-child-width-1-5">1-5</option>
                                        <option value="uk-child-width-1-6">1-6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">{{ 'Tablet' | trans }}</label>
                                <div class="uk-form-controls-text">
                                    <select class="uk-select" v-model="theme.grids['@m']">
                                        <option value="uk-child-width-1-1">1-1</option>
                                        <option value="uk-child-width-1-2">1-2</option>
                                        <option value="uk-child-width-1-3">1-3</option>
                                        <option value="uk-child-width-1-4">1-4</option>
                                        <option value="uk-child-width-1-5">1-5</option>
                                        <option value="uk-child-width-1-6">1-6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">{{ 'Phone' | trans }}</label>
                                <div class="uk-form-controls-text">
                                    <select class="uk-select" v-model="theme.grids['@s']">
                                        <option value="uk-child-width-1-1">1-1</option>
                                        <option value="uk-child-width-1-2">1-2</option>
                                        <option value="uk-child-width-1-3">1-3</option>
                                        <option value="uk-child-width-1-4">1-4</option>
                                        <option value="uk-child-width-1-5">1-5</option>
                                        <option value="uk-child-width-1-6">1-6</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="!theme.stacked">
                    <div class="uk-card uk-card-default uk-card-body uk-card-small">
                        <div class="uk-margin">
                            <h5 class="uk-heading-divider">{{ 'Grid Option' | trans }}</h5>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Gap' | trans }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" v-model="theme.grid_config.gap">
                                    <option value="">{{ 'Default' | trans }}</option>
                                    <option value="uk-grid-small">{{ 'Small' | trans }}</option>
                                    <option value="uk-grid-medium">{{ 'Medium' | trans }}</option>
                                    <option value="uk-grid-large">{{ 'Large' | trans }}</option>
                                    <option value="uk-grid-collapse">{{ 'Collapse' | trans }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-margin uk-grid-small uk-grid-divider uk-child-width-1-3" uk-grid>
                            <div class="uk-text-center"><label class="uk-form-label"><input type="checkbox" class="uk-checkbox uk-margin-small-right" v-model="theme.grid_config.divider">{{ 'Divider' | trans }}</label></div>
                            <div class="uk-text-center"><label class="uk-form-label"><input type="checkbox" class="uk-checkbox uk-margin-small-right" v-model="theme.grid_config.match">{{ 'Match' | trans }}</label></div>
                            <div class="uk-text-center"><label class="uk-form-label"><input type="checkbox" class="uk-checkbox uk-margin-small-right" v-model="theme.grid_config.masonry">{{ 'Masonry' | trans }}</label></div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Parallax Effect' | trans }}</label>
                            <div class="uk-form-controls">
                                <input type="number" class="uk-input" v-model="theme.grid_config.parallax" :disabled="!theme.grid_config.masonry" required>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'ID' | trans }}</label>
                            <div class="uk-form-controls">
                                <input type="input" v-model="theme.grid_config.id" class="uk-input">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Class' | trans }}</label>
                            <div class="uk-form-controls">
                                <input type="input" v-model="theme.grid_config.class" class="uk-input">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'DOM' | trans }}</label>
                            <div class="uk-form-controls">
                                <v-editor v-model="theme.grid_config.dom" :options="{height:100}" type="code"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-card-small">
                        <div class="uk-margin">
                            <h5 class="uk-heading-divider">{{ 'Section' | trans }}</h5>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Section' | trans }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" v-model="theme.section.section">
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
                                <select class="uk-select" v-model="theme.section.size">
                                    <option value="">{{ 'Default' | trans }}</option>
                                    <option value="uk-section-xsmall">{{ 'XSmall' | trans }}</option>
                                    <option value="uk-section-small">{{ 'Small' | trans }}</option>
                                    <option value="uk-section-large">{{ 'Large' | trans }}</option>
                                    <option value="uk-section-xlarge">{{ 'xLarge' | trans }}</option>
                                    <option value="uk-padding-remove">{{ 'Remove' | trans }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'ID' | trans }}</label>
                            <div class="uk-form-controls">
                                <input type="input" v-model="theme.section.id" class="uk-input">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Class' | trans }}</label>
                            <div class="uk-form-controls">
                                <input type="input" v-model="theme.section.class" class="uk-input">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'DOM' | trans }}</label>
                            <div class="uk-form-controls">
                                <v-editor v-model="theme.section.dom" :options="{height:100}" type="code"/>
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
                                <select class="uk-select" v-model="theme.container.container">
                                    <option value="uk-container">{{ 'Default' | trans }}</option>
                                    <option value="uk-container uk-container-xsmall">{{ 'XSmall' | trans }}</option>
                                    <option value="uk-container uk-container-small">{{ 'Small' | trans }}</option>
                                    <option value="uk-container uk-container-large">{{ 'Large' | trans }}</option>
                                    <option value="uk-container uk-container-xlarge">{{ 'xLarge' | trans }}</option>
                                    <option value="uk-container uk-container-expand">{{ 'Expand' | trans }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'ID' | trans }}</label>
                            <div class="uk-form-controls">
                                <input type="input" v-model="theme.container.id" class="uk-input">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Class' | trans }}</label>
                            <div class="uk-form-controls">
                                <input type="input" v-model="theme.container.class" class="uk-input">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'DOM' | trans }}</label>
                            <div class="uk-form-controls">
                                <v-editor v-model="theme.container.dom" :options="{height:100}" type="code"/>
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
                                <input-image-meta v-model="theme.background.image" :image.sync="theme.background.image" class="pk-image-max-height" />
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Size' | trans }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" v-model="theme.background.size" :disabled="!theme.background.image.src">
                                    <option value="uk-background-cover">{{ 'Cover' | trans }}</option>
                                    <option value="uk-background-contain">{{ 'Contain' | trans }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Blend' | trans }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" v-model="theme.background.blend" :disabled="!theme.background.image.src">
                                    <option v-for="(blend , id) in getBlends" :key="id" :value="id">{{blend}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ 'Position' | trans }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" v-model="theme.background.position" :disabled="!theme.background.image.src">
                                    <option v-for="(position , id) in getPositions" :key="id" :value="id">{{position}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-margin uk-grid-small uk-grid-divider uk-child-width-1-2" uk-grid>
                            <div class="uk-text-center"><label class="uk-form-label"><input type="checkbox" class="uk-checkbox uk-margin-small-right" v-model="theme.background.repeat" :disabled="!theme.background.image.src">{{ 'Repeat' | trans }}</label></div>
                            <div class="uk-text-center"><label class="uk-form-label"><input type="checkbox" class="uk-checkbox uk-margin-small-right" v-model="theme.background.fixed" :disabled="!theme.background.image.src">{{ 'Fixed' | trans }}</label></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const nodePositions = {
    props: ['node'],

    section: {
        label: 'Positions',
        priority: 10
    },

    mixins: [Define],

    data(){
        return {
            positions: window.$node_positions,
            themeOptions: []
        }
    },

    watch:{
        'themeOptions':{
            handler(val){
                this.node.theme = val
            },  
            deep:true
        }
    },

    created(){
        this.$set(this, 'themeOptions' , this.node.theme)
    },

    mounted(){
        if(!this.themeOptions['positions']){
            this.$set(this, 'themeOptions' , _.merge({
                positions: [],
                fixed_positions: []
            }, this.themeOptions))
        }
        this.initPositions()
    },

    methods:{
        initPositions(){
            let data = {}
            _.forIn(this.positions, (name, key) => {
                if(
                key !== 'sidebarleft'
                && key !== 'sidebarright'
                && key !== 'headerleft'
                && key !== 'headerright'
                ){
                    if(!this.themeOptions.positions[key]){
                        data[key] = this.draftOfPosition()
                    }
                }
            })
            this.themeOptions.positions = _.merge(data , this.themeOptions.positions)
        },

        getPositionName(name){
            return this.positions[name];
        },

        draftOfPosition(){
            return {
                visible:{
                    large:true,
                    desktop:true,
                    tablet:true,
                    mobile:true
                },
                stacked:false,
                grids:{
                    '@xl':'uk-child-width-1-4',
                    '@l':'uk-child-width-1-3',
                    '@m':'uk-child-width-1-2',
                    '@s':'uk-child-width-1-1'
                },
                grid_config:{
                    gap:'',
                    divider:false,
                    match:false,
                    masonry:false,
                    parallax:150,
                    id: '',
                    class: '',
                    dom:''
                },
                section:{
                    section:'uk-section',
                    size:'',
                    id: '',
                    class: '',
                    dom:''
                },
                background:{
                    image:{
                        src: '',
                        alt: ''
                    },
                    size:'uk-background-cover',
                    position:'',
                    repeat:false,
                    fixed:false,
                    blend:''
                },
                container:{
                    container:'uk-container',
                    id: '',
                    class: '',
                    dom:''
                }
            }
        },

        useGrid(id){
            this.themeOptions.positions[id].stacked = false
        }
    }
}
import Define from './define'
export default nodePositions;
window.Site.components['node-positions'] = nodePositions
</script>