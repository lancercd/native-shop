import ListSelect from './../../utils/ListSelect.js';
import EventAgent from '../../utils/EventAgent.js';
import request from '../../utils/request.js';
import Fade from '../../utils/Fade.js';
import InfoForm from '../../utils/InfoForm.js';

export default class Cart{
    constructor(el){
        this.el = el;
        this.Items = el.getElementsByClassName('J_cart_item');
        this.Select = new ListSelect(this.el, {
            all: 'select-all',
            one: 'select-one',
            onChange: function(){ this.render() }.bind(this)
        });

        this.oItemsNum = el.getElementsByClassName('number');
        // this.delBtns = el.getElementsByClassName('J_del_item');

        this.oSelectNum = el.getElementsByClassName('J_select_num')[0];
        this.oTotalMoney = el.getElementsByClassName('J_total_money')[0];
        this.oPayment = el.getElementsByClassName('J_payment')[0];
        this.list = el.getElementsByClassName('gwcxd')[0];
        this.init();
    }

    init(){
        this.bindEvent();
    }

    bindEvent(){
        this.list.addEventListener('click', this.onDelBtnClick.bind(this), false);
        this.oPayment.addEventListener('click', this.onPaymentClick.bind(this), false);
        for(let item of this.oItemsNum){
            item.addEventListener('blur', this.onNumBlur.bind(this), false);
        }
    }

    onNumBlur(ev){
        const e = new EventAgent(ev),
              tar = e.getTar();
        let value = e.getValue();
        if(!value || value == "0"){ tar.value = 1; }
        this.changeSubtotal(tar.parentNode.parentNode, tar.value);
    }

    changeSubtotal(item, num){
        const price = Number(item.getElementsByClassName('price')[0].innerText).toFixed(2),
              oSubtotal = item.getElementsByClassName('subtotal')[0];
        oSubtotal.innerText = (Number(num) * price).toFixed(2);
        this.renderTotalMoney();
    }

    render(){
        this.renderSelectNum();
        this.renderTotalMoney();
    }

    renderSelectNum(){
        this.oSelectNum.innerText = this.Select.selectCount();
    }
    renderTotalMoney(){
        //TODO Performance optimization
        this.oTotalMoney.innerText = this.Select.selectCount();
        let totalPrice = 0 ;
        const selected = this.Select.getSelected();
        //性能太差老   后面再改老
        // 遍历全部商品一遍  看看是否勾选  勾选了  的话查数量 * 单价 相加
        for(let item of this.Items){
            if(selected.has(item.dataset.id)){
                let price = Number(item.getElementsByClassName('price')[0].innerText),
                    num = Number(item.getElementsByClassName('number')[0].value);
                totalPrice += ( num * price );
            }
        }
        this.oTotalMoney.innerText = totalPrice.toFixed(2);
    }
    onDelBtnClick(ev){
        const e = new EventAgent(ev);
        if(e.getTagName() === 'button'){
            // 若为选中去除set中相应值
            const tar = e.getTar(),
                  parent = tar.parentNode.parentNode,
                  oCheckBox = parent.getElementsByClassName('select-one')[0];
            if(oCheckBox.checked){
                this.Select.selected.delete(oCheckBox.dataset.id);
            }
            const fade = new Fade(tar.parentNode.parentNode);
            fade.fadeout({duration: 0.5});
            this.render();

            
        }
    }
    onPaymentClick(){
        if(!this.Select.selectCount()){
            const body = document.getElementsByTagName('body')[0];
            new InfoForm(body);
            return;
        }
        //发送请求
        // request({  });
    }



}
