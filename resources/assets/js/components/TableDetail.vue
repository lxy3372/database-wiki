<template id="detail">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title text-center table-title">
                        {{ db }}  &middot;  {{ table }}
                    </h2>
                </div>
                <pulse-loader  v-if="loading" :name="loading" color="gray" size="10px" class="text-center" style="padding:30px;"></pulse-loader>
                <div v-else>
                    <table v-if="tableIsActive" class="table table-bordered table-striped table-hover remove-margin">
                        <thead>
                        <tr>
                            <th class="">字段名</th>
                            <th class="">字段类型</th>
                            <th class="">是否为空</th>
                            <th class="">默认值</th>
                            <th class="">索引</th>
                            <th class="">注释</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="t in ret.data">
                            <td class="">{{ t.column_name }}</td>
                            <td class="">{{ t.column_type}}</td>
                            <td class="">{{ t.is_nullable}}</td>
                            <td class="">{{ t.column_default}}</td>
                            <td class="">{{ t.column_key}}</td>
                            <td class="" style="max-width:200px;">{{ t.column_comment}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <pulse-loader  v-if="sqlLoading" :name="sqlLoading" color="gray" size="10px" class="text-center" style="padding:30px;"></pulse-loader>
                    <pre v-if="!tableIsActive && !sqlLoading" v-highlightjs="sql" class="remove-margin code-bg" ><code class="sql"></code></pre>
                    <div class="panel-footer ">
                        <div class="btn-group"  role="group" aria-label="...">
                            <button type="button" class="btn btn-default" v-bind:class="tableIsActive ? 'active': ''" v-on:click="toTable">表格</button>
                            <button type="button" class="btn btn-default" v-bind:class="tableIsActive ? '' : 'active'" v-on:click="toSql" >SQL</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue';

    export default {
        name : 'TableDetail',
        mounted() {
            this.getDetail()
        },
        data() {
        	return { ret:{}, total:0, loading: true, tableIsActive:true, sql: '', sqlLoading:false}
        },
        props: {
            db: String,
            table: String
        },
        watch: {
          '$route': ['getDetail']
        },
        components: {
            PulseLoader,
        },
        methods: {
            getDetail: function()
            {
                if (this.table == 'undefined')
                {
                    return ;
                }
                this.$http.get('/table/detail/?db='+this.db+'&table='+this.table)
                        .then(function(response){
                            this.ret = response.data;
                            if(this.ret.ret == 0 && Object.keys(this.ret.data).length > 0){
                                this.$emit('message', this.total);
                            } else {
                                this.$router.push({path:'/not_found/'+this.db+'.'+this.table});
                                return ;
                            }
                            this.$nextTick(function(){
                                this.loading = false;
                            });
                        }.bind(this)).catch(function(err){
                    console.log(err)
                })
            },
            getSql: function()
            {
                this.sqlLoading= true;
                if (this.table == 'undefined')
                {
                    return ;
                }
                this.$http.get('/table/sql/?db='+this.db+'&table='+this.table)
                        .then(function(response){
                            var ret = response.data;
                            if(ret.ret == 0){
                                this.sql = ret.data.sql
                            } else {
                                this.$router.push({path:'/not_found/'+this.db+'.'+this.table});
                                return ;
                            }
                            this.$nextTick(function(){
                                this.sqlLoading= false;
                            });
                        }.bind(this)).catch(function(err){
                    console.log(err)
                })
            },
            toTable: function()
            {
                this.tableIsActive = true;
                //this.getDetail()
            },
            toSql: function()
            {
                this.tableIsActive = false;
                if(this.sql == '')
                {
                    this.getSql();
                }
            }
        }
    }
</script>

<style>
    .table-title
    {
        font-size:20px;
    }
    .remove-margin{
        margin-bottom:0!important;
    }
    .code-bg {
        background:#f9f9f9;
    }
</style>