const form = document.querySelector(".typing-area");
const inputField = form.querySelector(".input-field");
const sendBtn = form.querySelector("button");
const incoming_id = form.querySelector(".incoming_id").value;
const chatBox = document.querySelector(".chat-box");

inputField.focus();
inputField.addEventListener("keyup", function(){
    if(inputField.value != "")
    {
        sendBtn.classList.add("active");
    }
    else
    {
        sendBtn.classList.remove("active");
    }
});

sendBtn.addEventListener("click", function(e){
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = function()
    {
      if(xhr.readyState === XMLHttpRequest.DONE)
      {
          if(xhr.status === 200)
          {
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
});

chatBox.addEventListener("mouseenter", function()
{
  chatBox.classList.add("active");
});

chatBox.addEventListener("mouseleave", function()
{
  chatBox.classList.remove("active");
});


setInterval(function()
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = function()
    {
      if(xhr.readyState === XMLHttpRequest.DONE)
      {
        if(xhr.status === 200)
        {
          let data = xhr.response;
          chatBox.innerHTML = data;
          if(!chatBox.classList.contains("active"))
          {
            scrollToBottom();
          }
        }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 500);
  
  

function scrollToBottom()
{
    chatBox.scrollTop = chatBox.scrollHeight;
}
  