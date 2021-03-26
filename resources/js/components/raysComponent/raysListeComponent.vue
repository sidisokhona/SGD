<template>
    <div class="container">
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <add-ray @ray-added="refresh"></add-ray> 

           
           <ul class="list-group">
               <li class="list-group-item d-flex justify-content-between align-item-center" v-for="ray in rays.data" :key="ray.id">
                   <a href="#">{{ray.name}}</a>
                <div>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" 
                    data-target="#editModal" @click="getRay(ray.id)"><i class="fa fa-edit"></i>
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger" @click="deleteRay(ray.id)"><i class="fa fa-trash"></i>Delete</button>

                </div>
               </li>
               <edit-ray v-bind:rayToEdit="rayToEdit" @ray-updated="refresh"></edit-ray>
          
           </ul>
           <pagination :data="rays" @pagination-change-page="getResults" class="mt-5"></pagination>
           <pagination :data="rays" @pagination-change-page="getResults" >
                <span slot="prev-nav">&lt; Previous</span>
                <span slot="next-nav">Next &gt;</span>
            </pagination>
      
    </div>
</template>

<script>
    export default {
        data(){
            return {
                rays: {},
                rayToEdit:''

            }
        },
        created(){
            axios.get('http://127.0.0.1:8000/rays')
                 .then(response => this.rays = response.data)
                //  .then(console.log(response))
                 .catch(error => console.log(error));
        },

        methods:{
            getResults(page = 1) {
			            axios.get('http://127.0.0.1:8000/rays?page=' + page)
				              .then(response => {
					                this.rays = response.data;
				});
		},
         getRay(id){
            axios.get('http://127.0.0.1:8000/rays/edit/' + id)
               .then(response => this.rayToEdit = response.data)
            //   .then(response => console.log(response.data))
            .catch(error => console.log(error));
        },

        deleteRay(id){
            axios.delete('http://127.0.0.1:8000/rays/' + id)
            .then(response => this.rays = response.data)
            .catch(error => console.log(error));
        },
        refresh(rays){
            this.rays = rays.data
        }
        
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
