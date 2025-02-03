<div class="row">
    @if(session()->has('alert'))
        <div class="col-md-12">
            @include('includes.alert', ['type' => json_decode(session()->get('alert'))->type,
            'message' => json_decode(session()->get('alert'))->message])
        </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{url()->current().'/export'}}" class="btn btn-success">Export</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="pengajuan">
                        <thead class=" text-primary">
                        <th>
                            Nama
                        </th>
                        <th>
                            NIP
                        </th>
                        <th>
                            NIK
                        </th>
                        <th>
                            Jenis Pengajuan
                        </th>
                        <th>
                            SKPD
                        </th>
                        <th>
                            Cabang SKPD
                        </th>
                        <th>
                            Nomor SK
                        </th>
                        <th>
                            Nomor Sertifikat *Khusus PPBJ/Pokja
                        </th>
                        <th>
                            Masa Berlaku
                        </th>
                        <th>
                            Lampiran SK
                        </th>
                        <th>
                            Lampiran TTD
                        </th>
                        
                        <th>
                            Print Data
                        </th>
                        <th>
                            Keterangan
                        </th>
                        </thead>
                        <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td><a href="{{url('admin/pegawai/detail/'.$row['pegawai_id'])}}" target="_blank"> {{$row['nama_pegawai']}} </a></td>
                                <td>{{$row['nip']}}</td>
                                <a href="{{url('admin/pegawai/detail/'.$row['pegawai_id'])}}" target="_blank"> {{$row['nik_pegawai']}} </a>
                                <td>{{$row['nik']}}</td>
                                <td>{{$row['type_pengajuan']}}</td>
                                <td>{{$row['nama_skpd']}}</td>
                                <td>{{$row['nama_cabang']}}</td>
                                <td>{{$row['nomor_sk']}}</td>
                                <td>{{$row['sertifikat']}}</td>
                                <td>{{$row['masa_berlaku']}}</td>
                                <td>
                                    @if($row['lampiran_file'] != "")
                                        <a href="{{ url(env('UPLOAD_PATH').'/'.$row['lampiran_file']) }}" download>Unduh</a>
                                    @else
                                    @endif
                                </td>
                                <td>
                                    @if($row['lampiran_ttd'] != "")
                                        <a href="{{ url(env('UPLOAD_PATH').'/'.$row['lampiran_ttd']) }}" download>Unduh</a>
                                    @else
                                    @endif
                                </td>
                                  <td><a href="{{url('admin/pengajuan/printpengajuan/'. $row['id'])}}"> Print</a></td>
                                
                                <td>{{$row['keterangan']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.includes.data_table', ['target' => '#pengajuan'])