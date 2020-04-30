<div id="chat_box" class="chat_box pull-right" style="display: none; ">
    <div class="row" style="width:315px; position:relative; left:19px;top:25px;">
        <div class="col-xs-12 col-md-12">
                <div class="panel panel-default" style="background:transparent; border:none">
                    <div class="panel-heading" style="background:none; position:relative; border:none; top:-140px;">
                        <!--<h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat with <i class="chat-user"></i> </h3>-->
                        <span class=" pull-right close-chat">
                          
                            <div id="close">
								<div class="cy"></div>
                                <div class="cx"></div>	
                            </div>  
                              
                        </span>
                             
                    </div>
                    <div class="panel-body chat-area" style="height:260px;">

                    </div>
                    <div class="panel-footer" style="height:60px; background:none; border:none">
                        <div class="input-group form-controls" style="height:60px">
                            <input class="form-control input-sm chat_input"  style="border:none" placeholder="Mensagem..."></input>
                            <span class="input-group-btn">
                                    <button class="btn btn-primary btn-sm btn-chat" type="submit" data-to-user="" disabled>
                                        <img src="{{url('ico/send-message.png ')}}" style="position:relative; position:relative; top:8px; max-width: 60px; height: 30px;">
                                    </button>
                                </span>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <input type="hidden" id="to_user_id" value="" />
</div>