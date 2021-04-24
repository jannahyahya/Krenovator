function addNewitem(input){
  var d = document.createElement("div"); 
  var checkbox ='<div id="task"><br><input type="checkbox" name="check" id="check"> ' ;
  var text = '<input type="text" name="kotak1" id="kotak1" value="'+ input+' ">';
  var button = '<input type="button" onclick = "this.parentNode.remove()"value="-"><br></div>';
  outputtext =  checkbox+text + button ;
  console.log(outputtext)
  
 return(outputtext);
}


function readTextBox() {
  var input = document.getElementById("todoinput").value;
  console.log(input);
  document.getElementById("itemlist").innerHTML += addNewitem(input);
 }

