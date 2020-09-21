"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _navbar = _interopRequireDefault(require("../components/configure/navbar.vue"));

var _general = _interopRequireDefault(require("../components/configure/general.vue"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

//@site/theme
window.Theme = {
  el: '#app',
  name: 'Theme',
  data: function data() {
    return _.merge({
      sections: [],
      active: this.$session.get('theme.edit.tab.active', 0)
    }, window.$data);
  },
  created: function created() {
    var sections = [];

    _.forIn(this.$options.components, function (component, name) {
      if (component.section) {
        sections.push(_.extend({
          name: name,
          priority: 0
        }, component.section));
      }
    });

    this.$set(this, 'sections', _.sortBy(sections, 'priority'));
  },
  mounted: function mounted() {
    var vm = this;
    this.tab = UIkit.tab('#tab', {
      connect: '#content'
    });
    UIkit.util.on(this.tab.connects, 'show', function (e, tab) {
      if (tab != vm.tab) return;

      for (var index in tab.toggles) {
        if (tab.toggles[index].classList.contains('uk-active')) {
          vm.$session.set('theme.edit.tab.active', index);
          vm.active = index;
          break;
        }
      }
    });
    this.tab.show(this.active);
  },
  methods: {
    save: function save() {
      this.$http.post('admin/system/settings/config', {
        name: this.name,
        config: this.config
      })["catch"](function (res) {
        this.$notify(res.data, 'danger');
      });
      this.$notify(this.$trans('Saved'));
    }
  },
  components: {
    Navbar: _navbar["default"],
    General: _general["default"]
  }
};
var _default = window.Theme;
exports["default"] = _default;
Vue.ready(window.Theme);