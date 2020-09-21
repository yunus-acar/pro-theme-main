<template>
    <div class="uk-form">
        <p>{{ 'If you want to make changes about the site, you must switch to settings page.' | trans }} <a :href="$url('admin/site/settings')">{{ 'Go to settings' | trans }}</a></p>
        <div class="uk-child-width-1-3@m uk-child-width-1-2@s" uk-grid>
            <div>
                <div class="uk-margin">
                    <label for="form-logo" class="uk-form-label">{{ 'Logo Contrast' | trans }}</label>
                    <div class="uk-form-controls">
                        <input-image v-model="config.general.logo.logo_contrast" input-class="uk-form-width-large" />
                    </div>
                </div>
            </div>
            <div>
                <div class="uk-margin">
                    <label for="form-logo" class="uk-form-label">{{ 'Mobile Logo' | trans }}</label>
                    <div class="uk-form-controls">
                        <input-image v-model="config.general.logo.mobile_logo" input-class="uk-form-width-large" />
                    </div>
                </div>
            </div>
            <div>
                <div class="uk-margin">
                    <label for="form-logo" class="uk-form-label">{{ 'Mobile Logo Contrast' | trans }}</label>
                    <div class="uk-form-controls">
                        <input-image v-model="config.general.logo.mobile_contrast" input-class="uk-form-width-large" />
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-child-width-1-2@m" uk-grid>
            <div>
                <h4 class="uk-heading-line"><span>{{ 'Social Media' | trans }} - <a @click.prevent="addSocialMedia">{{ 'Add Input' | trans}}</a></span></h4>
                <ul class="uk-list">
                    <li v-for="(social , id) in config.general.socials" :key="id">
                        <div class="uk-flex">
                            <div class="uk-margin-right"><input type="text" v-model="social.icon" placeholder="link" class="uk-input uk-width-small"></div>
                            <div class="uk-width-expand"><input type="text" v-model="social.url" placeholder="https://greencheap.net" class="uk-input uk-width-expand" required></div>
                            <div class="uk-margin-left uk-flex uk-flex-middle"><a class="uk-icon-button" @click.prevent="removeSocialMedia(id)" :title="'Delete' | trans"  uk-tooltip ><span uk-icon="trash"></span></a></div>
                        </div>
                    </li>
                </ul>
                <blockquote cite="#">
                    <p class="uk-text-meta">
                        {{ 'Sometimes you may want to use special links. You can see the examples below.' | trans }}
                    </p>
                    <ul class="uk-list uk-list-circle uk-text-meta">
                        <li>{{ 'Mail' | trans }}: <em>mailto:support@greencheap.net</em></li>
                        <li>{{ 'Phone' | trans }}: <em>tel:+900000000000</em></li>
                    </ul>
                    <footer>{{ 'All icon sets can be found on this page.' | trans }} <cite><a href="https://getuikit.com/docs/icon" target="_blank">{{ 'Go to UIkit Icons' | trans }}</a></cite></footer>
                </blockquote>
                <div class="uk-margin">
                    <div>
                        <label class="uk-form-label"><input type="checkbox" class="uk-checkbox" v-model="config.general.social_access.navbar"> {{ 'Show on Navbar' | trans }}</label>
                    </div>
                    <div>
                        <label class="uk-form-label"><input type="checkbox" class="uk-checkbox" v-model="config.general.social_access.footer"> {{ 'Show on Footer' | trans }}</label>
                    </div>
                </div>
            </div>
            <div>
                <h4 class="uk-heading-line"><span>{{ 'Navbar Button' | trans }}</span></h4>

                <div class="uk-margin">
                    <div class="uk-form-controls">
                        <label class="uk-form-label"><input type="checkbox" v-model="config.general.navbar_button.active" class="uk-checkbox"> {{ 'Show on Navbar' | trans }}</label>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label">{{ 'Title' | trans }}</label>
                    <div class="uk-form-controls">
                        <input type="text" v-model="config.general.navbar_button.title" class="uk-input uk-form-width-large">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label">{{ 'Redirect' | trans }}</label>
                    <div class="uk-form-controls">
                        <input-link v-model="config.general.navbar_button.url" input-class="uk-form-width-large"></input-link>
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
        label: 'General',
        priority: 8
    },

    methods:{
        addSocialMedia(){
            this.config.general.socials.push({
                'icon': '',
                'url': ''
            })
        },

        removeSocialMedia(id){
            this.config.general.socials.splice(id , 1)
        }
    }
}
</script>

<style scoped>
   
</style>
