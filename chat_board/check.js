var modal = document.getElementById('myModal');

var btn = document.getElementById("modal-open");

var close = document.getElementById("modal-close");


var openfunc = function(){
  modal.style.display = "block";
}

var closefunc = function(){
  modal.style.display = "none";
}

btn.addEventListener("click", openfunc);

close.addEventListener("click", closefunc);
