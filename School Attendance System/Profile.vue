
<template>
  <v-card
    :loading="loading"
    class="mx-auto my-12"
    max-width="374"
  >
    <template slot="progress">
      <v-progress-linear
        color="deep-purple"
        height="10"
        indeterminate
      ></v-progress-linear>
    </template>

    <v-img
      height="250"
      src="https://randomuser.me/api/portraits/women/40.jpg"
    ></v-img>
    


    <v-card-title  >{{UD.Student_Name}} Class  1 Bestari {{UD.Class_name}}</v-card-title>
    

    <v-card-text>
      <v-row
        align="left"
        class="mx-0"
      >
        <v-rating
          :value="4.5"
          color="amber"
          dense
          half-increments
          readonly
          size="14"

        ></v-rating>

        <div class="grey--text ms-4">
          {{UD.type}}'s Achivement
        </div>
      </v-row>

      <div class="my-4 text-subtitle-1">
        
      </div>

      <div></div>
    </v-card-text>

    <v-divider class="mx-4"></v-divider>

    <v-card-title></v-card-title>
    <v-card-title>Date Update : {{StudentStatus.DateUpdated}}</v-card-title>
    <v-card-title>Current Body Temperature : {{UD.Temp_Updated}} C</v-card-title>

    <v-card-text>
      
    </v-card-text>

    <v-card-actions>
     
      <v-btn
        color="deep-purple lighten-2"
        text
        @click="reserve"
      >
        Email
      </v-btn>
      

    </v-card-actions>
  </v-card>
  
</template>
<script>
import {  mapGetters } from "vuex";
import { StudentStatus } from "@/api/Profile";
  export default {
    data: () => ({
      loading: false,
      selection: 3,
    }),

    methods: {
      initialize() {
      StudentStatus().then(response => {
        // console.log(response); //code untuk proses data and masukkan ke table.
        this.tabledata = response;
      });
    },
      reserve () {
        this.loading = true
        
        setTimeout(() => (this.loading = false), 2000)
      },
    },
    computed:{
    ...mapGetters({
     
      UD:"Cookie/getUserData",
      
    }),
  }
  }
</script>