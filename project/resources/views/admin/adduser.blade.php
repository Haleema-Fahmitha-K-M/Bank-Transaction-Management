
@include('template.header')

<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body p-4"> 
                  <h4 class="card-title">Add User</h4>
                  @if(session('error'))
                  <span class="text-danger"><i class="fa-solid fa-circle-exclamation px-1"> </i>{{ session('error') }}</span>
                  @endif
                   <form class='pt-3' method="post" action="{{ $url }}">
                    {{ csrf_field() }}

                  @if($customer_id == '')
                    <div class="form-group">
                      <label for="customer_id">Customer Id</label>
                      <input type="text" class="form-control" id="customer_id" placeholder="Customer Id" name='customer_id' value="{{ old('customer_id', $customer_id) }}">
                      @if ($errors->has('customer_id'))
                        <span class="text-danger text-small">The Customer Id is required.</span>
                      @endif
                    </div>
                  @else
                  <div class="form-group">
                      <label for="customer_id">Customer Id</label>
                      <input type="text" class="form-control" id="customer_id" placeholder="Customer Id" name='customer_id' value="{{ old('customer_id', $customer_id) }}" disabled>
                    </div>
                  @endif
                 
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

                    @if($account_no == '')
                    <div class="form-group">
                      <label for="account_no">Account Number</label>
                      <input type="text" class="form-control" id="account_no" placeholder="Account Number" name='account_no' value="{{ old('account_no', $account_no) }}">
                      @if ($errors->has('account_no'))
                        <span class="text-danger text-small">The Account Number is required.</span>
                      @endif
                    </div>
                    @else
                    <div class="form-group">
                      <label for="account_no">Account Number</label>
                      <input type="text" class="form-control" id="account_no" placeholder="Account Number" name='account_no' value="{{ old('account_no', $account_no) }}" disabled>
                    </div>
                    @endif

                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="text" class="form-control" id="phone" placeholder="Phone Number" name='phone' value="{{ old('phone', $phone) }}">
                      @if ($errors->has('phone'))
                        <span class="text-danger text-small">{{ $errors->first('phone') }}</span>
                      @endif
                    </div>

                    @if($balance == '')
                    <div class="form-group">
                    <label for="balance">Initial Deposit</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-primary text-white">₹</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="balance" placeholder="Initial Deposit" name='balance' value="{{ old('balance', $balance) }}">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                      </div>
                      @if ($errors->has('balance'))
                        <span class="text-danger text-small">{{ $errors->first('balance') }}</span>
                      @endif
                    </div>
                    
                    @else 
                    <div class="form-group">
                    <label for="balance">Balance</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-primary text-white">$</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="balance" placeholder="Initial Deposit" name='balance' value="{{ old('balance', $balance) }}" disabled>
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                      </div>
                    </div>
                    @endif

                    <button type="submit" class="btn btn-lg btn-primary me-2 text-light">{{$button_text}}</button>
                  </form>
                </div>
              </div>
            </div>

@include('template.footer')