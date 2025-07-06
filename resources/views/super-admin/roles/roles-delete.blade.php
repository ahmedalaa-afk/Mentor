<x-custom-modal id="deleteModal" title="Delete Role">
    <form wire:submit.prevent='submit'>
        <div class="modal-body">
            <div class="row">
                <h4>Are You Want to Delete Teacher?</h4>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </form>
</x-custom-modal>