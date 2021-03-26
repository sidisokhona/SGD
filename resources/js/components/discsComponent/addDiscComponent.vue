<template>
    <div>
                    <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#discTypeModal">
        <i class="fa fa-plus"> Add new Disc</i>
        </button>

            <!-- Modal -->
    <div class="modal fade" id="discTypeModal" tabindex="-1" role="dialog" aria-labelledby="discTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="discTypeModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form>
                <div class="form-group row">
                        <label for="name" class="col-form-label col-sm-6">Nom du disque</label>
                        <div class="col-sm-6">
                        <input type="text" id="name" class="form-control" v-model="disc.name">
                        </div>
                </div>

                <div class="form-group row">
                    <label for="discType" class="col-form-label col-sm-6">Type de disque</label>
                    <div class="col-sm-6">
                        <select class="form-control"  id="dicType" v-model="disc.discType_id" >
                                <option v-for="discType in discTypes.data" :key="discType.id" :value="discType.id">{{discType.name}}</option>

                        </select>
                    </div>
                </div> 
                <div class="form-group row">
                        <label for="price" class="col-form-label col-sm-6">Prix unitaire</label>
                        <div class="col-sm-6">
                        <input type="text" id="price" class="form-control" v-model="disc.price"> 
                    
                    </div>
                </div>
                <div class="form-group row"> 

                    <label for="author" class="col-form-label col-sm-6">Réalisateur</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="author" v-model="disc.author_id" >
                                    <option v-for="author in authors.data" :key="author.id" :value="author.id">{{author.name}}</option>

                            </select>
                    </div>
                </div> 
                
                        
                    
            </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" @click="discsStore" data-dismiss="modal">ajouter un typde de disc</button>
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
                 disc:{
                     name:'',
                     author_id: null,
                     price: null,
                     rayQuantity: 0,
                     stockQuantity: 0,
                     discType_id:null,
                     ray_id:0
                    
                 },
                 
                 authors:{},
                 rays:{},
                 discTypes:{}
                 
            }    
        },
         created(){
            axios.get('http://127.0.0.1:8000/authors')
                 .then(response => this.authors = response.data)
                //  .then(response => console.log(response.data))
                 .catch(error => console.log(error));

            axios.get('http://127.0.0.1:8000/rays')
                 .then(response => this.rays = response.data)
                 .catch(error => console.log(error));

                axios.get('http://127.0.0.1:8000/discTypes')
                 .then(response => this.discTypes = response.data)
                 .catch(error => console.log(error));
        },
        methods: {
            discsStore() {

                axios.post('http://127.0.0.1:8000/discs', this.disc)
                 .then(response => this.$emit('disc-added', { data:response}))
                
                .catch(error => console.log(error));
            },
        }
    
    }
</script>