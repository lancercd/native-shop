import {URL} from '../config/config.js';


export default function request(opt){
    let options = opt || {},
        type = (options.type || 'GET').toUpperCase(),
        async = options.async || true,
        data = options.data || null,
        // error = opt.error || function(){},
        // success = opt.success || function(){},
        begin = options.begin || function(){},
        finish = options.finish || function(){},
        url = options.url;
    begin();
    function formatDatas(obj){
        let str = '';
        for(let key in obj){
            str +=key + '=' + obj[key] + '&';
        }
        return str.replace(/&$/, '');
    }
console.log('url: ' + url);
    return new Promise((resolve, reject) => {
        const xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        if(!xhr){
            throw new Erroe('浏览器不支持ajax    换一下浏览器');
        }

        xhr.open(type, url, async);
        type === 'POST' && xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded;charset=UTF-8');
console.log('data: ' + data);
        xhr.send(type === 'GET' ? null: formatDatas(data));

        xhr.onload = function(){
            finish();
            if(xhr.status==200)
                // resolve(xhr.responseText);
                resolve(JSON.parse(xhr.responseText));
            else
                reject('加载失败');
        };
        // xhr.onreadystatechange = function(){
        //     if(xhr.readyState==4 && xhr.status==200)
        //         resolve(xhr.responseText);
        //         // resolve(JSON.parse(xhr.responseText));
        //     else
        //         // reject('加载失败');
        //
        //     // complete();
        // };
        xhr.onerror = function(){
            reject(this);
        }
    });
};
