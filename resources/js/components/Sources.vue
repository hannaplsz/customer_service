<template>
    <div>
        <h4 class="text-center">All Sources</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Api key</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="source in sources" :key="source.source_id">
                <td>{{ source.source_id }}</td>
                <td>{{ source.source_name }}</td>
                <td>{{ source.api_key }}</td>
                <td>{{ source.created_at }}</td>
                <td>{{ source.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editsource', params: { id: source.source_id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteSource(source.source_id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/sources/add')">Add Source</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            sources: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/sources')
                .then(response => {
                    this.sources = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteSource(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/sources/delete/${id}`)
                    .then(response => {
                        let i = this.sources.map(item => item.source_id).indexOf(id); // find index of your object
                        this.sources.splice(i, 1)
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