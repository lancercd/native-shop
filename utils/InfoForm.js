

export default class InfoForm{
    constructor(el){
        this.name = 'InfoForm';
        this.el = el;
        // this.el.classList.toggle("blur");

    }

    init(){
        this.render();
        this.bindEvent();
    }
    // TODO *******bindEvent*******

    render(){
        const oFrag = document.createDocumentFragment();


        const template = `
            <div id="info-form" class="active">
                <div class="head">
                    <div class="title"><i class="icon iconfont icon-info2"></i>title</div>
                    <div class="close-btn"><i class="icon iconfont icon-baseline-close-px"></i></div>
                </div>
                <div class="body">
                    <h2>Lorem ipsum dolor sit amet</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nihil magnam repellendus nostrum nemo? Tempore dolore libero ea molestiae. Delectus iusto nulla architecto eos minima culpa accusamus voluptatum velit vero!</p>
                </div>
                <div class="bottom">
                    <button type="button" name="button" onclick="toggle()" data-info="确定">确定</button>
                    <button type="button" name="button" onclick="toggle()" data-info="取消">取消</button>
                </div>
            </div>
        `;
        let doc = document.createElement('div');
        doc.innerHTML = template;
        oFrag.appendChild(doc);
        this.el.appendChild(oFrag);


    }

    // bindEvent(){
    //     this.oBtns.addEventListener('click', this.onBtnClick.bind(this), false);
    // }

    // onBtnClick(ev){
    //     const e = ev || window.event;
    //     const tar = e.target || e.srcElement;
    //     const tagName = tar.tagName.toLowerCase();
    //     // alert(tagName);
    //     if(tagName === 'button'){
    //         const method = tar.getAttribute('data-method');
    //         // alert(method);
    //         let value1 = Number(this.oInputs[0].value.replace(/\s+/g, '')) || 0;
    //         let value2 = Number(this.oInputs[1].value.replace(/\s+/g, '')) || 0;
    //
    //
    //         this.renderRes(this.oRes, this.comput(method, value1, value2));
    //     }
    // }


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
