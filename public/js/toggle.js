const text = document.getElementById("text");
const toggleButton = document.getElementById("toggleButton");
var full_text = text.innerHTML;
var sliced_text = text.innerHTML.slice(0,420);
text.innerHTML = sliced_text;
toggleButton.addEventListener("click", function() {
    if (toggleButton.innerHTML == "Expand") {
    text.innerHTML = full_text;
    toggleButton.innerHTML = "Collapse";
   } else {
    text.innerHTML = sliced_text;
    toggleButton.innerHTML = "Expand";
   }
});