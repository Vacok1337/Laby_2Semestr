let form = document.querySelector('.formJS');

form.addEventListener('submit', e =>{
    e.preventDefault();
    let FIO = document.querySelector('#FIO').value;
    let mail = document.querySelector('#mail').value;
    let placeOfBirth = document.querySelector('#placeOfBirth').value;
    let hobbies = document.querySelector('#hobbies').value;
    let dateOfBirth = document.querySelector('#dateOfBirth').value;

    window.localStorage.setItem('FIO', String(FIO));
    window.localStorage.setItem('mail', String(mail));
    window.localStorage.setItem('placeOfBirth', String(placeOfBirth));
    window.localStorage.setItem('hobbies', String(hobbies));
    window.localStorage.setItem('dateOfBirth', String(dateOfBirth));

    alert ('Выши данные: \n' + 'ФИО: ' + window.localStorage.getItem('FIO') + '\nПочта: ' + window.localStorage.getItem('mail') + '\nМесто рождения: ' + window.localStorage.getItem('placeOfBirth') + '\nУвлечения: ' + window.localStorage.getItem('hobbies') + '\nДата рождения: ' + window.localStorage.getItem('dateOfBirth'));
});

document.querySelector('.clearCookie').addEventListener('click', e =>{
    e.preventDefault();
    window.localStorage.clear();
});