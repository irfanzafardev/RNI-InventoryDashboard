@extends('dashboard.layout.main-product')

@section('container')
<!-- Page Heading -->
<div class="page-heading d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0">Garam</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pt-4">
      <li class="breadcrumb-item text-dark" aria-current="page">
        Garam
      </li>
      <li class="breadcrumb-item text-dark active" aria-current="page">
        Products
      </li>
    </ol>
  </nav>
</div>

<ul class="nav time-nav mb-5">
  <li class="nav-item mr-3">
    <a class="nav-link" href="/dashboard/garam">Latest Product</a>
  </li>
  <li class="nav-item mr-4">
    |
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="/dashboard/garam/products">Product Item</a>
  </li>
</ul>

<!-- Summary Row -->
<div class="summary-card mb-4">
  <div class="card">
    <div class="card-body bg-darkblue rounded">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6 mb-5 mb-lg-1 d-flex justify-content-center">
          <div class="">
            <div class="row">
              <div class="col-12 d-flex align-items-center">
                <img class="" src="{{ asset("./img/product.png") }}" alt="" />
                <h5 class="d-inline-block text-white ml-3 ps-2">
                  Total <br> Products
                </h5>
              </div>
            </div>
            <span class="">{{ $dataProductLength }}</span>
            <span class="pl-2">items</span>        
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 mb-5 mb-lg-1 d-flex justify-content-center">
          <div class="">
            <div class="row">
              <div class="col-12 d-flex align-items-center">
                <img class="" src="{{ asset("./img/product.png") }}" alt="" />
                <h5 class="accordion-button collapsed d-inline-block text-white ml-3 ps-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Total Category <br> Products
                </h5>
              </div>
            </div>
            <span>{{ $dataCategoryLength }}</span>
            <span class="pl-2">items</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <div class="card">
          <div class="card-body">
            Lorem ipsum dolor sit amet
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <div class="card">
          <div class="card-body">
            Lorem ipsum dolor sit amet
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- DataTales Product List -->
<ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link py-2 px-3 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
      PT Garam
    </button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="card my-4">
      <div class="card-header py-3">
        <h6 class="m-0 text-dark">PT Garam</h6>
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
                <th>Class</th>
                <th>Category</th>
                <th>Sub Category</th>
                <th>Product Name</th>
                <th>UOM</th>
                <th>Unit Price</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Company</th>
                <th>Category</th>
                <th>Class</th>
                <th>Sub Category</th>
                <th>Product Name</th>
                <th>UOM</th>
                <th>Unit Price</th>
              </tr>
            </tfoot>
            <tbody id="tbody">
              @foreach ($dataproductPTGaram as $product)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->user->company->company_name }}</td>
                <td>{{ $product->subcategory->category->group->group_name }}</td>
                <td>{{ $product->subcategory->category->category_name }}</td>
                <td>{{ $product->subcategory->subcategory_name }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->unit->unit_symbol}}</td>
                <td>Rp. {{ number_format($product->unit_price, 2) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    
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