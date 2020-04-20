<div class="modal fade" id="view-donation-{{ $donation->id }}" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-eye" aria-hidden="true"></i> View Donations</h4>
        </div>
        <div class="modal-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td><strong>Campaign</strong></td>
                        <td>{{ $donation->campaign->title }}</td>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><b>First Name</b></td>
                    <td>{{ $donation->firstname }}</td>
                  </tr>
                  <tr>
                    <td><strong>Last Name</strong></td>
                    <td>{{ $donation->lastname }}</td>
                  </tr>
                  <tr>
                    <td><strong>Email Address</strong></td>
                    <td>{{ $donation->email }}</td>
                  </tr>
                  <tr>
                    <td><strong>Amount</strong></td>
                    <td>${{ $donation->amount }}</td>
                  </tr>
                  <tr>
                    <td><strong>Status</strong></td>
                    <td><div class="label label-success">{{ $donation->status }}</div></td>
                  </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
