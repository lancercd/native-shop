import InfoForm from '../../utils/InfoForm.js';
import Message from '../../utils/Message.js';
import request from '../../utils/request.js';


const message = new Message;
const loginBtn = document.getElementsByName('loginBtn')[0];
const logout = document.getElementsByName('loginBtn')[0];
if(loginBtn){
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
}


//点击用户头像  信息框
const user_btns = document.getElementsByClassName('user-info')[0];
//信息框消失  出现
if(user_btns){
    const user_btn_box = document.getElementsByClassName('user-btns')[0];

    user_btns.addEventListener('mouseover', ()=>{
        user_btn_box.style.display = 'block';
    }, false);

    user_btns.addEventListener('mouseout', ()=>{
        user_btn_box.style.display = 'none';

    }, false);

    const user_logout_btn = document.getElementsByClassName('logout')[0];
    user_logout_btn.addEventListener('click', ()=>{
        request({
            url: '/user/logout'
        }).then(()=>{
            location.reload();
        });
    }, false);
}
