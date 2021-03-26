<template>
    <div class="container">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <add-disc @disc-added="refresh"></add-disc> 

               <!-- <edit-disc v-bind:discToEdit="discToEdit" @disc-updated="refresh"></edit-disc> -->
          

            <table class="table table-striped table-bordered border border-solid">
  <thead>
    <tr class="bg-dark text-light text-center">
 
      <th scope="col">Nom</th>
      <th scope="col">Type de Dic</th>
      <th scope="col">Nom Rayon</th>
      <th scope="col">Prix</th>
      <th scope="col">Réalisateur</th>
      <th scope="col">Disponible</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="disc in discs.data" :key="disc.id" >
  
      <td> <router-link :to="{ name: 'showDisc', params: { discId: disc.id }}" class="nav-link"><i class="fa fa-edit">  {{disc.name}}</i> </router-link></td>
      <td>{{disc.disc_Type_name}}</td>
      <td>{{disc.ray_name}}</td>
      <td>{{disc.price}}</td>
      <td>{{disc.author_name}}</td>
      <td>{{disc.disponible}}</td>
      <td>
      <div class=" text-center">
 
                <button type="button" class="btn btn-danger" @click="deleteDisc(disc.id)"><i class="fa fa-trash"> Delete</i></button>

         </div> 
      </td>
    </tr>

      </tbody>
</table>
   

           <pagination  :data="discs" @pagination-change-page="getResults" >
                <span slot="prev-nav">&lt; </span>
                <span slot="next-nav">&gt;</span>
            </pagination>
      
    </div>
</template>

<script>
    export default {
        data(){
            return {
                discs: {data:[]},
                discToEdit:{}
                

            }
        },
        created(){
            axios.get('http://127.0.0.1:8000/discs')
                   .then(response => this.discs = response.data)
                 //  .then(response => console.log(response.data))
                 .catch(error => console.log(error));
        },

        methods:{
            getResults(page = 1) {
			            axios.get('http://127.0.0.1:8000/discs?page=' + page)
				              .then(response => {
					                this.discs = response.data;
				});
		},
         getDisc(id){
            axios.get('http://127.0.0.1:8000/discs/' + id)
                .then(response => this.discToEdit = response.data)
                .catch(error => console.log(error));
        },

        deleteDisc(id){
            axios.delete('http://127.0.0.1:8000/discs/' + id)
            .then(response => this.discs = response.data)
            .catch(error => console.log(error));
        },
        refresh(discs){
            this.discs = discs.data
        },  
        navigate() {
                
                this.$router.push('showDisc');
        },
        
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
