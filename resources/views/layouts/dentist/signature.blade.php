<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>jQuery Signature Pad & Canvas Image</title>
        <link href="{{URL::asset('dentist/css/jquery.signaturepad.css') }}" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="{{URL::asset('dentist/js/numeric-1.2.6.min.js') }}"></script> 
        <script src="{{URL::asset('dentist/js/bezier.js') }}"></script>
        <script src="{{URL::asset('dentist/js/jquery.signaturepad.js') }}"></script> 
        
        <script type='text/javascript' src="{{URL::asset('dentist/js/html2canvas.js') }}"></script> 
        <script src="{{URL::asset('dentist/js/json2.min.js') }}"></script>
        
        
        <style type="text/css">
            body{
                font-family:monospace;
                text-align:center;
            }
            #btnSaveSign {
                color: #fff;
                background: #f99a0b;
                padding: 5px;
                border: none;
                border-radius: 5px;
                font-size: 20px;
                margin-top: 10px;
            }
            #signArea{
                width:304px;
                margin: 50px auto;
            }
            .sign-container {
                width: 60%;
                margin: auto;
            }
            .sign-preview {
                width: 150px;
                height: 50px;
                border: solid 1px #CFCFCF;
                margin: 10px 5px;
            }
            .tag-ingo {
                font-family: cursive;
                font-size: 12px;
                text-align: left;
                font-style: oblique;
            }
        </style>
    </head>
    <body>    
    
        <div id="signArea" >
            <h2 class="tag-ingo">Put signature below,</h2>
            <div class="sig sigWrapper" style="height:auto;">
                <div class="typed"></div>
                <canvas class="sign-pad" id="sign-pad" width="300" height="100"  ></canvas>
                <input type="hidden" name="img_data">
            </div>
        </div>
        
        <button id="SaveSign">Save</button>

         
       
        

       
        <script>
            $(document).ready(function() {
                $('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
            });
        
            $("#SaveSign").click(function(e){

                html2canvas([document.getElementById('sign-pad')], {
                    onrendered: function (canvas){       
                        var canvas_img_data = canvas.toDataURL('image/png');
                        var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
                        // console.log(img_data);
                        // ajax call to save image inside folder
                        // var sign = {{url::asset('/sign')}}
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url:'/signature/',
                            data: {img_data:img_data},
                            type: 'post',
                            dataType: 'json',
                            success: function (response) {
                               
                               

                              window.location.reload();
                            }
                        });
                    }
                });
            });
          </script> 
        
 
    </body>
</html>