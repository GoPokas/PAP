function triggerClick() {
  document.querySelector("#profilePicture").click();
}

function displayImage(input) {
  if (input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      document
        .querySelector("#profileDisplay")
        .setAttribute("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
