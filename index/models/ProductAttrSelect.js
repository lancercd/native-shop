export default class productAttrSelect{
    constructor(el){
        this.el = el;
        this.items = el.querySelectorAll('.option-list');
        this.oPrice = el.getElementsByClassName('price')[0];
        // this.selected = new WeakSet();
        this.selected = new Map();
        this.node = new Map();
        // this.selected.set('key', 'value');
        // this.selected.set('key', 'sdf');
        // console.log(this.selected);
        // this.selected.add(['key', 'value']);
        // console.log(this.selected.get('key'));
        this.init();
    }

    init(){
        this.bindEvent();
        // this.renderPrice();
    }


    bindEvent(){
        this.items.forEach( item => item.addEventListener('click', this.onAttrSelect.bind(this), 'false'))
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

    renderPrice(){
        this.oPrice.innerText = 9999;


        //----------------------\\
        // console.log(this.selected);
        console.log('---------------------');
        this.selected.forEach((v,k) => {
            console.log(k + "  " + v);
        })
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



}
