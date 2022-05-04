@extends('dashboard.layout.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0">Consolidation</h1>
  <nav class="d-none" aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pt-4">
      <li class="breadcrumb-item text-dark" aria-current="page">
        Consolidation
      </li>
      <li class="breadcrumb-item text-dark active" aria-current="page">
        Monthly
      </li>
    </ol>
  </nav>
</div>

<ul class="nav time-nav">
  <li class="nav-item mr-4">
    <a class="nav-link active" href="/dashboard">Latest</a>
  </li>
  <li class="nav-item mr-4">
    <a class="nav-link" href="/dashboard">Stock Value Graph</a>
  </li>
</ul>

<!-- Summary Row -->
<div class="row">
  <div class="col-12">
    <div class="card single-card-consolidation-chart bg-darkblue">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <h5 class="card-title item-card-title text-dark text-style-medium">
              Performance Stats
            </h5>
            {{-- <div class="d-flex justify-content-center">
              <div id="graphic" style="width: 800px"></div>
            </div> --}}
            <figure class="highcharts-figure">
              <div id="graphic"></div>
            </figure>
          </div>
        </div>
      </div>   
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">
  var dailyTotalValueAgro = <?php echo json_encode ($dailyTotalValueAgroConverted) ?>;
  var dailyTotalValueDays = <?php echo json_encode ($dailyTotalValueAgroDayConverted) ?>;

  var dailyTotalValueManu = <?php echo json_encode ($dailyTotalValueManuConverted) ?>;
  var d = <?php echo json_encode ($dailyTotalValueManuDayConverted) ?>;

  var dailyTotalValueGaram = <?php echo json_encode ($dailyTotalValueGaramConverted) ?>;
  var f = <?php echo json_encode ($dailyTotalValueGaramDayConverted) ?>;

  Highcharts.chart('graphic', {
    legend: {
      itemStyle: {
        color: 'white',
        fontWeight: 'bold'
      }
    },
    chart: {
      backgroundColor: 'rgba(0,0,0,0)',
      labels: {
        style: {
          color: '#fff'
        }
      }
    },
    title : {
      text: "Stock Value Graph",
      style: {"color": "#fff"}
    },
    xAxis : {
      title: {
        text: "Date",
        style: {"color": "#fff"}
      },
      categories: dailyTotalValueDays,
      labels: {
        style: {
          color: '#fff'
        }
      }
    },
    yAxis : {
      title: {
        text: "Value",
        style: {"color": "#fff"}
      },
      labels: {
        style: {
          color: '#fff'
        }
      }
    },
    plotOptions: {
      series: {
        allowPointSelect: true
      }
    },
    series: [
      {
        name: "Agroindustri",
        data: dailyTotalValueAgro,
        color: '#D2973B',
      },
      {
        name: "Manufaktur",
        data: dailyTotalValueManu,
      },
      {
        name: "Garam",
        data: dailyTotalValueGaram,
        color: '#84B29C',
      }
    ]
  });
</script>
@endsection