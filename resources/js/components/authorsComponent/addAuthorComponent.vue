<template>
    <div>
                <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#authorModal">
            <i class="fa fa-plus"> Add new Author</i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="authorModal" tabindex="-1" role="dialog" aria-labelledby="authorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="AuthorModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="name" class="col-form-label col-sm-6">Nom du Auteur</label>
                            <div class="col-form-label col-sm-6">
            
                            <input type="text" id="name" class="form-control" v-model="name">
                            </div>
                    
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" @click="authorsStore" data-dismiss="modal">ajouter un auteur</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        data() {
            return{
                 name:''
            }    
        },
        methods: {
            authorsStore() {
                axios.post('http://127.0.0.1:8000/authors', {
                    name: this.name
                })
                .then(response => {
                    this.$emit('author-added', response); 
                    this.name = '';
                })

                .catch(error => console.log(error));
            },
        }
    
    }
</script>