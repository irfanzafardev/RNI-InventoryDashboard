@extends('dashboard.layout.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0">Garam</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pt-4">
      <li class="breadcrumb-item text-dark" aria-current="page">
        <a href="/dashboard">
          Consolidation
        </a>
      </li>
      <li class="breadcrumb-item text-dark" aria-current="page">
        Garam
      </li>
      <li class="breadcrumb-item text-dark active" aria-current="page">
        Daily
      </li>
    </ol>
  </nav>
</div>

<ul class="nav time-nav">
  <li class="nav-item mr-3">
    <a class="nav-link active" href="/dashboard/garam">Latest Product</a>
  </li>
  <li class="nav-item mr-4">
    |
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/dashboard/garam/products">Product Item</a>
  </li>
</ul>

<!-- Content Row -->
<div class="content-cta mb-3">
  <form action="/dashboard/garam/daily" method="POST">
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
      <a href="#" class="text-decoration-none">
        <div class="card single-card">
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <h5 class="card-title item-card-title text-white">
                  Comparison Stats
                </h5>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="main-chart d-flex justify-content-center">
                  <canvas id="GaramPerformance"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4 mb-3">
      <div class="card single-card">
        <div class="card-body">
          <div class="row first-single-card-row">
            <div class="col-6">
              <h5 class="card-title item-card-title text-white ">
                Produksi Sendiri
              </h5>
              <p class="card-subtitle item-card-subtitle mb-2 text-white">
                {{ number_format($quantityProduksiSendiri, 0)}} <br />
                <span>(kg)</span>
              </p>
            </div>
            <div class="col-6">
              <div class="donut-chart pr-3 pt-2">
                <canvas id="ChartProduksiSendiriByCompany"></canvas>
              </div>
            </div>
          </div>
          <div class="row mt-1">
            <div class="col-12 item-card-value text-white">
              Rp. {{ number_format($valueProduksiSendiri, 2)}}
            </div>
          </div>
          <div class="row mt-2 pr-2">
            <div class="col-5 item-card-company text-white">Product</div>
            <div class="col-3 item-card-company text-white">Stock</div>
            <div class="col-4 item-card-company text-white">Value </div>
          </div>
          <div class="card-info scroll">
            @foreach ($companyProduksiSendiri as $item)
              <div class="row">
                <div class="col-5 item-card-info text-white">{{ $item->product->product_name }}</div>
                <div class="col-3 item-card-info text-white">{{ $item->quantity }}</div>
                <div class="col-4 item-card-info text-white">{{ $item->value }}</div>
              </div>
            @endforeach
          </div>            
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 mb-3">
      <div class="card single-card">
        <div class="card-body">
          <div class="row first-single-card-row">
            <div class="col-6">
              <h5 class="card-title item-card-title text-white ">
                Hasil Import
              </h5>
              <p class="card-subtitle item-card-subtitle mb-2 text-white">
                {{ number_format($quantityHasilImport, 0)}} <br />
                <span>(kg)</span>
              </p>
            </div>
            <div class="col-6">
              <div class="donut-chart pr-3 pt-2">
                <canvas id="ChartImportByCompany"></canvas>
              </div>
            </div>
          </div>
          <div class="row mt-1">
            <div class="col-12 item-card-value text-white">
              Rp. {{ number_format($valueHasilImport, 2)}}
            </div>
          </div>
          <div class="row mt-2 pr-2">
            <div class="col-5 item-card-company text-white">Product</div>
            <div class="col-3 item-card-company text-white">Stock</div>
            <div class="col-4 item-card-company text-white">Value </div>
          </div>
          <div class="card-info scroll">
            @foreach ($companyHasilImport as $item)
              <div class="row">
                <div class="col-5 item-card-info text-white">{{ $item->product->product_name }}</div>
                <div class="col-3 item-card-info text-white">{{ $item->quantity }}</div>
                <div class="col-4 item-card-info text-white">{{ $item->value }}</div>
              </div>
            @endforeach
          </div>            
        </div>
      </div>
    </div>
  </div>
</div>

<!-- DataTales Today's input -->
<div class="card my-4">
  <div class="card-header py-3">
    <h6 class="m-0 text-dark">Latest input</h6>
  </div>
  <div class="d-flex justify-content-end">
    <a href="#" class="btn btn-primary bg-darkblue mr-4 mt-3 px-4" onclick="tablesToExcel(['dataTable'], ['Stock'], 'stock.xls', 'Excel')">
      Export
    </a>
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
    {{-- <div class="row">
      <div class="col-12 mt-3 d-flex justify-content-end">
        <h3 class="text-primary" id="productLength">{{ $dataproductlength }}</h3>
      </div>
    </div> --}}
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js" integrity="sha512-R/QOHLpV1Ggq22vfDAWYOaMd5RopHrJNMxi8/lJu8Oihwi4Ho4BRFeiMiCefn9rasajKjnx9/fTQ/xkWnkDACg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
  const dataGaram = {
    labels: ["Produksi Sendiri", "Import"],
    datasets: [
      {
        label: "Garam Dataset",
        data: [{{ $valueProduksiSendiri }}, 0],
        backgroundColor: [
          "rgba(132, 178, 156, 1)",
          "rgba(242, 204, 142, 1)",
          // "rgba(232, 202, 129, 1)",
          // "rgba(210, 151, 59, 1)",
          // "rgba(244, 246, 248, 1)"
        ],
        hoverOffset: 4,
        borderColor:'#111F38',
      },
    ],
  };

  const configGaram = {
    type: "doughnut",
    data: dataGaram,
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: true,
          position: 'bottom',
          align: 'center',
          labels: {
            boxWidth: 10,
            font: {
              size: 10,
            },
            color: '#fff'
          }
        },
        tooltip: {
          enabled: true
        },
        datalabels: {
          formatter: (value, context) => {
            const datapoints = context.chart.data.datasets[0].data;
            function totalSum(total, datapoint)  {
              return total + datapoint;
            }
            const totalValue = datapoints.reduce(totalSum, 0);
            const PercentageValue = (value / totalValue * 100).toFixed(1);
            return `${PercentageValue}%`;
          },
          font: {
            size: 10,
          },
          color: '#fff'
        }
      }
    },
    plugins: [ChartDataLabels]
  };

  const GaramPerformance = new Chart(
    document.getElementById("GaramPerformance"),
    configGaram
  );
