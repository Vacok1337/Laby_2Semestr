let form = document.querySelector('.formJS');

function getPrettyCookies() {
    var cookiesArr = document.cookie.split(';');
    var cookiesStr = '';
    for (var i = 0; i < cookiesArr.length; i++) {
        var cookie = cookiesArr[i].trim(); // помощью trim можно убрать начальные пробелы
        const eqPos = cookie.indexOf('='); // позиция знака равно
        if (eqPos > -1) {
            const name = cookie.substr(0, eqPos);
            const value = cookie.substr(eqPos + 1);
            cookiesStr += name + ' = ' + decodeURIComponent(value) + "\n"; // декодируем значение
        }
        else {
            cookiesStr += cookie + "\n";
        }
    }
    return cookiesStr;
}


  
form.addEventListener('submit', e =>{
    e.preventDefault();
    let FIO = document.querySelector('#FIO').value;
    let mail = document.querySelector('#mail').value;
    let placeOfBirth = document.querySelector('#placeOfBirth').value;
    let hobbies = document.querySelector('#hobbies').value;
    let dateOfBirth = document.querySelector('#dateOfBirth').value;
    console.log(dateOfBirth);

    document.cookie = "FIO=" + encodeURIComponent(FIO);
    document.cookie = "mail=" + encodeURIComponent(mail);
    document.cookie = "placeOfBirth=" + encodeURIComponent(placeOfBirth);
    document.cookie = "hobbies=" + encodeURIComponent(hobbies);
    document.cookie = "dateOfBirth=" + encodeURIComponent(dateOfBirth);



    alert ('Выши данные: \n' + getPrettyCookies());
});

function deleteAllCookies() {
    var cookies = document.cookie.split(";");
  
    for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i];
      var eqPos = cookie.indexOf("=");
      var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
      document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
    }
  }
  
document.querySelector('.clearCookie').addEventListener('click', e =>{
    e.preventDefault();
    deleteAllCookies();
    alert("Ваши куки - ",getPrettyCookies());
});