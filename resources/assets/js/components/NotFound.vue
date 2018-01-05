<template id="detail">
        <div class="row">
            <div class="panel-body text-center" style="margin-top:50px;">
                <h1>
                    <b v-if="search">{{ search }}</b>
                    <b v-else="search">Database </b>
                    Not Found!
                </h1>
            </div>
        </div>
</template>

<script>
    export default {
        name: 'NotFound',
        mounted() {
        },
        props: {
            search: String
        },
        watch: {
            '$route': []
        },
        methods: {
        }
    }
</script>
