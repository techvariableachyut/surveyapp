<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Survey</title>
  <script src="/js/jquery.min.js"></script>
</head>

<body>

<style type="text/css">
	.container{
		width: 70%;
		margin: 5% 15%;
	}
	.input,select{
		border:1px solid #ccc;
		height: 2em;
		margin:5px 0px;
		padding: 1px 10px;
		border-radius: 2px;
		width: 30%;
	}
	.miniInput{
		padding: 2px 5px;
		background: #f4f4f4;
		border: 1px solid #ccc;
		position: relative;
		left: 2em;
	}
	.addmore{
		padding: 2px 5px;
		background: #f4f4f4;
		border-radius:2px;
		color: black;
		text-align: center;
		width: 30%;
		display: none;
	}
	.addmore:hover{
		cursor: pointer;
	}
</style>
<div class="container">
	<form method="post" action='{{ route("questions.store") }}'>
		<div>
			<select name="section">
				@foreach($sections as $section)
					<option value="{{ $section->id }}">{{ $section->name }}</option>
				@endforeach
			</select>
		</div>
		<div>
			<input class="input" type="text" name="title" placeholder="Input title">
		</div>
		<div>
			<select name="type" id="type">
				<option>Select type</option>
				<option>Drop down</option>
				<option>Textbox</option>
				<option>Time selector</option>
				<option>Date selector</option>
				<option>Drop down</option>
				<option>Drop down -- choose one only</option>
			</select>
		</div>

		<div class="dynamicDom">
			<div class="addmore">+</div>
		</div>

		<div>
			<label>Questions for each if required?</label>
			<input type="radio" name="ifForEach" value="true">Yes
			<input type="radio" name="ifForEach" value="false">No
		</div>
		{{ csrf_field() }}
		<button>Submit</button>
	</form>
</div>
<script>
(function(){
    var toggle = {
        init: function(){
            this.cacheDom();
            this.bindEvent();
            this.render();
        },
        cacheDom: function(){
            this.$type = $("#type");
            this.$dynamicDom = $(".dynamicDom");
            this.$addmore = this.$dynamicDom.find(".addmore");
            // this.$account = this.$nav.find(".myaccount");
            // this.$showaccount = this.$nav.find(".showaccount");
        },
        bindEvent:function(){
            this.$type.change(function() {
            	var str = $("#type option:selected" ).text();
			  	if (str == "Drop down"){
			  		renderInDom();
			  		$(".addmore").show();
			  	}
			});

			this.$addmore.click(function(){
				renderInDom();
			});
        },
        render:function(){
            // this.$showaccount.toggle();
        }
    }

    toggle.init();
})()

function renderInDom(){
	var dom = $(".dynamicDom");
	dom.append("<input type='text' name='dropdownvalues[]' class='miniInput' required><br>");
}
</script>
</body>
</html>