<template>
    <div class="container">
             <!--  -->
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
             <!--  -->
            <add-discType @discType-added="refresh"></add-discType> 

               <edit-discType v-bind:discTypeToEdit="discTypeToEdit" @discType-updated="refresh"></edit-discType>
          
          
           <ul class="list-group">
               <li class="list-group-item d-flex justify-content-between align-item-center" v-for="discType in discTypes.data" :key="discType.id">
                   <a href="#">{{discType.name}}</a>
                    <div>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" 
                            data-target="#editModal" @click="getDiscType(discType.id)">
                                <i class="fa fa-edit">Edit</i>
                            </button>
                            <button type="button" class="btn btn-danger" @click="deleteDiscType(discType.id)"><i class="fa fa-trash"> Delete</i></button>

                    </div>
               </li>
             
           </ul>

           
           <pagination :data="discTypes" @pagination-change-page="getResults" class="mt-5" >
                <span slot="prev-nav">&lt; </span>
                <span slot="next-nav"> &gt;</span>
            </pagination>
      
    </div>
</template>

<script>
    export default {
        data(){
            return {
                discTypes: {},
                discTypeToEdit: {}

            }
        },
        created(){
            axios.get('http://127.0.0.1:8000/discTypes')
                 .then(response => this.discTypes = response.data)
                 .catch(error => console.log(error));
        },

        methods:{
            getResults(page = 1) {
			            axios.get('http://127.0.0.1:8000/discTypes?page=' + page)
				              .then(response => {
					                this.discTypes = response.data;
				});
		},
         getDiscType(id){
            axios.get('http://127.0.0.1:8000/discTypes/' + id)
               .then(response => this.discTypeToEdit = response.data)
            //   .then(response => console.log(response.data))
            .catch(error => console.log(error));
        },

        deleteDiscType(id){
            axios.delete('http://127.0.0.1:8000/discTypes/' + id)
            .then(response => this.discTypes = response.data)
            .catch(error => console.log(error));
        },
        refresh(discTypes){
            this.discTypes = discTypes.data
        }
        
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
