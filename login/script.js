try {
    var state = document.getElementById('no');
    state.style.display = 'none';

    localStorage.setItem('user_name', '$user_name');
    localStorage.setItem('password', '$password');

    console.log(localStorage.getItem('user_name'));

    var user_info = document.getElementById('user_info');
    var info = '';
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (httpRequest.readyState === 4 && httpRequest.status === 200) {
            var data = JSON.parse(httpRequest.responseText);

            for (var i = 0; i < data.length; i++) {
                info += '<p>نام کاربری: ' + data[i]['user_name'] + '</p>';
                info += '<p>گذرواژه: ' + data[i]['password'] + '</p>';
                info += '<p>شماره تلفن: ' + data[i]['phone'] + '</p>';
                info += '<p>آدرس محل سکونت: ' + data[i]['location'] + '</p>';
            }
            user_info.innerHTML = info;
        }
    };
    httpRequest.open('GET', './user_info.php?user=$user_name', true);
    httpRequest.send();

    function exit() {
        localStorage.clear();
        alert('با موفقیت خارج شدید!');
        window.location.assign('http://localhost/DaryaDelan/');
    }

    /////////////////////////////////

    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function (v) {
        modal.style.display = "block";
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
            <span class="close">&times;</span>
                    <p>ثبت نام به عنوان</p>
                    <input class="form-check-input" type="checkbox" value="user" id="checkbox1"/> کاربر
                    <input class="form-check-input" type="checkbox" value="pricer"/> فروشندگان
                    <input class="form-check-input" type="checkbox" value="wholesaler"/> عمده فروشان
                    <br/>
                    <br/>
                    <input type="text" class="searchInput2" placeholder="نام و نام خانوادگی"/>
                    <br/>
                    <br/>
                    <input type="text" class="searchInput2" placeholder="نام کاربری" />
                    <br/>
                    <br/>
                    <input type="password" class="searchInput2" placeholder="گذرواژه" />
                    <br/>
                    <br/>
                    <input type="email" class="searchInput2" placeholder="آدرس ایمیل" />
                    <br/>
                    <br/>
                    <input type="number" class="searchInput2" placeholder="کد ملی" />
                    <br/>
                    <br/>
                    <button class="btn btn-danger" onclick="openSignUpModal()">ثبت نام</button>
                    <br/>
            </span>
            `;
    }

}

catch (error) {
    console.log('error');
    console.log(error.message);
}

finally {
    console.log('Runned!');
}