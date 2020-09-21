<template>
    <div>
        <table class="uk-table uk-table-divider uk-table-middle uk-table-large uk-table-responsive uk-table-striped">
            <thead>
                <th>
                    <td class="uk-table-small">{{ 'Position' | trans }}</td>
                    <td class="uk-width-medium">{{ 'Grid' | trans }}</td>
                </th>
            </thead>
            <tbody>
                <tr v-for="(position , id) in node.theme.positions" :key="id">
                    <td><em>{{getPositionName(id)}}</em></td>
                    <td>Stacked On</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
const nodePositions = {
    props: ['node'],

    section: {
        label: 'Positions',
        priority: 10
    },

    data(){
        return {
            positions: window.$node_positions
        }
    },

    created(){
        if(!this.node.theme['positions']){
            this.node.theme = _.merge({
                positions: {},
                fixed_positions: []
            }, this.node.theme)
        }
        this.initPositions()
    },

    methods:{
        initPositions(){
            _.forIn(this.positions, (name, key) => {
                if(
                key !== 'sidebar-left'
                && key !== 'sidebar-right'
                && key !== 'footer-left'
                && key !== 'footer-center'
                && key !== 'footer-right'
                && key !== 'header-left'
                && key !== 'header-right'
                ){
                    if(!this.node.theme.positions[key]){
                        this.node.theme.positions[key] = this.draftOfPosition()
                    }
                }
            })
        },

        getPositionName(name){
            return this.positions[name];
        },

        draftOfPosition(){
            return {
                visible:{
                    large:true,
                    desktop:true,
                    tablet:true,
                    mobile:true
                },
                stacked:false,
                grids:{
                    '@xl':'uk-child-width-1-3',
                    '@l':'uk-child-width-1-3',
                    '@m':'uk-child-width-1-3',
                    '@s':'uk-child-width-1-1'
                },
                grid_config:{
                    gap:'',
                    divider:false,
                    match:false,
                    masonry:false,
                    parallax:150
                },
                section:{
                    section:'uk-section',
                    color:'',
                    height:''
                },
                background:{
                    image:'',
                    size:'uk-background-cover',
                    positions:'',
                    repeat:false,
                    fixed:false,
                    blend:''
                },
                container:'uk-container'
            }
        }
    }
}
export default nodePositions;
window.Site.components['node-positions'] = nodePositions
</script>