@extends('dashboard.layout')
@section('content')

    <style>
        .header-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row
        }

        .hover-class {
            background-color: #4799eb;
            color: white !important;
            padding: 10px !important;
        }

        .hover-class:hover {
            background-color: deeppink;
        !important;
        }
    </style>
    <div>
        <div class="py-5">
            <h2 class="text-center text-white">Products by Indie Hackers</h2>
            <p class="text-center text-white">Learn from the makers behind hundreds of profitable businesses and side
                projects.</p>
            <div style="text-align: center; margin-bottom: 30px">
                <button class="btn text-center p-2 hover-class"
                        onclick="location.href = `{{env('APP_URL')}}/new-product`">Add Your Product
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="ember751"
                         style="    height: 18px;width: 18px;fill: #4799eb;position: absolute;transition: all 180ms;margin-left: 81px;margin-top: -19px;">
                        <path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z">
                            <!----></path>
                    </svg>
                </button>
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
                                <div style="margin-top: 12px">
                                    <h3 style="color: white">Gyro</h3>
                                    <p style="color: #9cb3c9; font-size: 12px">Complete Financial Management System</p>
                                </div>
                            </div>
                            <h4 style="margin-top: 10px;color: white;">$50/month</h4>
                            <p style="color: #9cb3c9;">self-reported revenue</p>
                        </div>
                        <div style="padding: 50px; margin-top : 20px; background-color: #274059; box-shadow: 0 0 8px #0c1f31; border-radius: 3px;font-size: 17px; width: 500px">
                            <div class="d-flex">
                                <div style="margin-right: 13px;">
                                    <img src="{{asset('img/project.svg')}}"
                                         style="border-radius: 50%; height: 100px; width: 100px">
                                </div>
                                <div style="margin-top: 12px">
                                    <h3 style="color: white">FyreStream</h3>
                                    <p style="color: #9cb3c9; font-size: 12px">Complete Social Media System</p>
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
