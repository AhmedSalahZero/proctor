<script>
    $(document).on('click', '.check-proctor-password', function() {
        let exam_id = $(this).data('exam-id');
        $(this).prop('disabled', true);
        let password = $('#proctor-password-for-exam-' + exam_id).val();
        if (password) {
            $.ajax({
                url: "{{ route('check.proctor.password') }}"
                , data: {
                    "_token": "{{ csrf_token() }}"
                    , "exam_id": exam_id
                    , 'password': password
                }
                , type: "post"
                , success: function(result) {
                    $('.check-proctor-password[data-exam-id="' + result.exam_id + '"]').prop('disabled', false);
                    $('#exam-started-successfully-' + result.exam_id).addClass('d-none');
                    if (result.status) {
                        $('#launch-exam-' + result.exam_id).prop('disabled', false);
                        $('#proctor-full-name-for-exam-' + result.exam_id).html(result.message);
                        $('#proctor-name-for-exam-' + result.exam_id).removeClass('d-none');
                        $('#proctor-not-found-' + result.exam_id).addClass('d-none');
                    }
                }
            , });
        } else {
            alert('Please Enter Proctor ID');

        }

    });

    $(document).on('click', '.launch-exam', function() {
        let exam_id = $(this).data('exam-id');
		const startExamModal = $(this).closest('.modal');
        $(this).prop('disabled', true);

        $.ajax({
            url: "{{ route('proctors.can.start.exam') }}"
            , data: {
                "exam_id": exam_id
                , "_token": "{{ csrf_token() }}"
            }
            , type: "POST"
            , success: function(result) {
				$('.start-date-exam-class[data-exam-id="'+ result.exam_id +'"]').html(result.started_on)
                $('.launch-exam[data-exam-id="' + result.exam_id + '"]').prop('disabled', true);
                $('#proctor-name-for-exam-' + result.exam_id).addClass('d-none');
                $('#proctor-not-found-' + result.exam_id).addClass('d-none');
                // setTimeout(function(){},)
                $('#exam-started-successfully-' + result.exam_id).removeClass('d-none');
                $('.check-proctor-password[data-exam-id="' + result.exam_id + '"]').prop('disabled', true);

                $('.stop-exam-btn[data-exam-id="' + result.exam_id + '"]').removeClass('d-none');
                $('.start-exam-btn[data-exam-id="' + result.exam_id + '"]').addClass('d-none');
                $('.class-status-icon[data-exam-id="' + result.exam_id + '"]').addClass('fa-color-green');
                $('.start-exam-title[data-exam-id="' + result.exam_id + '"]').html("{{ TEST_OPEN_AND_ACTIVE }}")
                $('.stop-check-proctor-password[data-exam-id="' + result.exam_id + '"]').prop('disabled', false)
                $('#stop-exam-started-successfully-' + result.exam_id).addClass('d-none')
                $('#stop-launch-exam-' + result.exam_id).prop('disabled', false);
                $('#stop-proctor-name-for-exam-' + result.exam_id).addClass('d-none');
				startExamModal.modal('hide');
            }
        , });
    })





    // stop






    $(document).on('click', '.stop-check-proctor-password', function() {
        let exam_id = $(this).data('exam-id');
        $(this).prop('disabled', true);
        let password = $('#stop-proctor-password-for-exam-' + exam_id).val();
        if (password) {
            $.ajax({
                url: "{{ route('check.proctor.password') }}"
                , data: {
                    "_token": "{{ csrf_token() }}"
                    , "exam_id": exam_id
                    , 'password': password
                }
                , type: "post"
                , success: function(result) {
                    $('.stop-check-proctor-password[data-exam-id="' + result.exam_id + '"]').prop('disabled', false);
                    $('#stop-exam-started-successfully-' + result.exam_id).addClass('d-none');
                    if (result.status) {
                        $('#stop-launch-exam-' + result.exam_id).prop('disabled', false);
						$('#stop-proctor-full-name-for-exam-' + result.exam_id).html(result.message);
                        $('#stop-proctor-name-for-exam-' + result.exam_id).removeClass('d-none');
                        //     $('#proctor-not-found-' + result.exam_id).addClass('d-none');
                    }
                }
            , });
        } else {
            alert('Please Enter Proctor ID');

        }

    });

    $(document).on('click', '.stop-launch-exam', function() {
        let exam_id = $(this).data('exam-id');
        $(this).prop('disabled', true);
		const stopExamModal = $(this).closest('.modal')
        $.ajax({
            url: '{{ route("proctor.stop.exam") }}'
            , data: {
                "_token": "{{ csrf_token() }}"
                , "exam_id": exam_id
            }
            , type: "POST"
            , success: function(response) {
                examid = response.exam_id;
				$('.end-date-exam-class[data-exam-id="'+ examid +'"]').html(response.end_date)
                $('.stop-exam-btn[data-exam-id="' + examid + '"]').addClass('d-none');
                //$('.start-exam-btn[data-exam-id="' + examid + '"]').removeClass('d-none');
                $('.class-status-icon[data-exam-id="' + examid + '"]').removeClass('fa-color-green');
                $('.start-exam-title[data-exam-id="' + examid + '"]').html("{{ TEST_ENDED }}");
                $('#exam-started-successfully-' + examid).addClass('d-none');
                $('.launch-exam[data-exam-id="' + examid + '"]').prop('disabled', false);
                $('.check-proctor-password[data-exam-id="' + examid + '"]').prop('disabled', false);
                $('.stop-check-proctor-password[data-exam-id="' + examid + '"]').prop('disabled', true)
                $('.stop-launch-exam[data-exam-id="' + examid + '"]').prop('disabled', true);
                $('#stop-proctor-name-for-exam-' + examid).addClass('d-none');
                $('#stop-proctor-not-found-' + examid).addClass('d-none');
                $('#stop-exam-started-successfully-' + examid).removeClass('d-none');
                $('.stop-check-proctor-password[data-exam-id="' + examid + '"]').prop('disabled', true);

//                $('.start-exam-btn[data-exam-id="' + examid + '"]').removeClass('d-none');
                $('.stop-exam-btn[data-exam-id="' + examid + '"]').addClass('d-none');
                $('.class-status-icon[data-exam-id="' + examid + '"]').addClass('fa-color-gray');
                //   $('.start-exam-title[data-exam-id="' + examid + '"]').html("{{ TEST_ENDED }}")
				stopExamModal.modal('hide')
				
            }
        });


    })


    //   $(document).on('click', '.stop-exam-btn', function() {
    //       let exam_id = $(this).data('exam-id');
    //       $.ajax({
    //           url: '{{ route("proctor.stop.exam") }}'
    //           , data: {
    //               "_token": "{{ csrf_token() }}"
    //               , "exam_id": exam_id
    //           }
    //           , type: "POST"
    //           , success: function(response) {
    //               examid = response.exam_id;
    //               $('.stop-exam-btn[data-exam-id="' + examid + '"]').addClass('d-none');
    //               $('.start-exam-btn[data-exam-id="' + examid + '"]').removeClass('d-none');
    //               $('.class-status-icon[data-exam-id="' + examid + '"]').removeClass('fa-color-green');
    //               $('.start-exam-title[data-exam-id="' + examid + '"]').html("{{ TEST_NOT_STARTED }}");
    //               $('#exam-started-successfully-' + examid).addClass('d-none');
    //               $('.launch-exam[data-exam-id="' + examid + '"]').prop('disabled', false);
    //               $('.check-proctor-password[data-exam-id="' + examid + '"]').prop('disabled', false);
    //
    //           }
    //       });
    //   });

</script>
