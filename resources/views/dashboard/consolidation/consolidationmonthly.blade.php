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

<ul class="nav time-nav d-none">
  <li class="nav-item mr-4">
    <a class="nav-link active" href="/dashboard/agroindustri">Latest</a>
  </li>
  <li class="nav-item mr-4">
    <a class="nav-link" href="/dashboard/agroindustri">Montly Stats</a>
  </li>
</ul>

<!-- Summary Row -->
<div class="row">
  <div class="col-12">
    <div class="card single-card-consolidation-chart bg-darkblue">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <h5 class="card-title item-card-title text-white text-style-medium">
              Monthly Stats
            </h5>
            <div class="d-flex justify-content-center">
              <div id="graphic" style="width: 800px"></div>
            </div>
          </div>
        </div>
      </div>   
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
  var a = <?php echo json_encode ($dailyTotalValueAgroConverted) ?>;
  var b = <?php echo json_encode ($dailyTotalValueAgroDayConverted) ?>;

  var c = <?php echo json_encode ($dailyTotalValueManuConverted) ?>;
  var d = <?php echo json_encode ($dailyTotalValueManuDayConverted) ?>;

  var e = <?php echo json_encode ($dailyTotalValueGaramConverted) ?>;
  var f = <?php echo json_encode ($dailyTotalValueGaramDayConverted) ?>;

  Highcharts.chart('graphic', {
    legend: {
      itemStyle: {
        color: 'white',
        fontWeight: 'bold'
      }
    },
    chart: {
      // backgroundColor: '#fff',
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
      categories: b,
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
        data: a,
        color: '#D2973B',
      },
      {
        name: "Manufaktur",
        data: c,
      },
      {
        name: "Garam",
        data: e,
        color: '#84B29C',
      }
      // {
      //   name: "Agroindustri",
      //   data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175, 64523, 42355, 64567, 63454, 75646, 43242, 137133, 
      //   154175, 52503, 57177, 69658, 97031, 119931, 137133, 154175, 64523, 42355, 64567, 63454, 75646, 43242, 137133
      //   ],
      //   color: '#D2973B',
      // },
      // {
      //   name: "Manufaktur",
      //   data: [ 56934, 57503, 64177, 32658, 23031, 97931, 98133, 120175, 88523, 88355, 90567, 20454, 116646, 86242, 187133, 
      //   97175, 89503, 23177, 98658, 24031, 145931, 107133, 104175, 12523, 88355, 34567, 23454, 90646, 122242, 107133
      //   ],
      // },
      // {
      //   name: "Garam",
      //   data: [ 114175, 72503, 32177, 90658, 46031, 129931, 147133, 104175, 46523, 88355, 84567, 33454, 35646, 113242, 37133,
      //   63934, 40503, 38177, 60658, 40031, 102931, 160133, 104175, 84523, 20355, 44567, 33454, 35646, 13242, 177133,
      //   ],
      //   color: '#84B29C',
      // }
    ]
  })
</script>
@endsection