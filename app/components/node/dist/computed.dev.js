"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
var _default = {
  computed: {
    getBlends: function getBlends() {
      return {
        '': 'Default',
        'uk-background-blend-multiply': 'Multipy',
        'uk-background-blend-screen': 'Screen',
        'uk-background-blend-overlay': 'Overlay',
        'uk-background-blend-darken': 'Darken',
        'uk-background-blend-lighten': 'Lighten',
        'uk-background-blend-color-dodge': 'Color Dodge',
        'uk-background-blend-color-burn': 'Color Burn',
        'uk-background-blend-hard-light': 'Hard Light',
        'uk-background-blend-soft-light': 'Soft Light',
        'uk-background-blend-difference': 'Difference',
        'uk-background-blend-exclusion': 'Exclusion',
        'uk-background-blend-hue': 'Hue',
        'uk-background-blend-saturation': 'Saturation',
        'uk-background-blend-color': 'Color',
        'uk-background-blend-luminosity': 'Luminosity'
      };
    },
    getPositions: function getPositions() {
      return {
        '': 'Default',
        'uk-background-top-left': 'Top Left',
        'uk-background-top-center': 'Top Center',
        'uk-background-top-right': 'Top Right',
        'uk-background-center-left': 'Center Left',
        'uk-background-center-center': 'Center',
        'uk-background-center-right': 'Center Right',
        'uk-background-bottom-left': 'Bottom Left',
        'uk-background-bottom-center': 'Bottom Center',
        'uk-background-bottom-right': 'Bottom Right'
      };
    }
  }
};
exports["default"] = _default;