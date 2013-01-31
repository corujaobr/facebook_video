<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Get Facebook Video Direct Download Link</title>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen"/>
    <style>
      #circularG{
        position:relative;
        width:64px;
        height:64px}

      .circularG{
        position:absolute;
        background-color:#76aa64;
        width:15px;
        height:15px;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        -webkit-animation-name:bounce_circularG;
        -webkit-animation-duration:0.96s;
        -webkit-animation-iteration-count:infinite;
        -webkit-animation-direction:linear;
        -moz-animation-name:bounce_circularG;
        -moz-animation-duration:0.96s;
        -moz-animation-iteration-count:infinite;
        -moz-animation-direction:linear;
        border-radius:10px;
        -o-animation-name:bounce_circularG;
        -o-animation-duration:0.96s;
        -o-animation-iteration-count:infinite;
        -o-animation-direction:linear;
        -ms-animation-name:bounce_circularG;
        -ms-animation-duration:0.96s;
        -ms-animation-iteration-count:infinite;
        -ms-animation-direction:linear;
      }

      #circularG_1{
        left:0;
        top:25px;
        -webkit-animation-delay:0.36s;
        -moz-animation-delay:0.36s;
        -o-animation-delay:0.36s;
        -ms-animation-delay:0.36s;
      }

      #circularG_2{
        left:7px;
        top:7px;
        -webkit-animation-delay:0.48s;
        -moz-animation-delay:0.48s;
        -o-animation-delay:0.48s;
        -ms-animation-delay:0.48s;
      }

      #circularG_3{
        top:0;
        left:25px;
        -webkit-animation-delay:0.6s;
        -moz-animation-delay:0.6s;
        -o-animation-delay:0.6s;
        -ms-animation-delay:0.6s;
      }

      #circularG_4{
        right:7px;
        top:7px;
        -webkit-animation-delay:0.72s;
        -moz-animation-delay:0.72s;
        -o-animation-delay:0.72s;
        -ms-animation-delay:0.72s;
      }

      #circularG_5{
        right:0;
        top:25px;
        -webkit-animation-delay:0.8400000000000001s;
        -moz-animation-delay:0.8400000000000001s;
        -o-animation-delay:0.8400000000000001s;
        -ms-animation-delay:0.8400000000000001s;
      }

      #circularG_6{
        right:7px;
        bottom:7px;
        -webkit-animation-delay:0.96s;
        -moz-animation-delay:0.96s;
        -o-animation-delay:0.96s;
        -ms-animation-delay:0.96s;
      }

      #circularG_7{
        left:25px;
        bottom:0;
        -webkit-animation-delay:1.0799999999999998s;
        -moz-animation-delay:1.0799999999999998s;
        -o-animation-delay:1.0799999999999998s;
        -ms-animation-delay:1.0799999999999998s;
      }

      #circularG_8{
        left:7px;
        bottom:7px;
        -webkit-animation-delay:1.2s;
        -moz-animation-delay:1.2s;
        -o-animation-delay:1.2s;
        -ms-animation-delay:1.2s;
      }

      @-webkit-keyframes bounce_circularG{
        0%{
        -webkit-transform:scale(1)}

      100%{
        -webkit-transform:scale(.3)}

      }

      @-moz-keyframes bounce_circularG{
        0%{
        -moz-transform:scale(1)}

      100%{
        -moz-transform:scale(.3)}

      }

      @-o-keyframes bounce_circularG{
        0%{
        -o-transform:scale(1)}

      100%{
        -o-transform:scale(.3)}

      }

      @-ms-keyframes bounce_circularG{
        0%{
        -ms-transform:scale(1)}

      100%{
        -ms-transform:scale(.3)}

      }

    </style>
    <script src="js/jquery.js" ></script>
