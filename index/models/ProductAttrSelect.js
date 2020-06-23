import EventAgent from '../../utils/EventAgent.js';
import InfoForm from '../../utils/InfoForm.js';
import Message from '../../utils/Message.js';
// import Fade from '../../utils/Fade.js';
import request from '../../utils/request.js';


export default class productAttrSelect{
    constructor(el){
        this.name = 'productAttrSelect';
        this.el = el;
        this.items = el.querySelectorAll('.option-list');
        this.actionBtn = el.getElementsByClassName('action-btn')[0];
        this.oPrice = el.getElementsByClassName('price')[0];
        this.productId = this.el.dataset.productId;
        this.selected = new Map();
        this.node = new Map();
        this.init();
    }

    init(){
        this.bindEvent();
        this.renderPrice();
    }


    bindEvent(){
        this.actionBtn.addEventListener('click', this.actionBtnClick.bind(this), 'false');
        this.items.forEach( item => item.addEventListener('click', this.onAttrSelect.bind(this), 'false'))
    }

    actionBtnClick(e){
        const ev = new EventAgent(e);
        let tar = ev.getTar();
        let action = tar.dataset.action;
        if(action === 'buynow' || action === 'add-cart'){
            this.onButClick(action);
        }
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
        let res;
        if(this.isAllSelected()){
            res = await this.getPrice();
            if(res.data){
                 this.oPrice.innerText = res.data.price;
                 this.detail_id = res.data.id;
            }
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
    }

    dealAttr(tar){
        this.selected.set(tar.parentElement.getAttribute('data-attr-key'), tar.getAttribute('data-attr-value'));
        this.renderHightLight(tar);
        this.node.set(tar.parentElement, tar);
    }

    isAllSelected(){
        return (this.items.length === this.selected.size)? true:false;
    }

    onButClick(btn){
        const url = (btn==='buynow')? '/order/create':'/cart/add_cart';
        if(this.isAllSelected()){
            if(this.detail_id){
                let products = '{"0":{"id":'+ this.detail_id +',"num":1}}';
                request({
                    url,
                    type: 'post',
                    data: {products},
                }).then(
                    res => {
                        if(btn==='buynow'){
                            new InfoForm({
                                type:'warring',
                                msg: res.msg,
                                btn:{
                                    0:{class: 'conform', func: 'close', text: '确定'},
                                    1:{class: 'cancle', func: 'toOrder', text: '查看订单'}
                                },
                                func:{'toOrder':()=>{window.location.href="order.php";}}
                            });
                        }else{
                            new InfoForm({
                                type:'warring',
                                msg: res.msg,
                                btn:{
                                    0:{class: 'conform', func: 'close', text: '确定'},
                                    1:{class: 'cancle', func: 'toCart', text: '去购物车'}
                                },
                                func:{'toCart':()=>{window.location.href="cart.php";}}
                            });
                        }

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
