<template>
  <v-data-table
    :headers="headers"
    :items="tabledata"
    sort-by="calories"
    class="elevation-1"
  >
    <template v-slot:top>
      <v-toolbar flat>
        <v-toolbar-title>Classes</v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="500px">
          <template v-slot:activator="{ on, attrs }">
            <v-btn 
             color="primary"
              dark
              class="mb-2"
              v-bind="attrs"
              v-on="on"
              @click="AddItem()"
              >
              Add Class
            </v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="text-h5">{{ formTitle }}{{ on }}{{ attrs }} </span>
            </v-card-title>

             <v-card-text>
              <v-container>
                <v-row>
                  
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field
                      v-model="formdata.Class_name"
                      label="Class_name" 
                      required
                      @input="$v.Class_name.$touch()">
                    </v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field
                      v-model="formdata.Total_Student"
                      label="Total_Student" 
                      required
                      @input="$v.Total_Student.$touch()">
                    </v-text-field>
                  </v-col>

                  
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close"> Cancel </v-btn>
              <v-btn color="blue darken-1" text @click="save"> Save </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
        <v-dialog v-model="dialogDelete" max-width="500px">
          <v-card>
            <v-card-title class="text-h5"
              >Are you sure you want to delete this item?</v-card-title
            >
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="closeDelete"
                >Cancel</v-btn
              >
              <v-btn color="blue darken-1" text @click="deleteItemConfirm"
                >OK</v-btn
              >
              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
    <template v-slot:item.actions="{item}">
      <v-icon small class="mr-2" @click="editItem(item)"> mdi-pencil </v-icon>
      <v-icon small @click="deleteItem(item)"> mdi-delete </v-icon>
    </template>
   
  </v-data-table>
</template>


<script>
import { fetchAll ,fetchUpdate , AddClass ,DeleteClass} from "@/api/Class";
import { mapGetters } from "vuex";

export default {
  data: () => ({
    name: "",
    date: "",
    dialog: false,
    dialogDelete: false,
    headers: [
      { text: "ClassID", value: "ClassID", align: false },
      { text: "Class_name", value: "Class_name", align: "start" },
      { text: "Total_Student", value: "Total_Student",  sortable: false },
      { text: "Actions", value: "actions", sortable: false },
    ],
    tabledata: [],
    editedIndex: -1,
    editedItem: {
      Class_name: "",
      Total_Student:"",
    },
     formdata: {
      Class_name: "",
      Total_Student:"",
    },
    emptyform: {
      Class_name: "",
      Total_Student:"",
    },
    formtype: null
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "Add New Class" : "Update Class Data";
    },
    ...mapGetters({
       UD: "Cookie/getUserData", 
    }),
  },

  watch: {
    dialog(val) {
      val || this.close();
    },
    dialogDelete(val) {
      val || this.closeDelete();
    },
  },

  created() {
    this.initialize();
  },

  methods: {
    
    initialize() {
      fetchAll().then(response => {
        // console.log(response); //code untuk proses data and masukkan ke table.
        this.tabledata = response;
      });
    },


    editItem(item) {
      console.log(item);
      this.editedIndex = this.tabledata.indexOf(item);

      this.editedItem = Object.assign({}, item);

      this.dialog = true;

      this.formdata = this.editedItem;
      this.formtype = "edit";
    },
     AddItem() {
      this.editedIndex = -1;
      this.formdata = this.emptyform;
      this.formtype = "add";
    },

    deleteItem(item) {
      this.editedIndex = this.tabledata.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialogDelete = true;

       let remove=item;
        //ubah observer kepada JSON data
        remove=JSON.parse(JSON.stringify(remove));
        console.log(remove);
        
        console.log("deleteItem");
        
        this.tabledata.push(remove);
         DeleteClass(remove).then(response => {
          console.log(response);
        }); 
    },

    deleteItemConfirm() {

      this.tabledata.splice(this.editedIndex, 1);
      console.log();

      this.closeDelete();
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.formdata);
        this.editedIndex = -1;
      });
    },

    closeDelete() {
      this.dialogDelete = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.formdata);
        this.editedIndex = -1;
      });
    },
  
    save() {
      if (this.editedIndex > -1) {
        //update
        // Object.assign(this.tabledata[this.editedIndex], this.editedItem);
        fetchUpdate(this.formdata).then(response => {
          console.log(response);
        });
      } else {
        ///add
        //insert into db punya api
        let data1=this.formdata;
        //ubah observer kepada JSON data
        data1=JSON.parse(JSON.stringify(data1));
        console.log(data1);
        
        console.log("editedItem");
        console.log(this.formdata);
        this.tabledata.push(data1);
         AddClass(data1).then(response => {
          console.log(response);
        });

      }
      this.close();
    }
  },
};
</script>