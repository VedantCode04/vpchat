let pass = document.querySelector(".pass-show input");
let show = document.querySelector(".pass-show span");
let hide = document.querySelector(".pass-show span span img");
var flag = 1;
show.onclick = () => {
  if (flag) {
    pass.type = "text";
     hide.src = "img/hide.png";
    flag = 0;
  } else {
    pass.type = "password";
    hide.src = "img/show.png";
    flag = 1;
  }
};
