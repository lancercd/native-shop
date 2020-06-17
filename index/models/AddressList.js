import EventAgent from '../../utils/EventAgent.js';
import InfoForm from '../../utils/InfoForm.js';
import Message from '../../utils/Message.js';
import Fade from '../../utils/Fade.js';

export default class AddressList{
    //暂时只有删除功能   (地址删除)
    constructor(el){
        this.el = el;

        this.init();
    }
    init(){
        this.getDelBtn();
        this.bindEvent();

    }

    bindEvent(){
        for(let delBtn of this.delBtns){
            delBtn.addEventListener('click', this.onDelBtnClick.bind(this), false);
        }
    }

    onDelBtnClick(e){
        const ev = new EventAgent(e),
              parent = ev.getTar().parentNode,
              id = parent.dataset.addressId,
              infoForm = new InfoForm({
                type: 'warring',
                mask: true,
                msg:'确认删除吗?',
                // tiny: '删除后无法恢复!',
                btn:{
                    0:{class: 'conform', func: 'toDel', text: '删除', close: true},
                    1:{class: 'cancle', text: '取消', func: 'close'}
                },
                func: {
                    'toDel': this.exeDel.bind(this, id, parent),
                },
        });

    }

    exeDel(id, parent){
        // TODO send request   .then  删除
        const fade = new Fade(parent);
        fade.fadeout({duration: 500,way: 'fadeout-r-l'});
    }


    getDelBtn(){
        this.delBtns = this.el.getElementsByClassName('del');
    }


    // render(){
    //
    // }
}
