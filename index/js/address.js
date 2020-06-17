import request from '../../utils/request.js';
import AddressList from '../models/AddressList.js'


const oRightBox = document.getElementById('J_right_box');

//添加地址按钮   改     直接跳转   不在当前页面添加
// const addAddressBtn = oRightBox.getElementsByClassName('add-address-btn')[0];

const oListItems = oRightBox.getElementsByClassName('content')[0];
const delAgent = new AddressList(oListItems);

// addAddressBtn.addEventListener('click', ()=>{
//
//
// }, false);
// console.log(addAddressBtn);
