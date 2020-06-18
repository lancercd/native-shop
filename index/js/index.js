import request from '../../utils/request.js';
import InfoForm from '../../utils/InfoForm.js';
// import {HEADER} from './../../utils/test.js';
import Banner from '../models/Banner.js';
import ProductMore from '../models/ProductMore.js';

const banner = document.getElementsByClassName('J_wrap')[0];
// console.log(banner.getElementsByTagName('li'));

new Banner(banner).init();
new InfoForm({
    type: 'form',
    msg: '登录',
    mask: true,
    autoClose: false,
    form:{method:'post',class:'',name: '',id:'', action:'', autocomplete:'off', enctype:'',},
    input:{
        0:{label: '账号',type: 'text', name:'account', id:'account', value:'', placeholder:'请输入账号'},
        1:{label: '密码',type: 'password', name:'pwd', id:'pwd', value:'', placeholder:'请输入密码'},
        // 2:{label: '性别',type: 'radio', name:'pwd', id:'pwd', value:'', placeholder:'请输入密码'},
    },
    btn:{
        0:{class: 'conform', func: 'testFunc', text: '提交'},
        // 1:{class: 'cancle', text: '晓得老', func: 'close'}
    },
    func: {
        'testFunc': function(form){
            // console.log(form);
            let data = new FormData(form);
            // console.log(data);
            console.log(data.get('pwd'));
            console.log(data.get('account'));
            request({
                type: 'post',
                data,
                url: '../api/test.php',
                is_form_data:true,
            }).then( data =>{
                console.log(data);
                // this.close();
            });
        },
        // 'close': function(){alert('close');},
    },
});

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
