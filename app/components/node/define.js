export default {
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

    computed:{
        getBlends(){
            return {
                '':'Default',
                'uk-background-blend-multipy':'Multipy'
            }
        },

        getPositions(){
            return {
                '':'Default',
                'uk-background-top-left':'Top Left'
            }
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