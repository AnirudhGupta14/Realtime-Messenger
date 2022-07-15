const form = document.querySelector(".login form"),
submitBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");


submitBtn.addEventListener("click", function(e)
{
  e.preventDefault();
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/login.php", true);
  xhr.onload = function(){
    if(xhr.readyState === XMLHttpRequest.DONE)
    {
      if(xhr.status === 200)
      {
        let data = xhr.response;
        if(data === "success")
        {
          location.href= "users.php";
        }
        else
        {
          errorText.style.display = "block";
          errorText.innerHTML = data;
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
});
