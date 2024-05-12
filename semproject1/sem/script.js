var Loginopen=document.querySelector('#open-login');
var LoginClose=document.querySelector('.login-form');

Loginopen.addEventListener('click', () => LoginClose.classList.toggle('show'));
/*---------------Registration Started-----------------*/

function  validateForm(){
   returnval=true;

   let correct_way= /^[a-zA-Z]$/;
   // let correct_email=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
   // let correct_password=/[^A-Za-z0-9]/;
   //for getting value started-----------
let a= document.getElementById("f_name").value;
let b= document.getElementById("l_name").value;
let c= document.getElementById("location").value;
let d= document.getElementById("num").value;
let e= document.getElementById("mail").value;
let f= document.getElementById("f_name").value;
let g= document.getElementById("pass").value;
let h= document.getElementById("cpass").value;
//for getting value end================

//for error message start ==============
let ae=document.getElementById("err1");
let be=document.getElementById("err2");
let ce=document.getElementById("err3");
let de=document.getElementById("err4");
let ee=document.getElementById("err5");
let fe=document.getElementById("err6");
let ge=document.getElementById("err7");
let he=document.getElementById("err8");
//for error message start ==========================

// for first name start============================
if(a.length>20){
   ae.innerHTML="Length of name is too long";
   returnval = false;
}
if(!isNaN(a)){
   ae.innerHTML="Numbers are not allowed";
   returnval=false;
}
if(a==""){
   ae.innerHTML="Enter first name";
   returnval = false;
}
//first name end==================

//Lasr name start=========================
if(b.length>20){
   be.innerHTML="Length of name is too long";
   returnval = false;
}
if(!isNaN(b)){
   be.innerHTML="Numbers are not allowed";
   returnval=false;
}
if(b==""){
   be.innerHTML="Enter last name";
   returnval = false;
}
//Last name end============================
//Address part started===========================
if(c.length>20){
   ce.innerHTML="Length of address is too long";
   returnval = false;
}
if(!isNaN(b)){
   ce.innerHTML="Numbers are not allowed";
   returnval=false;
}
if(c==""){
   ce.innerHTML="Enter your address";
   returnval = false;
}
//Address part end=====================

//Mobile number part started======================
if(isNaN(d)){
   de.innerHTML="Enter a valid number";
   returnval=false;
}
if(d.length>10 || d.length<10){
   de.innerHTML="Enter a vaid number";
   returnval=false;
}
if((d.charAt(0)!=9)){
   de.innerHTML="Mobile number must start with 9";
   returnval=false;
}
if(d==""){
   de.innerHTML="Enter your number";
   returnval = false;
}
//mobile number part end====================
//Email part start===============================
// if(!e.match(correct_email)){
//    ee.innerHTML="Enter valid email";
//    returnval=false;
// }
if(e==""){
   ee.innerHTML="Enter Your Email";
   returnval=false;
}
//Email part end==========================

//User Role started====================
if(f==""){
   fe.innerHTML="Select your role";
}
//User Role ended====================

//Password part started=====================
if(g.length<8){
   ge.innerHTML="At least 8 values";
   returnval=false;
}
// if(!g.match(correct_password)){
//    ge.innerHTML="invalid password";
//    returnval=false;
// }
// if(!g.match(correct_way)){
//    ge.innerHTML="Enter at least one alphabet";
//    returnval=false;
// }
// if(!isNaN(g)){
//    ge.innerHTML="atleast one number";
//    returnval=false;
// }
if(g==""){
   ge.innerHTML="Enter password";
   returnval=false;
}
//password part end========================

//confirm password started=================
if(g!==h){
   he.innerHTML="password doesnt match";
   returnval=false;
}
//confirm password started=================



   return returnval;
}

/*---------------Registration End-----------------*/