function validate(event) {
  event.preventDefault(); // stop form from submitting

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();

  if (name === "" || email === "") {
    alert("Please enter both your name and email!");
    return false;
  }

  alert("Thanks for completing the quiz, " + name + "!");
  return true;
}
