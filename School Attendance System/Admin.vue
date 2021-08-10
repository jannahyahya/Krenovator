<template>
  <v-card class="mx-auto my-12 px-5 py-12" max-width="700">
    <form class="mx-12 px-12">
        <v-text-field
        v-model="username"
        :error-messages="nameErrors"
      
        label="Username"
        required
        @input="$v.username.$touch()"
        @blur="$v.username.$touch()"
      ></v-text-field>
      <v-text-field
        v-model="password"
        :error-messages="passwordErrors"
        label="Password"
        
        required
      type="password"
        @input="$v.password.$touch()"
        @blur="$v.password.$touch()"
      ></v-text-field>

      <v-btn class="mr-4" @click="submit">Login Here </v-btn>

    <br>
    </form>
      <v-alert
      :value="alert"
      color="pink"
      border="top"
      icon="mdi-key"
      transition="scale-transition"
      dismissible
      type="warning"
    >
      Login Unsuccessful 
    </v-alert>

  </v-card>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import { validationMixin } from "vuelidate";
import { required } from "vuelidate/lib/validators";
import { fetchLogin } from "@/api/Admin";

export default {
  mixins: [validationMixin],

  validations: {
    username: { required },
    password: { required }
  },

  data: () => ({
    username: "",
    password: "",
    alert: false
  }),

  computed: {
    ...mapGetters({
      UD: "Cookie/getUserData"
    }),
    usernameErrors() {
      const errors = [];
      if (!this.$v.username.$dirty) return errors;
      !this.$v.username.required && errors.push("Username is required.");
      return errors;
    },
    passwordErrors() {
      const errors = [];
      if (!this.$v.password.$dirty) return errors;
      !this.$v.password.required && errors.push("Password is required");
      return errors;
    }
  },

  methods: {
    ...mapActions({
      SetLogin: "Cookie/SetLogin",
      SetData: "Cookie/SetData"
    }),
    submit() {
      this.$v.$touch();
      fetchLogin({
        NAme: this.username,
        PassID: this.password
      }).then(response => {
        console.log(response);
        this.SetData(response);

        console.log(response);
        if (response.UserLogin == true) {
          this.$router.replace({
            name: "Fattendance"
          });
        } else {
          console.log("Jangan bagi pergi");
          this.alert=true;
        }
      });
    },
    clear() {
      this.$v.$reset();
      this.username = "";
      this.password = "";
    }
  }
};
</script>