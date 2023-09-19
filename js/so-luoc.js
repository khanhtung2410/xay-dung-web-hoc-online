function menudropdown(){
  var x = document.getElementById("dropdown-menu");
  if (x.className.indexOf("w3-show") == -1) 
    x.className += " w3-show";
   else 
    x.className = x.className.replace(" w3-show", "");
} 
function login(){
  document.getElementById("change-form").textContent = "Log in";
  document.getElementById("status").innerHTML = "SIGN UP";
  document.getElementById("confirm").value = "Sign up for free";
  document.getElementById("acc-Q").innerHTML = "Already have acount ?"
  document.getElementById("pass-validation").style.display="block";
  document.getElementById("email").style.display="block";
  document.getElementById("remember").style.display="none";
}                       