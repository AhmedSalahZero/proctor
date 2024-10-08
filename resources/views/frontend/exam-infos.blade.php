<h6 class="text-underline mb-3 font-weight-bold small-fs">Exam Scheduled For : {{ $exam->getStartDateFormatted() }} </h6>
                <p class="sm-th-text text-dark custom-padding-text">
                    if a proctor does not show up by the time the assessment is scheduled to begain , call the <span class="font-weight-bold">emergency proctor</span>
                    numbers shown below . you will be given an emergenec code for begainning the assessments

                </p>
                <table class="table table-border">
                    <thead>
                        <tr class="tr-border">
                            <th class="lg-td-text text-left">Name</th>
                            <th class="lg-td-text text-left">Number(s)</th>
                            <th class="lg-td-text text-left">Email</th>
                            <th class="lg-td-text text-left">Locations Covered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(getEmergencyProctors() as $emergencyProctor)
                        <tr class="tr-border">
                            <td class="sm-th-text gray-td-color">{{ $emergencyProctor['name'] }}</td>
                            <td class="sm-th-text gray-td-color">{{ $emergencyProctor['phone'] }}</td>
                            <td class="sm-th-text gray-td-color">
                                <a href="mailto:{{ $emergencyProctor['email'] }}" class="text-primary text-underline">{{ $emergencyProctor['email'] }}</a>
                            </td>
                            <td class="sm-th-text gray-td-color">
                                {{ $emergencyProctor['location'] }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
