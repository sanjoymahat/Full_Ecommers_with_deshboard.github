<template>
     <div class="form-inline form-group mt-2">
        <div class="col-md-4 ">  
            <select class="form-control" name="category_id" v-model="category" @change="getCategories">
                <option value="">Select Category</option>
                 <option v-for="data in categories" :value="data.id" :key="data.id">{{ data.name }}</option>
            </select>
        </div>
    </div>
    <div class="col-md-4"> 
       <select class="form-control" name="subcategory_id" v-model="subcategory" @change="getSubategories">
        <option value="">Select Subcategory</option>
         <option v-for="data in subcategories" :value="data.id" :key="data.id">{{data.name}}</option>
       </select>
    </div>
    <div class="col-md-4"> 
       <select class="form-control" name="childcategory_id">
        <option value="">Select Childcategory</option>
         <option v-for="data in childcategories" :value="data.id" :key="data.id">{{data.name}}</option>
       </select>
    </div>
    
</template>
<script>
export default({
    data() {
        return {
            category: 0,  // Assuming the category data is available in a variable named "category"
            categories: [],
            subcategory: 0,  // Assuming the category data is available in a variable named "category"
            subcategories: [],
            childcategory: 0,  // Assuming the category data is available in a variable named "category"
            childcategories: []  // Assuming the category data is available in a variable named "category"
        }   
    },
    mounted(){

        this.categories();
        this.subcategories();
        this.childcategories();


    },
    methods:{
        getCategories(){
            // Assuming you fetch the categories data from an API
            axios.get('api/category').then(response => {
                this.categories = response.data
            }).bind(thhis);
        },
        getSubcategories(){
            axios.get('api/subcategory',{params:{category_id:this.category}} ).then(response => {
                this.subcategories = response.data
            }).bind(thhis);
        },
        getSubcategories(){
            axios.get('api/childcategory',{params:{subcategory_id:this.subcategory}}).then(response => {
                this.childcategories = response.data
            }).bind(thhis);
        }
    }
})
</script>
