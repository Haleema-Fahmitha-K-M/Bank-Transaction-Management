<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{url('assets/vendors/feather/feather')}}.css">
  <link rel="stylesheet" href="{{url('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/vertical-layout-light/style.css')}}">
  <link rel="shortcut icon" href="{{url('assets/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="content-wrapper d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0 pt-2">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo">
              <img src="{{url('assets/images/login.png')}}" alt="logo">
            </div>
            <h4>Hello! let's get started</h4>
            <h6 class="fw-light">Sign in to continue as Admin.</h6>

            <form class='pt-3' method="post" action="{{ $url }}">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="email" class="text-primary">Email :</label>
                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email"
                  value="{{ old('email', $email) }}">
                @if ($errors->has('email'))
                  <span class="text-danger text-small">{{ $errors->first('email') }}</span>
                @endif
              </div>

              <div class="form-group">
                <label for="password" class="text-primary">Password :</label>
                <input type="password" class="form-control form-control-lg" id="password" name="password"
                  placeholder="Password" value="{{ old('password', $password) }}">
                @if ($errors->has('password'))
                  <span class="text-danger text-small">{{ $errors->first('password') }}</span>
                @endif
                @if(session('error'))
                  <span class="text-danger text-small">{{session('error')}}</span>
                @endif
              </div>

              <div class="mt-3">
                <button type='submit'
                  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">{{ $button_text }}</button>
              </div>
            </form>
          </div>
        </div>
        <div class="content-wrapper d-flex align-items-center auth px-0"></div>
      </div>
    </div>
  </div>
  </div>

  <script src="{{url('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{url('assets/js/off-canvas.js')}}"></script>
  <script src="{{url('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('assets/js/template.js')}}"></script>
  <script src="{{url('assets/js/settings.js')}}"></script>
  <script src="{{url('assets/js/todolist.js')}}"></script>

</body>

</html>