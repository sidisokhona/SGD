<template>
<div>
           <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <!-- @csrf
                        @method('PUT') -->
                        <div class="form-group">
                             <label for="name">Nom du rayon</label>
                             <!-- <textarea name="name" id="name" cols="" rows="4" class="form-control" v-model="rayToEdit.name"></textarea> -->
                              <input type="text" name="name" id="name" class="form-control" v-model="rayToEdit.name">
                            
                        </div>
                         
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" @click="update" data-dismiss="modal">Enregistrer</button>
                </div>
                </div>
            </div>
            </div>
</div>
    
</template>
<script>


export default {
       props:['rayToEdit'],

       methods: {
           update(){
               axios.patch('http://127.0.0.1:8000/rays/edit/' + this.rayToEdit.id, {
                   name: this.rayToEdit.name
               })
               .then(response => this.$emit('ray-updated', response))
               .catch(error => console.log(error));
           }
       }
}

</script>