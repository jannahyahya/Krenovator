<template>
<v-app>

    <span ></span>
    <v-btn color="Update" @click="fupdate">Update</v-btn>

    <v-btn color="Add" @click="fadd">Add</v-btn>

    <v-btn color="success">
        <span v-if="x == 5"> lina</span>
        <span v-else-if="x === 4">mmm </span>
    </v-btn>
</v-app>
</template>

<script>

export default{
    data: ()=>({
        x:null,
        
    }),
    methods:{

        fupdate(){
            
            this.x = 5
        },

        fadd(){

            this.x = 4
        }
    }
}


</script>