<table>
  <thead>
  <tr>
      <th>Code</th>
      <th>Company</th>
  </tr>
  </thead>
  <tbody>
  @foreach($stocks as $stock)
      <tr>
          <td>{{ $stock->stock_code }}</td>
          <td>{{ $stock->product_id }}</td>
      </tr>
  @endforeach
  </tbody>
</table>