<template id="detail">
        <div class="row">
            <div class="panel-body text-center" style="margin-top:50px;">
                <h1>Welcome!!</h1>
            </div>
        </div>
</template>

<script>
    export default {
        name : 'Welcome',
        mounted() {
            console.log(this.search)
        },
        data() {
        	return { ret:{}, total:0}
        },
        props: {
            search: String,
        },
        methods: {
        }
    }
</script>
