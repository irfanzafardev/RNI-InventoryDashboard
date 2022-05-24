@extends('administrator.layouts.mainAlt')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent pt-4">
    <li class="breadcrumb-item text-dark" aria-current="page">
      <a href="/administrator">
        Dashboard
      </a>
    </li>
    <li class="breadcrumb-item text-dark" aria-current="page">
      Stock Report
  </li>
  </ol>
</nav>
@endsection

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-white">Stock Report</h1>
</div>

<!-- Content Row -->
<div class="row">
  <div class="content-cta mb-3">
    <form action="/administrator/report/daily" method="POST">
      @csrf
      <div class="row justify-content-end">
        <div class="col-12 d-flex justify-content-start">
          <input type="text" id="datepicker" value="{{ $day }}" name="date">
          <button type="submit" class="btn btn-primary bg-darkblue ml-3 px-4">
            Show
          </button>
          <a href="#" class="btn btn-primary bg-darkblue ml-3 px-4" onclick="tablesToExcel(['dataTable'], ['Stock'], 'stock.xls', 'Excel')">
            Export
          </a>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- DataTales Today's input -->
<div class="card my-4">
  <div class="card-header py-3">
    <h6 class="m-0 text-dark">Latest's input</h6>
  </div>
  <div class="card-body">
    @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{ $message }}
      </div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
    @endif

    <div class="table-responsive">
      <table
        class="table display table-bordered"
        id="dataTable"
        width="100%"
        cellspacing="0"
      >
        <thead>
          <tr>
            <th>No</th>
            <th>Transact Code</th>
            <th>Company</th>
            <th>Date</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Product Name</th>
            <th>UOM</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th>Value</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Transact Code</th>
            <th>Company</th>
            <th>Date</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Product Name</th>
            <th>UOM</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th>Value</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($stockbydates as $stock)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $stock->stock_code }}</td>
            <td>{{ $stock->company }}</td>
            <td>{{ $stock->date }}</td>
            <td>{{ $stock->category }}</td>
            <td>{{ $stock->product->subcategory->subcategory_name }}</td>
            <td>{{ $stock->product->product_name }}</td>
            <td>{{ $stock->product->unit->unit_symbol }}</td>
            <td>{{ number_format($stock->quantity, 0)}}</td>
            <td>Rp. {{ number_format($stock->product->unit_price, 2) }}</td>
            <td>Rp. {{ number_format($stock->value, 2) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    $('table.display').DataTable({
      aLengthMenu: [
          [25, 50, 100, 200, -1],
          [25, 50, 100, 200, "All"]
      ],
      iDisplayLength: -1
    });
  });
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



