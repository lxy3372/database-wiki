<template>
    <div>
        <nav class="navbar navbar-default navbar-static-top">
            <a class="navbar-brand" href="#/">{{ app_name }}</a>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group" style="margin-right:10px;">
                    <input type="text" class="form-control search" placeholder="Search: database.table"  v-on:keyup.enter="onSubmit" v-model="search_tables">
                </div>
            </form>
        </nav>
        <div class="container pull-left" style="width:25%;height:100%;min-height:300px;border-right:thin solid #ddd;">
            <div class="list-group" id="db">
	        <span v-for="(item, index) in ret.data">
                <a class="list-group-item collapsed" role="button" data-toggle="collapse" :href="'#table'+item.schema_name" aria-expanded="false"
                   aria-controls="123">
                    <!--span class="badge">{{ total }}</span-->
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    {{ item.schema_name }} ({{ item.character}})
                </a>
                <Table :db="item.schema_name" :total.sync="total" v-on:message="recieveMessage"></Table>
            </span>
            </div> </div>
        <div class="container-fluid pull-left" style="width:75%; padding:0px  30px">
            <transition >
                <router-view :key="key"></router-view>
            </transition>
        </div>
    </div>
</template>

<script>

    import Table from './Table.vue';
    import TableDetail from './TableDetail.vue';

    export default {
        name: "Db",
        mounted() {
            this.$http.get('/db')
                    .then(function (response) {
                        this.ret = response.data;
                    }.bind(this)).catch(function (err) {
                console.log(err)
            })
        },
        computed: {
            key() {
                return this.$route.path.replace(/\//g, '_')
            }
        },
        data() {
            return {ret: {}, total: 0, db: '', search_tables: '' }
        },
        components: {
            Table,
            TableDetail
        },
        methods: {
            recieveMessage (total) {
                this.total = total
            },
            onSubmit () {
                var arr = this.search_tables.toString().split( /\s+|,|\.|@|#/);
                if(Object.keys(arr).length < 2)
                {
                    this.$router.push({path:'/not_found/'+this.search_tables});
                } else {
                    this.$router.push({name:'table', params:{db: arr[0], table: arr[1]}});
                }
                this.search_tables = '';
                return ;
            }
        },
        props: {
            app_name : String
        },
        // watch $route 决定使用哪种过渡
        watch: {
            '$route' (to, from) {
                //const toDepth = to.path.split('/').length
                //const fromDepth = from.path.split('/').length
                //this.transitionName = 'slide-right';
            }
        }
    }
</script>

<style>
    /* 可以设置不同的进入和离开动画 */
    /* 设置持续时间和动画函数 */
    .slide-fade-enter-active {
        transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to
        /* .slide-fade-leave-active for below version 2.1.8 */ {
        transform: translateX(10px);
        opacity: 0;
    }
    .search{
        min-width:300px;
    }

</style>