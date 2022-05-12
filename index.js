function searchItem() {
    const products = document.querySelector('#all-products');
    const search = document.querySelector('.input-search').value.toUpperCase();
    const product = document.querySelector('.product--wrapper');
    const itemName = products.querySelectorAll('.itemName');

    for(var i = 0; i < itemName.length; i++) {

        let matchItem = product[i].querySelectorAll('.itemName')[0];
        if(matchItem) {
            let textName = matchItem.textContent || matchItem.innerHTML;
            if(textName.toUpperCase().indexOf(search) > -1) {
                product[i].style.display ='';
            } else {
                product[i].style.display = 'none';
            }
        }
    }
}