axios.post("logout").then(response => { 
   console.log(response);
})
.catch(error => {
   console.log(error);
});