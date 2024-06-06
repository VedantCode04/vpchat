let loginpage = document.querySelector(".login-page")  
const form = document.querySelector(".login-page form"),
  continueBtn = form.querySelector(" input.button"),
  errormsg = form.querySelector(".error");

form.onsubmit = (e) => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/register.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "success") {
          console.log(data)
          location.href = "verify.php";
        } else {
            errormsg.textContent = data;
            errormsg.style.display = "block";
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};
