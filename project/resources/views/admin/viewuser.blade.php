@include('template.header')

<div class="row flex-grow">
@if(Session::has('message'))
<div style="display: flex; justify-content: center;">
    <div class="alert alert-success"> <i class="fa-solid fa-thumbs-up"></i>{{ Session::get('message') }}</div>
</div>
@endif
  <div class="col-12 grid-margin stretch-card">
    <div class="card card-rounded">
      <div class="card-body p-3">
        <div class="d-sm-flex justify-content-between align-items-start">
          <div>
            <h4 class="card-title card-title-dash">User Table</h4>
          </div>
            <a class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" href="/adduser"><i
                class="mdi mdi-account-plus"></i>Add new user</a>
          </div>
        </div>
        <div class="table-responsive ps-3 mt-1">
          <table class="table select-table">
            <thead>
              <tr>
                <th></th>
                <th>Customer Id</th>
                <th>User Name</th> 
                <th>Email</th>
                <th>Account Number</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @if(count($us) > 0)
            @foreach($us as $row)
              <tr>
                <td>
                    <i class="menu-icon mdi mdi-account-circle-outline ms-2 mt-1 h2"></i>
                </td>
                <td>
                  <h6>{{$row['customer_id']}}</h6>
                </td>
                <td>
                  <h6>{{$row['name']}}</h6>
                </td>
                <td>
                  <h6>{{$row['email']}} </h6>
                </td>
                <td>
                  <h6>{{$row['account_no']}}</h6>
                </td>
                <td>
                  <a href="{{ url('/edituser/'.$row->id) }}" class="btn btn-inverse-primary btn-icon"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
                <td>
                  <a href="{{url('/deleteuser/'.$row->id)  }}" class="btn btn-inverse-danger btn-icon"><i class="fa fa-trash"></i></a></td>
                </tr>

              @endforeach
              @else
              <div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation px-1"></i>No users<div>
              @endif
      </tbody>
      </table>
      @if($us->links()->paginator->hasPages())
      <div class="btn btn-sm col-md-10 text-small">
        {{ $us->links('pagination::bootstrap-5')->with(['class' => 'pagination-sm']) }}
      </div>
      @endif
    </div>
  </div>
</div>
</div>
</div>



@include('template.footer')