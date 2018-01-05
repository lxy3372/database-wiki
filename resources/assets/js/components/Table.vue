<template id="nav">
    <ul :id="'table'+db" class="nav nav-list second-menu collapse">
    <li v-for="(table,index) in ret.data">
        <router-link :to="{name:'table', params:{db: db, table: table.table_name}}">{{ table.table_name }}</router-link>
    </li>
    </ul>
</template>

<script>
    export default {
        name : 'Table',
        mounted() {
            if (this.db == 'undefined')
            {
                return ;
            }
            this.$http.get('/table/list/?db='+this.db)
            .then(function(response){
            	this.ret = response.data;
            	if(this.ret.ret == 0){
            		this.total = Object.keys(this.ret.data).length
                    this.$emit('message', this.total);
            	}
            }.bind(this)).catch(function(err){
				console.log(err)
            })
        },
        data() {
        	return { ret:{}, total:0}
        },
        props: {
            db: String,
        },
        methods: {
        }
    }
</script>
