@extends('layout.index')

@section('content')
<div class="container">

    <!-- slider -->
    @include('layout.slide')
    <!-- end slide -->

    <div class="space20"></div>

    <div class="row main-left">
        @include('layout.menu')

        <div class="col-md-9">
            <div class="panel panel-primary">            
                <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                    <h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
                </div>
        
                <div class="panel-body">
                    <!-- item -->
                    <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
                    
                    <div class="break"></div>
                        <h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                    <p>54 Phố Triều Khúc, Thanh Xuân, Hà Nội </p>
        
                    <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                    <p>linhdn1198@gmail.com </p>
        
                    <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                    <p>0368 616 260</p>
        
        
        
                    <br><br>
                    <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                    <div class="break"></div><br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.194012164835!2d105.79659391540194!3d20.984858694650445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc6c44959d5%3A0xd7edcdb815622dd1!2zNTQgUGjhu5EgVHJp4buBdSBLaMO6YywgVGhhbmggWHXDom4gTmFtLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1547392989010" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection