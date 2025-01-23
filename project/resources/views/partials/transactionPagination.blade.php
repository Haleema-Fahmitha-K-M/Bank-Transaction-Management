@if ($data->count() > 0)
    @foreach($data as $row)
        <tr>
            <td>{{ substr($row->created_at, 0, 10) }}</td>
            <td>{{ $row->from_name }}</td>
            <td>{{ $row->from_acc }}</td>
            <td>{{ $row->to_name }}</td>
            <td>{{ $row->to_acc }}</td>
            <td>{{ $row->bank_name }}</td>
            <td>{{ $row->amount }}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="7" class="text-center">No records found</td>
    </tr>
@endif
