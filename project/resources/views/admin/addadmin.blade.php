
@include('template.header')

<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">{{$heading}}</h4>
                
                  <form class='pt-3' method="post" action="{{ $url }}">
                  {{ csrf_field() }}

                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name='name' value="{{ old('name', $name) }}">
                      @if ($errors->has('name'))
                        <span class="text-danger text-small">{{ $errors->first('name') }}</span>
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email </label>
                      <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email', $email) }}">
                      @if ($errors->has('email'))
                        <span class="text-danger text-small">{{ $errors->first('email') }}</span>
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password" placeholder="Password" name='password' value="{{ old('password', $password) }}">
                      @if ($errors->has('password'))
                        <span class="text-danger text-small">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                
                    <button type="submit" class="btn btn-lg btn-primary me-2 text-light">{{$button_text}}</button>
                  </form>
                </div>
              </div>
            </div>


@include('template.footer')