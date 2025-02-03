<div class="row">
    @if(session()->has('alert'))
        <div class="col-md-12">
            @include('includes.alert', ['type' => json_decode(session()->get('alert'))->type,
            'message' => json_decode(session()->get('alert'))->message])
        </div>
    @endif

    <div class="col-md-12">
        <div class="card">
            <!--
            <div class="card-header">
                @include('admin.includes.crud_utils_add', ['add_url' => url()->current().'/add'])
            </div>
            -->
            <a href="{{url()->current().'/export'}}" class="btn btn-success">Export</a>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="pegawai">
                        <thead class=" text-primary">
                        <th>
                            Nama
                        </th>
                        <th>
                            NIP
                        </th>
                        <th>
                            Jabatan
                        </th>
                        <th>
                            Golongan
                        </th>
                        <th>
                            Ruang
                        </th>
                        <th>
                            telepon
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Alamat
                        </th>
                        <th>

                        </th>
                        </thead>
                        <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{$row['nama']}}</td>
                                <td>{{$row['nip']}}</td>
                                <td><a href="{{url('admin/jabatan/detail/'.$row['pangkat_pegawai_id'])}}" target="_blank">{{$row['jabatan']}}</a></td>
                                <td>{{$row['golongan']}}</td>
                                <td>{{$row['ruang']}}</td>
                                <td>{{$row['telepon']}}</td>
                                <td>{{$row['email']}}</td>
                                <td>{{$row['alamat']}}</td>
                                <td>
                                    <a href="{{url('admin/pengajuan?pegawai_id='.$row['id'])}}" class="btn btn-default" target="_blank"> <i class="nc-icon nc-paper"></i>Pengajuan</a>
                                    <a href="{{url('admin/pengajuan/byid/export/'.$row['id'])}}" class="btn btn-primary" target="_blank"> <i class="nc-icon nc-paper"></i>Export</a>
                                    @include('admin.includes.crud_utils_opt',
                                    ['detail_url' => url()->current().'/detail/'.$row['id'],
                                    'delete_url' => url()->current().'/delete/'.$row['id']])
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.includes.data_table', ['target' => '#pegawai'])
