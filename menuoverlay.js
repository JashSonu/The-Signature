var modal1 = document.getElementById("myModal1");
var modal2 = document.getElementById("myModal2");
var modal3 = document.getElementById("myModal3");
var modal4 = document.getElementById("myModal4");
var modal5 = document.getElementById("myModal5");
var modal6 = document.getElementById("myModal6");
var modal7 = document.getElementById("myModal7");


var box1 = document.getElementById("Pizza");
var box2 = document.getElementById("Soup");
var box3 = document.getElementById("Kabab");
var box4 = document.getElementById("BBQ");
var box5 = document.getElementById("Burger");
var box6 = document.getElementById("Subs");
var box7 = document.getElementById("Pasta");


var span1 = document.getElementsByClassName("close1")[0];
var span2 = document.getElementsByClassName("close2")[0];
var span3 = document.getElementsByClassName("close3")[0];
var span4 = document.getElementsByClassName("close4")[0];
var span5 = document.getElementsByClassName("close5")[0];
var span6 = document.getElementsByClassName("close6")[0];
var span7 = document.getElementsByClassName("close7")[0];



box1.onclick = function() {
  modal1.style.display = "block";
}
box2.onclick = function() {
  modal2.style.display = "block";
}
box3.onclick = function() {
  modal3.style.display = "block";
}
box4.onclick = function() {
  modal4.style.display = "block";
}
box5.onclick = function() {
  modal5.style.display = "block";
}
box6.onclick = function() {
  modal6.style.display = "block";
}
box7.onclick = function() {
  modal7.style.display = "block";
}



span1.onclick = function() {
  modal1.style.display = "none";
}
span2.onclick = function() {
  modal2.style.display = "none";
}
span3.onclick = function() {
  modal3.style.display = "none";
}
span4.onclick = function() {
  modal4.style.display = "none";
}
span5.onclick = function() {
  modal5.style.display = "none";
}
span6.onclick = function() {
  modal6.style.display = "none";
}
span7.onclick = function() {
  modal7.style.display = "none";
}



window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
  else if (event.target == modal2) {
    modal2.style.display = "none";
  }
  else if (event.target == modal3) {
    modal3.style.display = "none";
  }
  else if (event.target == modal4) {
    modal4.style.display = "none";
  }
  else if (event.target == modal5) {
    modal5.style.display = "none";
  }
  else if (event.target == modal6) {
    modal6.style.display = "none";
  }
  else if (event.target == modal7) {
    modal7.style.display = "none";
  }

}