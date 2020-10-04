@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/main/contact.css" />
<div class="container">
    <br>
    <div class="card">
        <div class="card-header text-center">
            <h3>Contact Us</h3>
        </div>
        <div class="card-body col-sm-12 col-md-12 col-lg-12">
            <br>
            <div class="row no-gutters">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card contact-form-card" id="contact1">
                            <h5>Data Warriors Technologies LLP</h5>
                            <table class="table contact-table text-left" style="margin-top: 10px;">
                                <tr>
                                    <td>Address</td>
                                    <td>: XYZ,Street,Mumbai,401101.</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>: 9920940893 - Office</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: datawarriorz@gmail.com</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Website</td>
                                    <td>: datawarriors.co.in/</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card contact-form-card" id="contact1">
                            <h5>Fill the below form if you have any queries.</h5>
                            {{-- <small>We are always there to help you!</small> --}}
                            <form action="/contactusreq" method="POST">
                                @csrf
                                <table class="table contact-table text-center">
                                    <tr>
                                        <td><input class="form-control" type="text" placeholder="Your Name.."
                                                name="name" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-control" type="text" placeholder="Your Email Id.."
                                                name="email" /></td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-control" type="text" placeholder="Subject.."
                                                name="subject" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><textarea class="form-control" type="text" cols="40" rows="2"
                                                placeholder="Your Message.." name="description"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><button class="btn btn2" id="contact-submit" type="submit">Submit</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <div id="contact2" class="text-center">
                                {{ $message ?? '' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection