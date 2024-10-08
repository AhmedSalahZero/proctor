$(function(){

	if($('.time-remaning.on').length){

// alert($('.time-remaning.on > span').html());
		var timer2 = $('.time-remaning.on > span').html();
		var interval = setInterval(function() {
			var timer = timer2.split(':');
			//by parsing integer, I avoid all extra string processing
			var hours = parseInt(timer[0], 10);
			var minutes = parseInt(timer[1], 10);
			var seconds = parseInt(timer[2], 10);
			--seconds;

			minutes = (seconds < 0) ? --minutes : minutes;
			// if (minutes < 0) clearInterval(interval);
			seconds = (seconds < 0) ? 59 : seconds;
			seconds = (seconds < 10) ? '0' + seconds : seconds;

			hours=(minutes < 0) ? --hours : hours;
			if (hours < 0) clearInterval(interval);
			minutes = (minutes < 0) ? 59 : minutes;
			minutes = (minutes < 10) ? '0' + minutes : minutes;
			seconds = (seconds < 0) ? 59 : seconds;
			// seconds = (seconds < 10) ? '0' + seconds : seconds;
			hours = (hours < 10) ? '0' + hours : hours;
			//minutes = (minutes < 10) ?  minutes : minutes;
			$('.time-remaning.on > span').html(hours + ':' + minutes + ':' + seconds);
			timer2 = hours + ':' + minutes + ':' + seconds;
			var f =$('.time-remaning').attr('data-alert');

			if (minutes==f && seconds==00) {
				// alert(f);
				alert('Attention Time remaning is '+f +' minutes');
			}
			if(hours==0 && minutes==0 && seconds==0){
				// finish exam
				window.location=BASE+'site/home/result';
			}
		}, 1000);
	}

// 	if($('.time-remaning.on').length){
//
// // alert($('.time-remaning.on > span').html());
// 		var timer2 = $('.time-remaning.on > span').html();
// 		var interval = setInterval(function() {
// 			var timer = timer2.split(':');
// 			//by parsing integer, I avoid all extra string processing
// 			var minutes = parseInt(timer[0], 10);
// 			var seconds = parseInt(timer[1], 10);
// 			--seconds;
// 			minutes = (seconds < 0) ? --minutes : minutes;
// 			if (minutes < 0) clearInterval(interval);
// 			seconds = (seconds < 0) ? 59 : seconds;
// 			seconds = (seconds < 10) ? '0' + seconds : seconds;
// 			//minutes = (minutes < 10) ?  minutes : minutes;
// 			$('.time-remaning.on > span').html(minutes + ':' + seconds);
// 			timer2 = minutes + ':' + seconds;
// 			var f =$('.time-remaning').attr('data-alert');
//
// 			if (minutes==f && seconds==00) {
// 				// alert(f);
// 				alert('Attention Time remaning is '+f +' minutes');
// 			}
// 			if(minutes==0 && seconds==0){
// 				// finish exam
// 				window.location=BASE+'site/home/result';
// 			}
// 		}, 1000);
// 	}


	$('body').on('click','.cancel',function(){
		$('.modal').modal('hide');
	})


		function saveAnswer($next=0,$f=null){
		if($('.working-test').length){
			var $test=$('.working-test'),
				$question=$test.attr('data-question'),
				$type=$test.attr('data-type'),
				val;

			if($type=='text'){
				val=$('input[name="answer[]"]').val();
			}else if($type=='radio'){
				val=$('input[name="answer[]"]:checked').val();
			}else if($type=='check'){
				val=[],$i=0;
				$('input[name="answer[]"]:checked').each(function(){
					var $this=$(this);
					val[$i]=$this.val();
					$i++;
				});
			}
			var dd={};

			dd.id=$question;
			dd.answer=val;
			if($next){
				dd.next=$next;
			}
			$.post(BASE+'site/home/answer',dd,function(data,status){
				if(status=='success'){
					data=$.parseJSON(data);
					if(data['current']['ID']){
						$test.attr('data-question',data['current']['ID']);
						$test.attr('data-type',data['current']['type']);
						$test.attr('data-num',data['current']['Num']);
						$test.find('.question-text').html(data['current']['Question']);
						$test.find('.q-num').html(data['current']['Num']);
						$test.find('.answer-points>span').html(data['current']['Degree']);
						$test.find('.answer-head').html(data['answer_head']);
						$test.find('.answers-holder').html(data['answers_holder']);
						$('.questions-holder-radio ul').html(data['listoptions']);
						$('.slider-main .bar').css('width',data['exam']['questions_stats']['percent']+'%');
						$('.slider-main .result').html(data['exam']['questions_stats']['percent']+'%');
						if(data['exam']['questions_stats']['not_answered']<=1){
							$('.actions-holder .finish').show()
							$('.actions-holder .next-btn').hide();
						}else{
							$('.actions-holder .finish').hide()
							$('.actions-holder .next-btn').show();
						}
					}
				if($f!=null){
					$f();
				}
				}
			})
		}
	}

	$('body').on('click','.finish',function(){
		// alert('aaa');
		saveAnswer(0,function(){
			// alert('aa');
			$.post(BASE+'/site/home/finishExam1',{},function(data,status){
				if(status=='success' && data!=''){
					var $data=$.parseJSON(data);
					if($data['action']=='show-modal'){
						$('.modal .cont').html($data['msg']);
						$('.modal').modal('show');
					}
				}
			})
		});
	})

})
