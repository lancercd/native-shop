import request from './../../utils/request.js';


console.log(request({
    url: '../api/test.php'
}).then(
    res => {console.log(res);},
    msg => {console.log('error:' + msg);}
));
