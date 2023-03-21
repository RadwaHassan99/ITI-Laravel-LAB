@section('modal')
<div class="modal fade" id="deleteModal">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
   </div>
   <div class="modal-body">
    <p>Are you sure you want to delete?</p>
  </div>
  <div class="modal-footer">
   <button type="button" class="btn btn-secondary" id="close-modal">No</button>
    <button type="button" class="btn btn-danger">Yes</button>
   </div>
  </div>
 </div>
</div>
@endsection
