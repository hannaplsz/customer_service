<template>
    <div>
        <h4 class="text-center">Edit Source</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateSource">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="source.source_name">
                    </div>
                    <div class="form-group">
                        <label>Api key</label>
                        <input type="text" class="form-control" v-model="source.api_key">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Source</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            source: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/sources/edit/${this.$route.params.id}`)
                .then(response => {
                    this.source = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateSource() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/sources/update/${this.$route.params.id}`, this.source)
                    .then(response => {
                        this.$router.push({name: 'sources'});
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>