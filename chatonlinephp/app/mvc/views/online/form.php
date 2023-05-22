<?php include './app/mvc/views/Header_Footer/header.php' ?>
<!-- body start -->
<div class="chat-container">
	<div class="header">
		<h2>Chat with <?php echo $name ?> </h2>
		<h3><a href="<?= URL ?>/online/index">back</a></h3>
	</div>
	<div class="chat-box">
	</div>
	<div class="input-box">
		<form>
			<input type="hidden"  class="id" value="<?php echo $id; ?>" />
			<input type="text" class="message" placeholder="Type your message here" />
			<button type="submit" id="btn1">Send</button>
		</form>
	</div>
</div>
<!-- end body -->
<script type="text/javascript">
$(document).ready(function(){
	var id = $('.id').val();
	const chatBox = document.querySelector('.chat-box');
	const inputfield = document.querySelector('.message');
	function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
               }
    $(document).on('click','#btn1',function(e) { 
        e.preventDefault();
        var id = $('.id').val();
        var message = $('.message').val();
        console.log("id: " + id);
        console.log("message: " + message);
        $.ajax({
            url:'<?php echo URL?>/xuly/xuly',
            type:'POST',
            dataType: 'html',
            data: {
                id: id,
                message: message
            }
        }).done(function(ketqua){
			inputfield.value = "";
            $('.chat-box').html(ketqua);
			scrollToBottom();
        });
    });
	setInterval(() => {
	let xhr = new XMLHttpRequest();
	xhr.open("POST", '<?php echo URL?>/xuly/xuly', true);
	xhr.onload = () => {
		if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
			chatBox.innerHTML = xhr.response;
			if(!chatBox.classList.contains('active')){
				scrollToBottom();
			}
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send('id='+id);
}, 500)
chatBox.onmouseenter = () => {
	chatBox.classList.add('active')
}
chatBox.onmouseleave = () => {
	chatBox.classList.remove('active')
}
});
</script>

<?php include './app/mvc/views/Header_Footer/footer.php' ?>
