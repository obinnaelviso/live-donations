<div class="modal fade" id="view-campaign-{{ $campaign->id }}" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-eye" aria-hidden="true"></i> View Campaign</h4>
        </div>
        <div class="modal-body">
            <table class="table table-hover">
                <tbody>
                  <tr>
                    <td><b>Title</b></td>
                    <td>{{ $campaign->title }}</td>
                  </tr>
                  <tr>
                    <td><strong>Description</strong></td>
                    <td class="fnt-sz12">{!! $campaign->description !!}</td>
                  </tr>
                  <tr>
                    <td><strong>Total Donations</strong></td>
                    <td>@if($campaign->donations->sum('amount') >= $campaign->target)
                        <div class="label label-success">
                    @else
                        <div class="label label-warning">
                    @endif
                        ${{ $campaign->donations->sum('amount') }} </div></td>
                  </tr>
                  <tr>
                    <td><strong>Target</strong></td>
                    <td><div class="label label-success">${{ $campaign->target }}</div></td>
                  </tr>
                  <tr>
                    <td><strong>Is Campaign Featured?</strong></td>
                    <td>@if($campaign->is_featured)<div class="label label-success"> Yes @else<div class="label label-danger"> No @endif</td>
                  </tr>
                  <tr>
                    <td><strong>Expiry Date</strong></td>
                    <td>{{ $campaign->expire_at }}</td>
                  </tr>
                  <tr>
                    <td><strong>Status</strong></td>
                    <td><div class="label @if($campaign->status == 'open') label-success @else label-danger @endif">{{ $campaign->status }}</div></td>
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
