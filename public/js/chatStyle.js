/*function openChat()
{
    document.getElementById("chat").hidden = false;
}*/



$(document).ready(function(){
	
   var preloadbg = document.createElement("img");
   //preloadbg.src = "../public/img/chat/chat_background.png";

    
      $("#searchfield").focus(function(){
          if($(this).val() == "Procurar contatos..."){
              $(this).val("");
          }
      });
      $("#searchfield").focusout(function(){
          if($(this).val() == ""){
              $(this).val("Procurar contatos...");
              
          }
      });
      
      $("#sendmessage input").focus(function(){
          if($(this).val() == "Enviar mensagem..."){
              $(this).val("");
          }
      });
      $("#sendmessage input").focusout(function(){
          if($(this).val() == ""){
              $(this).val("Enviar mensagem...");
              
          }
      });
          
      
      $(".friend").each(function(){		
          $(this).click(function(){
              var childOffset = $(this).offset();
              var parentOffset = $(this).parent().parent().offset();
              var childTop= childOffset.top - parentOffset.top;
              var clone = $(this).find('img').eq(0).clone();
              var top = childTop+12+"px";
              
              $(clone).css({'top': top}).addClass("floatingImg").appendTo("#chatbox");									
              
              setTimeout(function(){$("#profile p").addClass("animate");$("#profile").addClass("animate");}, 100);
              setTimeout(function(){
                  $("#chat-messages").addClass("animate");
                  $('.cx, .cy').addClass('s1');
                  setTimeout(function(){$('.cx, .cy').addClass('s2');}, 100);
                  setTimeout(function(){$('.cx, .cy').addClass('s3');}, 200);			
              }, 150);														
              
              $('.floatingImg').animate({
                  'width': "68px",
                  'left':'108px',
                  'top':'20px'
              }, 200);
              
              var name = $(this).find("p strong").html();
              var email = $(this).find("p span").html();														
              $("#profile p").html(name);
              $("#profile span").html(email);			
              
              $(".message").not(".right").find("img").attr("src", $(clone).attr("src"));									
              $('#friendslist').fadeOut();
              $('#chatview').fadeIn();
          
              
              $('#close').unbind("click").click(function(){				
                  $("#chat-messages, #profile, #profile p").removeClass("animate");
                  $('.cx, .cy').removeClass("s1 s2 s3");
                  
                  $('.floatingImg').animate({
                      'width': "40px",
                      'top':top,
                      'left': '12px'
                  }, 200, function(){$('.floatingImg').remove()});				
                  
                  setTimeout(function(){
                      $('#chatview').fadeOut();
                      $('#friendslist').fadeIn();				
                  }, 50);
              });
              
          });
      });			
  });

  function change(x)
  {
    if(x == "chats")
    {
        document.getElementById('friends').hidden=true;        
        document.getElementById('chats').hidden=false;

        var img = document.createElement('img');
        img.src='../public/img/chat/top-menu.png';

        

        img.onload = function(e){
            $(".chats").css({ 
                'background': 'url("../public/img/chat/top-menu.png") no-repeat',
               
            });
           $(".chats").css({backgroundPosition: '-95px -118px'});
           
           $(".friends").css({ 
            'background': 'url("../public/img/chat/top-menu.png") no-repeat',
            });
            $(".friends").css({backgroundPosition: '-3px 25px'});
        };
        
        img.onerror = function(e) {
            $(".chats").css({ 
                'background': 'url("../img/chat/top-menu.png") no-repeat',
               
            });
           $(".chats").css({backgroundPosition: '-95px -118px'});
           
           $(".friends").css({ 
            'background': 'url("../img/chat/top-menu.png") no-repeat',
            });
            $(".friends").css({backgroundPosition: '-3px 25px'});
        };
    }
    else if(x == "friends")
    {
        document.getElementById('friends').hidden=false;
        document.getElementById('chats').hidden=true;
       
        var img = document.createElement('img');
        img.src='../public/img/chat/top-menu.png';

        

        img.onload = function(e){
            $(".chats").css({ 
                'background': 'url("../public/img/chat/top-menu.png") no-repeat',
               
            });
            $(".chats").css({backgroundPosition: '-95px 25px'});
    
            $(".friends").css({ 
            'background': 'url("../public/img/chat/top-menu.png") no-repeat',
            });
            $(".friends").css({backgroundPosition: '-3px -118px'});
        };

        img.onerror = function(e) {
            $(".chats").css({ 
                'background': 'url("../img/chat/top-menu.png") no-repeat',
               
            });
            $(".chats").css({backgroundPosition: '-95px 25px'});
    
            $(".friends").css({ 
            'background': 'url("../img/chat/top-menu.png") no-repeat',
            });
            $(".friends").css({backgroundPosition: '-3px -118px'});
        };
        
    }
       
  }

function atualizacaMensagensNL(usuario_mensagemNL, usuario){
    let span = document.getElementById("contadorTotal");

    var mensagens = document.getElementById('contadorTotal2').value;
    mensagens = parseInt(mensagens) - parseInt(usuario_mensagemNL);
    span.textContent = mensagens;

    document.getElementById(usuario).remove();
    document.getElementById('contadorTotal').value = mensagens;
}