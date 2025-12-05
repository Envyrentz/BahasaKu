<table>
    <thead>
    <tr>
        <td colspan="3" rowspan="3" align="center" valign="center" bgcolor="#395670" style="font-size: 13px; font-weight: bold; color: white;">Hasil Pengerjaan Soal Materi: {{ $content->title }}</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>

    <tr>
        <th width="20" bgcolor="#395670" style="color: white; font-weight: bold">Name</th>
        <th width="10" bgcolor="#395670" style="color: white; font-weight: bold">Score</th>
        <th width="20" bgcolor="#395670" style="color: white; font-weight: bold">Waktu Pengerjaan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datas as $data)
        <tr>
            <td>{{ $data->user->name }}</td>
            <td align="left">{{ $data->score }}</td>
            <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y, H:i') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>