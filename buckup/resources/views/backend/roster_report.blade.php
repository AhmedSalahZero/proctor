<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Class Roster</title>
		<style>
						/* @font-face {
				font-family: 'verdana';
				src: url('verdana.ttf');
			}
			@font-face {
				font-family: 'verdana_bold';
				src: url('verdanab.ttf');
			} */
			*{
				box-sizing: border-box;
				padding:0;
				margin: 0;
				font-family: verdana_bold;
			}
			img
			{
				max-width: 100%;
				height: 60px;
			}
			.roster_container {width: 90%;margin: 0 auto;padding-top: 20px;/* background: #eee; */}
.roster_header_table {
}
.roster_header_body {}
.roster_header_tr {
}
.roster_header_td_1 {
    width: 29%;
    font-weight: bold;
    font-size: 40px;
}
.roster_header_td_2 {
    width: 30%;
    text-align: right;
}
.main_content_table {border-collapse: separate;width: 100%;/* background: red; *//* margin: auto; */border-spacing: 5px;margin-top: 40px;}
.main_content_tbody {
}
.main_content_tr {}
.main_content_td_1 {font-size: 13px;font-weight: bold;text-transform: capitalize;/* white-space: nowrap; */width: 25%;color: #575259;}
.main_content_td_2 {font-size: 12px;text-transform: capitalize;color: #080E18;font-family: verdana;}
.table_caption{
    font-size: 19px;
    margin-top: 20px;
	font-weight: bold;
}
.hr_class {/* color: #ff1818; *//* background: #D0E1E8; */border: 0.1px solid #D0E1E8;}
.users_table_class {width: 100%;border-collapse: collapse;text-align: center;}
.users_table_body {
}

.users_table_td {color: #080E18;font-size: 14px;font-family: verdana;padding: 5px;}


.users_table_thead {
    background: #696969;
}
.users_table_tr {
}
.users_table_tr_head {
	background: #696969;
}
.users_table_td_head {color: white;font-size: 14px;}
.users_table_body tr:nth-child(even){background-color: #FFFFFF;}
.users_table_body tr:nth-child(odd){background-color: #D3D3D3;}
.text-left{text-align: left;width: 50%}

		</style>
	</head>
	<body>
		<div class="roster_container">
			<table class="roster_header_table">
				<tbody class="roster_header_body">
					<tr class="roster_header_tr">
						<td class="roster_header_td_1">
							Class Roster
						</td>
						<td class="roster_header_td_2">
							<img src="{{ public_path('frontend/images/newlogo.jpg') }}" class="roster_header_img">
						</td>
					</tr>
				</tbody>
			</table>

			<table class="main_content_table">
				<tbody class="main_content_tbody">
					<tr class="main_content_tr">
						<td class="main_content_td_1">
							Class Title:
						</td>
						<td class="main_content_td_2">

							{{ $exam->title }}
						</td>
					</tr>

					<tr class="main_content_tr">
						<td class="main_content_td_1">
							Training <br> Provider:

						</td>
						<td class="main_content_td_2">
							{{-- Skills Academy --}}
							{{ $certification->provider }}
						</td>
					</tr>
					<tr class="main_content_tr">
						<td class="main_content_td_1">
							Instructor:

						</td>
						<td class="main_content_td_2 ">
							{{ $certification->instructor_name }} <br> {{ $certification->provider }}

						</td>
					</tr>
					<tr class="main_content_tr">
						<td class="main_content_td_1">
							Location:

						</td>
						<td class="main_content_td_2">
                            {{$exam->location ?? 'Al-kut Al-Ahrar City, Adhab oil field, Al-waha petroleum Co. , waste city, Iraq'}}


						</td>
					</tr>

					<tr class="main_content_tr">
						<td class="main_content_td_1">
							Exam Date
						</td>
						<td class="main_content_td_2">
							{{-- December 3, 2020 --}}
							{{ date('F d, Y', strtotime($exam->start_date)) }}
						</td>
					</tr>

					<tr class="main_content_tr">
						<td class="main_content_td_1">
							Course
						</td>
						<td class="main_content_td_2">
							{{-- @dd() --}}
							{{-- Drilling Operations Supervisor --}}
							{{ $certification->course->name }}
						</td>
					</tr>


				</tbody>
			</table>

			<div class="table_caption">
				Trainee Information:
			</div>
			{{-- <hr class="hr_class"> --}}
{{-- @dd() --}}
			<table class="users_table_class">
				<thead class="users_table_thead">
					<tr class="users_table_tr_head">
						<td class="users_table_td_head">Trainee Name</td>
						<td class="users_table_td_head">Stack</td>
						<td class="users_table_td_head">Username</td>
						<td class="users_table_td_head">Password</td>

					</tr>
				</thead>
				<tbody class="users_table_body">

					@foreach($students as $student)
					<tr class="users_table_tr">
						<td class="users_table_td text-left">
							{{ $student->Full_Name }}
						</td>
						<td class="users_table_td">
							{{ $certification->course->stack }}
						</td>
						<td class="users_table_td">
							{{-- balabed --}}
							{{ $student->User_Name }}
						</td>
						<td class="users_table_td">
							{{ $student->Password }}

						</td>

					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</body>

	{{-- @dd('x') --}}


</html>
