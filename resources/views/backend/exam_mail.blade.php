
@component('mail::message')

@lang('HI!')
 {{$student->User_Name}} <br>

You have been enrolled in the following session of WellSharp Knowledge Exam Session - {{\Carbon\Carbon::make($exam->start_date)->format('M d , Y')}} <br>


The details for your EXAM are as follows: <br>

Start Date/Time: <b>{{\Carbon\Carbon::make($exam->start_date)->format('M d , Y  g:i A')}}</b>

Location: {{$exam->title . ' Exam '}} <br>

<ul style="margin-bottom: 10px">
    <li> <b>{{\Carbon\Carbon::make($exam->start_date)->format('M d , Y  g:i A')}} </b>  at Zoom Virtual Classroom.
       </li>
    <li> ZOOM Proctor Link: <a href="{{$exam->zoom_link}}">Zoom meeting</a></li>
</ul>
<b>you can access your Exam today by logging to the below Link;</b> <br>

<a href="http://wellsharpin.com" target="_blank">wellsharpin.com</a> <br>
{{--http://wellsharpin.com/site/home/login--}}

Username: {{$student->User_Name}} <br>

Password: {{($student->Password)}} <br>

Good luck!

IADC

Note: This is a system generated email. Please do not reply to this email.



{{--Eng / {{$student->User_Name}} <br><br>--}}
{{--Regarding {{$exam->title . ' Exam '}}.<br>--}}
{{--Please Enter The Following Link <a href="http://iadc.wellsharp.org" target="_blank">wellsharpin.com</a>--}}
{{--At {{\Carbon\Carbon::make($exam->start_date)->toDateString() . ' ' . \Carbon\Carbon::make($exam->start_date)->format('g:i A') }}--}}

{{--<br>--}}
{{--<b>And The Below Is your Credintials to login the exam </b> <br>--}}

{{--<b>Your User Name :</b>  {{$student->User_Name}} <br>--}}
{{--<b>Your Password :</b> {{($student->Password)}} <br>--}}
{{--<br>--}}
{{--On the other hand you have to login Zoom Meeting : <a href="{{$exam->zoom_link}}">Zoom meething</a>--}}


{{--{{ $data['topic'] }}--}}

{{--{{ $data['password'] !== null ? 'Password: ' . $data['password'] : '' }}--}}


{{--@component('mail::button', ['url' => 'http://wellsharpin.com'])--}}
{{--Join The Exam--}}
{{--@endcomponent--}}

{{--Thanks,<br>--}}
{{--{{$owner}}--}}
@endcomponent
