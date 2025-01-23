<table class="table table-hover">
  <thead>
    <tr>
      <th>Date & Time</th>
      <th>Recipient Name</th>
      <th>Bank Name</th>
      <th>Withdrawals</th>
      <th>Deposits</th>
      <th>Balance</th>
    </tr>
  </thead>
  <tbody>
    @if(count($ut) > 0)
    @foreach($ut as $row)
    <tr>
      <td>{{$row['created_at']}}</td>
      @if( $row['from_acc'] ==  $row['to_acc'])
      <td>{{$row['to_name']}}</td>
      @elseif( Auth::guard('web')->user()->customer_id == $row['from_acc'])
      <td>{{$row['to_name']}}</td>
      @elseif( Auth::guard('web')->user()->customer_id == $row['to_acc'])
      <td>{{$row['from_name']}}</td>
      @endif
      <td>{{$row['bank_name']}}</td>
      @if( $row['from_acc'] ==  $row['to_acc'])
      <td></td>
      <td class="text-success">₹ {{$row['amount']}}<i class="mdi mdi-arrow-bottom-left"></i></td>
      @elseif( Auth::guard('web')->user()->customer_id == $row['from_acc'])
      <td class="text-danger">₹ {{$row['amount']}} <i class=" mdi mdi-arrow-top-right"></i></td>
      <td></td>
      @elseif( Auth::guard('web')->user()->customer_id == $row['to_acc'])
      <td></td>
      <td class="text-success">₹ {{$row['amount']}}<i class=" mdi mdi-arrow-bottom-left"></i></td>
      @endif
      @if( $row['from_acc'] ==  $row['to_acc'])
      <td><label class="text-primary">₹ {{$row['from_balance']}}</label></td>
      @elseif( Auth::guard('web')->user()->customer_id == $row['from_acc'])
      <td><label class="text-primary">₹ {{$row['from_balance']}}</label></td>
      @elseif( Auth::guard('web')->user()->customer_id == $row['to_acc'])
      <td><label class="text-primary">₹ {{$row['to_balance']}}</label></td>
      @endif
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
@if($ut->links()->paginator->hasPages())
<div class="btn btn-sm col-md-8 text-small">
  {{ $ut->links('pagination::bootstrap-5')->with(['class' => 'pagination-sm']) }}
</div>
@endif