</script>

<script>
  const dataProduksiSendiri = {
    labels: [
      "Garam",
    ],
    datasets: [{
      label: 'Produksi Sendiri Dataset',
      data: [ 
        {{ $garamProduksiSendiriVal ?? "0" }}
      ],
      backgroundColor: [
        'rgba(210, 151, 59, 1)',
        'rgba(232, 202, 129, 1)',
      ],
      borderColor:'#111F38',
      hoverOffset: 3,
    }]
  };

  const configProduksiSendiri = {
    type: 'doughnut',
    data: dataProduksiSendiri,
    options: {
      circumference: 	180,
      rotation: 270,
      responsive: true,
      plugins: {
        legend: {
          display: true,
          position: 'bottom',
          align: 'center',
          labels: {
            boxWidth: 10,
            font: {
              size: 8,
            },
            color: '#fff'
          }
        },
        datalabels: {
          formatter: (value, context) => {
            const datapoints = context.chart.data.datasets[0].data;
            function totalSum(total, datapoint)  {
              return total + datapoint;
            }
            const totalValue = datapoints.reduce(totalSum, 0);
            const PercentageValue = (value / totalValue * 100).toFixed(1);
            return `${PercentageValue}%`;
          },
          font: {
            size: 10,
          },
          color: '#fff'
        }
      },
    },
    plugins: [ChartDataLabels]
  };

  const ChartProduksiSendiri = new Chart(
    document.getElementById('ChartProduksiSendiriByCompany'),
    configProduksiSendiri
  );
</script>

