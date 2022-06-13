var mod = document.getElementById("myModal");

 var map = document.getElementById("seemap");

var seat = document.getElementById("table");

var span = document.getElementsByClassName("close")[0];

seat.onclick = function() {
    mod.style.display = "block";
  }

span.onclick = function() {
    mod.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == mod) {
      mod.style.display = "none";
    }
}

map.onclick = function() {
  mod.style.display = "block";
}

