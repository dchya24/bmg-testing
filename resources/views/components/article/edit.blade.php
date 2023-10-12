@props(["id"])

<!-- Modal -->
<div class="modal fade" id="{{$id}}" tabindex="-1" aria-labelledby="create-article-modal" aria-hidden="true" data-bs-backdrop="static" >
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="update-article" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="edit_judul_artikel" class="form-label">Judul Artikel</label>
                  <input type="text" class="form-control" id="edit_judul_artikel" aria-describedby="edit_judul_artikel" name="judul_artikel">
                </div>
                <div class="mb-3">
                  <label for="edit_isi_artikel" class="form-label">Isi Artikel</label>
                  <textarea class="form-control" id="edit_isi_artikel" name="isi_artikel" row="15"> </textarea>
                  <input type="hidden" name="_id" id="_id-update">
                </div>
                <div class="mb-3">
                  <label for="edit_tag_artikel" class="form-label">Tag Artikel</label>
                  <input type="text" class="form-control" id="edit_tag_artikel" aria-describedby="edit_tag_artikel" name="tag_artikel">
                </div>
                <div class="mb-3">
                  <label for="edit_kategori_artikel" class="form-label">Kategori Artikel</label>
                  <input type="text" class="form-control" id="edit_kategori_artikel" aria-describedby="edit_kategori_artikel" name="kategori_artikel">
                </div>

                <div class="mb-3">
                  <label for="edit_thumbnail_artikel" class="form-label">Thumbnail Artikel</label>
                  <input class="form-control" type="file" id="edit_thumbnail_artikel" name="edit_thumbnail_artikel" accept="image/*">
                </div>
                @csrf
			</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="edit()">Ubah Artikel</button>
        </div>
      </div>
    </div>
  </div>
