@include('template.header')
<div class="row flex-grow">
  <div class="col-12 grid-margin stretch-card">
    <div class="card card-rounded  shadow">
      <div class="card-body">
        <div class="col-sm-8">
          <h3 class="text-dark upgrade-info mb-0"><span class="fw-bold">{{$data['name']. " "}}<span class="text-muted text-small text-white"> Account Holder</span></span> </h3>
          <div class="text-primary upgrade-info h5 mt-2">{{$data['email']}}</div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row flex-grow">
  <div class="col-md-6 col-lg-6 grid-margin stretch-card">
    <div class="card card-rounded">
      <div class="card-body card-rounded">
        <h4 class="card-title  card-title-dash">Your Account Details</h4>
        <div class="list align-items-center border-bottom py-2">
          <div class="wrapper w-100">
            <p class="mb-2 font-weight-medium">
              Customer Id
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <i class="mdi mdi mdi-account-box text-muted me-1"></i>
                <p class="mb-0 text-small text-muted">{{$data['customer_id']}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="list align-items-center border-bottom py-2">
          <div class="wrapper w-100">
            <p class="mb-2 font-weight-medium">
              Account Number
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <i class="mdi mdi-account-card-details text-muted me-1"></i>
                <p class="mb-0 text-small text-muted">{{$data['account_no']}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="list align-items-center border-bottom py-2">
          <div class="wrapper w-100">
            <p class="mb-2 font-weight-medium">
              Account Balance
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <i class="mdi  mdi-currency-inr text-muted me-1"></i>
                <p class="mb-0 text-small text-muted">{{$data['balance']}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="list align-items-center border-bottom py-2">
          <div class="wrapper w-100">
            <p class="mb-2 font-weight-medium">
              Phone Number
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <i class="mdi mdi-cellphone-android text-muted me-1"></i>
                <p class="mb-0 text-small text-muted">{{$data['phone']}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('template.footer')