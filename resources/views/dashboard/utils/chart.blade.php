<script>
    function updateDataInViewChart(data_api){
        var data_sensor = data_api.sensor;
        var data_x = [];
        var data_y = [];

        data_sensor.forEach((item) => {
            data_x.push(item.created_at);
            data_y.push(item.data);
        });
        data_y = data_y.map((item) => 29 - item);

        var trace1 = {
        x: data_x,
        y: data_y,
        name: 'Tinggi Air',
        line: {
            shape: 'spline',
            smoothing: 1.3
        },
        type: 'scatter',
        mode: 'lines+markers',
        marker: {
            color: '#38bdf8',
            line: {
            width: 2.5
            }
        },
        };

        var data = [ trace1 ];

        var maxData = Math.max.apply(null, trace1.y);
        var yAxisMax = maxData + 5;

        var layout = {
        title: 'Data Ketinggian Air',
        font: {
            color: 'black'
        },
        paper_bgcolor: 'rgba(0,0,0,0)',
        plot_bgcolor: 'rgba(0,0,0,0)',
        xaxis: {
            title: 'Jam',
            range: [trace1.x[trace1.x.length-30-1], trace1.x[trace1.x.length-1]],
            linecolor: 'black',
            gridcolor: 'black'
        },
        yaxis: {
            title: 'Kenaikan Tinggi air (Centimeter)',
            linecolor: 'black',
            gridcolor: 'black',
            range: [0, yAxisMax]
        }
        };

        var config = {responsive: true}

        Plotly.newPlot('tester', data, layout, config );
    }

    function getDataFromAPIChart() {
        fetch('{{ route('fetch-data') }}')
            .then(response => response.json())
            .then(data => {
                updateDataInViewChart(data); // Panggil fungsi untuk memperbarui tampilan dengan data yang diterima
                // console.log(data);
            })
            .catch(error => {
                console.error(error);
            });
    }

    setInterval(getDataFromAPIChart, 2000);
  </script>
