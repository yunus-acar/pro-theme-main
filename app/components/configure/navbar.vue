<template>
    <div class="uk-form uk-form-horizontal">
        <div class="uk-margin">
            <div class="uk-child-width-1-2@m" uk-grid>
                <div v-for="(style , id) in options.navbar.styles" :key="id">
                    <div @click.prevent="setNavbar(style.path)" :title="style.name" class="uk-card uk-card-default" style="cursor:pointer" uk-tooltip>
                        <img :src="getImage(style.icon)" class="uk-width-expand">
                        <span class="tm-selected" v-show="config.navbar.style == style.path"></span>
                    </div>   
                </div>
            </div>

            <div class="uk-child-width-1-2@m uk-grid-divider" uk-grid>
                <div>
                    <div class="uk-margin">
                        <div class="uk-form-label">{{ 'Boundary Align' | trans }}</div>
                        <div class="uk-form-controls uk-form-controls-text">
                            <label><input class="uk-checkbox" type="checkbox" v-model="config.navbar.components['boundary-align']"></label>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Boundary' | trans }}</label>
                        <div class="uk-form-controls">
                            <input class="uk-input uk-width-medium" type="text" v-model="config.navbar.components.boundary" placeholder="window" required>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-form-label">{{ 'Dropbar' | trans }}</div>
                        <div class="uk-form-controls uk-form-controls-text">
                            <label><input class="uk-checkbox" type="checkbox" v-model="config.navbar.components.dropbar"></label>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Dropbar Mode' | trans }}</label>
                        <div class="uk-form-controls">
                            <input class="uk-input uk-width-medium" type="text" v-model="config.navbar.components['dropbar-mode']" :disabled="!config.navbar.components.dropbar" placeholder="slide" required>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Delay Show' | trans }}</label>
                        <div class="uk-form-controls">
                            <input class="uk-input uk-width-medium" type="number" v-model="config.navbar.components['delay-show']" required>
                        </div>
                    </div> 
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Delay Hide' | trans }}</label>
                        <div class="uk-form-controls">
                            <input class="uk-input uk-width-medium" type="number" v-model="config.navbar.components['delay-hide']" required>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Offset' | trans }}</label>
                        <div class="uk-form-controls">
                            <input class="uk-input uk-width-medium" type="number" v-model="config.navbar.components['offset']" required>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label">{{ 'Duration' | trans }}</label>
                        <div class="uk-form-controls">
                            <input class="uk-input uk-width-medium" type="number" v-model="config.navbar.components['duration']" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-margin">
            <h3 class="uk-h4 uk-heading-line"><span>{{ 'Mobile' | trans }}</span></h3>
            <div class="uk-child-width-1-3@m" uk-grid>
                <div v-for="(style , id) in options.mobile.styles" :key="id">
                    <div @click.prevent="setMobile(style.path)" :title="style.name" class="uk-card uk-card-default" style="cursor:pointer" uk-tooltip>
                        <img :src="getImage(style.icon)" class="uk-width-expand">
                        <span class="tm-selected" v-show="config.mobile.style == style.path"></span>
                    </div>      
                </div>
            </div>

            <h3 class="uk-h4 uk-heading-line"><span>{{ 'Offcanvas' | trans }}</span></h3>
            <div class="uk-child-width-1-4@m" uk-grid>
                <div v-for="(style , id) in options.offcanvas.styles" :key="id">
                    <div @click.prevent="setOffcanvas(style.path)" :title="style.name" class="uk-card uk-card-default" style="cursor:pointer" uk-tooltip>
                        <img :src="getImage(style.icon)" class="uk-width-expand">
                        <span class="tm-selected" v-show="config.offcanvas.style == style.path"></span>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['config', 'options', 'name'],
    section: {
        label: 'Navbar',
        priority: 10
    },

    methods:{
        getImage(str){
            const path = `/packages/greencheap/${this.name}/`;
            return this.$url(str.replace(/theme:/g, path));
        },

        setNavbar(style){
            this.config.navbar.style = style;
        },

        setMobile(style){
            this.config.mobile.style = style;
        },

        setOffcanvas(style){
            this.config.offcanvas.style = style;
        },
    },
}
</script>

<style scoped>
    .tm-selected {
        position:absolute;
        top:0px;
        left:0px;
        bottom:0px;
        width:5px;
        background:#66D092;
    }
</style>
