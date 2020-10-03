"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
var _default = {
  data: function data() {
    return {
      positions: window.$node_positions,
      themeOptions: []
    };
  },
  watch: {
    'themeOptions': {
      handler: function handler(val) {
        this.node.theme = val;
      },
      deep: true
    }
  },
  computed: {
    getBlends: function getBlends() {
      return {
        '': 'Default',
        'uk-background-blend-multipy': 'Multipy'
      };
    },
    getPositions: function getPositions() {
      return {
        '': 'Default',
        'uk-background-top-left': 'Top Left'
      };
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