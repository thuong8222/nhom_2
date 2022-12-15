  <div class="cartoon">
      <div class="cartoon__container">
          <div class="cartoon__content">
              <div class="cartoon__content-img">
                  <img src="./img/cartoon-1.png" alt="" />
              </div>
              <p>
                  Tiết kiệm hơn từ 10-50% so với mua hàng trực tiếp với nhiều chương
                  trình Sale-off.
              </p>
          </div>
          <div class="cartoon__content">
              <div class="cartoon__content-img">
                  <img src="./img/cartoon-2.png" alt="" />
              </div>
              <p>
                  Đặt hàng nhanh chóng thuận tiện qua điện thoại hoặc đăng ký đơn hàng
                  online.
              </p>
          </div>
          <div class="cartoon__content-right">
              <div class="cartoon__content-img">
                  <img src="./img/cartoon-3.png" alt="" />
              </div>
              <p>
                  Chất lượng đảm bảo vệ sinh an toàn thực phẩm, được cơ quan chức năng
                  kiểm định.
              </p>
          </div>
      </div>
  </div>
  <div class="footer">
      <div class="footer__container">
          <div class="footer__infomation">
              <p>Thông tin gửi tới khách hàng</p>
              <span>
                  Để biết các chương trình khuyến mại đang diễn ra, vui lòng Inbox
                  hoặc Gọi điện cho bộ phận chăm sóc khách hàng của FastFood để cập
                  nhật.
              </span>
          </div>
          <div class="footer__call">
              <div class="call__content">
                  <p class="call__content-heading">Chăm sóc khách hàng</p>
                  <span>
                      FastFood1 <br />
                      +0123 456 789
                  </span>
                  <br />
                  <br />
                  <span>
                      Fastood <br />
                      +0123 456 789
                  </span>
                  <br />
                  <br />
                  <span>FastFood@gmail.com</span>
                  <br />
                  <br />
                  <div class="footer__icon">
                      <a href="https://www.facebook.com/"><i class="fa fa-facebook-square"></i></a>
                      <a href="https://twitter.com/?lang=vi"><i class="fa fa-twitter-square"></i></a>
                      <a href="https://www.skype.com/en/"><i class="fa fa-instagram"></i></a>
                      <a href="https://www.youtube.com/"><i class="fa fa-google-plus"></i></a>
                      <a href="https://www.google.com/intl/vi/gmail/about/#"><i class="fa fa-envelope"></i></a>
                  </div>
              </div>
          </div>
          <div class="footer__address">
              <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3722.902265456926!2d105.7706140147852!3d21.076565391520788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345530e4f336e1%3A0x72461bc07bc0dfc9!2zOTAgTmcuIDEgUC4gVsSDbiBI4buZaSwgxJDDtG5nIE5n4bqhYywgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1632967965060!5m2!1svi!2s"
                  width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy">
              </iframe>
          </div>
      </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
  </script>
  <script type="text/javascript">
$(document).ready(function() {
    $("#search").keypress(function() {
        $.ajax({
            type: 'POST',
            url: 'search.php',
            data: {
                name: $("#search").val(),
            },
            success: function(data) {
                $("#output").html(data);
            }
        });
    });
});
  </script>
  </body>

  </html>