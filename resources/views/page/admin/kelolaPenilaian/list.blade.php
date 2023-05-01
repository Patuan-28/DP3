<table class="table table-rounded table-striped border gy-7 gs-7">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
            <th>No</th>
            <th>Aspek yang dinilai</th>
            <th>Skor</th>
            <th>Rubrik</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($collection as $key => $value)    
            <?php
                $kelola = \App\Models\KelolaPenilaian::where('kategori',$value->kategori)->first();
            ?>
        @endforeach
        
        <tr style="background-color:#3C8DBC; color:black;">
            <td colspan="5">{{ $kelola->kategori }}</td>
        </tr>
        @foreach ($collection as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama}}</td>
                <td>{{ $item->skor}}</td>
                <td>{{ $item->rubik}}</td>
                <td>
                    <a href="javascript:;" onclick="load_input('{{route('admin.kelolaPenilaian.edit',$item->id)}}');" class="btn btn-icon btn-warning"><i class="las la-edit fs-2"></i></a>
                    <a href="javascript:;" onclick="handle_delete('{{route('admin.kelolaPenilaian.destroy',$item->id)}}');" class="btn btn-icon btn-danger"><i class="las la-trash fs-2"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
