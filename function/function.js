/***
* 自定义js函数
*/

/***   ajax  封装
* 方法
* 数据
* 地址
* 同步异步
* 回调函数
*/
//TODO async 未解决
// function _ajax(method, data, url, async, success)
// {
//     var xhr = false;
//     // console.log(data.stringify());
//     xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
//     if (!xhr) {
//         return;
//     }
//     // console.log(typeof async);
//     // if(typeof async == "undefined"){
//     //     console.log("undefined");
//     // }else{
//     //     console.log("No");
//     // }
//     if (method === 'get') {
//         xhr.open("GET", url);
//         xhr.send(null);
//     }else{
//         xhr.open("POST", url);
//         xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded;charset=UTF-8");
//         // xhr.setRequestHeader("Content-type","application/json;charset=UTF-8");
//
//         // console.log(data);
//         xhr.send(data);
//     }
//
//     xhr.onreadystatechange = function(){
//         if(xhr.readyState==4 && xhr.status==200){
//             console.log(JSON.parse(xhr.responseText));
//             // if(typeof success == "function"){
//             //     success(xhr.responseText);
//             // }else{
//             //     return xhr.responseText;
//             // }
//             // if (false){
//             //     success(xhr.responseText);
//             //
//             // }else{
//             //
//             // }
//         }
//     };
// }

var _d=document;

var lc = (function(){
    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    if(!xhr){
        throw new Erroe('浏览器不支持ajax    换一下浏览器');
    }
    function _doAjax(opt){
        // console.log(opt);
        var opt = opt || {},
            type = (opt.type || 'GET').toUpperCase(),
            async = opt.async || true,
            data = opt.data || null,
            error = opt.error || function(){},
            success = opt.success || function(){},
            complete = opt.complete || function(){},
            url = opt.url;

        xhr.open(type, url, async);
        type === 'POST' && xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded;charset=UTF-8");
        // console.log(data);
        xhr.send(type === 'GET' ? null: formatDatas(data));

        xhr.onreadystatechange = function(){
            // console.log(1);
            if(xhr.readyState==4 && xhr.status==200)
                success(JSON.parse(xhr.responseText));
                // success(xhr.responseText);
            else
                error();

            complete();
        };
    }

    function formatDatas(obj){
        var str = '';
        for(var key in obj){
            str +=key + '=' + obj[key] + '&';
        }
        return str.replace(/&$/, '');
    }


    return {
        ajax: function(opt){
            _doAjax(opt);
        }
    };
})();
