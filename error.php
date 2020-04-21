<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>
</head>
<body>

<h2 align="center"><a href="profile.php">Chat</a></h2></th>
<div id="talkingset"></div>
         <div class="mesgs" >
          <div id="user_chat" class="msg_history" style="background-color: white;">
          <img src="s/1 (1).gif" style="width:100%; height:100%"> 
       

          </div>
          <div id="create_sent_message" style="border: solid lightblue 2px;" ></div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input id="message" type="text" class="write_msg" placeholder="Type a message" />
            <button class="msg_send_btn"  id="send_message" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

 <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script>

   $(document).ready(function(){
    function insert_message(){
   let message=$('#message').val();
 //console.log(message,selectedId);
 if(message !='')
 {
  $.ajax({
         url:"send_message.php",
         method:"POST",
         data:{message:message,receiverid:selectedId},
         dataType:"text",
         success:function(){
          $('#message').val("");
         //console.log("sent message");
         // var height=$('#user_chat').height();
         // console.log(height+100);
         $('#user_chat').scrollTop(9999999);
         }
        })
 }
}
 let messageSystem=setInterval(function(){
  combined_function(messageSystem);
 } ,4000) 

 function combined_function(messageSystem)
{

var selectedId=$('#talkingsetid').attr("name");
//console.log('set talking to'+selectedId);

 checking_typing(selectedId)
 received_msg(selectedId);

function checking_typing(selectedId){ 
  //console.log(id)
  if(selectedId !='undefined')
  {    
$.ajax({
         url:"check_typing.php",
         method:"POST",
         data:{typing:selectedId},
         dataType:"text",
         success:function(data){
    //     console.log(data);
         $('#typing').html(data);
         }
        })
    } 
  }


  function received_msg(selectedId)
  {
  //console.log('You clicked button with ID:' +ne selectedId +' ' +senderId);
  //console.logne(selectedId)
   if(selectedId!='undefined')
  { 
   $.ajax({
         url:"fetch_message.php",
         method:"GET",
         data:{id:selectedId},
         dataType:"text",
         success:function(data){
          $('#user_chat').html(data);
         }
        })
   }
  }
 
};

})
 
</script>