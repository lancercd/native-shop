import EventAgent from './EventAgent.js';
import Fade from './Fade.js';

export default class InfoForm{
    constructor(options={}){
        this.name = 'InfoForm';
        this.options = Object.assign({
            way: 'frame',//frame   message
            type: 'warring',//info warring
            mask: true,//true  fals
            w: 400,h: 400,
            close: true,
            msg: '请确认!',tiny:'',
            btn:{0:{class: 'conform', func: 'close', text: '确定'}},
            func:{'close':()=>{this.close()}},
        }, options);
        if(!this.options.func['close']){this.options.func['close'] = ()=>{this.close()};}
        this.init();
    }

    init(){
        this.createMsgContainer();
        this.render();
        this.bindEvent();
    }

    createMsgContainer(){
        let oMsgContainer = document.getElementById('info-container');
        if(oMsgContainer){
            this.oMsgContainer = oMsgContainer;
        }else{
            const oDiv = document.createElement('div');
            oDiv.setAttribute('id', 'info-container');
            document.body.appendChild(oDiv);
            this.oMsgContainer = oDiv;
        }
    }

    render(){
        this.bulidForm();
    }

    // div#_mask
    //     div#_info_Form
    //         div.inner-content
    //             div.close-btn > i data-i-type="_close"
    //             div.info-icon > i class=`i-${this.options.type}`
    //             div.content   > ${this.options.msg} > p ${this.options.tiny}
    //             div.btn-group > button class="conform" data-btn-func="ok" 确定
    bulidForm(){
        const op = this.options,
              oFrag = document.createDocumentFragment(),
              oForm = document.createElement('div'),
              oInnerContent = document.createElement('div');
        oForm.setAttribute('id', '_info-Form');
        oForm.style.width = op.w + 'px';
        oForm.style.height = op.h + 'px';
        this.fade = new Fade(oForm).fadein({
            duration: 300,
            way: 'frame-fadein-t-m',
        });
        oFrag.appendChild(oForm);
        oInnerContent.classList.add('inner-content');
        oForm.appendChild(oInnerContent);
        if(op.close){
            const oCloseBtn = document.createElement('div');
            oCloseBtn.innerHTML = `<i class="icon iconfont icon-baseline-close-px" data-i-type="_close"></i>`;
            oCloseBtn.classList.add('close-btn');
            oInnerContent.appendChild(oCloseBtn);
        }
        if(op.type){//提示框的icon
            const oInfoIcon = document.createElement('div');
            oInfoIcon.innerHTML = `<i class="icon iconfont icon-info i-${op.type}"></i>`;
            oInfoIcon.classList.add('info-icon');
            oInnerContent.appendChild(oInfoIcon);
        }
        if(op.msg){
            const oContent = document.createElement('div');
            oContent.innerHTML = `${op.msg}`;
            if(op.tiny){
                oContent.innerHTML += `<p>${op.tiny}</p>`;
            }
            oContent.classList.add('content');
            oInnerContent.appendChild(oContent);
        }
        const oBtnGroup = document.createElement('div');
        oBtnGroup.classList.add('btn-group');
        let btn = ``;
        for(let i in op.btn){
            btn += `<button class="lc-btn btn-lg ${op.btn[i].class? op.btn[i].class:''}" data-btn-func="${op.btn[i].func? op.btn[i].func:''}">${op.btn[i].text? op.btn[i].text:''}</button>`;
        }
        oBtnGroup.innerHTML = btn;
        oInnerContent.appendChild(oBtnGroup);
        if(op.mask){
            let mask = document.createElement('div');
            mask.setAttribute('id', '_mask');
            mask.appendChild(oForm);
            oFrag.appendChild(mask);
            this.mask = mask;
        }else{
            oFrag.appendChild(oForm);
        }
        this.oMsgContainer.appendChild(oFrag);
        this.oForm = oForm;
    }

    bindEvent(){
        this.oForm.addEventListener('click', this.onBtnClick.bind(this), false);
    }

    onBtnClick(ev){
        const e = new EventAgent(ev);
        const tagName = e.getTagName();
        const tar = e.getTar();
        if(tagName === 'button'){
            this.btnGroupClick(e);
        }else if(tagName === 'i' && tar.dataset['iType'] === '_close'){ //点的左上角的关闭按钮
            this.close();
        }
    }

    btnGroupClick(e){
        const tar = e.getTar();
        const btnFunc = tar.dataset['btnFunc'];
        this.options.func[btnFunc] && this.options.func[btnFunc]();
        //执行完用户的函数     关闭
        this.close();
    }

    close(){
        let duration = 300;
        this.fade.fadeout({duration,way: 'frame-fadeout-m-t'});
        this.options.mask && new Fade(this.mask).fadeout({duration});//有遮罩层
    }
}
