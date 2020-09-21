//@site/theme
import Navbar from '../components/configure/navbar.vue'
import General from '../components/configure/general.vue'
window.Theme = {
    el: '#app',
    name: 'Theme',
    data() {
        return _.merge({
            sections: [],
            active: this.$session.get('theme.edit.tab.active', 0),
        }, window.$data)
    },

    created() {
        const sections = [];
        _.forIn(this.$options.components, (component, name) => {
            if (component.section) {
                sections.push(_.extend({ name, priority: 0 }, component.section));
            }
        });
        this.$set(this, 'sections', _.sortBy(sections, 'priority'));
    },

    mounted() {
        const vm = this;
        this.tab = UIkit.tab('#tab', { connect: '#content' });

        UIkit.util.on(this.tab.connects, 'show', (e, tab) => {
            if (tab != vm.tab) return;
            for (const index in tab.toggles) {
                if (tab.toggles[index].classList.contains('uk-active')) {
                    vm.$session.set('theme.edit.tab.active', index);
                    vm.active = index;
                    break;
                }
            }
        });
        this.tab.show(this.active);
    },

    methods:{
        save(){
            this.$http.post('admin/system/settings/config', { name: this.name, config: this.config }).catch(function (res) {
                this.$notify(res.data, 'danger');
            });
            this.$notify(this.$trans('Saved'))
        }
    },

    components:{
        Navbar, General
    }
}

export default window.Theme
Vue.ready(window.Theme)
