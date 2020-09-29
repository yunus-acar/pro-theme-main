<template>
    <div>
        Fixed
    </div>
</template>

<script>
const nodeFixedPositions = {
    props: ['node'],

    section: {
        label: 'Fixed Positions',
        priority: 15,
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
        if(!this.themeOptions['fixed_positions']){
            this.$set(this, 'themeOptions' , _.merge({
                fixed_positions: [],
            }, this.themeOptions))
        }
        this.initPositions()
    },

    methods:{
        initPositions(){
            let data = {}
            _.forIn(this.positions, (name, key) => {
                if(
                key === 'sidebarleft'
                && key === 'sidebarright'
                ){
                    if(!this.themeOptions.fixed_positions[key]){
                        data[key] = this.draftOfPosition()
                    }
                }
            })
            this.themeOptions.fixed_positions = _.merge(data , this.themeOptions.fixed_positions)
        },

        getPositionName(name){
            return this.positions[name];
        },

        draftOfPosition(){
            return {
             
            }
        }
    }
}

import Define from './define'
export default nodeFixedPositions
window.Site.components['node-fixedPositions'] = nodeFixedPositions
</script>