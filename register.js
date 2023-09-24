function registerValidation(event) {
  event.preventDefault();

  const i_name = document.getElementById("r_name").value;
  const i_mobile = document.getElementById("r_mobile").value;
  const i_email = document.getElementById("r_email").value;
  const i_pass = document.getElementById("r_pass").value;
  const i_con_pass = document.getElementById("r_con_pass").value;

  const nameRegex = /^[a-zA-Z.\s]+$/;
  const mobileRegex = /^(\+88)?01[3-9]\d{8}$/;
  const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
  const passRegex = /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&])).{6,}$/;

  if (nameRegex.test(i_name) === false) {
    document.getElementById("ename").innerHTML =
      "Enter a valid name. Only alphabets and .(dot) are allowed";
    return;
  } else {
    document.getElementById("ename").innerHTML = "";
  }

  if (emailRegex.test(i_email) === false) {
    document.getElementById("eemail").innerHTML = "Enter a valid email";
    return;
  } else if (localStorage.getItem(i_email)) {
    document.getElementById("eemail").innerHTML =
      "This email is already used. Try another!";
    return;
  } else {
    document.getElementById("eemail").innerHTML = "";
  }

  if (mobileRegex.test(i_mobile) === false) {
    document.getElementById("emobile").innerHTML =
      "Enter a valid mobile number. Only BD mobile number is allowed";
    return;
  } else {
    document.getElementById("emobile").innerHTML = "";
  }

  if (passRegex.test(i_pass) === false) {
    document.getElementById("epass").innerHTML =
      "Password must be at least 6 character long, and must have at least 1 digit, 1 lowercase letter, 1 uppercase letter, 1 special character !@#$%^&";
    return;
  } else {
    document.getElementById("epass").innerHTML = "";
  }

  if (i_con_pass !== i_pass) {
    document.getElementById("e_con_pass").innerHTML =
      "Password and confirm password must be same";
    return;
  } else {
    document.getElementById("e_con_pass").innerHTML = "";
  }

  document.getElementById("regform").submit();
}
