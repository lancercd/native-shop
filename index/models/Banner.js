export default class Banner{
    constructor(el){
        this.name = 'banner';
        this.el = el;
        this.items = el.getElementsByClassName('item');
        this.points = el.getElementsByClassName('point');
        this.goPreBtn = document.getElementById('goPre');
        this.goNextBtn = document.getElementById('goNext');
        this.pointList=  el.getElementsByClassName('pointList')[0];
        // console.log(this.pointList);

        this.index = 0;
        this.time = 0;
        // console.log(this.items.length);
    }


    init(){
        // console.log('ok');
        this.render();
        this.bindEvent();
        this.run();
    };


    bindEvent(){
        // console.log("ok");
        this.goNextBtn.addEventListener('click',() => {
            console.log("goNextBtn");
            this.goNext();
            this.time = 0;
        });
        this.goPreBtn.addEventListener('click',() => {
            console.log("goPreBtn");
            this.goPre();
            this.time = 0;
        });
        for (let i = 0 ; i < this.points.length ; i++){
            this.points[i].addEventListener('click',() => {
                let pointIndex = this.points[i].getAttribute('data-index');
                this.index = pointIndex;
                this.goIndex();
                this.time = 0;
            })
        }
    }

    render(){
        const oFrag = document.createDocumentFragment();
        for (let i = 0; i < this.items.length; i++) {
            let oDiv = document.createElement('li');
            oDiv.setAttribute('data-index', i);
            if(i == 0) oDiv.classList.add('active');
            oDiv.classList.add('point');
            oFrag.appendChild(oDiv);
        }
        this.pointList.appendChild(oFrag);


    }

    run(){
        setInterval(() => {
            this.time++;
          if(this.time == 5){
              this.goNext();
              this.time = 0;
          }
      },400);
    }


    clearActive(){
      for (let i = 0; i < this.items.length ; i++) {
          this.items[i].className = 'item';
      }
      for (let i = 0; i < this.points.length ; i++){
          this.points[i].className = 'point';
      }
    }

    goIndex(){
      this.clearActive();
      // console.log(this.index);
      this.points[this.index].className = 'point active';
      this.items[this.index].className = 'item active';
    }

    goNext(){
      if(this.index < this.items.length - 1){
          this.index++;
      } else{
          this.index = 0;
      }
      // console.log(this.index);
      this.goIndex();
    }


    goPre(){
      if(this.index == 0){
          this.index = this.items.length - 1;
      }else{
          this.index --;
      }
      this.goIndex();
    }



}
