@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/main/contact.css" />
<div class="container">
    <br>
    <div class="col-12 col-sm-12 col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header text-center">
                <h3>Contact Us</h3>
            </div>
            <div class="card-body text-center col-12 ">
                <div class="contact-form-card" id="contact1">
                    <h5>Fill the below form if you have any queries.</h5>
                    {{-- <small>We are always there to help you!</small> --}}
                    <form action="/contactusreq" method="POST">
                        @csrf
                        <table class="table contact-table text-center">
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Your Name.." name="name" />
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Your Email Id.."
                                        name="email" />
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Subject.." name="subject" />
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
            <br>
        </div>
    </div>
    <br>
</div>
@endsection
