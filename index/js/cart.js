import Cart from '../models/Cart.js'


const oCart = document.getElementsByClassName('J_gwcxqbj')[0];
new Cart(oCart, {
    all: 'select-all',
    one: 'select-one',
    // onChange: function(){
    //     console.log('onChange');
    // }
});
