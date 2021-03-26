<template>
  <div class="container">
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

              <add-author @author-added="refresh"></add-author> 
             <ul class="list-group">
               <li class="list-group-item d-flex justify-content-between align-item-center" v-for="author in authors.data" :key="author.id">
                   <a href="#">{{author.name}}</a>
                <div>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" 
                    data-target="#editModal" @click="getAuthor(author.id)"><i class="fa fa-edit"></i>
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger" @click="deleteAuthor(author.id)"><i class="fa fa-trash"></i> Delete</button>

                </div>
               </li>
               <edit-author v-bind:authorToEdit="authorToEdit" @author-updated="refresh"></edit-author>
          
           </ul>
     
           
           <pagination :data="authors" @pagination-change-page="getResults" class="mt-5" >
                <span slot="prev-nav">&lt; </span>
                <span slot="next-nav"> &gt;</span>
            </pagination>
      
    </div>
</template>

<script>
    export default {
        data(){
            return {
                authors: {},
                 authorToEdit:''

            }
        },
        created(){
            axios.get('http://127.0.0.1:8000/authors')
                 .then(response => this.authors = response.data)
                 .catch(error => console.log(error));
        },

        methods:{
            getResults(page = 1) {
			            axios.get('http://127.0.0.1:8000/authors?page=' + page)
				              .then(response => {
					                this.authors = response.data;
				});
		},
        
        
        getAuthor(id){
            axios.get('http://127.0.0.1:8000/authors/' + id)
              .then(response => this.authorToEdit = response.data)
            //   .then(response => console.log(response.data))
              .catch(error => console.log(error));
        },

        deleteAuthor(id){
            axios.delete('http://127.0.0.1:8000/authors/' + id)
            .then(response => this.authors = response.data)
            .catch(error => console.log(error));
        },

          refresh(authors){
            this.authors = authors.data
        }

        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>