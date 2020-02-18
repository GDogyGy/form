function SetLang(value) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            location.href=location.href;
        }
    };
    xmlhttp.open("GET", "web/setSession.php?variable=USER_LANGUAGE&value=" + value, true);
    xmlhttp.send();
}

function validate(event , language){
    event.preventDefault();
    var action = event.target.action;
    var type_form = event.target.id;
    if(event.target.id == 'enter_form'){
       var form_hide_some_functional = 1;
    }

    var name = document.getElementsByName("login")[0].value;
    var password = document.getElementsByName("password")[0].value;
    var error_message = document.getElementsByClassName("error_message")[0];
    if(form_hide_some_functional !== null && form_hide_some_functional != 1) {
        var email = document.getElementsByName("email")[0].value;
        var about = document.getElementsByName("about")[0].value;
        var fileInput = document.getElementsByName('userfile');
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var reg_file = /(.*?)\.(jpg|gif|jpeg|png)$/;
    }
    //error_message.style.padding = "10px";
    document.querySelector(".error_message").style.backgroundColor = "#fe8b8e";

    if( name.length < 6 || name.length > 12){
        ru_error = "Пожалуйста введите корректное имя";
        en_error = "Please Enter valid Name";
        error_message.innerHTML = window[language];
        return false;
    }
    if(password.length < 12 || password.length > 32){
        ru_error = "Пожалуйста введите корректный пароль";
        en_error = "Please Enter Correct password";
        error_message.innerHTML = window[language];
        return false;
    }

    if(form_hide_some_functional !== null && form_hide_some_functional != 1) {
        if (email.length < 6 || !email.match(mailformat)) {
            ru_error = "Пожалуйста введите корректный email";
            en_error = "Please Enter Correct Email";
            error_message.innerHTML = window[language];
            return false;
        }
        if (fileInput[0].value.length > 0) {
            if (!fileInput[0].value.match(reg_file)) {
                ru_error = "Файл некорректный. Список разрешенных расширений файлов (jpg|gif|jpeg|png)";
                en_error = "Please Enter Correct file.Correct type file (jpg|gif|jpeg|png)";
                error_message.innerHTML = window[language];
                return false;
            }
        }

    }
    xmlhttp = new XMLHttpRequest();



    var forms = document.getElementById(type_form);
    var form_data = new FormData(forms);

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector(".error_message").style.backgroundColor = "green";
            let txt = this.responseText.replace( /<[^>]+>/g,'');
            document.querySelector(".error_message").innerHTML = txt;
            if(type_form == 'enter_form' && document.querySelector(".error_message").innerHTML.length == 0)
            {
                location.href=location.href;
            }

            if(this.responseText == 'Registration complete' || this.responseText == 'Регистрация прошла успешно!' )
            {
                document.querySelectorAll('input, textarea').forEach(el=>el.value = '');
            }

        }
    };

    xmlhttp.open("POST", action ,true);
    xmlhttp.send(form_data);

    return true;
}

