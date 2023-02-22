@extends('layouts.master')

@section('title')
    Produk
@endsection

@section('css')


@endsection
@section('content')

<div id="controller">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="btn-group">
                <button onclick="addForm('{{ route('produk.store') }}')" class="btn btn-primary">+ Produk</button>
                <button width ="2%" onclick="deleteSelected('{{ route('produk.delete_selected')}}')" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</button>
                

            </div>
        </div>

        <div class="card-body p-1">
        <form action="" method="post" class="form-produk">
            @csrf
            <table class=" table-responsive" id="dataTable">
                <thead>
                    <tr>
                <th width="7% ">
                    <input type="checkbox" name="select_all" id="select_all">
                </th>
                <th width=5%>No</th>
                <th>Kode </th>
                <th>Nama </th>
                <th>Kategori </th>
                <th>Merk</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Diskon</th>
                <th>Stok</th>
                <th width="15%"><i class="fa fa-cog"></i></th>
                </tr>
                </thead>
                </table>
        </form>
        </div>


    </div>
</div>
@includeIf('produk.form')
@endsection

@section('js')



<script>
    let table;

    $(function () {
        table = $('#dataTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            sortable:false,
            ajax: {
                url: '{{ route('produk.data') }}',
            },
            columns: [
                {data: 'select_all', searchable: false, sortable: false},
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_produk'},
                {data: 'nama_produk'},
                {data: 'nama_kategori'},
                {data: 'merk'},
                {data: 'harga_beli'},
                {data: 'harga_jual'},
                {data: 'diskon'},
                {data: 'stok'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        $('#modal-form').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.ajax({
                    url: $('#modal-form form').attr('action'),
                    type: 'post',
                    data: $('#modal-form form').serialize()
                })
                .done((response) => {
                    $('#modal-form').modal('hide');
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
            }
        });

        $('[name=select_all]').on('click', function () {
            $(':checkbox').prop('checked', this.checked);
        });
    });

    function addForm(url) {
        $("#modal-form").modal('show');
        $("#modal-form .modal-title").text('Tambah Produk');

        $("#modal-form form") [0].reset();
        $("#modal-form form"). attr('action', url);
        $("#modal-form [name=_method]").val('post');
        $("#modal-form [name=nama_produk]").focus();
    }
    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Produk');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama_produk]').focus();

        $.get(url)
        .done((response) => {
            $('#modal-form [name=nama_produk]').val(response.nama_produk);
            $('#modal-form [name=id_kategori]').val(response.id_kategori);
                $('#modal-form [name=merk]').val(response.merk);
                $('#modal-form [name=harga_beli]').val(response.harga_beli);
                $('#modal-form [name=harga_jual]').val(response.harga_jual);
                $('#modal-form [name=diskon]').val(response.diskon);
                $('#modal-form [name=stok]').val(response.stok);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
            }
    }


    function deleteSelected(url) {
        if ($('input:checked').length > 1) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, $('.form-produk').serialize())
                    .done((response) => {
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
                }
        } else {
            alert('Pilih data yang akan dihapus');
            return;
        }
    }

   
    </script>


@endsection
