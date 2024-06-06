const form = document.querySelector(".form form"),
  continueBtn = form.querySelector(" #submit"),
  errormsg = document.querySelector(".error")

form.onsubmit = (e) => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "success") {
            console.log(data)
          location.href = "verify.php";
        } else {
          errormsg.style.display = "block";
          errormsg.textContent = data;
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};
