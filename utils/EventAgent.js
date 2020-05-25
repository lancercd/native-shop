
export default class EventAgent{
    constructor(ev){
        this.e = ev || window.event;
        this.tar = this.e.target || this.e.srcElement;
        this.tagName = this.tar.tagName.toLowerCase();
    }

    getEvent(){
        return this.e;
    }

    getTar(){
        return this.tar;
    }

    getTagName(){
        return this.tagName;
    }

    getValue(){
        if(this.getTagName() === 'input') return this.tar.value;
        else throw new Exception('非input标签');
    }
}
