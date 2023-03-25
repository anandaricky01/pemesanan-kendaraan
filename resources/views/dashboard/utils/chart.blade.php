<script>
	var trace1 = {
  x: [
    @if($sensor->count() > 0)
    @foreach ($sensor as $s)
        "{!! $s->created_at !!}" ,
  @endforeach
@endif],
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
  marker: {
      color: '#38bdf8',
      line: {
          width: 2.5
      }
  },
};

var data = [ trace1 ];

var layout = {
  title: 'Data Ketinggian Air',
  font: {
    color: 'black'
  },
  paper_bgcolor:'rgba(0,0,0,0)',
  plot_bgcolor:'rgba(0,0,0,0)',
  xaxis:{
    title:'Tanggal (30 Hari Terakhir)',
    range: [trace1.x[trace1.x.length-30-1], trace1.x[trace1.x.length-1]],
    linecolor: 'black', // warna garis sumbu x
    gridcolor: 'black'
  },
  yaxis:{
    title:'Tinggi air (Meter)',
    linecolor: 'black',
    gridcolor: 'black' // warna garis sumbu x
  }

};

var config = {responsive: true}

Plotly.newPlot('tester', data, layout, config );
</script>
