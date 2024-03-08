let form = document.querySelector('.our__form');
 
function clearAllCookies() {
    var cookies = document.cookie.split(";");
  
    for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i];
      var eqPos = cookie.indexOf("=");
      var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
      document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/";
    }
  }

  form.addEventListener('submit', e=>{
    e.preventDefault();
 
    let name = document.querySelector('.name').value;
    let mail = document.querySelector('.mail').value;
    let dob = document.querySelector('.day').value + '.0' + document.querySelector('.month').value + '.' + document.querySelector('.year').value;
    
    alert('Данные' + '\nИмя: ' + name + '\nПочта: ' + mail + '\nДата рождения: ' + dob);
 
    let userData = {
        'name': name,
        'mail': mail,
        'DateOfBirth': dob,
    };
 
    document.cookie = `userData=${JSON.stringify(userData)};`;
 
    let cookie = document.createElement('span');
    cookie.textContent = document.cookie;
    document.body.appendChild(cookie);
    
    clearAllCookies();
    console.log(document.cookie);
});


  