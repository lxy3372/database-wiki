<template id="detail">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title text-center table-title">
                        {{ db }}  &middot;  {{ table }}
                    </h2>
                </div>
                <pulse-loader  v-if="loading" :name="loading" color="gray" size="10px" class="text-center" style="padding:30px;"></pulse-loader>
                <table v-else class="table table-bordered table-striped table-hover">
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
            </div>
        </div>
</template>

<script>
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

    export default {
        name : 'TableDetail',
        mounted() {
            console.log(this.table)
            this.getDetail()
        },
        data() {
        	return { ret:{}, total:0, loading: true}
        },
        props: {
            db: String,
            table: String
        },
        watch: {
          '$route': ['getDetail']
        },
        components: {
            PulseLoader
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
            }
        }
    }
</script>

<style>
    .table-title
    {
        font-size:20px;
    }
</style>