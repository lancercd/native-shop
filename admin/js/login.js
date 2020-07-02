import request from '../../utils/request.js';
import InfoForm from '../../utils/InfoForm.js';
import Message from '../../utils/Message.js';

const message = new Message();
const form = document.getElementsByName('form1')[0];

form.onsubmit = () => {
    console.log('asdfa');
    const formData = new FormData(form);

    if(formData.get('account') === ''){
        message.show({
            type: 'error',
            text: '请输入用户名',
        });
        return false;
    }
    if(formData.get('pwd') === ''){
        message.show({
            type: 'error',
            text: '请输入密码',
        });
        return false;
    }
    request({
        url: '/user/admin_login',
        type: 'post',
        is_form_data: true,
        data: formData,
    }).then(
        res => {
            message.show({
                type: 'success',
                text: res.msg,
            });
            setTimeout(() =>{
                location.href = 'sys.php';
            }, 500);
        },
        res => {
            message.show({
                type: 'error',
                text: res.msg
            });
        }
    );
    return false;
}
