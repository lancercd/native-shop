import request from './../../utils/request.js';
import InfoForm from './../../utils/InfoForm.js';
import {HEADER} from './../../utils/test.js';
import Banner from './../components/Banner.js';

console.log(HEADER);


// console.log('lllllllll');
let loginBtn = document.getElementsByName('loginBtn')[0];
loginBtn.addEventListener('click', () => {
    const container = document.getElementById('container');
    new InfoForm(container).init();
}, false);




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

const banner = document.getElementsByClassName('J_wrap')[0];
// console.log(banner.getElementsByTagName('li'));
new Banner(banner).init();
