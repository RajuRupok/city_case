<!-- Small Modal -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">Assign Support Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('service_manager.case.assign', ['case_id' => $case->id]) }}" method="post">
                    @csrf
                    <div class="form-group" style="display: grid">
                        <label>Support Staff <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="support_staff_id" required>
                          <option value="">Select Support Staff</option>
                          @foreach ($support_staffs as $supporter)
                            <option value="{{ $supporter->id }}">{{ $supporter->name }}</option>
                          @endforeach
                        </select>
                    </div>

                    <button class="btn btn-dark btn-block" type="submit" style="border-radius: 5px; padding: 10px 15px;" onclick="return confirm('Are You Sure?');">Assign Support Staff</button>
                </form>
            </div>
        </div>
    </div>
</div>
