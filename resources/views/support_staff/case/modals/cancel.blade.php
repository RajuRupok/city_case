<!-- Small Modal -->
<div class="modal fade bd-example-modal-sm cancelCase" tabindex="-1" role="dialog" aria-labelledby="cancelCase" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelCase">Cancelation Reason</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('support_staff.case.cancel', ['case_id' => $case->id]) }}" method="post">
                    @csrf
                    <div class="form-group" style="display: grid">
                        <label>Case Cancelation Reasons <span class="text-danger">*</span></label>
                        <textarea name="cancelation_reason" rows="4" placeholder="Describe Case Cancelation Reasons" required></textarea>
                    </div>

                    <button class="btn btn-dark btn-block" type="submit" style="border-radius: 5px; padding: 10px 15px;" onclick="return confirm('Are You Sure Want To Cancel This Case?');">Cancel Case</button>
                </form>
            </div>
        </div>
    </div>
</div>
