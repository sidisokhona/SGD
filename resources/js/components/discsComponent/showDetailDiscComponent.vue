<template>
<div class="container m-3 justify-content-between align-item-center">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <form class="justify-content-between align-item-center">
        <div class="form-group row">
                <label for="name" class="col-form-label col-sm-2">Nom du disque</label>
       <div  class="col-sm-3">
                <input   type="text" id="name" class="form-control" v-model="discToEdit.name">
            </div>
        </div>

        <div class="form-group row">
                <label for="discType" class="col-form-label col-sm-2">Type de disc</label>
                <div  class="col-sm-3">
                    <select class="form-control"  id="discType" v-model="discToEdit.discType_id" >
                        <option v-for="discType in discTypes.data" :key="discType.id" :value="discType.id">{{discType.name}}</option>

                    </select>
                </div>
        </div>

        <div class="form-group row">
                <label for="price" class="col-form-label col-sm-2">Prix unitaire</label>
              <div  class="col-sm-3">
            <input   type="text" id="price" class="form-control" v-model="discToEdit.price"> 
            </div>
        </div>
        <div class="form-group row"> 
                <label for="exampleFormControlSelect1" class="col-form-label col-sm-2">Réalisateur</label>
                  <div  class="col-sm-3">
                    <select class="form-control" id="author" v-model="discToEdit.author_id" >
                        <option v-for="author in authors.data" :key="author.id" :value="author.id">{{author.name}}</option>
                    </select>
                </div>
        </div> 

         <div class="form-group row">
                <label for="ray" class="col-form-label col-sm-2">Nom du Rayon</label>
                <div  class="col-sm-3">
                    <select class="form-control" id="ray" v-model="discToEdit.ray_id" >
                        <option v-for="ray in rays.data" :key="ray.id" :value="ray.id">{{ray.name}}</option>
                    </select>
                </div>
        </div> 

        <div class="form-group row">
                <label for="rayQuantity" class="col-sm-2 col-form-label">Quantiter Rayon</label>
                  <div  class="col-sm-3">
                    <input readonly type="text" id="rayQuantity" class="form-control" v-model="discToEdit.rayQuantity">
                </div>
        </div> 
       
        <div class="form-group row">
                <label for="stockQuantity " class="col-form-label col-sm-2">Quantiter en stock</label>
        <div  class="col-sm-3">
                 <input readonly type="text" id="stockQuantity" class="form-control" v-model="discToEdit.stockQuantity">
               </div>
        </div>
        <!-- <div  class="col-sm-3">
                <command-disc  v-bind:discId="discToEdit.id" @disc-command="refresh"></command-disc> 
        </div> -->
    </form>
    <div class="row">
    
        <div class="m-3 ">
        <command-disc  v-bind:discId="discToEdit.id" @disc-command="refresh"></command-disc>
        </div> 
    <div class="m-3">

        <move-disc v-bind:discId="discToEdit.id" @disc-move="refresh" ></move-disc>   
    </div> 
    </div>  
    <div class="float-right ml-5">
     <button v-bind:discId="discToEdit.id" type="button" class="btn btn-success" @click="update" >
            Enregistrer
    </button>  
    <button type="button" class="btn btn-success" v-on:click="navigate">
            Retour
    </button> 
    </div>
</div>
    
</template>
<script>


export default {
     props:['discId'],
     data() {
            return{
                discToEdit:{},
                 authors:{},
                 rays:{},
                 discTypes:{}
                 
            }    
        },
        created(){
            axios.get('http://127.0.0.1:8000/discs/' + this.$route.params.discId)
                 .then(response => this.discToEdit = response.data)
                //  .then(response => console.log(response.data))
                 .catch(error => console.log(error));

        axios.get('http://127.0.0.1:8000/authors')
                 .then(response => this.authors = response.data)
                 .catch(error => console.log(error));

            axios.get('http://127.0.0.1:8000/rays')
                 .then(response => this.rays = response.data)
                 .catch(error => console.log(error));

                axios.get('http://127.0.0.1:8000/discTypes')
                 .then(response => this.discTypes = response.data)
                 .catch(error => console.log(error));
        },

       methods: {
           update(){
               axios.patch('http://127.0.0.1:8000/discs/' + this.discToEdit.id, {
                   name: this.discToEdit.name,
                   author_id: this.discToEdit.author_id,
                   price: this.discToEdit.price,
                   discType_id: this.discToEdit.discType_id,
                   ray_id: this.discToEdit.ray_id,
                   rayQuantity: this.discToEdit.rayQuantity,
                   stockQuantity: this.discToEdit.stockQuantity
         
                   

               })
               .then(response => this.$emit('disc-updated', response))
            
               .catch(error => console.log(error));
           },
           navigate() {
                
                this.$router.push('/discs');
            },
             refresh(disc){
                 console.log(disc);
            this.discToEdit = disc;
        }
       }
}

</script>