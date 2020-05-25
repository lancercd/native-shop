import ListSelect from './../../utils/ListSelect.js'


export default class Cart{
    constructor(el, oClassName){
        this.el = el;
        this.Select = new ListSelect(this.el, oClassName);
        // console.log(this.el);
    }



}
