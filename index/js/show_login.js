import InfoForm from '../../utils/InfoForm.js';
import Message from '../../utils/Message.js';
import request from '../../utils/request.js';


const message = new Message;
new InfoForm({
    type: 'form',
    msg: '请先登录',
    mask: true,
    autoClose: false,
    form:{method:'post',class:'',name: '',id:'', action:'', autocomplete:'off', enctype:'',},
    input:{
        0:{label: '账号',type: 'text', name:'account', id:'account', value:'1311282756', placeholder:'请输入账号'},
        1:{label: '密码',type: 'password', name:'pwd', id:'pwd', value:'1311282756', placeholder:'请输入密码'},
    },
    btn:{
        0:{class: 'conform', func: 'testFunc', text: '提交'},
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
                setTimeout(()=>location.href="index.php", 300);//带上参数进行跳转  然后显示登录成功
            }, msg => {
                console.log(msg);
                message.show({
                    type: 'error',
                    text: msg.msg
                });
            });
        },
    },
});
