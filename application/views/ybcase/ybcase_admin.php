<div class="ui inline grid">
	<!-- <div class="eight  wide column"> -->
		<div class="ui secondary vertical menu four wide column">
			<a my_href="mktp" class="case active teal item">
    			Make Template
  			</a>

  			<a my_href="mkflow" class="case  teal item">
    			Make Flow
  			</a>
  			
  			<a my_href="power" class="case teal item">
    			Power
 			 </a>
  
		</div>
		<div  id="mktp" class="case eight wide column">
			<div class="ui form segment">
				<div class="field">
					<label></label>
					<textarea id="mktp_textarea" placeholder="Enter Template e.g: publish_files：xxx"></textarea>
				</div>
				<div class="field">
					<div class="input">
						<input id="mktp_input" type="text" placeholder="Enter Template Name">
					</div>
				</div>
				<div class="right field">
					<div id="mktp_btn" class="ui green button">
						Make Template
					</div>
				</div>
			</div>
		</div>
		<div id="mkflow" class="case eight wide column" style="display: none;">
			<div class="ui segment">
				<p>mkflow</p>
			</div>
		</div>
		<div id="power" class="case eight wide column" style="display: none;">
			<div class="ui segment">
				<p>power</p>
			</div>
		</div>

	</div>

	<!-- <div id="mktp" class="case eight wide column" >
		<div class="case ui segment">
			<p>template</p>
		</div>
	</div>
	<div id="mkflow" class="case eight wide column" style="display: none;">
		<div class="ui segment">
			<p>mkflow</p>
		</div>
	</div>
	<div id="power" class="case eight wide column" style="display: none;">
		<div class="ui segment">
			<p>power</p>
		</div>
	</div> -->

<!-- </div> -->

<script type="text/javascript">
	$('a.case').on('click',function(){
		$('a.case').removeClass('active');
		$(this).addClass('active');
		$('div.case').hide();
		var which_id = $(this).attr('my_href');
		$('#'+which_id).show();
		// alertify.log($(this).attr('my_href'));
	});


</script>
<script type="text/javascript" src="/res/ybcase/caseadmin.js"></script>