<script>
    var trace1 = {
      x: [
        @if($sensor->count() > 0)
        @foreach ($sensor as $s)
          "{!! $s->created_at !!}" ,
        @endforeach
        @endif
      ],
      y: [
        @if($sensor->count() > 0)
        @foreach ($sensor as $s)
          {!! $s->data !!} ,
        @endforeach
        @endif
      ],
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
  </script>
