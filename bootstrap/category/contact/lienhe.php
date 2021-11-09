<?php include("../../menu.php");?>
<!DOCTYPE html>
<html>
<head>
    <title>Nowfood Liên hệ</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/contact.css">
    

</head>
<body>
    <iframe src="https://www.google.com/maps/@9.779349,105.6189045,11z?hl=vi-VN" id="map-tru-so"></iframe>
<div class="container contact"style="margin-top: 3rem;">
    <div class="row">
        <div class="col-md-3"id="ctl">
            <div class="contact-info">
                <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                <h2>Liên hệ</h2>
                <h4>Chúng tôi sẵn sàng lắng nghe bạn !</h4>
            </div>
        </div>
        <div class="col-md-9" id="ctr">
            <div class="contact-form">
                
                <div class="form-group">
                  <label class="control-label col-sm-2" for="fullname">Họ và tên :</label>
                  <div class="col-sm-10">          
                    <input type="text" class="form-control" id="fullname" placeholder="Điền họ tên đầy đủ của bạn" name="fullname">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email:</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Nhập email của bạn" name="email">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="phone"> Số điện thoại:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại của bạn" name="phone">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="address"> Địa chỉ</label>
                  <div class="col-sm-10" style="float: left;">
                    <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ của bạn" name="address">
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("../../footer.php");?>
</body>
</html>