//チャートデータ作成
function getDrawChartData(barData) {
    var data = {
        labels: ["☆5", "☆4", "☆3", "☆2", "☆1"], //グラフラベル(固定)
        datasets: [{
            data: [barData[0], barData[1], barData[2], barData[3], barData[4]],
            backgroundColor: 'rgba( 255, 165, 0, 0.75)'
        }]
    };
    
    return data;
 }

//チャートオプション作成
function getChartOptions(average, totalCount) {
    var options = {
        title: {                 // 図のタイトル表示
            display: true,
            fontSize: 15,
            text: '総合' + average + '(' + totalCount + '件)'
        },
        legend: {                          // 棒ラベル
            display: false                     // 表示の有無
        },
        scales: {
            xAxes: [{
                display: false,               //x軸は非表示
                ticks: {                      //最大値最小値設定
                        min: 0,                   //最小値
                        max: totalCount           //最大値
                    }
            }],
            yAxes: [{
                gridLines: {                   // 補助線
                    display: false               // 補助線なし
                },
                ticks: {                      //最大値最小値設定
                        fontSize: 12,             //フォントサイズ
                        stepSize: 0               //軸間隔(効果なし)
                    }
            }],
        }
    };
    
    return options;
 }

//メイン処理
function main(){
//$('.menu-item-name')[0].attributes['totalcount']
        var review = $('.menu-item-name')[0];
        var ctx = document.getElementById('ex_chart');
        var ex_chart = new Chart(ctx, {
            type: 'horizontalBar',
            data: getDrawChartData([parseFloat(review.attributes['fiveCount'].value), parseFloat(review.attributes['foreCount'].value), parseFloat(review.attributes['threeCount'].value), parseFloat(review.attributes['twoCount'].value), parseFloat(review.attributes['oneCount'].value)]),
            options: getChartOptions(parseFloat(review.attributes['average'].value), parseFloat(review.attributes['totalCount'].value))
        });
}

main();