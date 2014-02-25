
function get_now(){
	var my_time = new Date();
	var my_year = my_time.getFullYear();
	var my_mouth = my_time.getMonth();
	var my_data = my_time.getDate();
	var my_hours = my_time.getHours();
	var my_minutes = my_time.getMinutes();
	var my_seconds = my_time.getSeconds();
	return my_year+'-'+my_mouth+'-'+my_data+'-'+my_hours+'-'+my_minutes+'-'+my_seconds;

}

$('#case_play_btn').on('click',function(){
	var my_now = get_now();
	var case_textarea = $('#case_textarea').val();
	// alertify.log(my_now);
	$('.event').last().after('<div class="event"><div class="label"><i class="circular pencil icon"></i></div><div class="content"><div class="summary"><a>WQZ</a>:  click pass</div><div class="date">'+my_now+'</div><div class="extra text">'+case_textarea+'</div></div></div>');
});

$('#case_stop_btn').on('click',function(){
	var my_now = get_now();
	var case_textarea = $('#case_textarea').val();
	// alertify.log('in stop');
	$('.event').last().after('<div class="event"><div class="label"><i class="circular pencil icon"></i></div><div class="content"><div class="summary"><a>WQZ</a>:  click stop</div><div class="date">'+my_now+'</div><div class="extra text">'+case_textarea+'</div></div></div>');
	
});