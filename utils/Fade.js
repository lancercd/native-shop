
export default class Fade{
    constructor(el){
        this.el = el;
    }


    fadeout(options={}){
        console.log(options);
        options = Object.assign({
            duration: 0.5,
            rate: "ease",

        }, options);
        // this.addCSSRule(
        //     document.styleSheets[0],
        //     "@keyframes fade-fadeout",
        //     `from{transform: translateX(0);opacity: 1;}to{transform: translateX(-600px);opacity: 0;}`
        // );
        this.el.style.animationName = 'fadeout';
        this.el.style.animationFillMode = 'forwards';
        this.el.style.webkitAnimationDuration = options.duration + "s";
        this.el.style.webkitAnimationTimintFunction = options.rate;

        setTimeout(()=>{
            this.el.style.display = 'none';
        }, (options.duration * 1000));

    }


    // addCSSRule(sheet, selector, rules, index){
    //         if("insertRule" in sheet) {
    //             sheet.insertRule(selector + "{" + rules + "}", index);
    //         }else if("addRule" in sheet) {
    //             sheet.addRule(selector, rules, index);
    //         }
    //     }
}
