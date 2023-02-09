// Get the input element
const input = document.getElementById("image");
const add_pic_but = document.getElementById("pic_submit");

// Listen for a change event on the input element
input.addEventListener("change", function() {


  // Get the file
  const file = input.files[0];

  // Create a new FileReader
  const reader = new FileReader();

  // Listen for the load event on the FileReader
  reader.addEventListener("load", function() {
    // Get the preview element
    
    const preview = document.getElementById("preview");
    add_pic_but.disabled = false;
    // Set the src of the preview element to the result of the FileReader
    preview.src = reader.result;

    // Show the preview element
    preview.style.display = "block";
  });

  // Read the file as a data URL
  reader.readAsDataURL(file);
});