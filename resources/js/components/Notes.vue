<template>
<div class="main-panel">
    <div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> TODO </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Todo</a></li>
            <li class="breadcrumb-item active" aria-current="page">Notes</li>
        </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">All Notes</h4>
            <p class="card-description"> <a href="/notes/add" class="btn btn-primary mr-2" >Add a new note</a>
            </p>
            <div class="table-responsive">
                <table class="table">
                <thead>
                    <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="note in notes" :key="note.id">
                    <td>{{ note.title }}</td>
                    <td>{{ note.description }}</td>
                    <td>{{ note.created_at }}</td>
                    <td>{{ note.updated_at }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'editnote', params: { id: note.id }}" class="btn btn-primary">Edit
                            </router-link>
                            <button class="btn btn-danger" @click="deleteNote(note.id)">Delete</button>
                        </div>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
    
    </div>
    </footer>
    <!-- partial -->
</div>
</template>

<script>
export default {
    data() {
        return {
            notes: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/notes')
                .then(response => {
                    this.notes = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteNote(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/notes/delete/${id}`)
                    .then(response => {
                        let i = this.notes.map(item => item.id).indexOf(id); // find index of your object
                        this.notes.splice(i, 1)
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
