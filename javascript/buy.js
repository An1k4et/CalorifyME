const view = document.getElementById("submit");
const form = document.querySelector("form");
form.onsubmit = (e) => {
    e.preventDefault(); //preventing form from submitting when any input is not given
  };

view.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/buy.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {        
          var test = xhr.response; //when user send message the input box become empty
          
        }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}