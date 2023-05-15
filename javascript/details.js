const form = document.querySelector("form"),
  continueBtn = form.querySelector("button");


form.onsubmit = (e) => {
    e.preventDefault(); //preventing form from submitting when any input is not given
};
//var select = e.options[e.selectedIndex].value;

continueBtn.onclick = ()=>{ 
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/info.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          let test = data.trim();
          if(test == "success"){
            location.href = "home.html";
          }else{
            console.log("error");
          }
        }
      }
    };
    let formData = new FormData(form);
    xhr.send(formData);
}

//alert(select);