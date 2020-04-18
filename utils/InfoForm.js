

export default class InfoForm{
    constructor(el){
        this.name = 'InfoForm';
        this.el = el;
        this.el.classList.toggle("blur");

    }

    init(){
        this.render();
        this.getBtn();
        this.bindEvent();
        // setTimeout(this.show(), 1000);
        // this.show();
    }
    // TODO *******bindEvent*******

    render(){
        const oFrag = document.createDocumentFragment();

// <div class="close-btn"><i class="icon iconfont icon-baseline-close-px"></i></div>
        const template = `

                <div class="head">
                    <div class="title"><i class="icon iconfont icon-info2"></i>title</div>
                    <div class="close-btn"><i class="icon iconfont icon-baseline-close-px"></i></div>
                </div>
                <div class="body">
                    <h2>Lorem ipsum dolor sit amet</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nihil magnam repellendus nostrum nemo? Tempore dolore libero ea molestiae. Delectus iusto nulla architecto eos minima culpa accusamus voluptatum velit vero!</p>
                </div>
                <div class="bottom">
                    <button type="button" name="button" data-btninfo="确定">确定</button>
                    <button type="button" name="button" data-btninfo="取消">取消</button>
                </div>

        `;
        let doc = document.createElement('div');
        doc.setAttribute('id', 'info-form');
        doc.innerHTML = template;
        oFrag.appendChild(doc);
        document.body.appendChild(oFrag);

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
        // const form = this.form;
        this.form.addEventListener('click', this.onBtnClick.bind(this), false);
        if(this.closeBtn !== undefined){
            this.closeBtn.addEventListener('click', this.onClose.bind(this), false);

        }
        // else{
        //     alert('undefind');
        // }

    }

    onBtnClick(ev){
        const e = ev || window.event;
        const tar = e.target || e.srcElement;
        const tagName = tar.tagName.toLowerCase();
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

// class Test{
//
// }
// export { Calculator, Test };
