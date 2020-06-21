import request from '../../utils/request.js';
import InfoForm from '../../utils/InfoForm.js';
import Message from '../../utils/Message.js';
// import {HEADER} from './../../utils/test.js';
import Banner from '../models/Banner.js';
import ProductMore from '../models/ProductMore.js';
const message = new Message;
// message.show({
//     type: 'success',
//     text: 'asdfasdf',
//     duration: 0
// });
const banner = document.getElementsByClassName('J_wrap')[0];
// console.log(banner.getElementsByTagName('li'));

new Banner(banner).init();


const loginBtn = document.getElementsByName('loginBtn')[0];
loginBtn.addEventListener('click', () => {
    // const container = document.getElementById('container');
    new InfoForm({
        type: 'form',
        msg: '登录',
        mask: true,
        autoClose: false,
        form:{method:'post',class:'',name: '',id:'', action:'', autocomplete:'off', enctype:'',},
        input:{
            0:{label: '账号',type: 'text', name:'account', id:'account', value:'1311282756', placeholder:'请输入账号'},
            1:{label: '密码',type: 'password', name:'pwd', id:'pwd', value:'1311282756', placeholder:'请输入密码'},
            // 2:{label: '性别',type: 'radio', name:'pwd', id:'pwd', value:'', placeholder:'请输入密码'},
        },
        btn:{
            0:{class: 'conform', func: 'testFunc', text: '提交'},
            // 1:{class: 'cancle', text: '晓得老', func: 'close'}
        },
        func: {
            'testFunc': function(form){
                let data = new FormData(form);
                request({
                    type: 'post',
                    data,
                    url: '/user/login',
                    is_form_data:true,
                }).then( data =>{
                    message.show({
                        type: 'success',
                        text: data.msg
                    });
                    setTimeout(()=>location.reload(), 300);//带上参数进行跳转  然后显示登录成功
                }, msg => {
                    console.log(msg);
                    message.show({
                        type: 'error',
                        text: msg.msg
                    });
                });
            },
            // 'close': function(){alert('close');},
        },
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
