
export default class ListSelect {
    constructor(el, name){
        // console.log('ListSelect on ready');
        this.name = 'ListSelect';
        this.el = el;
        this._all = name.all;
        this._one = name.one;
        this._attrName = name.attr || 'id';
        this._onChange = name.onChange || function(){};
        this.oSelectAll = el.getElementsByClassName(this._all)[0];
        this.oSelectOne = el.getElementsByClassName(this._one);

        this.selected = new Set();//选择的每条数据的id
        this.init();
    }

    init(){
        this.bindEvent();
    }

    bindEvent(){
        this.oSelectAll.addEventListener('change', this.onSelectAll.bind(this), false);
        for (var i = 0; i < this.oSelectOne.length; i++) {
            this.oSelectOne[i].addEventListener('change', this.onSelectOne.bind(this), false);
        }
    }

    onSelectAll(){
        let flag = this.oSelectAll.checked;
        for (let i = 0; i < this.oSelectOne.length; i++) {
            this.oSelectOne[i].checked = flag;
            flag? this.selected.add(this.oSelectOne[i].dataset[this._attrName]): this.selected.clear();
        }
        this.onChange();
    }

    onSelectOne(ev){
        const e = ev || window.event,
              tar = e.target || e.srcElement;
        let is_select_all = this.oSelectAll.checked;
        if(tar.checked){
            this.selected.add(tar.dataset[this._attrName]);
            //TODO 是否已经全部选中了   若全部选中  全选按钮变为选中状态
            let flag = true;//默认每个都被选中
            for(let item of this.oSelectOne){ if(!item.checked){ flag = false;break; } }
            if(flag){ this.oSelectAll.checked = true; }
        }else{
            this.selected.delete(tar.dataset[this._attrName]);
            // TODO 若全按钮已经为选中状态   则改变为取消状态
            if(is_select_all) this.oSelectAll.checked = false;
        }
        // tar.checked? this.selected.add(tar.dataset[this._attrName]):this.selected.delete(tar.dataset[this._attrName]);
        // console.log(this.selected.size);
        this.onChange();
    }

    selectCount(){
        return this.selected.size;
    }

    onChange(){
        return this._onChange();
    }

    getSelect(){
        return Array.from(this.selected);
        // return Array.from(this.selected).join(',');
    }

    getSelected(){
        return this.selected;
    }
}
