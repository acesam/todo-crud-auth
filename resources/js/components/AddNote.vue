<template>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Add new note</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">TODO</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Add new note</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Note</h4>
            <p class="card-description"> Note details </p>
            <form @submit.prevent="addNote" class="forms-sample">
              <div class="form-group">
                <label for="exampleInputName1">Title</label>
                <input type="text" class="form-control" v-model="note.title" placeholder="Title">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Description</label>
                <input type="text" class="form-control" v-model="note.description" placeholder="Description">
              </div>
              <button type="submit" class="btn btn-primary mr-2">Add Note</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            note: {user_id: window.Laravel.user.id}
        }
    },
    methods: {
        addNote() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/notes/add', this.note)
                    .then(response => {
                        this.$router.push({name: 'notes'})
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

<style>
.form-group label {
    display: block;
}

.forms-sample .form-control, .asColorPicker-input, .dataTables_wrapper select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=text], .jsgrid .jsgrid-table .jsgrid-filter-row select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=number], .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--single .select2-search__field, .typeahead, .tt-query, .tt-hint {
    box-shadow: none;
}
.forms-sample .form-control, .asColorPicker-input, .dataTables_wrapper select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=text], .jsgrid .jsgrid-table .jsgrid-filter-row select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=number], .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--single .select2-search__field, .typeahead, .tt-query, .tt-hint {
    display: block;
    width: 100%;
    height: 2.875rem;
    padding: 0.56rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #495057;
    background-color: #2A3038;
    background-clip: padding-box;
    border: 1px solid #2c2e33;
    border-radius: 2px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.forms-sample .form-control, .asColorPicker-input, .dataTables_wrapper select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=text], .jsgrid .jsgrid-table .jsgrid-filter-row select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=number], .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--single .select2-search__field, .typeahead, .tt-query, .tt-hint {
    border: 1px solid #2c2e33;
    height: calc(2.25rem + 2px);
    font-weight: normal;
    font-size: 0.875rem;
    padding: 0.625rem 0.6875rem;
    background-color: #2A3038;
    border-radius: 2px;
    color: #ffffff;
    text-align: left;
}

.forms-sample .form-control:hover, .forms-sample .form-control:active, .forms-sample .form-control:focus{
    background-color: #2A3038;
    color: #ffffff;
}
</style>