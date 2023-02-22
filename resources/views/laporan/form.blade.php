<div class="modal fade" id="modal-form">
    <div class="modal-dialog">
    <div class="modal-content">
    <form action="{{route ('laporan.index') }}" method="get" >
    <div class="modal-header">
    <h4 class="modal-title">Periode Laporan</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">



        <div class="form-group">
            <label for="tanggal_awal">Tanggal Awal</label>
            <div class="input-group date" id="reservationdate_start" data-target-input="nearest">
                <input type="text" name="tanggal_awal" value="" class="form-control datetimepicker-input" data-target="#reservationdate_start" />
                <div class="input-group-append" data-target="#reservationdate_start" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="tanggal_akhir">Tanggal Akhir</label>
            <div class="input-group date" id="reservationdate_end" data-target-input="nearest">
                <input type="text" name="tanggal_akhir" value="" class="form-control datetimepicker-input" data-target="#reservationdate_end" />
                <div class="input-group-append" data-target="#reservationdate_end" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>





    </div>
    <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-primary">Confirm</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </form>
    </div>
    </div>
</div>
