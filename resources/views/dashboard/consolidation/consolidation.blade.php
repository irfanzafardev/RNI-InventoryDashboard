@extends('dashboard.layout.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0">Consolidation</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pt-4">
      <li class="breadcrumb-item text-dark" aria-current="page">
        Consolidation
      </li>
      <li class="breadcrumb-item text-dark active" aria-current="page">
        Daily
      </li>
    </ol>
  </nav>
</div>

<!-- Content Row -->
<div class="content-cta mb-3">
  <form action="/dashboard/agroindustri/daily" method="POST">
    @csrf
    <div class="row justify-content-end">
      <div class="col-6 d-flex justify-content-end">
        <input type="text" id="datepicker" value="{{ $day }}" name="date">

        <button type="submit" class="btn btn-primary bg-darkblue ml-3 px-4">
          Show
        </button>
      </div>
    </div>
  </form>
</div>

<!-- Summary Row -->
<div class="summary-card mb-4">
  <div class="card bg-darkblue">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4 mb-5 mb-lg-1">
          <div class="row">
            <div class="col-12">
              <img src="{{ asset("./img/dollar-white.png") }}" alt="" />
              <h5 class="d-inline-block text-white ps-2">
                Total Value
              </h5>
            </div>
          </div>
          <span id="totalValue"></span>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-5 mb-lg-1">
          <div class="row">
            <div class="col-12">
              <img src="{{ asset("./img/highest-amount-white.png") }}" alt="" />
              <h5 class="d-inline-block text-white ps-2">
                Highest amount
              </h5>
            </div>
          </div>
          @if (!empty($highestAmount->product->product_name))
            <small>({{ $highestAmount->product->product_name }})</small>
            <span>{{ number_format($highestAmount->quantity, 0) }} Kg</span>
          @else
          <span>-</span>
          @endif
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-5 mb-lg-1">
          <div class="row">
            <div class="col-12">
              <img src="{{ asset("./img/items-white.png") }}" alt="" />
              <h5 class="d-inline-block text-white ps-2">
                Total Product Items
              </h5>
            </div>
          </div>
          <span>{{ $dataStockLength }} items</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Single Card Row -->
<div class="single-cards row">
  <div class="col-12 col-md-6 col-lg-3 mb-3">
    <a href="#" class="text-decoration-none">
      <div class="card single-card-consolidation bg-lightorange">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h5 class="card-title item-card-title text-muted">
                Agroindustri
              </h5>
              <p class="card-subtitle item-card-subtitle mb-2 text-darkblue mt-2">
                <span class="number">{{ number_format($quantityAgroindustri, 0) }}</span>
                <span>(kg)</span>
              </p>
            </div>
          </div>
          <div class="row mt-0">
            <div class="col-12 item-card-value text-darkblue">
              Rp. {{ number_format($valueAgroindustri, 2) }}
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-12 col-md-6 col-lg-3 mb-3">
    <a href="#" class="text-decoration-none">
      <div class="card single-card-consolidation bg-lightred">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h5 class="card-title item-card-title text-muted">
                Manufaktur
              </h5>
              <p class="card-subtitle item-card-subtitle mb-2 text-darkblue mt-2">
                <span class="number">{{ number_format($quantityManufaktur, 0) }}</span>
                <span>(items)</span>
              </p>
            </div>
          </div>
          <div class="row mt-0">
            <div class="col-12 item-card-value text-darkblue">
              Rp. {{ number_format($valueManufaktur, 2) }}
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-12 col-md-6 col-lg-3 mb-3">
    <a href="#" class="text-decoration-none">
      <div class="card single-card-consolidation bg-lightlime">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h5 class="card-title item-card-title text-muted">
                Garam
              </h5>
              <p class="card-subtitle item-card-subtitle mb-2 text-darkblue mt-2">
                <span class="number">{{ number_format($quantityGaram, 0) }}</span>
                <span>(kg)</span>
              </p>
            </div>
          </div>
          <div class="row mt-0">
            <div class="col-12 item-card-value text-darkblue">
              Rp. {{ number_format($valueGaram, 2) }}
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-12 col-md-6 col-lg-3 mb-3">
    <a href="#" class="text-decoration-none">
      <div class="card single-card-consolidation bg-lightblue">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h5 class="card-title item-card-title text-muted">
                Performance Stats
              </h5>
              <div class="d-flex justify-content-center">
                <canvas class="canvas" id="myChart"></canvas>
              </div>
            </div>
          </div>
        </div>   
      </div>
    </a>
  </div>
</div>

<!-- DataTales Today's input -->
<div class="card my-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Today's input</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table
        class="table table-bordered"
        id="dataTable"
        width="100%"
        cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Company</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Product Name</th>
            <th>Date</th>
            <th>UOM</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th class="d-none">Value</th>
            <th>Value</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Company</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Product Name</th>
            <th>Date</th>
            <th>UOM</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th class="d-none">Value</th>
            <th>Value</th>
          </tr>
        </tfoot>
        <tbody id="tbody">
          @foreach ($datastocks as $datastock)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $datastock->product->user->company->company_name }}</td>
            <td>{{ $datastock->product->subcategory->category->category_name }}</td>
            <td>{{ $datastock->product->subcategory->subcategory_name }}</td>
            <td>{{ $datastock->product->product_name }}</td>
            <td>{{ $datastock->date }}</td>
            <td>{{ $datastock->product->unit->unit_symbol }}</td>
            <td>{{ number_format($datastock->quantity, 0)}}</td>
            <td>Rp. {{ number_format($datastock->product->unit_price, 2) }}</td>
            @php
              $value = $datastock->quantity * $datastock->product->unit_price ;
            @endphp
            <td class="d-none"><?php echo $value ?> </td>
            <td>Rp.  <?php echo number_format($value, 2); ?> </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  $('.accordion-button').click(function(){
    $(this).toggleClass("clicked");
  });
  var tbody = document.getElementById("tbody");
  var sumVal = 0;

  for (var i = 0; i < tbody.rows.length; i++)
  {
    sumVal = sumVal + parseInt(tbody.rows[i].cells[9].innerHTML);
  }


  // Create our number formatter.
  var formatter = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
  });

  document.getElementById('totalValue').innerHTML = formatter.format(sumVal);
</script>

<script>
  const data = {
  labels: [
    'Agroindustri',
    'Manufaktur',
    'Garam'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [{{ $valueAgroindustri }}, {{ $valueManufaktur }}, {{ $valueGaram }}],
    backgroundColor: [
      'rgba(255, 211, 132, 1)',
      'rgba(255, 153, 106, 1)',
      'rgba(67, 140, 255, 1)'
    ],
    borderColor:'#E9EEF6',
    hoverOffset: 3,
  }]
};

  const config = {
  type: 'doughnut',
  data: data,
  options: {
      responsive: true,
      plugins: {
        legend: {
          display: false,
        },
      },
    },
};

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
@endsection