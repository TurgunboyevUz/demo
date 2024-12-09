@extends('layouts::student.app')

@section('content')
<div class="content-wrapper" style="padding: 20px;">
    <section class="content-header">
        <h1>BMI uchun ball olish imkoniyatlari</h1>
    </section>

    <section class="content">
        <div class="container-fluid my-4">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Ball olish uchun imkoniyatlar</h3>
                </div>
                <div class="card-body">
                    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background-color: #f2f2f2;">
                                <th>Imkoniyat turi</th>
                                <th>Faoliyat</th>
                                <th>Ball</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="5"><strong>Maqolalar uchun</strong></td>
                                <td>Maqola Xalqaro</td>
                                <td>5 ball</td>
                            </tr>
                            <tr>
                                <td>Maqola Mahalliy</td>
                                <td>4 ball</td>
                            </tr>
                            <tr>
                                <td>Tezis Mahalliy</td>
                                <td>2 ball</td>
                            </tr>
                            <tr>
                                <td>Tezis Xalqaro</td>
                                <td>3 ball</td>
                            </tr>
                            <tr>
                                <td>SCOPUS</td>
                                <td>20 ball</td>
                            </tr>

                            <tr>
                                <td rowspan="3"><strong>Stipendiyalar</strong></td>
                                <td>Stipendiyat Institut</td>
                                <td>10 ball</td>
                            </tr>
                            <tr>
                                <td>Stipendiyat Viloyat</td>
                                <td>15 ball</td>
                            </tr>
                            <tr>
                                <td>Stipendiyat Respublika</td>
                                <td>20 ball</td>
                            </tr>

                            <tr>
                                <td rowspan="4"><strong>Olimpiadalar</strong></td>
                                <td>Institut Olimpiyada</td>
                                <td>5 ball</td>
                            </tr>
                            <tr>
                                <td>Viloyat Olimpiyada</td>
                                <td>8 ball</td>
                            </tr>
                            <tr>
                                <td>Respublika Olimpiyada</td>
                                <td>15 ball</td>
                            </tr>
                            <tr>
                                <td>Xalqaro Olimpiyada</td>
                                <td>25 ball</td>
                            </tr>

                            <tr>
                                <td rowspan="3"><strong>Ixtiro, DGU, Foydali model</strong></td>
                                <td>DGU</td>
                                <td>10 ball</td>
                            </tr>
                            <tr>
                                <td>Foydali model uchun patent</td>
                                <td>20 ball</td>
                            </tr>
                            <tr>
                                <td>Ixtiro uchun patent</td>
                                <td>30 ball</td>
                            </tr>

                            <tr>
                                <td rowspan="4"><strong>Start up, Tanlov</strong></td>
                                <td>Institut bosqichi</td>
                                <td>15 ball</td>
                            </tr>
                            <tr>
                                <td>Viloyat bosqichi</td>
                                <td>20 ball</td>
                            </tr>
                            <tr>
                                <td>Respublika bosqichi</td>
                                <td>25 ball</td>
                            </tr>
                            <tr>
                                <td>Xalqaro tanlov bosqichi</td>
                                <td>30 ball</td>
                            </tr>

                            <tr>
                                <td rowspan="2"><strong>Grant, Xo'jalik shartnomalar</strong></td>
                                <td>Xo'jalik shartnoma</td>
                                <td>10 ball</td>
                            </tr>
                            <tr>
                                <td>Grantlar</td>
                                <td>15 ball</td>
                            </tr>

                            <tr>
                                <td rowspan="2"><strong>Til sertifikati</strong></td>
                                <td>B1 daraja</td>
                                <td>10 ball</td>
                            </tr>
                            <tr>
                                <td>B2 daraja</td>
                                <td>20 ball</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection