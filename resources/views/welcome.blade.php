@extends('dashboard.layout')
@section('content')

    <style>
        .header-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row
        }
    </style>
    <div>
        <div class="py-5">
            <h2 class="text-center text-white">Products by Indie Hackers</h2>
            <p class="text-center text-white">Learn from the makers behind hundreds of profitable businesses and side projects.</p>
            <div style="text-align: center; margin-bottom: 30px">
                <button class="btn btn-modern text-center" onclick="location.href = `{{env('APP_URL')}}/new-product`">Add Your Product</button>
            </div>
            <div class="container header-container">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-8">
                    <div class="d-flex flex-wrap">
                        <div
                            style="padding: 50px; background-color: #274059; box-shadow: 0 0 8px #0c1f31; border-radius: 3px;font-size: 17px; width: 500px">
                            <div class="d-flex">
                                <div style="margin-right: 13px;">
                                    <img src="{{asset('img/project.svg')}}"
                                         style="border-radius: 50%; height: 100px; width: 100px">
                                </div>
                                <div>
                                    <h3 style="color: white">Side Project</h3>
                                    <p style="color: white; font-size: 12px">description</p>
                                </div>
                            </div>
                            <h3 style="margin-top: 10px;color: white;">$100/month</h3>
                        </div>
                        <div style="padding: 50px; margin-top : 20px; background-color: #274059; box-shadow: 0 0 8px #0c1f31; border-radius: 3px;font-size: 17px; width: 500px">
                            <div class="d-flex">
                                <div style="margin-right: 13px;">
                                    <img src="{{asset('img/project.svg')}}"
                                         style="border-radius: 50%; height: 100px; width: 100px">
                                </div>
                                <div>
                                    <h3 style="color: white">Side Project</h3>
                                    <p style="color: white; font-size: 12px">description</p>
                                </div>
                            </div>
                            <h3 style="margin-top: 10px;color: white;">$100/month</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr style="line-height: 5px; color: grey">
    </div>
    {{--    <div class="footer-section" style="background-color: #1f364d">--}}
    {{--        <div class="footer-section-bg-graphics">--}}
    {{--            <img src="{{asset('landing-page-styles/images/footer-section-bg.png')}}">--}}
    {{--        </div>--}}

    {{--        <div class="container footer-container">--}}
    {{--            <div class="col-lg-3 col-md-6 footer-subsection">--}}
    {{--                <div class="footer-subsection-2-1">--}}
    {{--                    <h3 class="footer-subsection-title">About</h3>--}}
    {{--                    <p class="footer-subsection-text">Domain Giving company</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="col-lg-3 col-md-6 footer-subsection">--}}
    {{--                <h3 class="footer-subsection-title">Contact Us</h3>--}}
    {{--                <ul class="footer-subsection-list">--}}
    {{--                    <li>123 Business Centre<br>London SW1A 1AA</li>--}}
    {{--                    <li>0123456789</li>--}}
    {{--                    <li><a class="__cf_email__" data-cfemail="701d11191c30">dummy@domain.com</a></li>--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="container footer-credits">--}}
    {{--            <p>&copy; 2020 <a href="#">Website</a>. All Rights Reserved.</p>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
