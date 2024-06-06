const form = document.querySelector(".text-input");
input = form.querySelector("#inputMessage");
send = form.querySelector("button");
chat_content = document.querySelector(".chat-content")

form.onsubmit = (e) => {
  e.preventDefault();
};

send.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/addChat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
        input.value = "";
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/getChat.php", true);

  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chat_content.innerHTML = data;
        // console.log(data)
        chat_content.scrollTo = chat_content.scrollHeight;
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
}, 500);

