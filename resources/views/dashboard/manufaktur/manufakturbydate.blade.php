@extends('dashboard.layout.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0">Manufaktur</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pt-4">
      <li class="breadcrumb-item text-dark" aria-current="page">
        <a href="/dashboard">
          Consolidation
        </a>
      </li>
      <li class="breadcrumb-item text-dark active" aria-current="page">
        Manufaktur
      </li>
      <li class="breadcrumb-item text-dark active" aria-current="page">
        Daily
      </li>
    </ol>
  </nav>
</div>

<ul class="nav time-nav">
  <li class="nav-item mr-3">
    <a class="nav-link active" href="/dashboard/manufaktur">Latest</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/dashboard/manufaktur/products">Product</a>
  </li>
</ul>

<!-- Content Row -->
<div class="content-cta mb-3">
  <form action="/dashboard/manufaktur/daily" method="POST">
    @csrf
    <div class="row justify-content-end">
      <div class="col-6 d-flex justify-content-end">
        <input type="text" id="datepicker" value="{{ $date }}" name="date">

        <button type="submit" class="btn btn-primary bg-darkblue ml-3 px-4">
          Show
        </button>
      </div>
    </div>
  </form>
</div>

<!-- Summary Row -->
<div class="summary-card mb-4">
  <div class="card">
    <div class="card-body bg-lightlime rounded">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4 mb-5 mb-lg-1">
          <div class="row">
            <div class="col-12">
              <img src="{{ asset("./img/dollar-sign.png") }}" alt="" />
              <h5 class="d-inline-block ps-2">Total Value</h5>
            </div>
          </div>
          <span id="totalValue"></span>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-5 mb-lg-1">
          <div class="row">
            <div class="col-12">
              <img src="{{ asset("./img/highest-amount.png") }}" alt="" />
              <h5 class="d-inline-block ps-2">
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
          {{-- <small>({{ $highestAmount->product->product_name }})</small> <br> --}}
          {{-- <span>{{ number_format($highestAmount->quantity, 0) }} Kg</span> --}}
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-5 mb-lg-1">
          <div class="row">
            <div class="col-12">
              <img src="{{ asset("./img/items.png") }}" alt="" />
              <h5 class="d-inline-block ps-2">
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
<a class="accordion-button text-muted text-decoration-none" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
  Show summarized data
  <img src="{{ asset("img/down-arrow-muted.png") }}" class="ml-3" width="20px">
</a>
<div class="collapse mt-3" id="collapseExample">
  <div class="single-cards row">
    <div class="col-12 col-md-6 col-lg-4 mb-3">
      <a href="category-page.html" class="text-decoration-none">
        <div class="card single-card">
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <h5 class="card-title item-card-title text-white">
                  Gula
                </h5>
                <p
                  class="card-subtitle item-card-subtitle mb-2 text-white"
                >
                  0 <br />
                  <span>(kg)</span>
                </p>
              </div>
              <div class="col-6">
                <div class="donut-chart d-flex justify-content-end pe-3">
                  <canvas id="ChartGula"></canvas>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12 item-card-value text-white">
                Rp. 0
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-4 item-card-company text-white">
                Company
              </div>
              <div class="col-4 item-card-company text-white">Stock</div>
              <div class="col-4 item-card-company text-white">Value</div>
            </div>
            <div class="card-info">
              <div class="row">
                <div class="col-4 item-card-info text-white">
                  PG Rajawali
                </div>
                <div class="col-4 item-card-info text-white">0</div>
                <div class="col-4 item-card-info text-white">
                  0
                </div>
              </div>
              <div class="row">
                <div class="col-4 item-card-info text-white">
                  PG Candi B
                </div>
                <div class="col-4 item-card-info text-white">0</div>
                <div class="col-4 item-card-info text-white">
                  0
                </div>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4 mb-3">
      <a href="category-page.html" class="text-decoration-none">
        <div class="card single-card">
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <h5 class="card-title item-card-title text-white">
                  Tetes
                </h5>
                <p
                  class="card-subtitle item-card-subtitle mb-2 text-white"
                >
                0 <br />
                  <span>(kg)</span>
                </p>
              </div>
              <div class="col-6">
                <div class="donut-chart d-flex justify-content-end pe-3">
                  <canvas id="ChartTetes"></canvas>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12 item-card-value text-white">
                Rp. 0
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-4 item-card-company text-white">
                Company
              </div>
              <div class="col-4 item-card-company text-white">Stock</div>
              <div class="col-4 item-card-company text-white">Value</div>
            </div>
            <div class="row">
              <div class="col-4 item-card-info text-white">
                PG Krebet baru I
              </div>
              <div class="col-4 item-card-info text-white">0</div>
              <div class="col-4 item-card-info text-white">0</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4 mb-3">
      <a href="category-page.html" class="text-decoration-none">
        <div class="card single-card">
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <h5 class="card-title item-card-title text-white">Teh</h5>
                <p
                  class="card-subtitle item-card-subtitle mb-2 text-white"
                >
                  0 <br />
                  <span>(kg)</span>
                </p>
              </div>
              <div class="col-6">
                <div class="donut-chart d-flex justify-content-end pe-3">
                  <canvas id="ChartTeh"></canvas>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12 item-card-value text-white">
                Rp. 0
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-4 item-card-company text-white">
                Company
              </div>
              <div class="col-4 item-card-company text-white">Stock</div>
              <div class="col-4 item-card-company text-white">Value</div>
            </div>
            <div class="row">
              <div class="col-4 item-card-info text-white">
                PT Mitra Kerinci
              </div>
              <div class="col-4 item-card-info text-white">0</div>
              <div class="col-4 item-card-info text-white">0</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4 mb-3">
      <a href="category-page.html" class="text-decoration-none">
        <div class="card single-card">
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <h5 class="card-title item-card-title text-white">
                  Sawit
                </h5>
                <p
                  class="card-subtitle item-card-subtitle mb-2 text-white"
                >
                  0 <br />
                  <span>(kg)</span>
                </p>
              </div>
              <div class="col-6">
                <div class="donut-chart d-flex justify-content-end pe-3">
                  <canvas id="ChartSawit"></canvas>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12 item-card-value text-white">Rp. 0</div>
            </div>
            <div class="row mt-2">
              <div class="col-4 item-card-company text-white">
                Company
              </div>
              <div class="col-4 item-card-company text-white">Stock</div>
              <div class="col-4 item-card-company text-white">Value</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4 mb-3">
      <a href="category-page.html" class="text-decoration-none">
        <div class="card single-card">
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <h5 class="card-title item-card-title text-white">
                  Karet
                </h5>
                <p
                  class="card-subtitle item-card-subtitle mb-2 text-white"
                >
                  0 <br />
                  <span>(kg)</span>
                </p>
              </div>
              <div class="col-6">
                <div class="donut-chart d-flex justify-content-end pe-3">
                  <canvas id="ChartKaret"></canvas>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12 item-card-value text-white">Rp. 0</div>
            </div>
            <div class="row mt-2">
              <div class="col-4 item-card-company text-white">
                Company
              </div>
              <div class="col-4 item-card-company text-white">Stock</div>
              <div class="col-4 item-card-company text-white">Value</div>
            </div>
          </div>
        </div>
      </a>
    </div>
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
          @foreach ($stockbydates as $stockbydate)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $stockbydate->product->user->company->company_name }}</td>
            <td>{{ $stockbydate->product->subcategory->category->category_name }}</td>
            <td>{{ $stockbydate->product->subcategory->subcategory_name }}</td>
            <td>{{ $stockbydate->product->product_name }}</td>
            <td>{{ $stockbydate->date }}</td>
            <td>{{ $stockbydate->product->unit->unit_symbol }}</td>
            <td>{{ number_format($stockbydate->quantity, 0)}}</td>
            <td>Rp. {{ number_format($stockbydate->product->unit_price, 2) }}</td>
            @php
              $value = $stockbydate->quantity * $stockbydate->product->unit_price ;
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
@endsection