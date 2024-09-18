<template>
    <div class="form-inline form-group mt-2">
       <div class="col-md-4 ">  
           <select class="form-control" name="country_id" v-model="country" @change="getCountry">
               <option value="">Select Country</option>
                <option v-for="data in countries" :value="data.id" :key="data.id">{{ data.name }}</option>
           </select>
       </div>
   </div>
   <div class="col-md-4"> 
      <select class="form-control" name="state_id" v-model="state" @change="getState">
       <option value="">Select State</option>
        <option v-for="data in states" :value="data.id" :key="data.id">{{data.name}}</option>
      </select>
   </div>
   <div class="col-md-4"> 
      <select class="form-control" name="city_id">
       <option value="">Select City</option>
        <option v-for="data in cities" :value="data.id" :key="data.id">{{data.name}}</option>
      </select>
   </div>
   
</template>
<script>
export default({
   data() {
       return {
           country: 0,  // Assuming the category data is available in a variable named "category"
           countries: [],
           state: 0,  // Assuming the category data is available in a variable named "category"
           states: [],
           city: 0,  // Assuming the category data is available in a variable named "category"
           cities: []  // Assuming the category data is available in a variable named "category"
       }   
   },
   mounted(){

       this.countries();
       this.states();
       this.cities();


   },
   methods:{
       getCountry(){
           // Assuming you fetch the categories data from an API
           axios.get('api/country').then(response => {
               this.countries = response.data
           }).bind(thhis);
       },
       getState(){
           axios.get('api/state',{params:{country_id:this.country}} ).then(response => {
               this.states = response.data
           }).bind(thhis);
       },
       getCity(){
           axios.get('api/childcategory',{params:{state_id:this.state}}).then(response => {
               this.cities = response.data
           }).bind(thhis);
       }
   }
})
</script>
