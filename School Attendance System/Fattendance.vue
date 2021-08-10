<template>
  <v-data-table
    :headers="headers"
    :items="tabledata"
    sort-by="calories"
    class="elevation-1"
  >
    <template v-slot:top>
      <v-toolbar flat>
        <v-toolbar-title>Attendance</v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="500px">
          
          <v-card>
            <v-card-title>
              <span class="text-h5">{{ formTitle }}{{ on }}{{ attrs }} </span>
            </v-card-title>

             <v-card-text>
              <v-container>
                <v-row>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field
                      v-model="formdata.Student_Name"
                      label="Student_Name" 
                      required
                      @input="$v.Student_Name.$touch()">
                    </v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field
                      v-model="formdata.Date"
                      label="Date" 
                      text="YYYY-MM-DD"
                      required
                      @input="$v.Date.$touch()">
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
      <v-icon small class="mr-2" @click="editItem(item)"></v-icon>
      <v-icon small @click="deleteItem(item)"> mdi-delete </v-icon>
    </template>
   
  </v-data-table>
</template>


<script>
import { fetchAll ,fetchUpdate ,DeleteAttendance} from "@/api/Admin";
import { mapGetters} from "vuex";

export default {
  data: () => ({
    name: "",
    date: "",
    dialog: false,
    dialogDelete: false,
    headers: [
      { text: "ClassID", value: "ClassID",  align: "start" },
      { text: "Student_Name", value: "Student_Name"},
      { text: "January", value: "January", sortable: false },
      { text: "February", value: "February", sortable: false },
      { text: "March", value: "March", sortable: false },
      { text: "April", value: "April", sortable: false },
      { text: "May", value: "May", sortable: false },
      { text: "June", value: "June", sortable: false },
      { text: "July", value: "July", sortable: false },
      { text: "August", value: "August", sortable: false },
      { text: "September", value: "September", sortable: false },
      { text: "October", value: "October", sortable: false },
      { text: "November", value: "November", sortable: false },
      { text: "Date", value: "DateUpdated" },
      { text: "Body Temperature", value: "Temp_Updated", sortable: false },
      { text: "Actions", value: "actions", sortable: false },
    ],
    tabledata: [],
    editedIndex: -1,
    editedItem: {
      ClassID:"",
      Student_Name: "",
      January: 0,
      February: 0,
      March: 0,
      April: 0,
      May: 0,
      June: 0,
      July: 0,
      August: 0,
      September: 0,
      October: 0,
      November: 0,
      Date: 0,
    },
    formdata: {
      Student_Name: "",
      Date: "",
    },
     emptyform: {
      Student_Name: "",
      Date: "",
    },
    formtype: null
  }),

  computed: {
   /* formTitle() {
      return this.editedIndex === -1 ? "" : "Update Attendance";
    },*/
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
         DeleteAttendance(remove).then(response => {
          console.log(response);
        }); 
    },

    deleteItemConfirm() {
      this.tabledata.splice(this.editedIndex, 1);
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
        this.tabledata.push(this.editedItem);
      }
      this.close();
    }
  },
};
</script>