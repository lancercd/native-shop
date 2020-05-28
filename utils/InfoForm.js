import EventAgent from './EventAgent.js';

export default class InfoForm{
    constructor(options={}){
        this.name = 'InfoForm';
        this.options = Object.assign({
            type: 'frame',//frame   message
            mask: true,//true  false
            w: 400,
            h: 400,
            close: true,
        }, options);
        this.init();
    }

    init(){
        this.createMsgConta();
        this.render();
        // this.getBtn();
        this.bindEvent();

        // setTimeout(this.show(), 1000);
        // this.show();
    }

    createMsgConta(){
        let oMsgContainer = document.getElementById('msg-container');
        if(oMsgContainer){
            this.oMsgContainer = oMsgContainer;
        }else{
            const oDiv = document.createElement('div');
            oDiv.setAttribute('id', 'msg-container');
            document.body.appendChild(oDiv);
            this.oMsgContainer = oDiv;
        }
    }

    render(){
        const oFrag = document.createDocumentFragment();
        const template = `
            <div class="inner-content">
                <div class="close-btn"><i class="icon iconfont icon-baseline-close-px"></i></div>
                <div class="info-icon">
                    <i class="icon iconfont icon-info i-warring"></i>
                </div>
                <div class="content">
                    请确认信息是否准确!<br>
                    hhh
                </div>
                <div class="btn-group">
                    <button class="lc-btn btn-lg conform">确定</button>
                    <button class="lc-btn btn-lg cancle">取消</button>
                </div>
            </div>
        `;
        let doc = document.createElement('div');
        doc.setAttribute('id', '_info-Form');
        doc.innerHTML = template;
        doc.style.width = this.options.w + 'px';
        doc.style.height = this.options.h + 'px';
        if(this.options.mask){
            let mask = document.createElement('div');
            mask.setAttribute('id', '_mask');
            mask.appendChild(doc);
            oFrag.appendChild(mask)
        }else{
            oFrag.appendChild(doc);
        }
        this.oMsgContainer.appendChild(oFrag);
        this.doc = doc;
    }

    getBtn(){
        this.form = document.getElementById('info-form');
        this.closeBtn = this.form.getElementsByClassName('close-btn')[0];
        console.log(this.closeBtn);
    }

    // show(){
    //     this.form.classList.add('active');
    // }

    bindEvent(){
        this.doc.addEventListener('click', this.onBtnClick.bind(this), false)

    }

    onBtnClick(ev){
        // const e = ev || window.event;
        // const tar = e.target || e.srcElement;
        // const tagName = tar.tagName.toLowerCase();
        const e = new EventAgent(ev);
        // alert(tagName);
        if(tagName === 'button'){
            const btninfo = tar.getAttribute('data-btninfo');
            alert(btninfo);
            // let value1 = Number(this.oInputs[0].value.replace(/\s+/g, '')) || 0;
            // let value2 = Number(this.oInputs[1].value.replace(/\s+/g, '')) || 0;
            //
            //
            // this.renderRes(this.oRes, this.comput(method, value1, value2));
        }
    }


    onClose(ev){
        // alert('close');
        // this.form.parentNode.removeNode(thisNode);
        let childs = this.form.childNodes;
        for(var i = childs .length - 1; i >= 0; i--) {
            this.form.removeChild(childs[i]);
        }
        const body = document.getElementsByTagName('body')[0];
        body.removeChild(this.form);
        // console.info(this.form.parentNode);
        this.el.classList.toggle("blur");
        document.body.classList.toggle('overflow');
        // this.form.parentNode.removeNode(this.form);
    }


    // comput(method, val1, val2){
    //     switch(method){
    //         case 'plus':
    //             return val1 + val2;
    //         case 'sub':
    //             return val1 - val2;
    //         case 'mul':
    //             return val1 * val2;
    //         case 'div':
    //             return val1 /val2;
    //         default:
    //             break;
    //     }
    // }


    // renderRes(target, value){
    //     target.innerText = value;
    // }
}
