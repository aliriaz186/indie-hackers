@extends('dashboard.layout')
@section('content')
    <style>
        .check-hover {
            cursor: pointer;
        }

        .check-hover:hover {
            background-color: #4799eb !important;
        }
    </style>
    <div class="w-75" style="color: white; margin-top: 20px;background: #1f364d!important;margin-left: 75px">
        <div style="padding: 50px">
            <div class="d-flex">
                <div>
                    <input type="hidden" id="product-id" value="{{$productId ?? ''}}">
                    <input type="file" name="image" id="photo" onchange="readURL(this)"
                           style="display: none">
                    @if(empty($logo))
                        <img src="{{asset('img/avatar.png')}}" class="top-avatar" style="width: 100px; height: 100px"
                             onclick="uploadImage()" id="photopreview" accept="image/*">
                    @else
                        <img onclick="uploadImage()"
                             src="{{asset('product-logo')}}/{{$logo}}"
                             style="width: 100px; height: 100px; cursor: pointer;border-radius: 50%;" id="photopreview">
                    @endif

                </div>
                <div class="ml-4">
                    <h3 style="margin-top: 30px">{{$products->name ?? ''}}</h3>
                </div>
            </div>
            <div class="d-flex">
                <div>
                    <h5 class="mt-4 ml-3">LOGO</h5>
                </div>
                <div style="margin-left: 70px">
{{--                    <p>{{$products->name ?? ''}}</p>--}}
                </div>
            </div>

        </div>
    </div>
    <div style="padding: 30px" class="ml-5">
        <label style="color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;">
            Name*
        </label>
        <div class="d-flex">
            <input maxlength="40" id="name" class="edit-form__field ember-text-field ember-view" type="text"
                   style="background-color: #1f364d;color: #dde1e4;border-radius:3px;font-size: 18px;padding: 14px;transition: border-width 120ms;width: 50%;border: none"
                   value="{{$productDetails->name ?? ''}}" disabled>
        </div>

    </div>
    <div style="padding: 30px" class="ml-5">
        <label style="color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;">
            Tagline*
        </label>
        <div class="d-flex">
            <input maxlength="40" id="tagline" class="edit-form__field ember-text-field ember-view" type="text"
                   style="background-color: #1f364d;color: #dde1e4;border-radius:3px;font-size: 18px;padding: 14px;transition: border-width 120ms;width: 50%;border: none"
                   value="{{$productDetails->tagline ?? ''}}" disabled>
        </div>

    </div>
    <div style="padding: 30px" class="ml-5">
        <label style="color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;">
            Motivation*
        </label>
        <p style="font-size: 16px;margin-top: 6px;color: #9cb3c9">
            Why are you working on {{$products->name ?? ''}}? Why does it exist?
        </p>
        <div class="d-flex">
            <textarea maxlength="40" id="motivation" class="edit-form__field ember-text-field ember-view" type="text"
                      style="background-color: #1f364d;color: #dde1e4;border-radius:3px;font-size: 18px;padding: 14px;transition: border-width 120ms;width: 50%;border: none"
                      rows="3" disabled>{{$productDetails->motivation ?? ''}}</textarea>
        </div>

    </div>
    <div style="padding: 30px" class="ml-5">
        <label style="color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;">
            LINKS*
        </label>
        <p style="font-size: 16px;margin-top: 6px;color: #9cb3c9">
            Enter the web address, Twitter handle, and Facebook address for {{$products->name ?? ''}}.
        </p>
        <div class="d-flex">
            <input maxlength="40" id="web-link" class="edit-form__field ember-text-field ember-view" type="text"
                   style="background-color: #1f364d;color: #dde1e4;border-radius:3px;font-size: 18px;padding: 14px;transition: border-width 120ms;width: 50%;border: none"
                   value="{{$products->url ?? ''}}" disabled>
        </div>

    </div>
    <div style="padding: 30px;
    /* margin-bottom: 47px; */
    margin-top: -42px;" class="ml-5">
        <div class="d-flex">
            <input placeholder="Twitter handle, e.g. @example" maxlength="40" id="twitter-link"
                   class="edit-form__field ember-text-field ember-view" type="text"
                   style="background-color: #1f364d;color: #dde1e4;border-radius:3px;font-size: 18px;padding: 14px;transition: border-width 120ms;width: 50%;border: none"
                   value="{{$productDetails->twitter ?? ''}}" disabled>
        </div>

    </div>
    <div style="padding: 30px;
    /* margin-bottom: 47px; */
    margin-top: -42px;" class="ml-5">
        <div class="d-flex">
            <input placeholder="Facebook address, e.g. https://www.facebook.com/example" maxlength="40"
                   id="facebook-link"
                   class="edit-form__field ember-text-field ember-view" type="text"
                   style="background-color: #1f364d;color: #dde1e4;border-radius:3px;font-size: 18px;padding: 14px;transition: border-width 120ms;width: 50%;border: none"
                   value="{{$productDetails->facebook ?? ''}}" disabled>
        </div>

    </div>
    <div class="row" style="padding: 30px;margin-left: 35px">
        <div class="col-md-2">
            <label style="color: white">START DATE*</label>
        </div>
        <div class="col-md-2" style="margin-left: 150px">
            <label style="color: white">END DATE</label>
        </div>

    </div>
    <div class="row">
        <div class="col-md-2" style="margin-left: 80px!important;">
            <p style="color: #9cb3c9;font-size: 17px">When did you first start working on this?</p>
        </div>
        <div class="col-md-2" style="margin-left: 130px!important;">
            <p style="color: #9cb3c9;font-size: 17px">When did you shut this product down?</p>
        </div>
    </div>
    <div class="row p-3" style="margin-left: 63px">
        <div class="d-flex">
            <input type="month" id="start-month" name="bdaymonth" class="w-100"
                   style="background-color: #1f364d;color: #dde1e4;border: none;height: 50px"
                   value="{{$productDetails->start_date_month ?? ''}}" disabled>
        </div>
        <div class="d-flex">
            <input type="text" id="start-year" name="bdaymonth" class="w-75"
                   style="background-color: #1f364d;color: #dde1e4;border: none;margin-left: 10px;text-align: center"
                   placeholder="Year" value="{{$productDetails->start_date_year ?? ''}}" disabled>
        </div>
        <div class="d-flex" style="margin-left: 40px">
            <input type="month" id="end-month" name="bdaymonth" class="w-100"
                   style="background-color: #1f364d;color: #dde1e4;border: none;height: 50px"
                   value="{{$productDetails->end_date_month ?? ''}}" disabled>
        </div>
        <div class="d-flex">
            <input type="text" id="end-year" name="bdaymonth" class="w-75"
                   style="background-color: #1f364d;color: #dde1e4;border: none;margin-left: 10px;text-align: center"
                   placeholder="Year" value="{{$productDetails->end_date_year ?? ''}}" disabled>
        </div>
    </div>
    <div style="padding: 30px" class="ml-5">
        <label style="color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;">
            LOCATION
        </label>
        <p style="font-size: 16px;margin-top: 6px;color: #9cb3c9">
            What's the primary "home base" for people working on this product?
        </p>
        <div class="d-flex">
            <input maxlength="40" id="location" class="edit-form__field ember-text-field ember-view" type="text"
                   style="background-color: #1f364d;color: #dde1e4;border-radius:3px;font-size: 18px;padding: 14px;transition: border-width 120ms;width: 50%;border: none"
                   placeholder="Search..." value="{{$productDetails->location ?? ''}}" disabled>
        </div>

    </div>
    <div style="padding: 30px" class="ml-5">
        <label style="color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;">
            FOUNDER SKILLSET*
        </label>
        <div class="d-flex" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px">
                Founders Code
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px">
                Founders Don't Code
            </div>
        </div>

    </div>
    <div style="padding: 30px" class="ml-5">
        <label style="color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;">
            NUMBER OF FOUNDERS*
        </label>
        <div class="d-flex" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px">
                Multiple Founders
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px">
                Solo Founder
            </div>
        </div>

    </div>
    <div style="padding: 30px" class="ml-5">
        <label style="color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;">
            NUMBER OF Employees*
        </label>
        <div class="d-flex" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectEmployee('ten-employee')" id="ten-employee">
                10+ Employees
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectEmployee('fifty-employee')" id="fifty-employee">
                50+ Employees
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectEmployee('two-hundred-employee')" id="two-hundred-employee">
                200+ Employees
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectEmployee('five-hundred-employee')" id="five-hundred-employee">
                500+ Employees
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectEmployee('onek-employee')" id="onek-employee">
                1000+ Employees
            </div>
        </div>
        <div class="d-flex mt-3" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectEmployee('fivek-employee')" id="fivek-employee">
                5,000+ Employees
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectEmployee('tenk-employee')" id="tenk-employee">
                10,000+ Employees
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectEmployee('no-employee')" id="no-employee">
                No Employees
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectEmployee('under-ten')" id="under-ten">
                Under 10 Employees
            </div>
        </div>

    </div>
    <div style="padding: 30px" class="ml-5">
        <label style="color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;">
            BUSINESS MODEL*
        </label>
        <p style="font-size: 16px;margin-top: 6px;color: #9cb3c9">
            How does {{$products->name ?? ''}} make money?
        </p>
        <div class="d-flex" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectBusiness('business-advertising')" id="business-advertising">
                Advertising
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectBusiness('business-comission')" id="business-comission">
                Comission
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectBusiness('consulting')" id="consulting">
                Consulting
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectBusiness('business-donation-supported')" id="business-donation-supported">
                Donation-Supported
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectBusiness('free')" id="free">
                Free
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectBusiness('partnership')" id="partnership">
                Partnerships
            </div>
        </div>
        <div class="d-flex mt-3" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectBusiness('business-sales-transaction')" id="business-sales-transaction">
                Sales & Transactions
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectBusiness('business-subscription')" id="business-subscription">
                Subscriptions
            </div>
        </div>


    </div>
    <div style="padding: 30px" class="ml-5">
        <label style="color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;">
            FUNDING*
        </label>
        <p style="font-size: 16px;margin-top: 6px;color: #9cb3c9">
            How have you funded {{$products->name ?? ''}}?
        </p>
        <div class="d-flex" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectFunding('accelerator')" id="accelerator">
                Accelerator
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectFunding('funding-bootstraped')" id="funding-bootstraped">
                Bootstraped
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectFunding('crowd-funded')" id="crowd-funded">
                Crowdfunded
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectFunding('donation-supported')" id="donation-supported">
                Donation-Supported
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectFunding('seed-funded')" id="seed-funded">
                Seed Funded
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectFunding('self-funded')" id="self-funded">
                Self Funded
            </div>
        </div>
        <div class="d-flex mt-3" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectFunding('sales-transaction')" id="sales-transaction">
                Sales & Transactions
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectFunding('subscription')" id="subscription">
                Subscriptions
            </div>
        </div>


    </div>
    <div style="padding: 30px" class="ml-5">
        <label style="color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;">
            INITIAL COMMITMENT*
        </label>
        <p style="font-size: 16px;margin-top: 6px;color: #9cb3c9">
            How much time did you initially commit to working on {{$products->name ?? ''}}?
        </p>
        <div class="d-flex" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="full-time"
                 onclick="commitment('full-time')">
                Full Time
            </div>
            <div class="p-2 ml-3 check-hover" id="side-project" onclick="commitment('side-project')"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px">
                Side Project
            </div>
        </div>

    </div>
    <div style="padding: 30px" class="ml-5">
        <label style="color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;">
            PLATFORMS
        </label>
        <p style="font-size: 16px;margin-top: 6px;color: #9cb3c9">
            Which (if any) of the following platforms is your product built for?
        </p>
        <div class="d-flex" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="android"
                 onclick="selectPlatform('android')">
                Android
            </div>
            <div class="p-2 ml-3 check-hover" id="browser-plugin" onclick="selectPlatform('browser-plugin')"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px">
                Browser Plugin
            </div>
            <div class="p-2 ml-3 check-hover" id="desktop" onclick="selectPlatform('desktop')"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px">
                Desktop
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="ios"
                 onclick="selectPlatform('ios')">
                iOS
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="mac"
                 onclick="selectPlatform('mac')">
                Mac
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="mobile"
                 onclick="selectPlatform('mobile')">
                Mobile
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="pc"
                 onclick="selectPlatform('pc')">
                PC
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="web"
                 onclick="selectPlatform('web')">
                Web
            </div>
        </div>


    </div>
    <div style="padding: 30px" class="ml-5">
        <label style="color: #fff;font-size: 16px;font-weight: 600;text-transform: uppercase;">
            Tags
        </label>
        <p style="font-size: 16px;margin-top: 6px;color: #9cb3c9">
            What best describes {{$products->name ?? ''}} as a product or business?
        </p>
        <div class="d-flex" style="margin-left: 2px!important;">
            <div class="p-2 check-hover" id="advertising"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('advertising')">
                Advertising
            </div>
            <div class="p-2 ml-3 check-hover" id="artifical-intelligance"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('artifical-intelligance')">
                AI
            </div>
            <div class="p-2 ml-3 check-hover" id="analytics"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('analytics')">
                Analytics
            </div>
            <div class="p-2 ml-3 check-hover" id="api"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('api')">
                API's
            </div>
            <div class="p-2 ml-3 check-hover" id="art"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('art')">
                Art
            </div>
            <div class="p-2 ml-3 check-hover" id="b2b"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('b2b')">
                B2B
            </div>
            <div class="p-2 ml-3 check-hover" id="b2c"
                 style="background: #1f364d;color: white;text-align: center;height: 40px"
                 onclick="selectTag('b2c')">
                B2C
            </div>
            <div class="p-2 ml-3 check-hover" id="books"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('books')">
                Books
            </div>
            <div class="p-2 ml-3 check-hover" id="bots"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('bots')">
                Bots
            </div>
            <div class="p-2 ml-3 check-hover" id="calendar"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('calendar')">
                Calendar
            </div>
            <div class="p-2 ml-3 check-hover" id="clothing"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('clothing')">
                Clothing
            </div>
        </div>
        <div class="d-flex mt-2" style="margin-left: 2px!important;">
            <div class="p-2 check-hover" id="communication"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('communication')">
                Communication
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="community" onclick="selectTag('community')">
                Community
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="content"
                 onclick="selectTag('content')">
                Content
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="cro"
                 onclick="selectTag('cro')">
                CRO
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="cyptocurrency" onclick="selectTag('cyptocurrency')">
                Cryptocurrency
            </div>
            <div class="p-2 ml-3 check-hover" style="background: #1f364d;color: white;text-align: center;height: 40px"
                 id="design"
                 onclick="selectTag('design')">
                Design
            </div>
            <div class="p-2 ml-3 check-hover" style="background: #1f364d;color: white;text-align: center;height: 40px"
                 id="ecommerce" onclick="selectTag('ecommerce')">
                E-Commerce
            </div>
        </div>
        <div class="d-flex mt-2" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="education"
                 onclick="selectTag('education')">
                Education
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="email-marketing" onclick="selectTag('email-marketing')">
                Email Marketing
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="events"
                 onclick="selectTag('events')">
                Events
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="fashion"
                 onclick="selectTag('fashion')">
                Fashion
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="finance"
                 onclick="selectTag('finance')">
                Finance
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="food-drink" onclick="selectTag('food-drink')">
                Food & Drink
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="games"
                 onclick="selectTag('games')">
                Games
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="growth"
                 onclick="selectTag('growth')">
                Growth
            </div>
        </div>
        <div class="d-flex mt-2" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="hardware"
                 onclick="selectTag('hardware')">
                Hardware
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="health-fitness" onclick="selectTag('health-fitness')">
                Health & Fitness
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="home-automation" onclick="selectTag('home-automation')">
                Home Automation
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="investing" onclick="selectTag('investing')">
                Investing
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="jobs-hiring" onclick="selectTag('jobs-hiring')">
                Jobs & Hiring
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="kids"
                 onclick="selectTag('kids')">
                Kids
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="legal"
                 onclick="selectTag('legal')">
                Legal
            </div>
        </div>
        <div class="d-flex mt-2" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="mailing-list"
                 onclick="selectTag('mailing-list')">
                Mailing Lists
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="marketing" onclick="selectTag('marketing')">
                Marketing
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="marketplaces" onclick="selectTag('marketplaces')">
                Marketplaces
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="medical"
                 onclick="selectTag('medical')">
                Medical
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="movies"
                 onclick="selectTag('movies')">
                Movies & Video
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="music"
                 onclick="selectTag('music')">
                Music & Audio
            </div>
        </div>
        <div class="d-flex mt-2" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px;height: 40px"
                 id="new-megazines"
                 onclick="selectTag('new-megazines')">
                News & Megazines
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="open-source" onclick="selectTag('open-source')">
                Open Source
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="outdoors"
                 onclick="selectTag('outdoors')">
                Outdoors
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="payments"
                 onclick="selectTag('payments')">
                Payments
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="photography" onclick="selectTag('photography')">
                Photography
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="podcasting" onclick="selectTag('podcasting')">
                Podcasting
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="politics"
                 onclick="selectTag('politics')">
                Politics
            </div>
        </div>
        <div class="d-flex mt-2" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="productivity"
                 onclick="selectTag('productivity')">
                Productivity
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="programming" onclick="selectTag('programming')">
                Programming
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="saas"
                 onclick="selectTag('saas')">
                SaaS
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="sales"
                 onclick="selectTag('sales')">
                Sales
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="shopping"
                 onclick="selectTag('shopping')">
                Shopping
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="social-media" onclick="selectTag('social-media')">
                Social Media
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="sports"
                 onclick="selectTag('sports')">
                Sports
            </div>
        </div>
        <div class="d-flex mt-2" style="margin-left: 2px!important;">
            <div class="p-2 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="task-management" onclick="selectTag('task-management')">
                Task Management
            </div>
            <div class="p-2 ml-3 check-hover" id="transportation"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('transportation')">
                Transportation
            </div>
            <div class="p-2 ml-3 check-hover" id="travel"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('travel')">
                Travel
            </div>
            <div class="p-2 ml-3 check-hover" id="utilities"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('utilities')">
                Utilities
            </div>
            <div class="p-2 ml-3 check-hover" id="wearable"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 onclick="selectTag('wearable')">
                Wearables
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="weather"
                 onclick="selectTag('weather')">
                Weather
            </div>
            <div class="p-2 ml-3 check-hover"
                 style="background: #1f364d;color: white;text-align: center;border-radius: 5%!important;height: 40px"
                 id="wordpress" onclick="selectTag('wordpress')">
                WordPress
            </div>
        </div>


    </div>
    <div style="padding: 30px;border-top: 4px solid #1f364d;margin-left: 80px" class="w-75">
    </div>
{{--    <div style="padding: 30px" class="ml-5">--}}
{{--        <div class="d-flex" style="margin-left: 2px!important;">--}}
{{--            <button onclick="saveProduct()" class="p-3 check-hover"--}}
{{--                    style="background-image: linear-gradient(to right,#e052a0,#f15c41);color: #fff;text-align: center;width: 200px!important;text-transform: uppercase;border: none">--}}
{{--                Save Changes--}}
{{--            </button>--}}
{{--            <div class="p-3 ml-3 check-hover" style="color: white;text-align: center;text-transform: uppercase">--}}
{{--                Cancel--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

    <script>
        let tagsArray = [];
        let platformsArray = [];
        let fundingArray = [];
        let BusinessArray = [];

        // function selectTag(tagId) {
        //     if (document.getElementById(tagId).style.background === '#4799eb' || document.getElementById(tagId).style.background === 'rgb(71, 153, 235)') {
        //         document.getElementById(tagId).style.background = '#1f364d';
        //     } else {
        //         document.getElementById(tagId).style.background = "#4799eb";
        //         tagsArray.push(tagId)
        //     }
        // }
        //
        // function selectPlatform(platformId) {
        //     if (document.getElementById(platformId).style.background === '#4799eb' || document.getElementById(platformId).style.background === 'rgb(71, 153, 235)') {
        //         document.getElementById(platformId).style.background = '#1f364d';
        //     } else {
        //         document.getElementById(platformId).style.background = "#4799eb";
        //         platformsArray.push(platformId)
        //     }
        // }
        //
        // function selectFunding(fundingId) {
        //     if (document.getElementById(fundingId).style.background === '#4799eb' || document.getElementById(fundingId).style.background === 'rgb(71, 153, 235)') {
        //         document.getElementById(fundingId).style.background = '#1f364d';
        //     } else {
        //         document.getElementById(fundingId).style.background = "#4799eb";
        //         fundingArray.push(fundingId)
        //     }
        // }
        //
        // function selectBusiness(businessId) {
        //     if (document.getElementById(businessId).style.background === '#4799eb' || document.getElementById(businessId).style.background === 'rgb(71, 153, 235)') {
        //         document.getElementById(businessId).style.background = '#1f364d';
        //     } else {
        //         document.getElementById(businessId).style.background = "#4799eb";
        //         BusinessArray.push(businessId)
        //     }
        // }
        //
        // function selectEmployee(employeeId) {
        //     document.getElementById('under-ten').style.background = "#1f364d";
        //     document.getElementById('tenk-employee').style.background = "#1f364d";
        //     document.getElementById('no-employee').style.background = "#1f364d";
        //     document.getElementById('fivek-employee').style.background = "#1f364d";
        //     document.getElementById('onek-employee').style.background = "#1f364d";
        //     document.getElementById('five-hundred-employee').style.background = "#1f364d";
        //     document.getElementById('two-hundred-employee').style.background = "#1f364d";
        //     document.getElementById('two-hundred-employee').style.background = "#1f364d";
        //     document.getElementById('fifty-employee').style.background = "#1f364d";
        //     document.getElementById('ten-employee').style.background = "#1f364d";
        //     document.getElementById(employeeId).style.background = "#4799eb";
        // }
        //
        // function commitment(commitmentId) {
        //     document.getElementById('full-time').style.background = "#1f364d";
        //     document.getElementById('side-project').style.background = "#1f364d";
        //     document.getElementById(commitmentId).style.background = "#4799eb";
        // }


        window.onload = function () {
            productId = document.getElementById('product-id').value;
            $.ajax
            ({
                type: 'GET',
                url: '{{env('APP_URL')}}/get/tagsData/' + productId,
                data: {"product_id": productId},
                success: function (data) {
                    let tagsData = JSON.parse(data)
                    for (let i = 0; i < tagsData.length; i++) {
                        document.getElementById(tagsData[i].tag).style.backgroundColor = "#4799eb";
                    }
                },
                error: function (data) {
                    alert("error");
                }
            });
            $.ajax
            ({
                type: 'GET',
                url: '{{env('APP_URL')}}/get/platforms/' + productId,
                data: {"product_id": productId},
                success: function (data) {
                    let platformsData = JSON.parse(data)
                    for (let i = 0; i < platformsData.length; i++) {
                        console.log("tags", platformsData[i].tag);
                        document.getElementById(platformsData[i].platform).style.backgroundColor = "#4799eb";
                    }
                },
                error: function (data) {
                    alert("error");
                }
            });
            $.ajax
            ({
                type: 'GET',
                url: '{{env('APP_URL')}}/get/funding/' + productId,
                data: {"product_id": productId},
                success: function (data) {
                    let fundingData = JSON.parse(data)
                    for (let i = 0; i < fundingData.length; i++) {
                        console.log("tags", fundingData[i].tag);
                        document.getElementById(fundingData[i].funding).style.backgroundColor = "#4799eb";
                    }
                },
                error: function (data) {
                    alert("error");
                }
            });
            $.ajax
            ({
                type: 'GET',
                url: '{{env('APP_URL')}}/get/business/model/' + productId,
                data: {"product_id": productId},
                success: function (data) {
                    let businessData = JSON.parse(data)
                    for (let i = 0; i < businessData.length; i++) {
                        document.getElementById(businessData[i].business_model).style.backgroundColor = "#4799eb";
                    }
                },
                error: function (data) {
                    alert("error");
                }
            });

        }
    </script>
@endsection
