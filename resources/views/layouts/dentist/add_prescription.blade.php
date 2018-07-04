@extends('layouts.dentist.master')
@section('content')
    
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
        <div class="container">
            <div class="form">
                <div class="panel1">
                    <div class="card-body">
                        <div class="header"><h2>Add Prescription</h2></div>
                      
                        <form method="post" id="form" action="{{url('/add_prescription',['id' => $data->id ]) }}">
             
                            {{csrf_field()}} 

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label><h4>Prescription </h4></label>
                                        <input class="form-control" id="prescription" name="prescription" value="{{ $data->prescription }}" type="text">

                                    </div>
                                </div> 
                            </div>                      
                            <div id="signArea" >
                                <h2 class="tag-ingo">Put signature below,</h2>
                                <div class="sig sigWrapper" style="height:auto;">
                                    <div class="typed"></div>
                                    <canvas class="sign-pad" id="sign-pad" width="300" height="100" name="signature">                                        
                                    </canvas>                                    
                                </div>
                            </div>
                            <button id="SaveSign" name="submit" value="submit">Save</button>
                        </form>

                        <script>
                            
                            $(document).ready(function() {
                                $('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
                            });

                            $("#SaveSign").click(function(e){


                                html2canvas([document.getElementById('sign-pad')], {
                                    onrendered: function (canvas){       
                                        var canvas_img_data = canvas.toDataURL('image/png');
                                        var signature = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
                                        var prescription = $("#prescription").val();
                                       
                                            
                                        
                                        $.ajax({
                                            headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')                                 
                                            },
                                            url:'/add_prescription/'+'id',
                                            data:{signature:signature,prescription:prescription},
                                            type:'post',
                                            dataType:'json',
                                            success: function (response) {
                                                 

                                                                             
                                                // window.location.reload();
                                            }
                                        });
                                        
                                    }
                                });
                            });
                        </script> 
                    </div>
                </div>
            </div>
        </div>

@endsection		

	