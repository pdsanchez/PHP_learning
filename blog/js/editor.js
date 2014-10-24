function checkTitle(event) {
  var title = document.querySelector("input[name='title']");
  var warning = document.getElementById("title-warning");
  if (title.value === "") {
    event.preventDefault();
    warning.innerHTML = "*You must write a title for the entry";
  }
}
function init() {
  var editorForm = document.querySelector("form#editor");
  
  var title = document.querySelector("input[name='title']");
  title.required = false;
  
  editorForm.addEventListener("submit", checkTitle, false);
}

document.addEventListener("DOMContentLoaded", init, false);