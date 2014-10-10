document.addEventListener("DOMContentLoaded", init, false);

function init() {
  var lboxElems = "<div id=\"lightbox\">";
  lboxElems += "<div id=\"overlay\" class=\"hidden\"></div>";
  lboxElems += "<img id=\"big-img\" class=\"hidden\">";
  lboxElems += "</div>";
  document.querySelector("body").innerHTML += lboxElems;
  
  var bigImg = document.querySelector("#big-img");
  bigImg.addEventListener("click", toggle, false);
  prepareThumbs();
}

function prepareThumbs() {
  var liElems = document.querySelectorAll("ul#images li");
  var img, li, i = 0;
  while (i < liElems.length) {
    li = liElems[i];
    li.setAttribute("class", "lightbox");
    img = li.querySelector("img");
    img.addEventListener("click", toggle, false);
    i++;
  }
}

function toggle(ev) {
  var clickedImg = ev.target;
  var bigImg = document.querySelector("#big-img");
  var overlay = document.querySelector("#overlay");
  bigImg.src = clickedImg.src;
  if (overlay.getAttribute("class") === "hidden") {
    overlay.setAttribute("class", "showing");
    bigImg.setAttribute("class", "showing");
  }
  else {
    overlay.setAttribute("class", "hidden");
    bigImg.setAttribute("class", "hidden");
  }
}