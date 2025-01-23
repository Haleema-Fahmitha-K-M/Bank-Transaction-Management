@include('template.header')


<div class="row flex-grow">
@if(Session::has('message'))
<div style="display: flex; justify-content: center;">
    <div class="alert alert-success"> <i class="fa-solid fa-thumbs-up"></i>{{ Session::get('message') }}</div>
</div>
@endif
  
  <div class="col-12 grid-margin stretch-card">
    <div class="card card-rounded">
      <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-start">
          <div>
            <h4 class="card-title card-title-dash">Admin Table</h4>
          </div>
          <div>
            <a class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" href="/addadmin"><i
                class="mdi mdi-account-plus"></i>Add new admin</a>
          </div>
        </div>
        <div class="table-responsive  mt-1">
          <table class="table select-table"> 
            <thead>
              <tr>
                <th></th>
                <th>Admin Name</th>
                <th>Email</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @if(count($ad) > 0)
             @foreach($ad as $row)
              <tr>
                <td>
                  <div class="d-flex ">
                    <i class="menu-icon mdi mdi-account-circle-outline h2"></i>
                    <div>
                </td>
                <td>
                  <h6>{{$row['name']}}</h6>
                  <p>Admin</p>
                </td>
                <td>
                  <h6>{{$row['email']}} </h6>
                </td>
                <td>
                  <a href="{{ url('/editadmin/'.$row->id) }}" class="btn btn-inverse-primary btn-icon"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
                <td>
                  <a href="{{ url('/deleteadmin/'.$row->id) }}" class="btn btn-inverse-danger btn-icon"><i class="fa fa-trash"></i></a></td>
                </tr>
                
              @endforeach
              @else
              <div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation px-1"></i>No Admin<div>
              @endif

      </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>



@include('template.footer')