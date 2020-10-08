import Computed from './computed';
export default {
    data(){
        return {
            positions: window.$node_positions,
            themeOptions: []
        }
    },

    mixins: [Computed],

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
                layout: false
            }, this.themeOptions))
        }
    },

    methods:{
        getPositionName(name){
            return this.positions[name];
        }
    }
}