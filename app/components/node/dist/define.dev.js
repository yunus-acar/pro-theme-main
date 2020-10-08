"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _computed = _interopRequireDefault(require("./computed"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

var _default = {
  data: function data() {
    return {
      positions: window.$node_positions,
      themeOptions: []
    };
  },
  mixins: [_computed["default"]],
  watch: {
    'themeOptions': {
      handler: function handler(val) {
        this.node.theme = val;
      },
      deep: true
    }
  },
  created: function created() {
    this.$set(this, 'themeOptions', this.node.theme);
  },
  mounted: function mounted() {
    if (!this.themeOptions['positions']) {
      this.$set(this, 'themeOptions', _.merge({
        positions: [],
        layout: false
      }, this.themeOptions));
    }
  },
  methods: {
    getPositionName: function getPositionName(name) {
      return this.positions[name];
    }
  }
};
exports["default"] = _default;