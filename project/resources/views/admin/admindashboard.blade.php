@include('template.header')

<div class="btn-wrapper sha tab-content tab-content-basic">
  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-rounded shadow" >            
          <div class="card-body d-flex align-items-center">
            <div class="col-sm-8">
              <h3 class="text-dark upgrade-info mb-0"><b>{{$data['name']}}</b><span class="text-muted text-small"> Admin</span></h3>
              <div class="text-primary upgrade-info h5 mt-2">{{$data['email']}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row flex-grow">
  <div class="col-md-6 col-lg-6 grid-margin stretch-card">
    <div class="card shadow card-rounded">
      <div class="card-body card-rounded">
        <h4 class="card-title  card-title-dash">Management Details</h4>
        @if(Auth::guard('admin')->user()->name == 'Fahmitha')
        <div class="list align-items-center border-bottom py-2">
          <div class="wrapper w-100">
            <p class="mb-2 font-weight-medium">
            Number of Admin
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <i class="mdi mdi-account-key text-muted me-1"></i>
                <p class="mb-0 text-small text-muted">{{$data['admin_count']}}</p>
              </div>
            </div>
          </div>
        </div>
        @endif
        <div class="list align-items-center border-bottom py-2">
          <div class="wrapper w-100">
            <p class="mb-2 font-weight-medium">Number of Users
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <i class="mdi mdi-account-multiple text-muted me-1"></i>
                <p class="mb-0 text-small text-muted">{{$data['user_count']}}</p>
              </div>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </div>
</div>

@include('template.footer')