@extends('.layouts.email')
@section('header')
    <div class="header-grid">
        {{-- <img
            src="{{$image_path}}"
            alt="logo"/> --}}
        <span class="primaryTextColor headerText">
            katari municipality
        </span>
    </div>
@endsection
@section('content')
    <div class="content-grid mt-4">
            <span class="hello lightGrayTextColor">
                Hello,
            </span>
        <span class="secondaryTextColor mt-1">
            Your account has been created on our system with
            <br/>
            Username: {{$email}}
            <br/>
            Password: {{$response}}
            <br/>
            Please click the following button to verify your email.
         </span>
        <a class="btn lightTextColor mt-2 text-center"
           href="{{ $reactBaseURL.'auth/verifyEmail?'. 'id='. $id.'&token='.$token }}">
            verify email address
        </a>
        <span class="secondaryTextColor mt-2">
            Regards,
            <br/>
            System Administrator
        </span>
    </div>
@endsection
@section('footer')
    <span class="secondaryTextColor">
        &copy; katari municipality. All rights reserved.
        <br/>
        <span class="ml-1">katari municipality, Udayapur</span>
    </span>
    <div class="mt-1">
        {{-- <img
            class="ml-1"
            src="{{$image_path}}"
            alt="logo"/> --}}
        <div class="primaryTextColor footerText">
            katari municipality
        </div>
    </div>
@endsection
