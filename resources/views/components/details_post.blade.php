<div class="modal fade" id="details-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3>{{ $k = strlen($data->title) > 20 ? substr($data->title, 0, 40) . '...' : $data->title }}</h3>
          <h5>{{ $data->price }} F cfa</h5>
          <img src="{{ Storage::url($data->image->path) }}" alt="categories"
                                        class="img-fluid">

            <div>{{ $data->details }}</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>