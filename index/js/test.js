import Message from '../../utils/Message.js';


const message = new Message();
document.getElementsByClassName('btn')[0].addEventListener('click', () => {
    console.log('ssss');
    message.show({
        type: 'warning',
        text: '你个憨批9999999',
        closeable: true
    });
});
