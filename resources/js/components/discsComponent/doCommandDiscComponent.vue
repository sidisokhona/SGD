<template>
    <div>
                    <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#commandModal">
            commande de diques
            </button>

            <!-- Modal -->
            <div class="modal fade" id="commandModal" tabindex="-1" role="dialog" aria-labelledby="commandModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commandModalLabel">Commander une quantité de disques</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                             <label for="name" class="col-form-label col-sm-6">Quantité</label>
                             <div class="col-sm-6">
                             <input type="text" id="name" class="form-control" v-model="quantity">
                             </div>
                        </div>
                             
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" @click="discsStore" data-dismiss="modal">Acheter</button>
                </div>
                </div>
            </div>
            </div>
    </div>
</template>

<script>
    
    export default {
         props:['discId'],
        data() {
            return{
                      quantity:null 
                    
                     
                 }
                                     
                   
        },
    
        methods: {
            discsStore() {

                axios.patch('http://127.0.0.1:8000/discs/'+ this.discId + '/stockQuantity', { quantity:this.quantity})
                .then(response => this.$emit('disc-command', response.data))
                .catch(error => console.log(error.response));
            },
        }
    
    }
</script>