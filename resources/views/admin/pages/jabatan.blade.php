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
                @include('admin.includes.crud_utils_add', ['add_url' => url()->current().'/add'])
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="jabatan">
                        <thead class=" text-primary">
                        <th>
                            Pangkat
                        </th>
                        <th>
                            Golongan
                        </th>
                        <th>
                            Ruang
                        </th>
                        <th>

                        </th>
                        </thead>
                        <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{$row['pangkat']}}</td>
                                <td>{{$row['golongan']}}</td>
                                <td>{{$row['ruang']}}</td>
                                <td>
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
@include('admin.includes.data_table', ['target' => '#jabatan'])
