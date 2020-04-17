// import CONFIG from './../config/config.js';


export default function request(opt){
    let options = opt || {},
        type = (options.type || 'GET').toUpperCase(),
        async = options.async || true,
        data = options.data || null,
        // error = opt.error || function(){},
        // success = opt.success || function(){},
        complete = options.complete || function(){},
        url = options.url;

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
        // console.log(data);
        xhr.send(type === 'GET' ? null: formatDatas(data));

        xhr.onreadystatechange = function(){
            // console.log(1);
            if(xhr.readyState==4 && xhr.status==200)
                resolve(xhr.responseText);
                // resolve(JSON.parse(xhr.responseText));
            else
                // reject('加载失败');

            complete();
        };
        xhr.onerror = function(){
            reject(this);
        }
    });
};
