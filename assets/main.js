const modal = document.getElementById('myModal');
const myModal = new bootstrap.Modal(modal, {backdrop: true, keyboard: false, focus: false});
const cart = document.querySelector('#cart');

cart.addEventListener('click', (e) => {
    myModal.show();
})


