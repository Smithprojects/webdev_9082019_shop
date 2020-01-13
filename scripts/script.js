let xhr = new XMLHttpRequest();
    xhr.open('GET', `/handlers/basketHandler.php`);
    xhr.send();

    xhr.addEventListener('load', ()=> {
        //console.log(xhr.responseText);
        let countProducts = JSON.parse(xhr.responseText);
        let countBasketEl = document.querySelector('.user-basket__basket__count');
        countBasketEl.innerText = countProducts.quantity_all;
    });