<!--    <script src="js/bootstrap.js" ></script>-->
    <script src="js/bootstrap-tooltip.js" ></script>
    <script src="js/bootstrap-popover.js" ></script>
    <script src="js/jquery.validate.js" ></script>
    <script>
      
      function getDownloadLink(){
        var vid_url = $("#video_link_id").val();
        
        $("#ajaxLoadHolder").show();
        $("#popover_info").html("Grabbing Link ...");
        $("#popover_info").attr("disabled","disabled");
        
        $.ajax({
          type:"POST",
          dataType:'json',
          url:'get_link.php',
          data:{url:vid_url},
          success:function(data){
            console.log(data);
            $("#ajaxLoadHolder").hide();
            
            if(data.type=="success") {
//              var vid_title = '<h2>'+data.title+'</h2><br/>';
              var content = '<textarea rows="4" cols="40" class="input-xxlarge span12 pull-right">';
              content += data.download_url;
              content +=  '</textarea>';
//              var image_link = '<img src="'+data.thumbnail+'" width="320" height="240" alt="Video Thumbnail"/><br/>';
              $("#downloadUrl").html(content+'<h3><a href="'+data.download_url+'">'+data.download_url+'</a></h3>');
//              $("#downloadUrl").html('<h3><a href="'+data.download_url+'">'+data.download_url+'</a></h3>');
            }
            
            if(data.type=="failure"){
              $("#downloadUrl").html('<h3>'+data.download_url+'</h3>');
            }
            
            $("#popover_info").html("Get Download Link");
            $("#popover_info").removeAttr("disabled");
          }
        })
      }
      
      $(document).ready(function(){
        $("#urlForm").validate();
        $("#ajaxLoadHolder").hide();
        $("#popover_info").popover({
          placement:'bottom',
          trigger:'hover',
          title:'Information',
          content:'Enter the full video url then click the "Get Download Link" button.'
        });   
      });
  
    </script>

  </head>
  <body>

    <div class="span12">
      <div class="row-fluid">
        <h1>Extract Unicode  <small>copy and paste the unicode characters extracted from facebook video page</small></h1>
        <form method="post" action="getlink.php" class="form-horizontal" id="urlForm" >
          <div class="control-group">
            
<!--            <div class="controls">-->
              <textarea rows="10" cols="40" class="input-xxlarge span12 pull-right" name="video_link" placeholder="Enter Video Link Here" id="video_link_id">
https\u00253A\u00255C\u00252F\u00255C\u00252Ffbcdn-video-a.akamaihd.net\u00255C\u00252Fcfs-ak-snc6\u00255C\u00252Fv\u00255C\u00252F79236\u00255C\u00252F719\u00255C\u00252F460789193967368_29031.mp4\u00253Foh\u00253Db520be4356d656f8653ee23b5372635f\u002526oe\u00253D50C37EAA\u002526__gda__\u00253D1354987826_24222aef5cf4d0da014cc604f2204cf2</textarea>
<!--            </div>-->
          </div>
          <div class="control-group">
            <p id="downloadUrl"></p>
            <div id="ajaxLoadHolder">
                
              <div id="circularG">
                <div id="circularG_1" class="circularG">
                </div>
                <div id="circularG_2" class="circularG">
                </div>
                <div id="circularG_3" class="circularG">
                </div>
                <div id="circularG_4" class="circularG">
                </div>
                <div id="circularG_5" class="circularG">
                </div>
                <div id="circularG_6" class="circularG">
                </div>
                <div id="circularG_7" class="circularG">
                </div>
                <div id="circularG_8" class="circularG">
                </div>
              </div>
                <h2>Retrieving Download Link</h2>
            </div>
          </div>
          
            <a id="popover_info" href="javascript:void(0);" class="btn btn-success btn-block btn-large" rel="popover" data-content="Enter the full video url in the above input box then click the Get Download Link button." data-original-title="How to Use" onclick="getDownloadLink();">Get Download Link</a>
          
        </form>
      </div>
    </div>
  </body>
</html>
