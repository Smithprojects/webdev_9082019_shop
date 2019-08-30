//нахожу и записываю элементы в переменные
let btn = document.getElementById('getSub');
let resultEl = document.querySelector('.result');
let inputNameEL = document.querySelector('[name=name]');
let inputEmailEl = document.querySelector('[name=email]');


//добавляю обработчик
btn.addEventListener('click', function(){

    //создаю объект
    let data = {
        name : inputNameEL.value,
        email : inputEmailEl.value,
    
    };
    console.log(data);

    //создаю пустой объект XMLHttpRequest для хранения данных
    let xhr = new XMLHttpRequest();

    xhr.open('POST', `./getSubscribe.php`);

    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.send(`data=${JSON.stringify(data)}`);
    //console.dir(xhr);

    xhr.addEventListener('load', function(){

        let response = JSON.parse(xhr.responseText);

        if(response.error == false){
            
            resultEl.innerHTML = response.massege;
            
        } else {
            
            resultEl.innerHTML = response.massege;
        
        }
    
    });
    //console.dir(response);
   //console.log(response);
});


