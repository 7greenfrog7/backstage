/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$("#onekey-account").click(function() {
  //alert($("#account_pwd").val());
  $.post("index.php?r=presignupinfo/onekeyaccount",{account_user_type:$("#account_user_type").val(),account_pwd:$("#account_pwd").val()},  function(data){  
    alert(data.msg);
    //if(data.msg == 'ok!') {  
      //  alert(data.msg);  
    //}  
    //window.location.reload();  
}, 'json');  
});

