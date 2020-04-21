
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TRAVELLER</title>

    <link href="decoration/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="decoration/css/style.css" rel="stylesheet">
    <link href="decoration/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <style >
          .dot {
                height: 15px;
                width: 15px;
               position: top:20px;
                border-radius: 70%;
                display: inline-block;
                margin-left: 5px;
                }
                .inbox_people {
  background: white none repeat scroll 0 0;
  float: left;
  overflow: auto;
  border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
  
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4; }

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 10px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 100%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 550px;
  overflow-y: auto;

}

  .posts{
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
  }
  .like-comment{
    font-size: 10px;
    color:#333;
    padding-bottom: 40px;
    font-weight: bold;
  }



    </style>
<body style="background-color:#fafafa;">
	<h1 align="center" ><a href="user_index.php">MESSAGE</a></h1>
           
    
        <div class="container-fluid">
  <div class="row">

    <div class="col-6 col-md-4" style="padding-top: 29px; ">
      <div class="inbox_people" style="border: solid pink 2px; height: 560px ">
          <div class="headind_srch">
            
            <div class="recent_heading">
              <input type="text" id="instgramid" name="instgramid" placeholder="serach insta name" style="width: 150px;">
              <h4 id="instgram">Insta</h4>
            </div>
           <!--  <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" id="search_user" class="search-bar"  placeholder="Search" >
                 </div>
            </div> -->
          </div>
        <div id="messageId" >
        
      </div>
        </div>
      
    </div>
    <div class="col-12 col-sm-6 col-md-8">
       <div id="talkingset"></div>
         <div class="mesgs" >
          <div id="user_chat" class="msg_history" style="background-color: white;">
          <img src="s/1 (1).gif" style="width:100%; height:100%"> 
       

          </div>
          <div id="create_sent_message" style="border: solid lightblue 2px;" ></div>
          <!-- <div class="type_msg">
            <div class="input_msg_write">
              <input id="message" type="text" class="write_msg" placeholder="Type a message" />
            <button class="msg_send_btn"  id="send_message" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div> -->
        </div>
	
 </div>
  
</div>
  </div>
</body>
</html>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

 <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script>
  $(document).ready(function(){

fetch_message_user();
function fetch_message_user(){
  $.ajax({
         url:"fetxh_message_user.php",
         method:"POST",
         dataType:"text",
         success:function(data){
         $('#messageId').html(data)
         }
        })  
     }
   



$(document).on('click','.start_chat',function(){ 
  //  console.log('You clicked button with ID:' + this.id); 
    selectedId =this.id;
    let senderId =$('input[name="session_id"]').val();
    //console.log(selectedId);
console.log('i seleted a person'+selectedId);
$('#talkingset').html('<input type="hidden" id="talkingsetid" name='+selectedId+' >')

$('#create_sent_message').html('<div class="type_msg"><div class="input_msg_write"><input id="message" type="text" class="write_msg" placeholder="Type a message" /> <button class="msg_send_btn"  id="send_message" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button></div></div>');

$('#send_message').on('click',insert_message);

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
 
 else
 {
  $('#message').attr('placeholder',"please write something in text box");
 }


}

combined_function();
$('#user_chat').scrollTop(999999);


let messageSystem=setInterval(function(){
  combined_function(messageSystem);
 } ,4000) 
 });


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


$('#instgram').on('click',function()
  {
    console.log("clearInterval")
    clearInterval(messageSystem);
  })

}




function typing_notification(){

let idofmessage=$('#message').on('input',function(){
let messagetype=$(this).val();
if(messagetype =='')
{
  $.ajax({
         url:"typing_notification.php",
         method:"POST",
         data:{typing:'0'},
         dataType:"text",
         success:function(data){
//        console.log("typing"+data);
         }
        })

}
else{
  $.ajax({
         url:"typing_notification.php",
         method:"POST",
         data:{typing:'1'},
         dataType:"text",
         success:function(data){
  //       console.log("no typing"+data);
         }
        })

}

});

 // console.log(message);
 }



  // let search_user=$('#search_user').on('input',function(){

 

  setInterval(function(){
    typing_notification();
     fetch_message_user();  
 //  checking_typing(talking_to);
  } ,5000);





$('#instgram').on('click',function(){
  let post='<div class="container" style="margin-bottom:20px;padding:50px;width:100%; height:100%;"> <div class="row"><div class="col-md-3"><img id="profile-pic" src="" style="height:140px;width:140px;border-radius:50%;" style="border-radius:50%;"></div><div class="col-md-9"><h2 class="username"></h2><div class="row"><div class="col-md-4"> <span class="number-of-posts"></span> posts  </div> <div class="col-md-4"> <span class="followers"></span> followers</div><div class="col-md-4"><span class="following"></span> following</div></div><div class="row" style="margin-top:60px;"><h4 class="name"></h4></div><div class="row"><h4 class="biography"></h4></div><br><hr><br><div class="row"><p>POSTS</p></div><div class="row posts"></div></div></div></div>';
  $('#user_chat').html(post);
let instgramid=$('#instgramid').val();
    function nFormatter(num){
    if(num >= 1000000000){
      return (num/1000000000).toFixed(1).replace(/\.0$/,'') + 'G';
    }
    if(num >= 1000000){
      return (num/1000000).toFixed(1).replace(/\.0$/,'') + 'M';
    }
    if(num >= 1000){
      return (num/1000).toFixed(1).replace(/\.0$/,'') + 'K';
    }
    return num;
  }
  $.ajax({
    url:"https://www.instagram.com/"+instgramid+"?__a=1",
    type:"get",
    
     success:function(response){
      //console.log(response)
      $("#profile-pic").attr('src',response.graphql.user.profile_pic_url);
      $(".name").html(response.graphql.user.full_name);
      $(".biography").html(response.graphql.user.biography);
      $(".username").html(response.graphql.user.username);
      $(".number-of-posts").html(response.graphql.user.edge_owner_to_timeline_media.count);
      $(".followers").html(nFormatter(response.graphql.user.edge_followed_by.count));
      $(".following").html(nFormatter(response.graphql.user.edge_follow.count));
      posts = response.graphql.user.edge_owner_to_timeline_media.edges;
      posts_html = '';
      for(var i=0;i<posts.length;i++){
        url = posts[i].node.display_url;
        likes = posts[i].node.edge_liked_by.count;
        comments = posts[i].node.edge_media_to_comment.count;
        posts_html += '<div class="col-md-4 equal-height"><img style="min-height:50px;background-color:#fff;width:100%;" src="'+url+'"><div class="row like-comment"><div class="col-md-6">'+nFormatter(likes)+' LIKES</div><div class="col-md-6">'+nFormatter(comments)+' COMMENTS</div></div></div>';
      }
      console.log(posts_html)
      $(".posts").html(posts_html);
    }
   })
})



  })

 

</script>


