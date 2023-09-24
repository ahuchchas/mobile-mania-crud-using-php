function productValidation(event) {
  event.preventDefault();

  const name = document.getElementById("name").value;
  const proc = document.getElementById("proc").value;
  const ram = document.getElementById("ram").value;
  const rom = document.getElementById("rom").value;
  const price = document.getElementById("price").value;

  const nameRegex = /^[a-zA-Z0-9.()\s]+$/;
  const priceRegex = /^[0-9.]+$/;

  if (nameRegex.test(name) === false) {
    document.getElementById("ename").innerHTML =
      "Only alphabets and digits are allowed";
    return;
  } else {
    document.getElementById("ename").innerHTML = "";
  }
  if (nameRegex.test(proc) === false) {
    document.getElementById("eproc").innerHTML =
      "Only alphabets and digits are allowed";
    return;
  } else {
    document.getElementById("eproc").innerHTML = "";
  }
  if (nameRegex.test(ram) === false) {
    document.getElementById("eram").innerHTML =
      "Only alphabets and digits are allowed";
    return;
  } else {
    document.getElementById("eram").innerHTML = "";
  }
  if (nameRegex.test(rom) === false) {
    document.getElementById("erom").innerHTML =
      "Only alphabets and digits are allowed";
    return;
  } else {
    document.getElementById("erom").innerHTML = "";
  }
  if (priceRegex.test(price) === false) {
    document.getElementById("eprice").innerHTML = "Only digits are allowed";
    return;
  } else {
    document.getElementById("eprice").innerHTML = "";
  }

  document.getElementById("pform").submit();
}
