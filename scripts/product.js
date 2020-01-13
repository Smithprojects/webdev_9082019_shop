let buttonEl = document.querySelector('button');

buttonEl.addEventListener('click', function (){
    let id = this.getAttribute('data-id');
    
    //console.log(id);

    let xhr = new XMLHttpRequest();
    xhr.open('GET', `/handlers/basketHandler.php?id=${id}`);
    console.log(xhr);
    xhr.send();

    xhr.addEventListener('load', ()=> {
        console.log(xhr.responseText);
        let countProducts = JSON.parse(xhr.responseText);
        //let countProducts = xhr.responseText;
        let countBasketEl = document.querySelector('.user-basket__basket__count');
        countBasketEl.innerHTML = countProducts.quantity_all;
        //countBasketEl.innerHTML = countProducts;
        console.log(countProducts);
    });
    
});