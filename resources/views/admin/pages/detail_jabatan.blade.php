<div class="row">
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Detail Jabatan</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{url('admin/jabatan/update/'.$data['id'])}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pangkat</label>
                                <input type="text" class="form-control" name="pangkat" value="{{$data['pangkat']}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Golongan</label>
                                <input type="text" class="form-control" name="golongan" value="{{$data['golongan']}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ruang</label>
                                <input type="text" class="form-control" name="ruang" value="{{$data['ruang']}}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                        </div>
                        <div class="update ml-auto mr-auto">
                            <a href="{{url('admin/jabatan/delete/'.$data['id'])}}" class="btn btn-danger btn-round">Hapus</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.page_info.add_jabatan')
</div>
