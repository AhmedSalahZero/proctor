<div class="card">
    <div class="card-container">
        <div class="card-header">
            <h2 class="card-header-title"> {{$certification->course->name}} Completion Card </h2>
        </div>
        <div class="card-content">
            <div class="trainne-row">
                <span class="traniee-r1">Traniee Name</span>
                <span class="traniee-r2">
                    {{$certification->user->Full_Name}}
                </span>
            </div>

            <div class="trainne-row">
                <span class="traniee-r1">Course Name</span>
                <span  class="traniee-r2">
                    {{$certification->course->name}}
                </span>
            </div>

            <div class="trainne-row">
                <span class="traniee-r1">Traniee Provider</span>
                <span  class="traniee-r2">
                     @if($certification->provider)
                        {{$certification->provider}}
                    @else
                        None
                    @endif
                </span>
            </div>

            <div class="trainne-row">
                <span class="traniee-r1">Program Id</span>
                <span  class="traniee-r2">{{$certification->program_id}}</span>
            </div>

            <div class="trainne-row multi-column">
                <div class="traniee-content tranniee-multi-content">
                    <span class="traniee-r1">Completion Date</span>
                    <span  class="traniee-r2">{{$certification->getEndDataOnly()}} </span>
                </div>

                <div class="traniee-content tranniee-multi-content">
                    <span class="traniee-r1 ">Expiration Date</span>
                    <span  class="traniee-r2">{{$certification->getValidationDateOnly()}} </span>
                </div>





            </div>

            <div class="trainne-row remove-border">
                <span class="traniee-r1">Certificate Number</span>
                <span  class="traniee-r2">{{$certification->certification_id}}</span>
            </div>


        </div>
    </div>
</div>

<div class="gap"></div>

<div class="second-card">
    <div class="second-card-logo">
        <div class="second-container">
            <img src="{{asset('frontend/new/images/iadc_log.png')}}" class="lgoo-img">
        </div>
    </div>
    <div class="second-card-content">
        <div class="second-container flex-container">
            <p>
              This Individual has Successfully Completed  <br> {{$certification->course->name}} Course At Institution
                Accredited By The International Association Of Drilling Contractors . <br> <br>
                @if($certification->isRigpass())

                @else 
                Course Content Not Vetted By IADC As Part of DIT Accreditation <br> <br>

                @endif
               

                To Verify Validity , Please Scan The QR Code Or Contact Records @iadc.org
            </p>
            <img class="main-content-img" src="{{asset('storage/'.$certification->user->image)}}">
        </div>
    </div>

    <div class="second-card-footer">
        <div class="second-container second-card-footer-content">
            <div class="barcode" >
                {!! QrCode::size(100)->generate($certification->getCardLink($certification)); !!}

            </div>
{{--            <img src="{{asset('frontend/new/images/barcode.png')}}" class="barcode">--}}
            <p > Catalizing Imporvide Performance For The Dirling Industry </p>
        </div>

    </div>

</div>
