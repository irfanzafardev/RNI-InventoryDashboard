<table>
  <thead>
  <tr>
      <th style="color: red">Code</th>
      <th>Company</th>
      <th>Date</th>
  </tr>
  </thead>
  <tbody>
  @foreach($stocks as $stock)
      <tr>
          <td>{{ $stock->stock_code }}</td>
          <td>{{ $stock->product_id }}</td>
          <td>{{ $stock->date }}</td>
      </tr>
  @endforeach
  </tbody>
</table>