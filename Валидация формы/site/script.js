sendBtn = document.querySelector('.sendJS');
formJS = document.querySelector('.formJS');
formHTML = document.querySelector('.formHTML');

function Validation(){
    let eror = "Ошибка! Возможны следущие причины: \n";

    function mailValidation(){
        //Ввалидация на ввод почты 
        let email = document.querySelector('#mail').value;
        let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,6}$/;
    
        if(email.match(emailPattern)) {
            document.querySelector('.mail').classList.remove('falied');
            eror.replace('Введена не коректная почта','');
            return true;
        } else {
            document.querySelector('.mail').classList.add('falied');
            eror += 'Введена не коректная почта\n';
            return false;
        }
    }
    
    function loginValidation(){
        //Ваолидация Логина
        let login = document.querySelector('#login').value;
    
        if ((login.length < 4) || (login.length > 19)){
            document.querySelector('.login').classList.add('falied');
            eror += 'Логин должен содержать от 4 до 19 символов\n';
            return false;
        }
        else{
            document.querySelector('.login').classList.remove('falied');
            eror.replace('Логин должен содержать от 4 до 19 символов','');
            return true;
        }
    }
    
    function passwordValidation(){
        //Ваолидация Логина
        let password = document.querySelector('#password').value;
    
        if ((password.length < 8) || (password.length > 32)){
            document.querySelector('.password').classList.add('falied');
            eror += 'Пароль должен содержать от 8 до 32 символов\n';
            return false;
        }
        else{
            document.querySelector('.password').classList.remove('falied');
            eror.replace('Пароль должен содержать от 8 до 32 символов','');
            return true;
        }
    }

    function checkBoxValidation(){
        let checkbox = document.querySelector('#checkbox');



        if(checkbox.checked){
            document.querySelector('.cbSpan').classList.remove('falied');
            eror.replace('Соглашение условий пользования не принято','');
            return true;
        }
        else{
            document.querySelector('.cbSpan').classList.add('falied');
            eror += 'Соглашение условий пользования не принято\n';
            return false;
        }
    }

    function selectValidation(){
        let select = document.querySelector('#select');


        if(select.selectedIndex == 0){
            select.classList.add('falied');
            eror += 'Пол не был выбран\n';
            return false;
        }
        else {
            select.classList.remove('falied');
            eror.replace('Пол не был выбран','');
            return true;
        }
    }

    function  radioButtonValidation(){
        let radioButton = document.getElementsByName("radioGroup2");

        for (let i = 0; i < radioButton.length; i++){
            if(radioButton[i].checked){
                document.querySelector('.rbSpan').classList.remove('falied');
                eror.replace('Получать уведомления? (да или нет)','');
                return true;
            }
        }
        document.querySelector('.rbSpan').classList.add('falied');
        eror += 'Получать уведомления? (да или нет)\n';
        return false;
    }

    let mail = mailValidation();
    let login = loginValidation();
    let password = passwordValidation();
    let checkBox = checkBoxValidation();
    let select = selectValidation();
    let radioButton = radioButtonValidation();
    
    if((mail)&&(login)&&(password)&&(checkBox)&&(select)&&(radioButton)){
        return true;
    }
    else{
        alert(eror);
    }
    

}


formJS.addEventListener('submit',function(event){
    event.preventDefault();

    let uved;
    if (document.getElementsByName("radioGroup2")[0].checked){
        uved = 'Да'
    } 
    else {
        uved = 'Нет'
    }

    if(Validation()){
        alert('Ваши данные\n \n1. Почта: ' + document.querySelector('#mail').value +'\n2. Логин: ' + document.querySelector('#login').value +'\n3. Пароль: ' + document.querySelector('#password').value + '\n 4. Пол: ' + document.querySelector('#select').value + '\n5. Уведомления:' + uved );
    };
});

formHTML.addEventListener('submit',function(event){
    if (document.getElementsByName("radioGroup1")[0].checked){
        uved = 'Да'
    } 
    else {
        uved = 'Нет'
    }
    alert('Ваши данные\n \n1. Почта: ' + document.querySelector('#mailHTML').value +'\n2. Логин: ' + document.querySelector('#loginHTML').value +'\n3. Пароль: ' + document.querySelector('#passwordHTML').value + '\n 4. Пол: ' + document.querySelector('#selectHTML').value + '\n5. Уведомления:' + uved );
})


