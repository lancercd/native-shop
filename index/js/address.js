import request from '../../utils/request.js';
import InfoForm from '../../utils/InfoForm.js';
import Message from '../../utils/Message.js';
import AddressList from '../models/AddressList.js'


const oRightBox = document.getElementById('J_right_box');

//添加地址按钮   改     直接跳转   不在当前页面添加

const oListItems = oRightBox.getElementsByClassName('content')[0];
const addressList = new AddressList(oListItems);


const addAddressBtn = document.getElementsByName('add-address-btn')[0];
const message = new Message();
addAddressBtn.addEventListener('click', ()=>{
    new InfoForm({
        type: 'form',
        msg: '添加地址',
        mask: true,
        autoClose: false,
        form:{method:'post',class:'',name: '',id:'', action:'', autocomplete:'off', enctype:'',},
        input:{
            0:{label: '收货人姓名',type: 'text', name:'real_name', id:'real_name', placeholder:'收货人姓名'},
            1:{label: '省',type: 'text', name:'province', id:'province', placeholder:'请输入省'},
            2:{label: '市',type: 'text', name:'city', id:'city', placeholder:'请输入市'},
            3:{label: '区',type: 'text', name:'district', id:'district', placeholder:'请输入区'},
            4:{label: '详细地址',type: 'text', name:'detail', id:'detail', placeholder:'详细地址'},
            5:{label: '电话',type: 'text', name:'phone', id:'phone', placeholder:'电话'},
            // 2:{label: '性别',type: 'radio', name:'pwd', id:'pwd', value:'', placeholder:'请输入密码'},
        },
        btn:{
            0:{class: 'conform', func: 'addAddress', text: '提交'},
            // 1:{class: 'cancle', text: '晓得老', func: 'close'}
        },
        func: {
            'addAddress': function(form){
                let data = new FormData(form);
                request({
                    type: 'post',
                    data,
                    url: '/user/address_add',
                    is_form_data:true,
                }).then( data =>{
                    message.show({
                        type: 'success',
                        text: data.msg
                    });
                    addressList.render();
                    this.close();
                    //setTimeout(()=>location.reload(), 300);//带上参数进行跳转  然后显示登录成功
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
// console.log(addAddressBtn);
