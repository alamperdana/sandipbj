<div class="row">
    @if(session()->has('alert'))
        <div class="col-md-12">
            @include('includes.alert', ['type' => json_decode(session()->get('alert'))->type,
            'message' => json_decode(session()->get('alert'))->message])
        </div>
    @endif
    <div class="col-md-6">
        <div class="card card-user">
            <div class="card-body">
                <form method="POST" action="{{url('admin/pegawai/add')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIP</label>
                                <input type="text" class="form-control" name="nip" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="pangkat_pegawai_id" id="" class="form-control" required>
                                    <option value="" selected="true" disabled="disabled">-- Pilih Jabatan & Golongan --</option>
                                    @foreach($data as $row)
                                        <option value="{{$row['id']}}">{{$row['pangkat']}} - {{$row['golongan']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="number" name="telepon" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control textarea" name="alamat"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.page_info.add_pegawai')

</div>
