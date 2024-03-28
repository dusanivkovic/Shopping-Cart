const modal = document.getElementById('myModal');
const myModal = new bootstrap.Modal(modal, {backdrop: true, keyboard: false, focus: false});
const cart = document.querySelector('#cart');
let quantity = document.querySelectorAll('input[id=quantity]');
const cartEdit = document.querySelector('#edit-cart');
const btn = document.querySelector('#button-addon2');
let url =  window.location.href;
btn.addEventListener('click', () => {
    console.log(quantity);
})

cart.addEventListener('click', (e) => {
    myModal.show();
})



// quantity.forEach(el => el.addEventListener('click', (e) =>{
//     e.target.parentNode.submit();
// }))
