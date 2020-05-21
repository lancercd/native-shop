export default class ProductMore{
    constructor(el){
        // console.log(el);
        this.el = el;
        this.btn = el.getElementsByTagName('i');
        console.log(this.btn);
        this.init();
    }


    init(){
        this.bindEvent();
    }



    bindEvent(){
        for(let i=0; i<this.btn.length; i++){
            this.btn[i].addEventListener('click', this.onBtnClick.bind(this), false);
        }
    }

    onBtnClick(ev){
        const e = ev || window.event,
              tar = e.target || e.srcElement,
              tagName = tar.tagName.toLowerCase();
        if(tagName === 'i'){
            const direction = tar.getAttribute('data-direction');
            console.log(direction);// TODO 获取到点击具体btn了
        }

    }
}
