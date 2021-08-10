<template>
  <v-row justify="center">
    <v-col
      cols="12"
      sm="8"
    >
      <v-card>
        <v-card-title class="cyan darken-1">
          <span class="text-h5 white--text">Nurin</span>

          <v-spacer></v-spacer>

          <v-btn
            dark
            icon
          >
            <v-icon>mdi-chevron-left</v-icon>
          </v-btn>

          <v-btn
            dark
            icon
          >
            <v-icon>mdi-pencil</v-icon>
          </v-btn>

          <v-btn
            dark
            icon
          >
            <v-icon>mdi-dots-vertical</v-icon>
          </v-btn>
        </v-card-title>

        <v-list>
          
          <v-list-item>
            <v-list-item-action>
              <v-icon>mdi-email</v-icon>
            </v-list-item-action>

            <v-list-item-content>
              <v-list-item-title>{{UD.Teacher_email}} </v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          

        </v-list>

        
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import {  mapGetters } from "vuex";
export default{
    name: "Email",
     
     computed:{
    ...mapGetters({
      loggedin: "Cookie/LoginState", 
      UD:"Cookie/getUserData",
      type:"Cookie/getUserType",
    }),
  }
}
</script>