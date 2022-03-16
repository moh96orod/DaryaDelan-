"use strict";

var slideIndex = 1;
showSlides(slideIndex); // Next/previous controls

function plusSlides(n) {
  showSlides(slideIndex += n);
} // Thumbnail image controls


function currentSlide2(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");

  if (n > slides.length) {
    slideIndex = 1;
  }

  if (n < 1) {
    slideIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
} /////////////////////////////////


var modal = document.getElementById("myModal"); // Get the button that opens the modal

var btn = document.getElementById("myBtn"); // Get the <span> element that closes the modal

var span = document.getElementsByClassName("close")[0];
var userName = localStorage.getItem("user_name");
var password = localStorage.getItem("password"); // When the user clicks on the button, open the modal

btn.onclick = function (v) {
  if (userName != null) {
    btn.innerHTML = userName;
    window.location.assign("./login/login.php?user_name=" + userName + "&pass=" + password);
  }

  if (userName === null) {
    modal.style.display = "block";
  }
};

function close() {
  modal.style.display = "none";
} // When the user clicks on <span> (x), close the modal


span.onclick = function () {
  modal.style.display = "none";
}; // When the user clicks anywhere outside of the modal, close it


window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

function openSignUpModal() {
  var signUpDiv = document.getElementById("modalContent");
  signUpDiv.innerHTML = "\n        <span class=\"close\" onclick='close()'>&times;</span>\n\t\t\t\t<fieldset>\n                    <legend><p>\u062B\u0628\u062A \u0646\u0627\u0645 \u0628\u0647 \u0639\u0646\u0648\u0627\u0646: </p></legend>\n                    <hr/>\n                    <br/>\n                    <input class=\"form-check-input\" type=\"checkbox\" value=\"user\" id=\"checkbox1\"/> \u06A9\u0627\u0631\u0628\u0631\n                    <br/>\n                    <input class=\"form-check-input\" type=\"checkbox\" value=\"pricer\" id=\"checkbox2\"/> \u0641\u0631\u0648\u0634\u0646\u062F\u06AF\u0627\u0646\n                    <br/>\n                    <input class=\"form-check-input\" type=\"checkbox\" value=\"wholesaler\" id=\"checkbox3\"/> \u0639\u0645\u062F\u0647 \u0641\u0631\u0648\u0634\u0627\u0646\n                    <br/>\n                    <br/>\n                </fieldset>\n                <button class=\"btn btn-danger\" onclick=\"nextSignUp()\">\u0627\u062F\u0627\u0645\u0647</button>\n                <br/>\n        </span>\n        ";
}

function nextSignUp() {
  var valueCheckBox = "";
  var signUpDiv = document.getElementById("modalContent");
  var userCheckBox = document.getElementById("checkbox1");

  if (userCheckBox.checked == true) {
    valueCheckBox = "User";
  }

  var pricerCheckBox = document.getElementById("checkbox2");

  if (pricerCheckBox.checked === true) {
    valueCheckBox = "Pricer";
  }

  var wholesalerPricer = document.getElementById("checkbox3");

  if (wholesalerPricer.checked === true) {
    valueCheckBox = "Wholesaler";
  }

  if (valueCheckBox === "") {
    alert("لطفا نقش خود را انتخاب کنید.");
  }

  if (valueCheckBox === "User") {
    signUpDiv.innerHTML = "\n        <span class=\"close\">&times;</span>\n\t\t\t\t<form action='./signup/user.php?q=".concat(valueCheckBox, "' method='POST'>\n                    <h5>\u06A9\u0627\u0631\u0628\u0631</h5>\n                    <hr/>\n                    <br/>\n                    <div class=\"input-group mb-3\">\n            <div class=\"input-group-prepend\">\n              <span class=\"input-group-text\" id=\"basic-addon1\">\n                <img src=\"./photo/user.jpg\" class=\"icon2\" alt=\"\u0646\u0627\u0645 \u06A9\u0627\u0631\u0628\u0631\u06CC\">\n              </span>\n            </div>\n            <input type=\"text\" name=\"user_name\" class=\"form-control\" placeholder=\"\u0646\u0627\u0645 \u06A9\u0627\u0631\u0628\u0631\u06CC\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n          </div>\n          <div class=\"input-group mb-3\">\n            <div class=\"input-group-prepend\">\n              <span class=\"input-group-text\" id=\"basic-addon1\">\n                <img src=\"./photo/password.png\" class=\"icon2\" alt=\"\u067E\u0633\u0648\u0631\u062F\">\n              </span>\n            </div>\n            <input type=\"password\" name=\"password\" class=\"form-control\" placeholder=\"\u067E\u0633\u0648\u0631\u062F\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n          </div>\n          <div class=\"input-group mb-3\">\n            <div class=\"input-group-prepend\">\n              <span class=\"input-group-text\" id=\"basic-addon1\">\n                <img src=\"./photo/phone.png\" class=\"icon2\" alt=\"\u0634\u0645\u0627\u0631\u0647 \u062A\u0644\u0641\u0646\">\n              </span>\n            </div>\n            <input type=\"password\" name=\"phone_number\" class=\"form-control\" placeholder=\"\u0634\u0645\u0627\u0631\u0647 \u062A\u0644\u0641\u0646\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n          </div>\n          <div class=\"input-group mb-3\">\n            <div class=\"input-group-prepend\">\n              <span class=\"input-group-text\" id=\"basic-addon1\">\n                <img src=\"./photo/country.png\" class=\"icon2\" alt=\"\u06A9\u062F \u0645\u0644\u06CC\">\n              </span>\n            </div>\n            <input type=\"password\" name=\"national_code\" class=\"form-control\" placeholder=\"\u06A9\u062F \u0645\u0644\u06CC\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n          </div>\n            <br/>\n            <br/>\n                    <button class='btn btn-success' style='width: 100%' onclick='' onsubmit=''>\u0627\u062F\u0627\u0645\u0647</button>\n                </form>\n        </span>\n        ");
  } else if (valueCheckBox === "Pricer") {
    signUpDiv.innerHTML = "\n        <span class=\"close\">&times;</span>\n\t\t\t\t<form action='./signup/pricer.php?q=".concat(valueCheckBox, "' method='POST' enctype=\"multipart/form-data\">\n                    <h5>\u0641\u0631\u0648\u0634\u0646\u062F\u06AF\u0627\u0646</h5>\n                    <hr/>\n                    <br/>\n                    <div class=\"input-group mb-3\">\n            <div class=\"input-group-prepend\">\n              <span class=\"input-group-text\" id=\"basic-addon1\">\n                <img src=\"./photo/user.jpg\" class=\"icon2\" alt=\"\u0646\u0627\u0645 \u06A9\u0627\u0631\u0628\u0631\u06CC\">\n              </span>\n            </div>\n            <input name=\"user_name\" type=\"text\" class=\"form-control\" placeholder=\"\u0646\u0627\u0645 \u06A9\u0627\u0631\u0628\u0631\u06CC\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n          </div>\n          <div class=\"input-group mb-3\">\n            <div class=\"input-group-prepend\">\n              <span class=\"input-group-text\" id=\"basic-addon1\">\n                <img src=\"./photo/password.png\" class=\"icon2\" alt=\"\u067E\u0633\u0648\u0631\u062F\">\n              </span>\n            </div>\n            <input name=\"password\" type=\"password\" class=\"form-control\" placeholder=\"\u067E\u0633\u0648\u0631\u062F\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n          </div>\n          <div class=\"input-group mb-3\">\n            <div class=\"input-group-prepend\">\n              <span class=\"input-group-text\" id=\"basic-addon1\">\n                <img src=\"./photo/phone.png\" class=\"icon2\" alt=\"\u0634\u0645\u0627\u0631\u0647 \u062A\u0644\u0641\u0646\">\n              </span>\n            </div>\n            <input name=\"phone_number\" type=\"number\" class=\"form-control\" placeholder=\"\u0634\u0645\u0627\u0631\u0647 \u062A\u0644\u0641\u0646\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n          </div>\n          <div class=\"input-group mb-3\">\n            <div class=\"input-group-prepend\">\n              <span class=\"input-group-text\" id=\"basic-addon1\">\n                <img src=\"./photo/country.png\" class=\"icon2\" alt=\"\u06A9\u062F \u0645\u0644\u06CC\">\n              </span>\n            </div>\n            <input name=\"nationalty_code\" type=\"number\" class=\"form-control\" placeholder=\"\u06A9\u062F \u0645\u0644\u06CC\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n          </div>\n          <div class=\"input-group mb-3\">\n            <div class=\"input-group-prepend\">\n              <span class=\"input-group-text\" id=\"basic-addon1\">\n                <img src=\"./photo/home_location.png\" class=\"icon2\" alt=\"\u0622\u062F\u0631\u0633 \u0645\u062D\u0644 \u0633\u06A9\u0648\u0646\u062A\">\n              </span>\n            </div>\n            <input name=\"location\" type=\"text\" class=\"form-control\" placeholder=\"\u0622\u062F\u0631\u0633 \u0645\u062D\u0644 \u0633\u06A9\u0648\u0646\u062A\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n          </div>\n          <div class=\"input-group mb-3\">\n            <div class=\"input-group-prepend\">\n              <span class=\"input-group-text\" id=\"basic-addon1\">\n                <img src=\"./photo/license.png\" class=\"icon2\" alt=\"\u0622\u062F\u0631\u0633 \u0645\u062D\u0644 \u0633\u06A9\u0648\u0646\u062A\">\n              </span>\n            </div>\n            <input class=\"form-control\" type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\" placeholder='\u0622\u067E\u0644\u0648\u062F \u0641\u0627\u06CC\u0644'>\n            </div>\n            <p>\u0641\u0631\u0645\u062A \u0645\u062C\u0627\u0632 \u0628\u0631\u0627\u06CC \u0622\u067E\u0644\u0648\u062F \u062A\u0635\u0648\u06CC\u0631 \u0645\u062F\u0627\u0631\u06A9\u060C PNG \u0648 JPG \u0648 JPEG \u0645\u06CC \u0628\u0627\u0634\u062F.</p>\n                    <button onclick='' onsubmit='submit' class='btn btn-success' style='width: 100%' onclick='' onsubmit=''>\u0627\u062F\u0627\u0645\u0647</button>\n                </form>\n        </span>\n        ");
  } else if (valueCheckBox === "Wholesaler") {
    signUpDiv.innerHTML = "\n    <span class=\"close\">&times;</span>\n    <form action='./signup/signup.php?q=".concat(valueCheckBox, "' method='POST' enctype=\"multipart/form-data\">\n                <h5>\u0639\u0645\u062F\u0647 \u0641\u0631\u0648\u0634\u0627\u0646</h5>\n                <hr/>\n                <br/>\n                <div class=\"input-group mb-3\">\n        <div class=\"input-group-prepend\">\n          <span class=\"input-group-text\" id=\"basic-addon1\">\n            <img src=\"./photo/user.jpg\" class=\"icon2\" alt=\"\u0646\u0627\u0645 \u06A9\u0627\u0631\u0628\u0631\u06CC\">\n          </span>\n        </div>\n        <input type=\"text\" class=\"form-control\" placeholder=\"\u0646\u0627\u0645 \u06A9\u0627\u0631\u0628\u0631\u06CC\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n      </div>\n      <div class=\"input-group mb-3\">\n        <div class=\"input-group-prepend\">\n          <span class=\"input-group-text\" id=\"basic-addon1\">\n            <img src=\"./photo/password.png\" class=\"icon2\" alt=\"\u067E\u0633\u0648\u0631\u062F\">\n          </span>\n        </div>\n        <input type=\"password\" class=\"form-control\" placeholder=\"\u067E\u0633\u0648\u0631\u062F\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n      </div>\n      <div class=\"input-group mb-3\">\n        <div class=\"input-group-prepend\">\n          <span class=\"input-group-text\" id=\"basic-addon1\">\n            <img src=\"./photo/phone.png\" class=\"icon2\" alt=\"\u0634\u0645\u0627\u0631\u0647 \u062A\u0644\u0641\u0646\">\n          </span>\n        </div>\n        <input type=\"number\" class=\"form-control\" placeholder=\"\u0634\u0645\u0627\u0631\u0647 \u062A\u0644\u0641\u0646\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n      </div>\n      <div class=\"input-group mb-3\">\n        <div class=\"input-group-prepend\">\n          <span class=\"input-group-text\" id=\"basic-addon1\">\n            <img src=\"./photo/country.png\" class=\"icon2\" alt=\"\u06A9\u062F \u0645\u0644\u06CC\">\n          </span>\n        </div>\n        <input type=\"number\" class=\"form-control\" placeholder=\"\u06A9\u062F \u0645\u0644\u06CC\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n      </div>\n      <div class=\"input-group mb-3\">\n        <div class=\"input-group-prepend\">\n          <span class=\"input-group-text\" id=\"basic-addon1\">\n            <img src=\"./photo/home_location.png\" class=\"icon2\" alt=\"\u0622\u062F\u0631\u0633 \u0645\u062D\u0644 \u0633\u06A9\u0648\u0646\u062A\">\n          </span>\n        </div>\n        <input type=\"text\" class=\"form-control\" placeholder=\"\u0622\u062F\u0631\u0633 \u0645\u062D\u0644 \u0633\u06A9\u0648\u0646\u062A\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">\n      </div>\n      <div class=\"input-group mb-3\">\n        <div class=\"input-group-prepend\">\n          <span class=\"input-group-text\" id=\"basic-addon1\">\n            <img src=\"./photo/license.png\" class=\"icon2\" alt=\"\u0622\u062F\u0631\u0633 \u0645\u062D\u0644 \u0633\u06A9\u0648\u0646\u062A\">\n          </span>\n        </div>\n        <input class=\"form-control\" type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\" placeholder='\u0622\u067E\u0644\u0648\u062F \u0641\u0627\u06CC\u0644'>\n        </div>\n        <p>\u0641\u0631\u0645\u062A \u0645\u062C\u0627\u0632 \u0628\u0631\u0627\u06CC \u0622\u067E\u0644\u0648\u062F \u062A\u0635\u0648\u06CC\u0631 \u0645\u062F\u0627\u0631\u06A9\u060C PNG \u0648 JPG \u0648 JPEG \u0645\u06CC \u0628\u0627\u0634\u062F.</p>\n                <button onclick='' onsubmit='submit' class='btn btn-success' style='width: 100%' onclick='' onsubmit=''>\u0627\u062F\u0627\u0645\u0647</button>\n            </form>\n    </span>\n        ");
  }
} /////////////////////////////////////


var currentIndex = 1;

function displaySlide(n) {
  currentIndex = n;
  var slides = document.getElementsByClassName("slide");
  var dots = document.getElementsByClassName("dot");
  var slno = document.getElementById("slide-no");

  if (currentIndex > slides.length) {
    currentIndex = 1;
  }

  if (currentIndex < 1) {
    currentIndex = slides.length;
  }

  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[currentIndex - 1].style.display = "block";
  dots[currentIndex - 1].className = "dot active";
  slno.innerHTML = currentIndex + "/" + slides.length;
}

displaySlide(currentIndex);

function changeSlide(n) {
  currentIndex += n;
  displaySlide(currentIndex);
}

function currentSlide(n) {
  displaySlide(n);
}