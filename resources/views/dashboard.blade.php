@include('sections.head')
@include('sections.header')
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table mt-5">
                    <thead>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Company Name</th>
                        <th>Site Url</th>
                        <th>Kayıt Tarihi</th>
                        <th>Paket</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->surname }}</td>
                                <td>{{ $item->company_name }}</td>
                                <td>{{ $item->site_url }}</td>
                                <td>{{ Carbon\Carbon::parse($item->created_at)->translatedFormat('d.m.Y l H:i:s') }}</td>
                                <td>
                                    <select name="" id="">
                                        <option value="">Paket Seçiniz</option>
                                        <option value="">P1</option>
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@include('sections.footer')
