import ListSelect from './../../utils/ListSelect.js';
import EventAgent from '../../utils/EventAgent.js';

export default class Cart{
    constructor(el){
        this.el = el;
        // this.Items = el.getElementsByClassName('J_cart_item');
        this.Select = new ListSelect(this.el, {
            all: 'select-all',
            one: 'select-one',
            onChange: function(){
                this.render();
            }.bind(this)
        });

        this.oItemsNum = el.getElementsByClassName('number');


        this.oSelectNum = el.getElementsByClassName('J_select_num')[0];
        this.oTotalMoney = el.getElementsByClassName('J_total_money')[0];
        console.log(this.oSelectNum);
        this.init();
    }

    init(){
        this.bindEvent();
        // this.render();
    }

    bindEvent(){
        for(let item of this.oItemsNum){
            item.addEventListener('blur', this.onNumBlur.bind(this), false);
        }
        // for(let item of this.Items){
        //     item.addEventListener('blur', this.onNumBlur.bind(this), false);
        // }
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
    }


    render(){
        this.renderSelectNum();
        this.renderTotalMoney();
    }

    renderSelectNum(){
        this.oSelectNum.innerText = this.Select.selectCount();
    }
    renderTotalMoney(){
        this.oTotalMoney.innerText = this.Select.selectCount();

    }



}
