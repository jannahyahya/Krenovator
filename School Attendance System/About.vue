<template>
  <v-row>
    <v-col
      cols="12"
      sm="6"
    >
      <v-hover
        v-slot="{ hover }"
        open-delay="200"
      >
        <v-card
          :elevation="hover ? 16 : 2"
          :class="{ 'on-hover': hover }"
          class="mx-auto"
          height="300"
          max-width="500"
        >
          <v-card-text class="font-weight-medium mt-12 text-center text-subtitle-1">
            <br><br>
           <h1>Nurin's Profile</h1> 
           <br><br>
           <br>
           <h4>Class : Cemerlang</h4>
           <h4>Total Student :  15</h4>
           
          </v-card-text>
          <br><br>
        </v-card>
      </v-hover>
           <v-alert
      border="top"
      color="red lighten-2"
      dark
    >
       Noted : Attendance will be be automatically updated .If students is absence more then 3 days consecutively students will receive warning letter thru email
    </v-alert>
    </v-col>
  </v-row>
</template>

<style lang="sass" scoped>
.v-card.on-hover.theme--dark
  background-color: rgba(#FFF, 0.8)
  >.v-card__text
    color: #000
</style>