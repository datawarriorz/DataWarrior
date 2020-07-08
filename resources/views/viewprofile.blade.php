@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/internshipfinal.css">
<div class="container">
    <div class="internship-container">
        <div id="InternFinalForm">
            <div>
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Profile</h4>
                        <table>
                            <tr>
                                <td>Name </td>
                                <td> :</td>
                                <td rowspan="4"></td>
                            </tr>
                            <tr>
                                <td>Email Id </td>
                                <td> :</td>
                            </tr>
                            <tr>
                                <td>Contact No </td>
                                <td> :</td>
                            </tr>
                            <tr>
                                <td>Date of Births </td>
                                <td> :</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td rowspan="2" colspan="2">
                            </tr>
                            <tr>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection