function loginValidation(event) {
  event.preventDefault();

  const i_email = document.getElementById("l_email").value;
  const i_pass = document.getElementById("l_pass").value;

  const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
  const passRegex = /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&])).{6,}$/;

  if (emailRegex.test(i_email) === false) {
    document.getElementById("eemail").innerHTML = "Enter a valid email";
    return;
  } else {
    document.getElementById("eemail").innerHTML = "";
  }

  if (passRegex.test(i_pass) === false) {
    document.getElementById("epass").innerHTML =
      "Entered password is in invalid format.";
    return;
  } else {
    document.getElementById("epass").innerHTML = "";
  }

  document.getElementById("loginform").submit();
}
