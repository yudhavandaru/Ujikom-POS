<div class="modal fade" id="modal-member">
    <div class="modal-dialog">
    <div class="modal-content">
    <form action="#" method="POST" >
    <div class="modal-header">
    <h4 class="modal-title">Member</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
        <table class="table table-striped table-bordered table-member">
            <thead>
                <th width="5%">No</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th><i class="fa fa-cog"></i></th>
            </thead>
            <tbody>
                @foreach ($member as $key => $item)
                    <tr>
                        <td width="5%">{{ $key+1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->telepon }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-xs btn-flat"
                                onclick="pilihMember('{{ $item->id_member }}', '{{ $item->kode_member }}')">
                                <i class="fa fa-check-circle"></i>
                                Pilih
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    </form>
    </div>
    </div>
</div>
