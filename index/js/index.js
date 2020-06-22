import request from '../../utils/request.js';
import InfoForm from '../../utils/InfoForm.js';
import Message from '../../utils/Message.js';
// import {HEADER} from './../../utils/test.js';
import Banner from '../models/Banner.js';
import ProductMore from '../models/ProductMore.js';
import ProductList from '../models/ProductList.js';
const message = new Message;

const banner = document.getElementsByClassName('J_wrap')[0];
// console.log(banner.getElementsByTagName('li'));

new Banner(banner).init();



const oProductMore = document.getElementById('more');
// new ProductMore(oProductMore);





//热销产品

const hotProductBox = document.getElementsByClassName('star-goods-list')[0];
// console.log(hotProductBox);
new ProductList(hotProductBox, '/product/get_hot_product');
// request({});


//商品列表1
const list_1 = document.getElementsByClassName('list-1')[0];
// console.log(list_1);
new ProductList(list_1, '/product/get_product_list_1');

//商品列表2
const list_2 = document.getElementsByClassName('list-2')[0];
// console.log(list_2);
new ProductList(list_2, '/product/get_product_list_2');


////商品 ---> 为你推荐
const recommend = document.getElementsByClassName('recommend-list')[0];
// console.log(recommend);
new ProductList(recommend,'/product/get_recommend_product', true);
