@include('template.header')
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Payment Form</h4>
                 
                  @if(session('error'))
                  <span class="text-danger"><i class="fa-solid fa-circle-exclamation px-1"> </i>{{ session('error') }}</span>
                  @endif

                <form class='pt-3' method="post" action="{{ $url }}">
                  {{ csrf_field() }}


                  <input type="text" class="form-control"  id="from_acc" name='from_acc' value="{{ $from_acc }}" hidden>
                  <input type="text" class="form-control"  id="balance" name='balance' value="{{ $balance }}" hidden>
                  <input type="text" class="form-control"  id="from_name" name='from_name' value="{{ $from_name }}" hidden>

                  <div class="form-group">
                  <label for="name">Name</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Recipient's Name" id="to_name" name='to_name' value="{{ old('to_name', $to_name) }}">
                      </div>
                      @if ($errors->has('to_name'))
                        <span class="text-danger text-small">The Name  field is required.</span>
                      @endif
                  </div>

                  <div class="form-group">
                  <label for="to_acc">Account Number</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Recipient's Account Number"  id="to_acc" name='to_acc' value="{{ old('to_acc', $to_acc) }}">
                    </div>

                    @if ($errors->has('to_acc'))
                      <span class="text-danger text-small">The Account Number field is required.</span>
                    @endif
                  </div>

                  <div class="form-group ">
                    <label for="bank_name">Select Recipient's Bank</label>
                    <select class=" h6 w-100  py-2 input-group border border-secondary text-small" id="bank_name" name='bank_name' value="{{ old('bank_name', $bank_name) }}">
                      <option value="MyBank">MyBank</option>
                      <option value="Axis">Axis</option>
                      <option value="ICICI">ICICI</option>
                      <option value="HDFC">HDFC</option>
                    </select>
                    @if ($errors->has('bank_name'))
                      <span class="text-danger text-small">{{ $errors->first('bank_name') }}</span>
                    @endif
                  </div>

                  <div class="form-group">
                  <label for="amount">Paying Amount</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-secondary text-dark">₹</span>
                      </div>
                      <input type="text" class="form-control" id="amount" name='amount' value="{{ old('amount', $amount) }}">
                      <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                      </div>
                    </div>
                      @if ($errors->has('amount'))
                        <span class="text-danger text-small">{{ $errors->first('amount') }}</span>
                      @endif
                  </div>


                  <button class="btn btn-primary text-light text-large" type="submit" style="vertical-align: middle;">
                      Pay<i class="text-small ms-2 mdi mdi-send" style="vertical-align: middle;"></i>
                  </button>  
                  
                </form>
               </div>
              </div>
           </div>

@include('template.footer')