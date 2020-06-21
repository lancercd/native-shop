import EventAgent from '../../utils/EventAgent.js';
import InfoForm from '../../utils/InfoForm.js';
import Message from '../../utils/Message.js';
import Fade from '../../utils/Fade.js';
import request from '../../utils/request.js';

export default class AddressList{
    //暂时只有删除功能   (地址删除)
    constructor(el){
        this.el = el;
        this.init();
    }
    init(){
        this.render();
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
        const message = new Message;
        request({
            type: 'get',
            url: `/user/address_del?id=${id}`,
        }).then(data=>{
            message.show({
                text: data.msg,
                type: 'success',
            });
            const fade = new Fade(parent);
            fade.fadeout({duration: 500,way: 'fadeout-r-l'});
        },
        msg=>{
            message.show({
                text: msg.msg,
                type: 'error',
            });
            // console.log(msg.msg);
        });
        this.render();

    }


    getDelBtn(){
        this.delBtns = this.el.getElementsByClassName('del');
    }

    createList(data){
        const oFrag = document.createDocumentFragment();
        for (let address of data) {
            let oDiv = document.createElement('div');
            address.is_default = (address.is_default==1)? '<div class="show">默认</div>': ''
            let tmp = `
                    <div class="circle">${address.real_name}</div>
                    <div class="name">${address.real_name}</div>
                    <div class="phone">${address.phone}</div>
                    <div class="detail">${address.province} ${address.city} ${address.district}<br>${address.detail}</div>
                    <div class="is-default">${address.is_default}</div>
                    <div class="del">删除</div>
                    <div class="address-deit"><a href="#"><i class="icon iconfont icon-right"></i></a></div>
            `;
            oDiv.setAttribute('data-address-id', address.address_id);
            oDiv.setAttribute('class', 'item');
            oDiv.innerHTML = tmp;
            oFrag.appendChild(oDiv);
        }
        return oFrag;
    }


    getAddressList(){
        return request({
            type: 'get',
            url: `/user/get_address_list`,
        });
    }


    async render(){
        const oList = await this.getAddressList().catch(
            msg => {const message = new Message;message.show({text: msg.msg,type: 'error'});}
        );
        this.el.innerHTML = '';
        if(!oList.data){
            this.el.innerHTML = `
                <div class="non-list">
                    这里什么都没有，快去添加吧!
                </div>
            `;
        }else{
            this.el.appendChild(this.createList(oList.data || []));
            this.getDelBtn();
            this.bindEvent();
        }

    }
}
