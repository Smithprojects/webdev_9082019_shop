class Basket{
    constructor(){
        this.el = document.querySelector('.table');
        this.products = [];
       
    }

    load(productId='', quantityProduct='', productDelete){
        
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/handlers/basketHandler.php?id=${productId}&quantiy=${quantityProduct}&delete=${productDelete}`);
        console.log(xhr);
        xhr.send();

        xhr.addEventListener('load', ()=>{
            this.clearAll();
            
            let data = JSON.parse(xhr.responseText);
            console.log(data);
            data.products.forEach((product)=>{
                this.products.push(new Product(product));

            }); 

            this.renderProduct();
            this.getQuantity();
            

        });
    }

    //метод рендеринга товаров корзны из сессии
    renderProduct(){
        this.products.forEach((product)=>{
            this.el.querySelector('tbody').appendChild(product.getElement());
        });
    }

    //метод очистки отрисовки содержимого корзины
    clearAll(){
        this.el.querySelector('tbody').innerHTML = '';
        this.products = [];
    }

    //метод изменения кол-ва товаров в корзине
    getQuantity(){
        let that = this;
        let tbodyEl = document.querySelector('tbody');
        let tbodyBtnElc = tbodyEl.querySelectorAll('.quantity-button_btn');
        console.log(tbodyBtnElc);
        tbodyBtnElc.forEach(function(elem){
            //let ty = elem.parentNode.querySelector('.item__quantity-number').innerText;
            
            elem.addEventListener('click', function(){
                let productDelete = false;
                let quantityNumberEL = this.parentNode.querySelector('.item__quantity-number');
                let productId = this.parentNode.getAttribute('data-id');
                let quantityProduct = quantityNumberEL.innerText;
                
                if (this.innerText == '+' && quantityProduct>0) {
                    quantityProduct++;
                } else if (this.innerText == '-' && quantityProduct>0) {
                    quantityProduct--;
                } 
                else if (quantityProduct == 0) {
                    productDelete = true;
                }
                quantityNumberEL.innerText = quantityProduct;
    
                that.load(productId, quantityProduct, productDelete);
                console.log(productDelete);
                    
            });
        });
    };
}

class Product{
    constructor(product){
        this.id = product.id;
        this.name = product.name;
        this.pic = product.pic;
        this.price = product.price;
        this.text = product.text;
        this.sku = product.sku;
        this.size = product.size;
        this.quantity = product.quantity;
        this.full_price = product.full_price;
        
        this.el = document.createElement('tr');
        this.el.classList.add('table__products');
        //this.el.href = `/product.php?id=${this.id}`;
    }
    getElement(){
        this.el.innerHTML = `
        <td class="t-left width-0">
            <div class="items__pic" style="background-image:url(${this.pic})"></div>
        </td>
        <td class="t-left">
            <div class="items__head"><a href="product.php?id=${this.id}" style="color:red">${this.name}</a></div>
            <div class="items__sku">арт. ${this.sku}</div>
        </td>
        <td class="width-0">
            <div class="item__size">${this.size}</div>
        </td>
        <td class="width-0">
            <div class="item__quantity-button" data-id="${this.id}">
                <div class="quantity-button_btn">+</div>
                <div class="item__quantity-number">${this.quantity}</div>
                <div class="quantity-button_btn">-</div>
            </div>
        </td>
        <td class="width-0">
            <div class="item-price">${this.full_price} руб.</div>
        </td>
        <td class="width-0">
            <div class="item-delete">Х</div>
        </td>`;
      
        return this.el;
    }


}

let basket = new Basket();
//console.log(catalog);
basket.load();


let tableProductEl = document.querySelectorAll('.table__products');


let itemQuantityBtnEl = document.querySelectorAll('.quantity-button_btn');