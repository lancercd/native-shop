// import ListSelect from './../../utils/ListSelect.js';
// import EventAgent from '../../utils/EventAgent.js';
import request from '../../utils/request.js';
// import Fade from '../../utils/Fade.js';
// import InfoForm from '../../utils/InfoForm.js';


export default class ProductList{
    constructor(el, url, is_recomment = false){
        this.name = 'ProductList';
        this.el = el;
        this.url = url;
        this.is_recomment = is_recomment;
        this.init();
    }

    init(){
        // console.log(this.el);
        this.render();
    }

    async render(){
        let data = await this.getProduct().catch(()=>{});
        if(data){
            this.el.appendChild(this.createList(data.data));
        }
    }

    createList(product = []){
        const oFrag = document.createDocumentFragment();
        for (let item of product) {
            let oLi = document.createElement('li');
            let tmp = '';
            let link = `detail.php?id=${item.product_id}`;//商品跳转连接
            if(this.is_recomment){
                tmp = `
                        <a class="thumb" href="${link}">
                            <img src="${item.image}"/>
                            <h3 class="title">
                                <a href="${link}">${item.pro_name}</a>
                            </h3>
                        </a>
                        <p class="price">${item.price}元</p>
                        <p class="tips">${item.tips? item.tips:999}人好评</p>
                `;
            }else{
                tmp = `
                        <a class="thumb" href="${link}">
                            <img src="${item.image}"/>
                        </a>
                        <h3 class="title">
                            <a href="${link}">${item.pro_name}</a>
                        </h3>
                        <p class="desc">${item.introduce}</p>
                        <p class="price">${item.price}元</p>
                `;
            }
            if(item.comment){
                tmp += `
                    <div class="review-wrapper">
                      <a href="${link}">
                        <span class="review">
                        ${item.comment.content.substring(0,24)}...
                        </span>
                        <span class="author">来自于${item.comment.real_name}的评价</span>
                      </a>
                    </div>
                `;
            }
            oLi.innerHTML = tmp;
            oFrag.appendChild(oLi);
        }
        return oFrag;
    }

    getProduct(){
        return request({
            url: this.url,
            type: 'get',
        });
    }
}
