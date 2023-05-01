<table class="table table-rounded table-striped border gy-7 gs-7">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
            <th>Nama</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key => $value)
            <?php
                $id = $value->id;
            ?>
        @endforeach
        @foreach ($collection as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td>
                <a href="javascript:;" onclick="handle_check('{{route('admin.assignPenilaiDetail.store',$item->id)}}')" class="btn btn-sm btn-primary">Pilih</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$collection->links('theme.app.pagination')}}