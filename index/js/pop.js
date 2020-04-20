
var items = document.getElementsByClassName('item');
var points = document.getElementsByClassName('point');
var goPreBtn = document.getElementById('goPre');
var goNextBtn = document.getElementById('goNext');
var index = 0;
var time = 0;
var clearActive = function(){
  for (var i = 0; i < items.length ; i++) {
      items[i].className = 'item';
  }
  for (var i = 0; i < points.length ; i++){
      points[i].className = 'point';
  }
}
var goIndex = function(){
  clearActive();
  console.log(index)
  points[index].className = 'point active';
  items[index].className = 'item active';
}
var goNext = function(){
  if(index < 3){
      index++;
  } else{
      index = 0;
  }
  goIndex();
}
var goPre = function(){
  if(index == 0){
      index = 3;
  } else{
      index --;
  }
  goIndex();
}
goNextBtn.addEventListener('click',function(){
  goNext();
  time = 0;
})
goPreBtn.addEventListener('click',function(){
  goPre();
  time = 0;
})
for (var i = 0 ; i < points.length ; i++){
  points[i].addEventListener('click',function(){
      var pointIndex = this.getAttribute('data-index');
      index = pointIndex;
      goIndex();
      time = 0;
  })
}
setInterval(function(){
  time++;
  if(time == 20){
      goNext();
      time = 0;
  }
},100)
