<script>
    var ctx = document.getElementById('myChart').getContext('2d');

// Menghitung tanggal 15 hari ke depan dari tanggal 13 Maret 2023
var endDate = new Date(2023, 2, 13);
endDate.setDate(endDate.getDate() + 6);

var labels = [];
var data = [];

// Mengisi array labels dengan tanggal dari tanggal 13 Maret 2023 hingga 15 hari ke depan
for (var d = new Date(2023, 2, 13); d <= endDate; d.setDate(d.getDate() + 1)) {
  labels.push(d.toLocaleDateString());
}

// Mengisi array data dengan data tinggi air selama 15 hari
// Misalnya, data ini diisi dengan data dari sensor tinggi air menggunakan NodeMCU dan HCSR04
for (var i = 0; i < 7; i++) {
  data.push(Math.floor(Math.random() * 50) + 50);
}

var lineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: labels,
    datasets: [{
      label: 'Tinggi Air',
      data: data,
      borderColor: 'rgb(75, 192, 192)',
      tension: 0.1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
          callback: function(value, index, values) {
            return value + ' m';
          }
        },
        scaleLabel: {
          display: true,
          labelString: 'Meter'
        }
      }]
    }
  }
});
</script>
