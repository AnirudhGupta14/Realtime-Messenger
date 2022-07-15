const form = document.querySelector(".signup form"),
submitBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.addEventListener("submit", function(e)
{
  e.preventDefault();
});

submitBtn.addEventListener("click", function(e)
{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = function(){
    if(xhr.readyState === XMLHttpRequest.DONE)
    {
      if(xhr.status === 200)
      {
        let data = xhr.response;
        if(data === "success")
        {
          location.href= "login.php";
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
