<template>
    <div>
                <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#discTypeModal">
                <i class="fa fa-plus"> Add TypeDisC</i>
        </button>

        <!-- Modal -->
    <div class="modal fade" id="discTypeModal" tabindex="-1" role="dialog" aria-labelledby="discTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="discTypeModalLabel">Ajouter un type de disque</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                            <label for="name">Nom du type de disc</label>
                            <input type="text" id="name" class="form-control" v-model="name">
                            
                        
                    </div>
                        
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" @click="discTypesStore" data-dismiss="modal">Add TypeDisC</button>
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
            discTypesStore() {
                axios.post('http://127.0.0.1:8000/discTypes', {
                    name: this.name
                })
                .then(response => this.$emit('discType-added', response))
                .catch(error => console.log(error));
            },
        }
    
    }
</script>