function checkTitle(event) {
  var title = document.querySelector("input[name='title']");
  var warning = document.getElementById("title-warning");
  if (title.value === "") {
    event.preventDefault();
    warning.innerHTML = "*You must write a title for the entry";
  }
}

function updateEditorMsg() {
  var p = document.querySelector("#editor-msg");
  p.innerHTML = "Changes not saved";
}

function init() {
  var editorForm = document.querySelector("form#editor");
  
  var title = document.querySelector("input[name='title']");
  title.required = false;
  
  var txtarea = document.querySelector("form textarea");
  txtarea.addEventListener("keyup", updateEditorMsg, false);
  
  title.addEventListener("keyup", updateEditorMsg, false);
  
  editorForm.addEventListener("submit", checkTitle, false);
}

document.addEventListener("DOMContentLoaded", init, false);