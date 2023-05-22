<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="index-chat">
    <div class="index-main">
    <div class="header-chat">
        <?php if($data !=null)
        {
         foreach($data as $row){ 
            ?>
        <form method="post" action="<?php echo URL ?>/online/index">
            <img src="../public/images/<?php echo $row['image'] ?>">
            <div class="detail">
                <span><?= $row['name'] ?></span>
                <p>Đang hoat động</p>
            </div>
            <button class="btn-logout" type="submit" name="logout" >Đăng xuất</button>
        </form>
     <?php } }else{ echo '0';}?>
    </div>
    <div class="main-chat">
        <div class="search-chat">
            <input type="text" id="search-input" placeholder="nhập tên tìm kiếm">
            <ul id="search-results"></ul>
        </div>
        <?php if($user_all !=null) 
         {
        foreach($user_all as $row) {?>
        <a class="user">
        <input class="idurl" value="<?php echo $row['id'];?>" type="hidden">
        <form class="status-icon">
       <img src="../public/images/<?php echo $row['image']; ?>">
            <div class="detail">
                <span><?php echo $row['name'] ?></span>
                <span id='statusonline'></span>
            </div>
            <div id="status-<?php echo $row['id']; ?>" class="status"></div>
        </form>
        </a>
        <?php } }else{ echo '0';}?>
    </div>
    </div>
   <div class="form-chat-mini">
    <div class="chat">

    </div>
   </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#search-input').on('input', function() {
        $('.user').remove();
        var searchValue = $(this).val().toLowerCase();
        $('#search-results').empty();
        <?php foreach($user_all as $row) { ?>
            var name = '<?php echo $row['name']; ?>'.toLowerCase();
            if(name.includes(searchValue)) {
                var listItem = '<a class="user"><input class="idurl" value="<?php echo $row['id'];?>" type="hidden"><form class="status-icon"><img src="../public/images/<?php echo $row['image']; ?>"><div class="detail"><span><?php echo $row['name'] ?></span><span id="statusonline"></span> </div><div id="status-<?php echo $row['id']; ?>" class="status"></div></form></a>';
                $('#search-results').append(listItem);
            }
        
        <?php } ?>
    });
    $(document).one('click','.user',function(e){     
        e.preventDefault();
        var idurl = $(this).find('.idurl').val();
        $.ajax({
            url:'<?=URL ?>/online/message',
            type:'GET',
            dataType:'html',
            data:{
               idurl:idurl
            }
        }).done(function(ketqua){
            $('.chat').html(ketqua);
        });
        
    });
});
</script>
</body>
</html>