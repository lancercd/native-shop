import request from '../../utils/request.js';
import Message from '../../utils/Message.js';


export default class Chart{
    constructor(chart, sheet){
        this.name = 'Chart';
        this.chart = chart;
        this.sheet = sheet;
        this.chartCols = this.chart.getElementsByClassName('col');
        this.sheetSticks = this.sheet.getElementsByClassName('stick-len');
        this.sheetNums = this.sheet.getElementsByClassName('num');
        this.sheetCols = this.sheet.getElementsByClassName('col');
        this.init();
    }


    init(){
        this.message = new Message();
        this.getData();
    }

    //矩形图
    renderRectangular(max, data){
        for (let i = 0; i < this.chartCols.length; i++) {
            this.chartCols[i].firstElementChild.style.height = Math.floor((data[i]/max) * 100) + '%';
            this.chartCols[i].childNodes[2].nodeValue = data[i];
        }
    }


    renderProgress(data){

        for(let i=0; i<this.sheetNums.length; i++){
            this.sheetNums[i].innerText = data['num'][i];
        }

        for(let i=0; i<this.sheetSticks.length; i++){
            this.sheetSticks[i].style.width = data['stick'][i]*100 + '%';
        }

    }

    getData(){
        //矩形图
        request({
            url: '/order/get_chart_data',
        }).then(
            res => {
                const max = Math.max(...res.data);
                this.renderRectangular(max, res.data);

            },
            res => {
                console.log('获取表格数据失败!');
                this.message.show({
                    type: 'error',
                    text: res.msg
                });
            }
        );

        //进度条
        request({
            url: '/order/get_chart_progress_data'
        }).then(
            res => {
                this.renderProgress(res.data);
            },
            res => {
                console.log('获取表格数据失败!');
                this.message.show({
                    type: 'error',
                    text: res.msg
                });
            }
        );
    }

}
