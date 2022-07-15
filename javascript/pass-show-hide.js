const pswrdField = document.querySelector(".form input[type='password']"),
toggleIcon = document.querySelector(".form .field i");
toggleIcon.addEventListener("click", function()
{
  if(pswrdField.type === "password"){
    pswrdField.type = "text";
    toggleIcon.classList.add("active");
  }else{
    pswrdField.type = "password";
    toggleIcon.classList.remove("active");
  }
});
