@include('template.header')

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      @if(Session::has('message'))
      <div style="display: flex; justify-content: center;">
        <div class="alert alert-success"> <i class="fa-solid fa-thumbs-up"></i>{{ Session::get('message') }}</div>
      </div>
      @endif
      <h4 class="card-title">Transaction History</h4>
      <div class="table-responsive">
        <div id="transaction-table">
          @include('partials.userTransaction', ['ut' => $ut])
        </div>
      </div>
    </div>
  </div>
</div>

@include('template.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });

    function fetch_data(page)
    {
        $.ajax({
            url:"/view_transaction?page="+page,
            success:function(data)
            {
                $('#transaction-table').html(data);
            }
        });
    }
});
</script>
