@extends('dashboard.layout.main-product')

@section('container')
<!-- Page Heading -->
<div class="page-heading d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0">Agroindustri</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pt-4">
      <li class="breadcrumb-item text-dark" aria-current="page">
        <a href="/dashboard">
          Consolidation
        </a>
      </li>
      <li class="breadcrumb-item text-dark active" aria-current="page">
        Agroindustri
      </li>
      <li class="breadcrumb-item text-dark active" aria-current="page">
        Product
      </li>
    </ol>
  </nav>
</div>

<ul class="nav time-nav mb-5">
  <li class="nav-item mr-4">
    <a class="nav-link" href="/dashboard/agroindustri">Latest Stock</a>
  </li>
  <li class="nav-item mr-4">
    |
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="/dashboard/agroindustri/products">Product Item</a>
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
            ...
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- DataTales Product List -->
<ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link py-2 px-3 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">PT PG Rajawali I</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link py-2 px-3" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">PT PG Candi Baru</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link py-2 px-3" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">PG Krebet Baru</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link py-2 px-3" id="mitraKerinci-tab" data-bs-toggle="tab" data-bs-target="#mitraKerinci" type="button" role="tab" aria-controls="contact" aria-selected="false">PT Mitra Kerinci</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link py-2 px-3" id="larasAstraKartika-tab" data-bs-toggle="tab" data-bs-target="#LarasAstraKartika" type="button" role="tab" aria-controls="contact" aria-selected="false">PT Laras Astra Kartika</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link py-2 px-3" id="mitraOgan-tab" data-bs-toggle="tab" data-bs-target="#MitraOgan" type="button" role="tab" aria-controls="contact" aria-selected="false">PT Mitra Ogan</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="card my-4">
      <div class="card-header py-3">
        <h6 class="m-0 text-dark">PT PG Rajawali I Products</h6>
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
              @foreach ($dataproductPTPGRajawaliI as $product)
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
    <div class="card my-4">
      <div class="card-header py-3">
        <h6 class="m-0 text-dark">PT PG Candi Baru Products</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-bordered display"
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
              @foreach ($dataproductPTPGCandiBaru as $product)
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
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="card my-4">
      <div class="card-header py-3">
        <h6 class="m-0 text-dark">PG Krebet Baru I Products</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-bordered display"
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
              @foreach ($dataproductPGKrebetBaruI as $product)
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
  <div class="tab-pane fade" id="mitraKerinci" role="tabpanel" aria-labelledby="contact-tab">
    <div class="card my-4">
      <div class="card-header py-3">
        <h6 class="m-0 text-dark">PT Mitra Kerinci Products</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-bordered display"
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
              @foreach ($dataproductPTMitraKerinci as $product)
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
  <div class="tab-pane fade" id="LarasAstraKartika" role="tabpanel" aria-labelledby="contact-tab">
    <div class="card my-4">
      <div class="card-header py-3">
        <h6 class="m-0 text-dark">PT Laras Astra Kartika</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-bordered display"
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
              @foreach ($dataproductPTLarasAstraKartika as $product)
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
  <div class="tab-pane fade" id="MitraOgan" role="tabpanel" aria-labelledby="contact-tab">
    <div class="card my-4">
      <div class="card-header py-3">
        <h6 class="m-0 text-dark">PT Mitra Ogan</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-bordered display"
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
              @foreach ($dataproductPTMitraOgan as $product)
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
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    $('table.display').DataTable();
  });

  $('.accordion-button').click(function(){
    $(this).toggleClass("clicked");
  });
</script>
@endsection