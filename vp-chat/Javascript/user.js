const search = document.getElementById("search")
const searchBtn = document.getElementById("searchBtn")
let users = document.querySelector(".userlist");
let link = document.querySelectorAll(".userlist a")

link.onclick = () => {
    window.location.href = link.href;
}

search.onkeyup = () => {
    console.log("first")
    let searchTerm = search.value;
    if (searchTerm != "") {
        search.classList.add("active");
    } else {
        search.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          users.innerHTML = data;
        }
      }
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
};

setInterval(() => {

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/user.php", true);

    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if (!search.classList.contains("active")) {
                    users.innerHTML = data;
                    console.log(data)
                }
            }
        }
    }

    xhr.send();
}, 500);


