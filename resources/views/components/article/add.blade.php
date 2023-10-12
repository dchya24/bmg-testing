@props(["id"])

<!-- Modal -->
<div class="modal fade" id="{{$id}}" tabindex="-1" aria-labelledby="create-article-modal" aria-hidden="true" data-bs-backdrop="static" >
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="create-article" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="judul_artikel" class="form-label">Judul Artikel</label>
                  <input type="text" class="form-control" id="judul_artikel" aria-describedby="judul_artikel" name="judul_artikel">
                </div>
                <div class="mb-3">
                  <label for="isi_artikel" class="form-label">Isi Artikel</label>
                  <textarea class="form-control" id="isi_artikel" name="isi_artikel" row="15"> </textarea>
                </div>
                <div class="mb-3">
                  <label for="tag_artikel" class="form-label">Tag Artikel</label>
                  <input type="text" class="form-control" id="tag_artikel" aria-describedby="tag_artikel" name="tag_artikel">
                </div>
                <div class="mb-3">
                  <label for="kategori_artikel" class="form-label">Kategori Artikel</label>
                  <input type="text" class="form-control" id="kategori_artikel" aria-describedby="kategori_artikel" name="kategori_artikel">
                </div>

                <div class="mb-3">
                  <label for="thumbnail_artikel" class="form-label">Thumbnail Artikel</label>
                  <input class="form-control" type="file" id="thumbnail_artikel" name="thumbnail_artikel" accept="image/*">
                </div>
                @csrf
			</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="submitForm()">Add Article</button>
        </div>
      </div>
    </div>
  </div>
