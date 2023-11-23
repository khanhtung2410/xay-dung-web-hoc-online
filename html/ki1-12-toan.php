<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web học trực tuyến</title>
  <link rel="icon" href="/image/icon/dragon-removebg-preview.png">
  <link rel="stylesheet" type="text/css" href="/css/w3.css">
  <link rel="stylesheet" type="text/css" href="/css/dethi.css">
  <link rel="stylesheet" type="text/css" href="/css/navigation-bar.css">
</head>

<body style="background-color: white;">
  <div class="w3-bar " style="background-color: antiquewhite;">
    <a class="w3-bar-item w3-button" href="/html/menu.html"><img class="logo" src="/image/icon/dragon-removebg-preview.png"></a>
    <div class="w3-dropdown-click w3-hide-large w3-hide-medium ">
      <button onclick="menudropdown()" class="w3-button"><img src="/image/icon/menu-bar.png" height="31px"></button>
      <div id="sub-menu" class="w3-dropdown-content w3-bar-block dropdown-menu">
        <div class="w3-dropdown-hover w3-bar-item w3-padding-large">
          <span>Lớp học</span>
          <div class="w3-dropdown-content" style="left: 60px;">
            <div class="hover-drop-toan">
              <span class="w3-padding-large w3-bar-item">Toán</span>
              <div class="lop">
                <a class="w3-bar-item w3-button w3-padding-large" href="/html/lop-thuong.html">Lớp thường</a>
                <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
              </div>
            </div>
            <div class="hover-drop-ly">
              <span class="w3-padding-large w3-bar-item">Lý</span>
              <div class="lop">
                <a class="w3-bar-item w3-button w3-padding-large" href="/html/lop-thuong.html">Lớp thường</a>
                <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
              </div>
            </div>
          </div>
        </div>
        <a class="w3-bar-item w3-button w3-padding-large" href="/html/trangcanhan.html">Thông tin</a>
      </div>
    </div>
    <div class="w3-hide-small dropdown-menu-big">
      <div class="w3-dropdown-hover w3-bar-block w3-padding-large">
        <span>Lớp học</span>
        <div class="w3-dropdown-content" style="left: 67px; margin-top: 10px;">
          <div class="hover-drop-toan">
            <span class="w3-padding-large w3-bar-item">Toán</span>
            <div class="lop">
              <a class="w3-bar-item w3-button w3-padding-large" href="/html/lop-thuong.html">Lớp thường</a>
              <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
            </div>
          </div>
          <div class="hover-drop-ly">
            <span class="w3-padding-large w3-bar-item">Lý</span>
            <div class="lop">
              <a class="w3-bar-item w3-button w3-padding-large" href="/html/lop-thuong.html">Lớp thường</a>
              <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
            </div>
          </div>
        </div>
      </div>
      <a class="w3-bar-item w3-button w3-padding-large" href="/html/trangcanhan.html">Thông tin</a>
      <a class="w3-bar-item w3-button w3-padding-large" href="/html/trangcanhan.html">Hướng dẫn</a>
    </div>

    <div class="authorize">
      <a class="w3-bar-item w3-button w3-right w3-padding-large" onclick="login()" href="/html/dang-nhap.html">Đăng
        nhập</a>
      <a class="w3-bar-item w3-button w3-right w3-padding-large" href="/html/dang-nhap.html">Đăng Ký</a>
    </div>
  </div>
  <div class="clock-wr">
    <p class="time-noti">Thời gian còn:
      <span id="tet"></span>
    </p>
  </div>
  <div class="pop-box">
    <div class="content">
      <p>Bài kiểm tra này gồm 40 câu hỏi về toán.</p>
      <p>Bạn có 90 phút để hoàn thành bài kiểm tra.</p>
      <p>Mỗi câu tương đương với 0,25 điểm với số điểm tối đa là 10.</p>
      <p1>Bắt đầu làm bài ?</p1>
      <div class="choice-wr">
        <button class="yes" onclick="begin()">Vô</button>
        <a href="/html/lop-thuong.html" class="no">Thôi</a>
      </div>
    </div>
  </div>
  <div id="noidung">
    <div class="header">
      <div class="header-content">
        <p>Bài kiểm tra cuối kì 1 toán</p>
      </div>
    </div>
    <form action="/php/score.php" method="post">
      <div class="que-form">
        <p class="debai"><span>Câu 1:</span> Trong các hàm số sau, hàm số nào có đồ thị như hình dưới?</p>
        <div class="q-pic-alg debai"> <img class="q-pic" src="/image/anh-de/de1/pic1-de1.png" alt="ảnh 1"></div>
        <ol class="answer">
          <li><input type="radio" name="q1" value="1"> \(y=x^4-3x^2+2\).</li>
          <li><input type="radio" name="q1" value="2"> \(y=\frac{x+2}{x-2}\).</li>
          <li><input type="radio" name="q1" value="3"> \(y=-x^3+3x^2-1\).</li>
          <li><input type="radio" name="q1" value="4"> \(y=\frac{x-1}{x-2}\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 2:</span> Cho các số thực dương \(a,b\) khác 1. Khẳng định nào sau đây <b>sai</b>?</p>
        <ol class="answer">
          <li><input type="radio" name="q2" value="1"> \(log_{a^3}\,b=\frac13log_a\,b\).</li>
          <li><input type="radio" name="q2" value="2"> \(log_a\,(b^2)=2\,log_a\,b\).</li>
          <li><input type="radio" name="q2" value="3"> \(log_a\,b\cdot log_b\,a=1\).</li>
          <li><input type="radio" name="q2" value="4"> \(log_a\,b=-\,log_b\,a\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 3:</span> Cho hàm số \(y=f(x)\) có đồ thị như bên. Tìm các giá trị của \(m\) để phương
          trình có 1
          nghiệm duy nhất.</p>
        <div class="q-pic-alg debai"> <img class="q-pic" src="/image/anh-de/de1/cau3-de1.png" alt="ảnh 2"></div>
        <ol class="answer">
          <li><input type="radio" name="q3" value="1"> \(m\lt-1\) hoặc \(m \gt2\).</li>
          <li><input type="radio" name="q3" value="2"> \(m\lt-4\) hoặc \(m \gt0\).</li>
          <li><input type="radio" name="q3" value="3"> \(-4\lt m\lt0\).</li>
          <li><input type="radio" name="q3" value="4"> \(m \gt2\) hoặc \(m\lt-4\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 4:</span> Tập xác định của hàm số \(y=ln(2x-1)\) là</p>
        <ol class="answer">
          <li><input type="radio" name="q4" value="1"> \(\left(-\infty\,;\frac12\right]\).</li>
          <li><input type="radio" name="q4" value="2"> \(\left(\frac 12\,;+\infty\right)\).</li>
          <li><input type="radio" name="q4" value="3"> \(\left[\frac 12\,;+\infty\right)\).</li>
          <li><input type="radio" name="q4" value="4"> \(\left(-\infty\,;\frac12\right)\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 5:</span> Cho hàm số \(y=f(x)\) liên tục trên đoạn \([-3;-1]\) có đồ thị như hình vẽ.
          Gọi \(M\) và
          \(m\) lần lượt là giá trị lớn nhất và giá trị nhỏ nhất của hàm số đã cho trên đoạn \([-3;-1]\). Giá trị của
          \(M-m\) bằng
        </p>
        <div class="q-pic-alg debai"> <img class="q-pic" src="/image/anh-de/de1/cau5-de1.png" alt="ảnh 3"></div>
        <ol class="answer">
          <li><input type="radio" name="q5" value="1"> \(8\).</li>
          <li><input type="radio" name="q5" value="2"> \(2\).</li>
          <li><input type="radio" name="q5" value="3"> \(6\).</li>
          <li><input type="radio" name="q5" value="4"> \(4\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 6:</span> Cho phương trình \(25^{x+1}-26.5+1=0\). Đặt \(t=5^x,\,t\gt0\)thì phương trình
          trở thành
        </p>
        <ol class="answer">
          <li><input type="radio" name="q6" value="1"> \(t^2-26t+1=0\).</li>
          <li><input type="radio" name="q6" value="2"> \(25t^2-26t=0\).</li>
          <li><input type="radio" name="q6" value="3"> \(t^2-26t=0\).</li>
          <li><input type="radio" name="q6" value="4"> \(25t^2-26t+1=0\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 7:</span> Cho hình chóp \(S.ABC\) có \(SA\, \bot\, (ABC)\), đáy \(ABC\) là tam giác
          đều. Tính thể
          tích khối chóp \(S.ABC\) biết \(AB=a\,, SA=a\). </p>
        <ol class="answer">
          <li><input type="radio" name="q7" value="1"> \(a^3\).</li>
          <li><input type="radio" name="q7" value="2"> \(\frac{a^3}3\).</li>
          <li><input type="radio" name="q7" value="3"> \(\frac{a^3\sqrt3}4\).</li>
          <li><input type="radio" name="q7" value="4"> \(\frac{a^3\sqrt3}{12}\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 8:</span> Giá trị lớn nhất của hàm số \(y=\frac{2x-1}{x+1}\) trên đoạn \([0;2]\) là</p>
        <ol class="answer">
          <li><input type="radio" name="q8" value="1"> \(\underset{[0;2]}{max}\,y=5\).</li>
          <li><input type="radio" name="q8" value="2"> \(\underset{[0;2]}{max}\,y=1\).</li>
          <li><input type="radio" name="q8" value="3"> \(\underset{[0;2]}{max}\,y=-2\).</li>
          <li><input type="radio" name="q8" value="4"> \(\underset{[0;2]}{max}\,y=\frac32\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 9:</span> Trong không gian, cho hình chữ nhật \(ABCD\) có \(AB=1\) và \(AD=2\). Gọi
          \(M,N\) lần lượt
          là điểm của \(AD\) và \(BC\). Quay hình chữ nhật \(ABCD\) xung quanh trục \(MN\), ta được một hình trụ. Tính
          diện tích toàn phần \(S_{tp}\) của hình trụ đó.</p>
        <ol class="answer">
          <li><input type="radio" name="q9" value="1"> \(S_{tp}=2\pi\).</li>
          <li><input type="radio" name="q9" value="2"> \(S_{tp}=10\pi\).</li>
          <li><input type="radio" name="q9" value="3"> \(S_{tp}=4\pi\).</li>
          <li><input type="radio" name="q9" value="4"> \(S_{tp}=6\pi\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 10:</span> Nghiệm của phương trình \(2^{x-1}=8\) là</p>
        <ol class="answer">
          <li><input type="radio" name="q10" value="1"> \(x=4\).</li>
          <li><input type="radio" name="q10" value="2"> \(x=3\).</li>
          <li><input type="radio" name="q10" value="3"> \(x=2\).</li>
          <li><input type="radio" name="q10" value="4"> \(x=5\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 11:</span> Tìm tất cả giá trị thực của tham số \(m\) để phương trình \(4^x-2m.2^x+2=0\)
          có 2 nghiệm
          phân biệt.</p>
        <ol class="answer">
          <li><input type="radio" name="q11" value="1"> \(m\gt-2\).</li>
          <li><input type="radio" name="q11" value="2"> \(m\lt2\).</li>
          <li><input type="radio" name="q11" value="3"> \(m\gt2\).</li>
          <li><input type="radio" name="q11" value="4"> \(-2\lt m\lt2\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 12:</span> Ngiệm của bất phương trình \(log_\frac12(x-1)\ge-1\) là</p>
        <ol class="answer">
          <li><input type="radio" name="q12" value="1"> \(1\le x\le 3\).</li>
          <li><input type="radio" name="q12" value="2"> \(1\lt x\le 3\).</li>
          <li><input type="radio" name="q12" value="3"> \(x\le 3\).</li>
          <li><input type="radio" name="q12" value="4"> \(1\le x \lt 3\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 13:</span> Cho tam giác: \(OIM\) vuông tại \(I\) có \(OI=3\) và \(IM=4\). KHi quay tam
          giác \(OIM\)
          xung quanh cạnh có vuông \(OI\) thì đường gấp khúc \(OIM\) tạo thành hình nón có độ dài đường sinh bằng</p>
        <ol class="answer">
          <li><input type="radio" name="q13" value="1"> \(7\).</li>
          <li><input type="radio" name="q13" value="2"> \(4\).</li>
          <li><input type="radio" name="q13" value="3"> \(5\).</li>
          <li><input type="radio" name="q13" value="4"> \(3\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 14:</span> Cho hình chóp \(S.ABCD\) có đáy \(ABCD\) là hình chữ nhật có đường chéo bằng
          \(a\sqrt2\),
          cạnh \(SA\) có độ dài bằng \(2a\) và vuông góc với mặt phẳng đáy. Tính bán kính mặt cầu ngoại tiếp hình chóp
          \(S.ABCD\)</p>
        <ol class="answer">
          <li><input type="radio" name="q14" value="1"> \(\frac{a\sqrt6}4\).</li>
          <li><input type="radio" name="q14" value="2"> \(\frac{a\sqrt6}{12}\).</li>
          <li><input type="radio" name="q14" value="3"> \(\frac{a\sqrt6}2\).</li>
          <li><input type="radio" name="q14" value="4"> \(\frac{a\sqrt6}3\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 15:</span> Cho hình nón có bán kính đáy \(r=\sqrt3\) và độ dài đường sinh \(l=4\). Tính
          diện tích
          xung quanh của hình nón đã cho.</p>
        <ol class="answer">
          <li><input type="radio" name="q15" value="1"> \(S_{xq}=4\sqrt3\pi\).</li>
          <li><input type="radio" name="q15" value="2"> \(S_{xq}=12\pi\).</li>
          <li><input type="radio" name="q15" value="3"> \(S_{xq}=8\sqrt3\pi\).</li>
          <li><input type="radio" name="q15" value="4"> \(S_{xq}=\sqrt{39}\pi\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 16:</span> Cho \(x,y\) là các số thực dương thỏa nãm
          \(2^{\,2xy+x+y}=\frac{8\,-\,8xy}{x\,+\,y}\).
          Khi \(P=2xy^2+xy\) đạt giá trị lớn nhất, giá trị của biểu thức \(3x+2y\) bằng</p>
        <ol class="answer">
          <li><input type="radio" name="q16" value="1"> \(5\).</li>
          <li><input type="radio" name="q16" value="2"> \(4\).</li>
          <li><input type="radio" name="q16" value="3"> \(2\).</li>
          <li><input type="radio" name="q16" value="4"> \(3\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 17:</span> Bảng biến thiên sau đây là của hàm số nào</p>
        <div class="q-pic-alg debai"> <img class="q-pic" src="/image/anh-de/de1/cau17-de1.png" alt="ảnh 4"></div>
        <ol class="answer">
          <li><input type="radio" name="q17" value="1"> \(y=x^3+3x^2-1\).</li>
          <li><input type="radio" name="q17" value="2"> \(y=x^3-3x^2-1\).</li>
          <li><input type="radio" name="q17" value="3"> \(y=-x^3-3x^2-1\).</li>
          <li><input type="radio" name="q17" value="4"> \(y=-x^3+3x^2-1\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 18:</span> Tập nghiệm của bất phương trình \(2^{x^2-3x}\le 16\) là</p>
        <ol class="answer">
          <li><input type="radio" name="q18" value="1"> \([-1;+\infty)\).</li>
          <li><input type="radio" name="q18" value="2"> \((-\infty;1]\cup[4;+\infty)\).</li>
          <li><input type="radio" name="q18" value="3"> \((-\infty;4]\).</li>
          <li><input type="radio" name="q18" value="4"> \([-1;4]\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 19:</span> Hàm số \(y=(4-x^2)^\frac35\) có tập xác định là</p>
        <ol class="answer">
          <li><input type="radio" name="q19" value="1"> \((-2;2)\).</li>
          <li><input type="radio" name="q19" value="2"> \(\Bbb R\).</li>
          <li><input type="radio" name="q19" value="3"> \((-\infty;-2)\cup(2;+\infty)\).</li>
          <li><input type="radio" name="q19" value="4"> \(\Bbb R\backslash \{\pm2\}\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 20:</span> Cho khối chóp có thể tích bằng \(10a^3\) và chiều cào bằng \(5a\). Diện tích
          mặt đáy của
          khối chóp đó bằng</p>
        <ol class="answer">
          <li><input type="radio" name="q20" value="1"> \(2a^2\).</li>
          <li><input type="radio" name="q20" value="2"> \(4a^2\).</li>
          <li><input type="radio" name="q20" value="3"> \(6a^2\).</li>
          <li><input type="radio" name="q20" value="4"> \(12a^2\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 21:</span> Cho hàm số \(y=f(x)\) có đồ thị như hình vẽ bên. Tìm tất cả các giá trị của
          \(m\) để
          phương trình \(|f(x)|=m\) có đúng 2 nghiệm phân biệt.</p>
        <div class="q-pic-alg debai"> <img class="q-pic" src="/image/anh-de/de1/cau21-de1.png" alt="ảnh 5"></div>
        <ol class="answer">
          <li><input type="radio" name="q21" value="1"> \(m\lt1\).</li>
          <li><input type="radio" name="q21" value="2"> \(m\gt5,0\lt m\lt1\).</li>
          <li><input type="radio" name="q21" value="3"> \(1\lt m\lt5\).</li>
          <li><input type="radio" name="q21" value="4"> \(m=1,m=5\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 22:</span> Phương trình \(2^{2x}-3.2^{x+2}+32=0\) có tổng các nghiệm là</p>
        <ol class="answer">
          <li><input type="radio" name="q22" value="1"> \(5\).</li>
          <li><input type="radio" name="q22" value="2"> \(12\).</li>
          <li><input type="radio" name="q22" value="3"> \(6\).</li>
          <li><input type="radio" name="q22" value="4"> \(-2\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 23:</span> Tổng bình phương các nghiệm của phương trình \(5^{3x-2}=(\frac15)^{-x^2}\)
          bằng</p>
        <ol class="answer">
          <li><input type="radio" name="q23" value="1"> \(2\).</li>
          <li><input type="radio" name="q23" value="2"> \(0\).</li>
          <li><input type="radio" name="q23" value="3"> \(5\).</li>
          <li><input type="radio" name="q23" value="4"> \(3\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 24:</span> Khối hai mươi mặt đều là khối đa diện đề thuộc loại</p>
        <ol class="answer">
          <li><input type="radio" name="q24" value="1"> \(\{3;5\}\).</li>
          <li><input type="radio" name="q24" value="2"> \(\{4;3\}\).</li>
          <li><input type="radio" name="q24" value="3"> \(\{3;4\}\).</li>
          <li><input type="radio" name="q24" value="4"> \(\{5;3\}\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 25:</span> Cho điểm \(M\) nằm ngoài mặt cầu \(S\,(O;R)\). Khẳng đinh nào dưới đây đúng?
        </p>
        <ol class="answer">
          <li><input type="radio" name="q25" value="1"> \(OM\le R\).</li>
          <li><input type="radio" name="q25" value="2"> \(OM=R\).</li>
          <li><input type="radio" name="q25" value="3"> \(OM\gt R\).</li>
          <li><input type="radio" name="q25" value="4"> \(OM\lt R\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 26:</span> Cho hàm số \(y=f(x)\) có đạo hàm \(f'(x)=x^2(2x-1)^2(x+1)\). Số điểm cực trị
          của hàm số
          đã cho là</p>
        <ol class="answer">
          <li><input type="radio" name="q26" value="1"> \(3\).</li>
          <li><input type="radio" name="q26" value="2"> \(2\).</li>
          <li><input type="radio" name="q26" value="3"> \(1\).</li>
          <li><input type="radio" name="q26" value="4"> \(0\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 27:</span> Nghiệm của phương trình \(log_3(x-1)=2\) là</p>
        <ol class="answer">
          <li><input type="radio" name="q27" value="1"> \(x=8\).</li>
          <li><input type="radio" name="q27" value="2"> \(x=11\).</li>
          <li><input type="radio" name="q27" value="3"> \(x=9\).</li>
          <li><input type="radio" name="q27" value="4"> \(x=10\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 28:</span> Cho hàm số \(y=f(x)\) có đồ thị như hình vẽ. Điểm cực đại của đồ thị hàm số
          đã cho là</p>
        <div class="q-pic-alg debai"> <img class="q-pic" src="/image/anh-de/de1/cau28-de1.png" alt="ảnh 6"></div>
        <ol class="answer">
          <li><input type="radio" name="q28" value="1"> \((1;4)\).</li>
          <li><input type="radio" name="q28" value="2"> \((4;1)\).</li>
          <li><input type="radio" name="q28" value="3"> \((-1;3)\).</li>
          <li><input type="radio" name="q28" value="4"> \((3;-1)\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 29:</span> CHo hình trụ có chiều cao \(h=1\) và bán kính đáy \(r=2\). Diện tích xung
          quanh của hình
          trụ đã cho bằng</p>
        <ol class="answer">
          <li><input type="radio" name="q29" value="1"> \(3\pi\).</li>
          <li><input type="radio" name="q29" value="2"> \(2\pi\).</li>
          <li><input type="radio" name="q29" value="3"> \(6\pi\).</li>
          <li><input type="radio" name="q29" value="4"> \(4\pi\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 30:</span> Thể tích đường cầu có đường kính \(2a\) bằng</p>
        <ol class="answer">
          <li><input type="radio" name="q30" value="1"> \(\frac{\pi a^3}3\).</li>
          <li><input type="radio" name="q30" value="2"> \(\frac{4\pi a^3}3\).</li>
          <li><input type="radio" name="q30" value="3"> \(2\pi a^3\).</li>
          <li><input type="radio" name="q30" value="4"> \(4\pi a^3\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 31:</span> Cho mặt cầu có bán kính \(R=2\). Diện tích của mặt cầu đã cho bằng</p>
        <ol class="answer">
          <li><input type="radio" name="q31" value="1"> \(\frac{3\,2\pi}3\).</li>
          <li><input type="radio" name="q31" value="2"> \(4\pi\).</li>
          <li><input type="radio" name="q31" value="3"> \(8\pi\).</li>
          <li><input type="radio" name="q31" value="4"> \(16\pi\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 32:</span> Cho hàm số \(f(x)\) có bảng biến thiên như hình vẽ. Hàm số đã cho cực đại
          tại</p>
        <div class="q-pic-alg debai"> <img class="q-pic" src="/image/anh-de/de1/cau32-de1.png" alt="ảnh 7"></div>
        <ol class="answer">
          <li><input type="radio" name="q32" value="1"> \(x=2\).</li>
          <li><input type="radio" name="q32" value="2"> \(x=-2\).</li>
          <li><input type="radio" name="q32" value="3"> \(x=1\).</li>
          <li><input type="radio" name="q32" value="4"> \(x=-1\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 33:</span> Hàm số nào sau đây đồng biến trên tập xác định của nó</p>
        <ol class="answer">
          <li><input type="radio" name="q33" value="1"> \(y=log_{\frac e2}x\).</li>
          <li><input type="radio" name="q33" value="2"> \(y=log_{\frac e3}x\).</li>
          <li><input type="radio" name="q33" value="3"> \(y=log_{\frac{\sqrt2}2}x\).</li>
          <li><input type="radio" name="q33" value="4"> \(y=log_{\frac\pi4}x\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 34:</span> Cho khối nón có diện tích đáy \(3a^2\) và chiều cao \(2a\). Thể tích của
          khối nón đã cho
          bằng</p>
        <ol class="answer">
          <li><input type="radio" name="q34" value="1"> \(3a^3\).</li>
          <li><input type="radio" name="q34" value="2"> \(6a^3\).</li>
          <li><input type="radio" name="q34" value="3"> \(\frac23 a^3\).</li>
          <li><input type="radio" name="q34" value="4"> \(2a^3\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 35:</span> Cho hàm số \(y=f(x)\) có bảng biến thiên như hình bên. Hàm số
          \(y=f(1-2x)+1\) đồng biến
          trên khoảng</p>
        <div class="q-pic-alg debai"> <img class="q-pic" src="/image/anh-de/de1/cau35-de1.png" alt="ảnh 8"></div>
        <ol class="answer">
          <li><input type="radio" name="q35" value="1"> \((-1;\frac12)\).</li>
          <li><input type="radio" name="q35" value="2"> \((\frac12;1)\).</li>
          <li><input type="radio" name="q35" value="3"> \((0;\frac32)\).</li>
          <li><input type="radio" name="q35" value="4"> \((1;+\infty)\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 36:</span> Có bao nhiêu cặp số nguyên \((x;y)\) thỏa mãn \(0\le x\le2022\) và
          \(5(25^y+2y)=x+log_5(x+1)^5-4\)</p>
        <ol class="answer">
          <li><input type="radio" name="q36" value="1"> \(5\).</li>
          <li><input type="radio" name="q36" value="2"> \(2\).</li>
          <li><input type="radio" name="q36" value="3"> \(2023\).</li>
          <li><input type="radio" name="q36" value="4"> \(2022\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 37:</span> Cho hàm số \(y=f(x)\) có bảng biến thiên như hình vẽ. Hàm số \(y=f(x)\) đồng
          biến trên
          khoảng nào sau đây?</p>
        <div class="q-pic-alg debai"> <img class="q-pic" src="/image/anh-de/de1/cau37-de1.png" alt="ảnh 9"></div>
        <ol class="answer">
          <li><input type="radio" name="q37" value="1"> \((3;+\infty)\).</li>
          <li><input type="radio" name="q37" value="2"> \((0;+\infty)\).</li>
          <li><input type="radio" name="q37" value="3"> \((1;3)\).</li>
          <li><input type="radio" name="q37" value="4"> \((-\infty;4)\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 38:</span> Đạo hàm của hàm số \(y=xlnx-x\) là</p>
        <ol class="answer">
          <li><input type="radio" name="q38" value="1"> \(\frac1x+1\).</li>
          <li><input type="radio" name="q38" value="2"> \(ln\;x\).</li>
          <li><input type="radio" name="q38" value="3"> \(ln\,x+x\).</li>
          <li><input type="radio" name="q38" value="4"> \(ln\,x-1\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 39:</span>Thể tích khối hình hộp chữ nhật có các kích thước \(2;3;4\) là</p>
        <ol class="answer">
          <li><input type="radio" name="q39" value="1"> \(6\).</li>
          <li><input type="radio" name="q39" value="2"> \(72\).</li>
          <li><input type="radio" name="q39" value="3"> \(24\).</li>
          <li><input type="radio" name="q39" value="4"> \(8\).</li>
        </ol>
      </div>
      <div class="que-form">
        <p class="debai"><span>Câu 40:</span>Cho khối chóp \(S.ABCD\) có đáy \(ABC\) là tam giác cân đỉnh \(A\), góc
          \(\angle{BAC} =
          120^\circ\) và \(AB=a\). Các cạnh bên \(SA,SB,SC\) bằng nhau và góc giữa \(SA\) với mặt phẳng đáy bằng
          \(60^\circ\). Thể tích của khối chóp đã cho bằng</p>
        <ol class="answer">
          <li><input type="radio" name="q40" value="1"> \(\frac {a^3}4\)</li>
          <li><input type="radio" name="q40" value="2"> \(\frac {\sqrt3}4a^3\).</li>
          <li><input type="radio" name="q40" value="3"> \(\sqrt3a^3\).</li>
          <li><input type="radio" name="q40" value="4"> \(\frac34a^3\).</li>
        </ol>
      </div>
      <input type="submit" value="Nộp bài">
    </form>
  </div>
</body>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<script src="/js/moment.js"></script>
<script>
  function begin() {
    // Đặt biến
    const han = 90;
    // Bắt đầu
    var start = moment();
    // Hạn
    var limit = start.add(han, 'minutes');
    // Lấy độ trễ
    var x = setInterval(function() {
      function time() {
        var now = moment();
        //Tính thời gian còn lại
        remaining = limit - now;
        //Đổi màu nếu còn ít hơn 5p
        if (remaining < 300000)
          document.querySelector(".clock-wr").style.backgroundColor = 'rgb(252, 39, 39)'
        //Thông báo hết giờ
        if (remaining < 1000) {
          document.querySelector(".time-noti").style.display = 'Hết giờ'
          document.getElementById("tet").style.display = 'none'
        }
        return remaining
      }
      //Tính thời gian
      var hours = Math.floor((time() % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((time() % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((time() % (1000 * 60)) / 1000);

      document.getElementById("tet").innerHTML = hours + "h" + minutes + "p" + seconds + "s"
    }, 1000);
    //Chỉnh display các element
    document.getElementById("noidung").style.display = 'block'
    document.querySelector(".clock-wr").style.display = 'block'
    document.querySelector(".pop-box").style.display = 'none'
  }
  //Thêm envent scroll
  window.addEventListener("scroll", setScrollvar)
  //Hàm lấy giá trị scroll
  function setScrollvar() {
    const htmlelement = document.documentElement
    //Pixel kéo xuống chia cho độ cao client (chỉ tính padding xem đc)
    const percentofScrYscrolled = htmlelement.scrollTop / htmlelement.clientHeight
    //Lấy giá trị tối đa scroll xuống là 9,2%
    htmlelement.style.setProperty("--scroll", Math.min(percentofScrYscrolled * 100, 9.2))
  }
  //Xác định scroll đến đâu r
  setScrollvar()
</script>

</html>