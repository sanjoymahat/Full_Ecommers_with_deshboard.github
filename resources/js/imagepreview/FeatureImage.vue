<template>
    <div>
        <input type="file" name="feature_image" @change="onFileChange" class="custom-file" required="" accept="image/*">
        <div id="preview">
            <img v-if="url" :src="url" alt="" srcset="" width="100" height="60">
        </div>
    </div>
</template>
<script>
export default{
    data(){
         return {
            url:''
        }
    },
    methods:{
        onFileChange(event){
            const file = event.target.files[0];
            this.url = URL.createObjectURL(file);
            // const reader = new FileReader();
            // reader.onload = (e) => {
            //     this.url = e.target.result;
            // }
            // reader.readAsDataURL(file);
        }
    }
}
</script>