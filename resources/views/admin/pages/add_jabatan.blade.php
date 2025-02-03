<div class="row">
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Form</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{url('/admin/jabatan/add')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pangkat</label>
                                <input type="text" class="form-control" name="pangkat">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Golongan</label>
                                <input type="text" class="form-control" name="golongan">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ruang</label>
                                <input type="text" class="form-control" name="ruang">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.page_info.add_jabatan')
</div>
