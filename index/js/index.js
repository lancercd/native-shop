import request from '../../utils/request.js';
import InfoForm from '../../utils/InfoForm.js';
// import {HEADER} from './../../utils/test.js';
import Banner from '../models/Banner.js';
import ProductMore from '../models/ProductMore.js';

const banner = document.getElementsByClassName('J_wrap')[0];
// console.log(banner.getElementsByTagName('li'));
new Banner(banner).init();


const loginBtn = document.getElementsByName('loginBtn')[0];
loginBtn.addEventListener('click', () => {
    // const container = document.getElementById('container');
    new InfoForm({
        type: 'warring',
        mask: true,
        // btn:{
        //     0:{class: 'conform', func: 'testFunc', text: '晓得老'},
        //     1:{class: 'cancle', text: '晓得老', func: 'close'}
        // },
        // func: {
        //     'testFunc': function(){alert('ssssssssss');},
        //     'close': function(){alert('close');},
        // },
    });
}, false);



const oProductMore = document.getElementById('more');
new ProductMore(oProductMore);


// console.log(request({
//     url: '../api/test.php',
//     begin:()=>{
//         // let a = setInterval(()=>{
//         //     console.log(1);
//         // },500);
//     },
//     finish:() => {
//         // clearInterval(a);
//     }
// }).then(
//     res => {console.log(res);},
//     msg => {console.log('error:' + msg);}
// ).finally(() => {
//     console.log('finally');
// }));
