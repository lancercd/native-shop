
export default class Fade{
    constructor(el){
        this.el = el;
    }


    fadeout(options={}){
        console.log(options);
        options = Object.assign({
            duration: 0.5,
            rate: "ease",
            way:'r-l',

        }, options);
        this.el.style.animationName = 'fadeout' + options.way;
        this.el.style.animationFillMode = 'forwards';
        this.el.style.webkitAnimationDuration = options.duration + "s";
        this.el.style.webkitAnimationTimintFunction = options.rate;

        setTimeout(()=>{
            this.el.style.display = 'none';
        }, (options.duration * 1000));

    }

}
