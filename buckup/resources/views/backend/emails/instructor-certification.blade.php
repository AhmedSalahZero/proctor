<!DOCTYPE html>
<html style="height:100%">

<head>
    <title></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <style type="text/css">
        @font-face {
            font-family: 'arialmt';
            font-style: normal;
            font-weight: normal;
            src: url('{{public_path('storage/fonts/arialmt.ttf')}}') format('ttf');
        }

        body {
            margin: 0px;
            width: 100%;
        }

        * {
            font-family: 'arialmt'
        }
        table{
               border-collapse: collapse;
                  table-layout: fixed; //new line
                     width: 100%;
        }
    </style>
    
</head>

<body style="height:100%;padding:0;margin:0">


    
    <div  style="height: 100%;top:0;left:0;right:0;bottom:0;
    background-image:url('{{ public_path('frontend/images/instructor-certification.png') }}');
    background-size:100% 100%;
    background-repeat:no-repeat;
    position:relative ;
    margin-bottom:90px;
    
    "  class="advanced_certification_pg" >
                  <div style="display:block;padding-top:230px;margin-left:281px;padding-right:10px">
                        <h4 style="font-size:1.65rem;font-weight:lighter;margin-bottom:0">
                        {{ Auth('students')->user()->getFullName() }}
                        </h4>
                        <p style="font-size:1.1rem;margin-bottom:0;font-weight:lighter">
                        {!! $instructorCertification->description !!}
                        </p>
                  </div>

                  <div style="display:block;margin-left:250px;padding-right:10px;margin-top:8px;">
                        <h4 style="font-weight:lighter;margin-bottom:5px;margin-top:0;color:gray;">COURSE(S):</h4>
                      
                  </div>
                  <div>
{{-- @dd() --}}
                  <div style="margin-left:250px;padding-right:10px;">
                  <table style="width:93%;">
                      <tr >
                    @foreach (array_chunk($instructorCertification->courses->toArray() , 2) as $index=> $chunk )
                      <tr>

                    @foreach ($chunk  as $index=>$course )
                    @if($index %2 == 0)


                              <td style="text-align: left">{{ $course['name'] }}</td>
                    @else 
                    
                          <td style="text-align: left;padding-left:80px;padding-bottom:5px">{{ $course['name'] }}</td>
                          @endif 
                      
                    @endforeach
                      </tr>  
                      
                  @endforeach
{{-- 
                       <tr >
                          <td style="text-align: left">Driling Operations Supervisor (Live) Surface Stack</td>
                          <td style="text-align: left;padding-left:80px;padding-bottom:5px">Well Servicing Coiled Tubing </td>
                      </tr>

                       <tr >
                          <td style="text-align: left">Driling Operations Introductory</td>
                          <td style="text-align: left;padding-left:80px;padding-bottom:5px">Well Servicing Wireline</td>
                      </tr>

                       <tr >
                          <td style="text-align: left">Driling Operations Introductory(live)</td>
                          <td style="text-align: left;padding-left:80px;padding-bottom:5px">Driling Operations Introductory</td>
                      </tr>

                        <tr>
                          <td style="text-align: left">Driling Operations Supervisor Surface Stack</td>
                      </tr> --}}


                  </table>
                  <table style="width:93%;margin-top:60px;">
                      <tr >
                          <td style="text-align: left;padding-bottom:5px">
                            <span style="color:gray">STACK(S):</span> <span>{{ $instructorCertification->stack }}</span>
                          </td>
                      </tr>

                       <tr >
                          <td style="text-align: left;padding-bottom:5px">
                            <span style="color:gray">SUPPLEMENT(S):</span> <span> {{ $instructorCertification->supplement }} </span>
                           </td>
                      </tr>


                  </table>


                    <table style="width:93%;margin-top:70px;">

                       <tr >
                          <td style="text-align: left;padding-bottom:15px">
                             <span style="color:#4D4D4F">INSTRUCTOR NUMBER:</span> <span>{{ $instructorCertification->instructor_number }}</span>
                          </td>
                        <td rowspan="3" style="text-align: left;padding-left:80px;">
                            <div style="color: #4D4D4F;font-size:0.85rem">ISSUED BY<br></div>
                            <img src="{{ public_path('frontend/images/sign.png') }}" width="100px">
                            <hr style="width:100px;margin-top:5px;margin-bottom:2px;padding:0;height:1px;">
                            <p style="color: #4D4D4F;margin-top:0">{{ $instructorCertification->issued_by }}</p>
                            <p style="color: #4D4D4F;margin-top:0">{{ $instructorCertification->issued_by_position }}</p>
                        </td>
                      </tr>

                        <tr >
                          <td style="text-align: left;padding-bottom:15px">
                             <span style="color:gray">CERTIFICATE DATE:</span> <span>
                                 {{ $instructorCertification->getCertificateDateFormatted() }}
                             </span>
                          </td>
                         
                      </tr>

                        <tr >
                          <td style="text-align: left;padding-bottom:15px">
                             <span style="color:gray">EXPIRATION DATE:</span> <span>
                                                  {{ $instructorCertification->getCertificationExpirationDateFormatted() }}

                             </span>
                          </td>
                         
                      </tr>


                     
                  </table>


                  </div>
                  

    </div>
    
</body>

</html>
