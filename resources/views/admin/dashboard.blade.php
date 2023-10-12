@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#create-article-modal">
                        <i class="bi bi-file-plus-fill"></i>
                        Add Article
                    </button>
                    <table class="table table-bordered" id="article-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th width="105px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<x-.article.add id="create-article-modal"></x-article-add>
<x-.article.edit id="update-article-modal"></x-article-add>
@endsection

@push('scripts')
    <script>
        let table;
        $(function () {
            table = $('#article-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('artikel.datatable') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'judul_artikel', name: 'Judul'},
                    {data: 'tag_artikel', name: 'tag_artikel'},
                    {
                        data: null,
                        orderable: false,
                        data_name: "name",
                        render: function ( data, type, row, meta ) {
                            return `<button
                                        class='btn btn-sm btn-info updateArtikel'
                                        data-id='${data["id"]}'
                                    >
                                        <i class='bi bi-pencil-fill'> </i>
                                    </button>
                                    <button
                                        class='btn btn-sm btn-danger deleteArtikel'
                                        data-id='${data["id"]}'
                                    >
                                        <i class='bi bi-trash'></i>
                                    </button>
                                `
                        }
                    },
                ]
            });


            $('#article-table').on('click','.updateArtikel',function(){
                var judul = document.getElementById("edit_judul_artikel");
                var tag = document.getElementById("edit_tag_artikel");
                var kategori = document.getElementById("edit_kategori_artikel");
                var _id = document.getElementById("_id-update");

                new bootstrap.Modal(document.getElementById('update-article-modal')).show();
                var id = $(this).data('id');

                window.axios.get(
                    window.BASE_URL + "/_admin/artikel/get",
                    {
                        params: { id: id }
                    }
                ).then((response) => {
                    if(response.status != 200){
                        window.alert("Terjadi Kesalahan pada server");
                        console.log(response.data);
                    }

                    let data = response.data.data;

                    judul.value = data.judul_artikel;
                    kategori.value = data.kategori_artikel;
                    tag.value = data.tag_artikel;
                    editIsiArtikelEditor.setData(data.isi_artikel);
                    _id.value = id;
                    console.log(_id);

                })
                .catch(err => {
                    window.alert("Terjadi Kesalahan pada server");
                    console.log(err);
                })
            });

            $('#article-table').on('click','.deleteArtikel',function(){
                var id = $(this).data('id');

                var deleteConfirm = confirm("Are you sure?");
                if (deleteConfirm == true) {
                    window.axios.post(
                        window.BASE_URL + "/_admin/artikel/delete",
                        {
                            id: id,
                            _token: window.csrf_token
                        }
                    ).then((response) => {
                        if(response.status != 200){
                            window.alert("Terjadi Kesalahan pada server");
                            console.log(response.data.message);
                        }

                        window.alert(response.data.message);
                        table.ajax.reload();
                    })
                    .catch(err => {
                        console.log(err);
                    })
                }
            });
        });

        let isiArtikelEditor;
        let editIsiArtikelEditor;

        ClassicEditor
        .create( document.querySelector( '#isi_artikel' ) )
        .then(editor => isiArtikelEditor = editor )
        .catch( error => console.error( error ) );


        ClassicEditor
        .create( document.querySelector( '#edit_isi_artikel' ) )
        .then(editor => editIsiArtikelEditor = editor )
        .catch( error => console.error( error ) );

        function submitForm() {
            const formArtikel = document.querySelector("#create-article");
            var data = new FormData();
            var isi = isiArtikelEditor.getData();

            const formData = new FormData(formArtikel);
            formData.append('isi_artikel', isi);

            window.axios.post(
                window.BASE_URL + "/_admin/artikel",
                formData
            ).then((response) => {
                if(response.status != 201){
                    window.alert("Terjadi Kesalahan pada server");
                    console.log(response.data.message);
                }

                window.alert(response.data.message);
                formArtikel.reset();
                isiArtikelEditor.setData("");
                table.ajax.reload();
            })
            .catch(err => {
                console.log(err);
            })
        }

        function edit() {
            const formArtikel = document.querySelector("#update-article");
            var data = new FormData();
            var isi = editIsiArtikelEditor.getData();
            var _id = document.getElementById("_id-update");

            const formData = new FormData(formArtikel);
            formData.append('isi_artikel', isi);
            formData.append("_method", "put");
            formData.append("_id", _id.value);

            window.axios.post(
                window.BASE_URL + "/_admin/artikel",
                formData
            ).then((response) => {
                if(response.status != 200){
                    window.alert("Terjadi Kesalahan pada server");
                    console.log(response.data.message);
                }

                window.alert(response.data.message);
                table.ajax.reload();

            })
            .catch(err => {
                console.log(err);
            })
        }
    </script>
@endpush
