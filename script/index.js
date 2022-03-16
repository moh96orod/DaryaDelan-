// var slideIndex = 1;
// showSlides(slideIndex);

// // Next/previous controls
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// // Thumbnail image controls
// function currentSlide2(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   var i;
//   var slides = document.getElementsByClassName("mySlides");
//   var dots = document.getElementsByClassName("dot");
//   if (n > slides.length) {
//     slideIndex = 1
//   }
//   if (n < 1) {
//     slideIndex = slides.length
//   }
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex - 1].style.display = "block";
//   dots[slideIndex - 1].className += " active";
// }

/////////////////////////////////

var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

let userName = localStorage.getItem("user_name");
let password = localStorage.getItem("password");
var select = localStorage.getItem("select");

// When the user clicks on the button, open the modal
btn.onclick = function (v) {
  if (userName != null) {
    btn.innerHTML = userName;
    window.location.assign(`./login/login.php?user_name=` + userName + "&pass=" + password + "&select=" + select);
  }
  if (userName === null) {
    modal.style.display = "block";
  }
}

function close() {
  modal.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function openSignUpModal() {
  var signUpDiv = document.getElementById("modalContent");
  signUpDiv.innerHTML = `
        <span class="close" onclick='close()'>&times;</span>
				<fieldset>
                    <legend><p>ثبت نام به عنوان: </p></legend>
                    <hr/>
                    <br/>
                    <input class="form-check-input" type="checkbox" value="user" id="checkbox1"/> کاربر
                    <br/>
                    <input class="form-check-input" type="checkbox" value="pricer" id="checkbox2"/> فروشندگان
                    <br/>
                    <input class="form-check-input" type="checkbox" value="wholesaler" id="checkbox3"/> عمده فروشان
                    <br/>
                    <br/>
                </fieldset>
                <button class="btn btn-danger" onclick="nextSignUp()">ادامه</button>
                <br/>
        </span>
        `;
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
    signUpDiv.innerHTML = `
        <span class="close">&times;</span>
				<form action='./signup/user.php?q=${valueCheckBox}' method='POST'>
                    <h5>کاربر</h5>
                    <hr/>
                    <br/>
                    <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <img src="./photo/user.jpg" class="icon2" alt="نام کاربری">
              </span>
            </div>
            <input type="text" name="user_name" class="form-control" placeholder="نام کاربری" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <img src="./photo/password.png" class="icon2" alt="پسورد">
              </span>
            </div>
            <input type="password" name="password" class="form-control" placeholder="پسورد" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <img src="./photo/phone.png" class="icon2" alt="شماره تلفن">
              </span>
            </div>
            <input type="password" name="phone_number" class="form-control" placeholder="شماره تلفن" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <img src="./photo/country.png" class="icon2" alt="کد ملی">
              </span>
            </div>
            <input type="password" name="national_code" class="form-control" placeholder="کد ملی" aria-label="Username" aria-describedby="basic-addon1">
          </div>
            <br/>
            <br/>
                    <button class='btn btn-success' style='width: 100%' onclick='' onsubmit=''>ادامه</button>
                </form>
        </span>
        `;
  }

  else if (valueCheckBox === "Pricer") {
    signUpDiv.innerHTML = `
        <span class="close">&times;</span>
				<form action='./signup/pricer.php?q=${valueCheckBox}' method='POST' enctype="multipart/form-data">
                    <h5>فروشندگان</h5>
                    <hr/>
                    <br/>
                    <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <img src="./photo/user.jpg" class="icon2" alt="نام کاربری">
              </span>
            </div>
            <input name="user_name" type="text" class="form-control" placeholder="نام کاربری" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <img src="./photo/password.png" class="icon2" alt="پسورد">
              </span>
            </div>
            <input name="password" type="password" class="form-control" placeholder="پسورد" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <img src="./photo/phone.png" class="icon2" alt="شماره تلفن">
              </span>
            </div>
            <input name="phone_number" type="number" class="form-control" placeholder="شماره تلفن" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <img src="./photo/country.png" class="icon2" alt="کد ملی">
              </span>
            </div>
            <input name="nationalty_code" type="number" class="form-control" placeholder="کد ملی" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <img src="./photo/home_location.png" class="icon2" alt="آدرس محل سکونت">
              </span>
            </div>
            <input name="location" type="text" class="form-control" placeholder="آدرس محل سکونت" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <img src="./photo/license.png" class="icon2" alt="آدرس محل سکونت">
              </span>
            </div>
            <input class="form-control" type="file" name="file[]" id="file" multiple id="fileToUpload" placeholder='آپلود فایل'>
            </div>
            <p>فرمت مجاز برای آپلود تصویر مدارک، PNG و JPG و JPEG می باشد.</p>
                    <button onclick='' onsubmit='submit' class='btn btn-success' style='width: 100%' onclick='' onsubmit=''>ادامه</button>
                </form>
        </span>
        `;
  }

  else if (valueCheckBox === "Wholesaler") {
    signUpDiv.innerHTML = `
    <span class="close">&times;</span>
    <form action='./signup/wholesaler.php?q=${valueCheckBox}' method='POST' enctype="multipart/form-data">
                <h5>فروشندگان</h5>
                <hr/>
                <br/>
                <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <img src="./photo/user.jpg" class="icon2" alt="نام کاربری">
          </span>
        </div>
        <input name="user_name" type="text" class="form-control" placeholder="نام کاربری" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <img src="./photo/password.png" class="icon2" alt="پسورد">
          </span>
        </div>
        <input name="password" type="password" class="form-control" placeholder="پسورد" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <img src="./photo/phone.png" class="icon2" alt="شماره تلفن">
          </span>
        </div>
        <input name="phone_number" type="number" class="form-control" placeholder="شماره تلفن" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <img src="./photo/country.png" class="icon2" alt="کد ملی">
          </span>
        </div>
        <input name="nationalty_code" type="number" class="form-control" placeholder="کد ملی" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <img src="./photo/home_location.png" class="icon2" alt="آدرس محل سکونت">
          </span>
        </div>
        <input name="location" type="text" class="form-control" placeholder="آدرس محل سکونت" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <img src="./photo/license.png" class="icon2" alt="آدرس محل سکونت">
          </span>
        </div>
        <input class="form-control" type="file" name="file[]"  multiple id="file" placeholder='آپلود فایل'>
        </div>
        <p>فرمت مجاز برای آپلود تصویر مدارک، PNG و JPG و JPEG می باشد.</p>
                <button onsubmit='submit' class='btn btn-success' style='width: 100%' onclick='' onsubmit=''>ادامه</button>
            </form>
    </span>
        `;
  }
}


/////////////////////////////////////

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