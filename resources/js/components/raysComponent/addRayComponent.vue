<template>
    <div>
                    <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"> Add Ray</i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                             <label for="name">Nom du rayon</label>
                             <input type="text" id="name" class="form-control" v-model="name">
                             <!-- <textarea name="name" id="name" cols="" rows="2" class="form-control"></textarea> -->
                             <!-- <textarea name="name" id="name" cols="" rows="2" class="form-control" v-model="name"></textarea> -->
                            
                        </div>
                         
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" @click="raysStore" data-dismiss="modal">ajouter un rayon</button>
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
            raysStore() {
                axios.post('http://127.0.0.1:8000/rays', {
                    name: this.name
                })
                .then(response => this.$emit('ray-added', response))
                .catch(error => console.log(error));
            },
        }
    
    }
</script>