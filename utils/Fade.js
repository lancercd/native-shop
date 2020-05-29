
export default class Fade{
    constructor(el){
        this.name = 'Fade';
        this.el = el;
    }


    fadeout(options={}){
        options = Object.assign({
            duration: 0.5,
            rate: "ease",
            way:'fadeout',
        }, options);
        this.setAnimation(options);

        if(options.duration){
            setTimeout(()=>{
                // this.el.style.display = 'none';
                this.el.remove();
            }, (options.duration * 1000));
        }
        return this;
    }

    fadein(options={}){
        options = Object.assign({
            duration: 0.5,
            rate: "ease",
            way:'fadein',
        }, options);
        this.setAnimation(options);
        return this;
    }


    setAnimation(options){
        this.el.style.animationName = options.way;
        this.el.style.animationFillMode = 'forwards';
        this.el.style.webkitAnimationDuration = options.duration + "s";
        this.el.style.webkitAnimationTimintFunction = options.rate;
    }

}
