
// 刪除
$(document).ready(function(){
    $('.delete').click(function(){
        let delete_id = $(this).parent().parent().attr('id');
        let $delete_ele = $(this).parent().parent();
        let  r=confirm("確認刪除資料?");
        if (r==true)
        {
            $.ajax({
                url:'delete.php',
                type:'POST',
                data:'delete_id='+delete_id,
    
                success: function(){    
                    $delete_ele.fadeOut(2000).remove();
                }
    
            });
        }

    });
});

// 更新
//顯示更新前資料
$(document).ready(function(){
    $('.get').click(function(){
        let update_id = $(this).parent().parent().attr('id');
        $.ajax({
            url:'get.php',
            type:'POST',
            dataType: 'JSON',
            data:'update_id='+update_id,
            success:function(response) {
                $("#get_account").val(response.account);
 
                $("#get_name").val(response.name);
 
                $("#get_birthday").val(response.birthday);
 
                $("#get_email").val(response.email);  

                $("#get_memo").val(response.memo);  

                if(response.gender == "女") {
                    $("#get_girl").prop("checked", true);
                    $("#get_boy").prop("checked", false);
                }
                else {
                    $("#get_girl").prop("checked", false);
                    $("#get_boy").prop("checked", true);
                }


            } // /success

        });
    });
});

