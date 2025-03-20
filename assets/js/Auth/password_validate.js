var validation_pwd = 0;
var pwd_myInput = document.getElementById("Password");
var pwd_letter = document.getElementById("password-letter");
var pwd_capital = document.getElementById("password-capital");
var pwd_number = document.getElementById("password-number");
var pwd_sc = document.getElementById("password-special-character");
var pwd_length = document.getElementById("password-length");

function password_validation() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  var validation_pwd_letter = 0;
  if (pwd_myInput.value.match(lowerCaseLetters)) {
    pwd_letter.classList.remove("invalid");
    pwd_letter.classList.add("valid");
    validation_pwd_letter = 1;
  } else {
    pwd_letter.classList.remove("valid");
    pwd_letter.classList.add("invalid");
    validation_pwd_letter = 0;
  }

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  var validation_pwd_uppercaseletter = 0;
  if (pwd_myInput.value.match(upperCaseLetters)) {
    pwd_capital.classList.remove("invalid");
    pwd_capital.classList.add("valid");
    validation_pwd_uppercaseletter = 1;
  } else {
    pwd_capital.classList.remove("valid");
    pwd_capital.classList.add("invalid");
    validation_pwd_uppercaseletter = 0;
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  var validation_pwd_number = 0;
  if (pwd_myInput.value.match(numbers)) {
    pwd_number.classList.remove("invalid");
    pwd_number.classList.add("valid");
    validation_pwd_number = 1;
  } else {
    pwd_number.classList.remove("valid");
    pwd_number.classList.add("invalid");
    validation_pwd_number = 0;
  }

  var sc = /[!@#$%^&*]/g;
  var validation_pwd_sc = 0;
  if (pwd_myInput.value.match(sc)) {
    pwd_sc.classList.remove("invalid");
    pwd_sc.classList.add("valid");
    validation_pwd_sc = 1;
  } else {
    pwd_sc.classList.remove("valid");
    pwd_sc.classList.add("invalid");
    validation_pwd_sc = 0;
  }

  // Validate length
  var validation_pwd_length = 0;
  if (pwd_myInput.value.length >= 8) {
    pwd_length.classList.remove("invalid");
    pwd_length.classList.add("valid");
    validation_pwd_length = 1;
  } else {
    pwd_length.classList.remove("valid");
    pwd_length.classList.add("invalid");
    validation_pwd_length = 0;
  }


  if (validation_pwd_letter == 0 || validation_pwd_uppercaseletter == 0 || validation_pwd_number == 0 || validation_pwd_sc == 0 || validation_pwd_length == 0) {
    validation_pwd = 0;
  } else {
    validation_pwd = 1;
  }

  $("#validation-password-val").val(validation_pwd);
}