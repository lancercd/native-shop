// import EventAgent from '../../utils/EventAgent.js';
import InfoForm from '../../utils/InfoForm.js';
import Message from '../../utils/Message.js';
// import Fade from '../../utils/Fade.js';
import request from '../../utils/request.js';


export default class productAttrSelect{
    constructor(el){
        this.name = 'productAttrSelect';
        this.el = el;
        this.items = el.querySelectorAll('.option-list');
        this.buyBtn = el.getElementsByClassName('buynow')[0];
        this.oPrice = el.getElementsByClassName('price')[0];
        this.productId = this.el.dataset.productId;

        // this.productDetail = JSON.parse(document.getElementById('data').innerText);
        // console.log(this.productDetail);
        // console.log(this.el.dataset);
        // this.selected = new WeakSet();
        this.selected = new Map();
        this.node = new Map();
        // this.selected.set('key', 'value');
        // this.selected.set('key', 'sdf');
        // console.log(this.selected);
        // this.selected.add(['key', 'value']);
        // console.log(this.selected.get('key'));
        this.init();


        // this.selected.forEach((v,k) => {
        //     console.log(k + "  " + v);
        // })
    }

    init(){
        this.bindEvent();
        this.renderPrice();
    }


    bindEvent(){
        this.buyBtn.addEventListener('click', this.onButNowClick.bind(this), 'false');
        this.items.forEach( item => item.addEventListener('click', this.onAttrSelect.bind(this), 'false'))
    }

    renderHightLight(tar){
        const parent = tar.parentElement;
        if(this.node.has(parent)){
            this.node.get(parent).classList.remove('select');
            tar.classList.add('select');
        }else{
            tar.classList.add('select');
        }
    }

    getPrice(){
        let attr= Object.create(null);
        for (let[k,v] of this.selected) {
            attr[k] = v;
        }
        attr = JSON.stringify(attr);
        return request({
            url: '/product/get_price',
            type: 'post',
            data: {
                product_id:this.productId,
                attr:attr
            }
        });
    }
    async renderPrice(){
        // console.log(this.selected);
        let res;
        if(this.isAllSelected()){
            res = await this.getPrice();
            if(res.data){
                 this.oPrice.innerText = res.data.price;
                 this.detail_id = res.data.id;
            }

        }else{
            // this.oPrice.innerText = '';
        }
    }

    onAttrSelect(ev){
        const e = ev || window.event,
              tar = e.target || e.srcElement,
              tagName = tar.tagName.toLowerCase();
        if(!tar.className){
            this.dealAttr(tar);
            this.renderHightLight(tar);
            this.renderPrice();
        }
        // console.log(this.selected);

    }


    dealAttr(tar){
        this.selected.set(tar.parentElement.getAttribute('data-attr-key'), tar.getAttribute('data-attr-value'));
        this.renderHightLight(tar);
        this.node.set(tar.parentElement, tar);
    }


    isAllSelected(){
        return (this.items.length === this.selected.size)? true:false;
        // if(){
        //     return true;
        // }else{
        //     return false;
        // }
    }


    onButNowClick(){
        if(this.isAllSelected()){

            if(this.detail_id){
                request({
                    url: '/order/create',
                    type: 'post',
                    data: {
                        detail_id:this.detail_id,
                    },
                }).then(
                    res => {
                        console.log(res.msg);
                        const info = new InfoForm({
                            type:'warring',
                            msg: res.msg,
                            btn:{0:{class: 'conform', func: 'refresh', text: '确定'}},
                            func:{'refresh':()=>{ window.location.href="order.html";}}
                        });
                    },
                    res => {
                        const info = new InfoForm({
                            type:'warring',
                            msg: res.msg
                        });
                    }
                );
            }
        }else{
            const message = new Message();
            message.show({'text': '请选择完整的属性', type: 'info'});
        }

    }


}