<script>
  const dataImport = {
    labels: [
      "Garam"
    ],
    datasets: [{
      label: 'Hasil Import Dataset',
      data: [ 
        {{ $garamHasilImportVal ?? "0" }},      
      ],
      backgroundColor: [
        'rgba(210, 151, 59, 1)',
        'rgba(232, 202, 129, 1)',
      ],
      borderColor:'#111F38',
      hoverOffset: 3,
    }]
  };

  const configImport = {
    type: 'doughnut',
    data: dataImport,
    options: {
      circumference: 	180,
      rotation: 270,
      responsive: true,
      plugins: {
        legend: {
          display: true,
          position: 'bottom',
          align: 'center',
          labels: {
            boxWidth: 10,
            font: {
              size: 8,
            },
            color: '#fff'
          }
        },
        datalabels: {
          formatter: (value, context) => {
            const datapoints = context.chart.data.datasets[0].data;
            function totalSum(total, datapoint)  {
              return total + datapoint;
            }
            const totalValue = datapoints.reduce(totalSum, 0);
            const PercentageValue = (value / totalValue * 100).toFixed(1);
            return `${PercentageValue}%`;
          },
          font: {
            size: 10,
          },
          color: '#fff'
        }
      },
    },
    plugins: [ChartDataLabels]
  };

  const ChartImport= new Chart(
    document.getElementById('ChartImportByCompany'),
    configImport
  );
</script>

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
  var tablesToExcel = (function () {
    var uri = "data:application/vnd.ms-excel;base64,",
        tmplWorkbookXML =
            '<?xml version="1.0"?><?mso-application progid="Excel.Sheet"?><Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">' +
            '<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office"><Author>Axel Richter</Author><Created>{created}</Created></DocumentProperties>' +
            "<Styles>" +
            '<Style ss:ID="Currency"><NumberFormat ss:Format="Currency"></NumberFormat></Style>' +
            '<Style ss:ID="Date"><NumberFormat ss:Format="Medium Date"></NumberFormat></Style>' +
            "</Styles>" +
            "{worksheets}</Workbook>",
        tmplWorksheetXML =
            '<Worksheet ss:Name="{nameWS}"><Table>{rows}</Table></Worksheet>',
        tmplCellXML =
            '<Cell{attributeStyleID}{attributeFormula}><Data ss:Type="{nameType}">{data}</Data></Cell>',
        base64 = function (s) {
            return window.btoa(unescape(encodeURIComponent(s)));
        },
        format = function (s, c) {
            return s.replace(/{(\w+)}/g, function (m, p) {
                return c[p];
            });
        };
    return function (tables, wsnames, wbname, appname) {
        var ctx = "";
        var workbookXML = "";
        var worksheetsXML = "";
        var rowsXML = "";
  
        for (var i = 0; i < tables.length; i++) {
            if (!tables[i].nodeType)
                tables[i] = document.getElementById(tables[i]);
            for (var j = 0; j < tables[i].rows.length; j++) {
                rowsXML += "<Row>";
                for (var k = 0; k < tables[i].rows[j].cells.length; k++) {
                    var dataType =
                        tables[i].rows[j].cells[k].getAttribute("data-type");
                    var dataStyle =
                        tables[i].rows[j].cells[k].getAttribute("data-style");
                    var dataValue =
                        tables[i].rows[j].cells[k].getAttribute("data-value");
                    dataValue = dataValue
                        ? dataValue
                        : tables[i].rows[j].cells[k].innerHTML;
                    var dataFormula =
                        tables[i].rows[j].cells[k].getAttribute("data-formula");
                    dataFormula = dataFormula
                        ? dataFormula
                        : appname == "Calc" && dataType == "DateTime"
                        ? dataValue
                        : null;
                    ctx = {
                        attributeStyleID:
                            dataStyle == "Currency" || dataStyle == "Date"
                                ? ' ss:StyleID="' + dataStyle + '"'
                                : "",
                        nameType:
                            dataType == "Number" ||
                            dataType == "DateTime" ||
                            dataType == "Boolean" ||
                            dataType == "Error"
                                ? dataType
                                : "String",
                        data: dataFormula ? "" : dataValue,
                        attributeFormula: dataFormula
                            ? ' ss:Formula="' + dataFormula + '"'
                            : "",
                    };
                    rowsXML += format(tmplCellXML, ctx);
                }
                rowsXML += "</Row>";
            }
            ctx = { rows: rowsXML, nameWS: wsnames[i] || "Sheet" + i };
            worksheetsXML += format(tmplWorksheetXML, ctx);
            rowsXML = "";
        }
  
        ctx = { created: new Date().getTime(), worksheets: worksheetsXML };
        workbookXML = format(tmplWorkbookXML, ctx);
  
        console.log(workbookXML);
  
        var link = document.createElement("A");
        link.href = uri + base64(workbookXML);
        link.download = wbname || "Workbook.xls";
        link.target = "_blank";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    };
  })();
</script>
@endsection