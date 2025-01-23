@include('template.header')

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row align-items-center mb-3">
        <div class="col-md-8">
          <h4 class="card-title mb-0">Transaction History</h4>
        </div>
        <div class="col-md-4">
          <div class="input-group">
            <input type="text" id="searchQuery" class="form-control" placeholder="Search...">
            <div class="input-group-append">
              <i class="icon-search"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Date & Time</th>
              <th>Sender Name</th>
              <th>Sender Id</th>
              <th>Receiver Name</th>
              <th>Receiver Id</th>
              <th>Bank Name</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody id="searchResultsTable">
            @include('partials.transactionPagination', ['data' => $data])
          </tbody>
        </table>
        <div id="pagination" class="d-flex justify-content-center">
          {!! $data->links('pagination::bootstrap-4') !!}
        </div>
      </div>
    </div> 
  </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    function fetch_data(page, query) {
        $.ajax({
            url: "{{ url('/search') }}",
            type: "GET",
            data: { page: page, query: query },
            success: function (response) {
                $('#searchResultsTable').html(response.table);
                $('#pagination').html(response.pagination);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ', status, error);
            }
        });
    }

    $('#searchQuery').on('keyup', function () {
        var query = $(this).val();
        fetch_data(1, query);
    });

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var query = $('#searchQuery').val();
        fetch_data(page, query);
    });
});
</script>

@include('template.footer')
