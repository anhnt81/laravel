<nav class='col-md-3 col-lg-2 collapse' id='nav-home'>
    <div style='text-align: center'>
    <!--     <img src='{{asset('uploads/images/'. Auth::guard('admin')->User()->avatar )}}' class="img-circle" style="max-width: 80px"><br>
        <span>{{Auth::guard('admin')->User()->name}}</span> -->
    </div>
    <hr color="darkgray">
    <ul class="nav nav-pills nav-stacked" role="tablist" style='border: none'>
        <li id='home' class='active'>
            <a href="#"> <span class="glyphicon glyphicon-home"></span> Trang Chủ</a>
        </li>

        <li id='user' class="dropdown">
            <a href="#">
                <span class="glyphicon glyphicon-user"></span> Quản Lý Người Dùng
            </a>
        </li>

        <li id='customer' class="dropdown">
            <a href="#">
                <span class="glyphicon glyphicon-user"></span> Quản Lý Khách Hàng
            </a>
        </li>

        <li id='product' class="dropdown">
            <a href="#">
                <span class="glyphicon glyphicon-gift"></span> Quản lý Sản Phẩm
            </a>
        </li>

        <li id='order' class="dropdown">
            <a href="#">
                <span class="#"></span> Quản Lý Đơn Hàng
            </a>
        </li>

        <li id='category' class="dropdown">
            <a href="#">
                <span class="glyphicon glyphicon-list"></span> Quản Lý Chuyên Mục
            </a>
        </li>

        <li id='brand' class="dropdown">
            <a href="#">
                <span class="glyphicon glyphicon-list-alt"></span> Quản Lý Thương Hiệu
            </a>
        </li>

        <li id='brand' class="dropdown">
            <a href="#">
                <span class="glyphicon glyphicon-cd"></span> Quản Lý Slide
            </a>
        </li>

        <li id='comment' class="dropdown">
            <a href="#">
                <span class="glyphicon glyphicon-comment"></span> Quản lý bình luận
            </a>
        </li>

        <li id='reports' class="dropdown">
            <a href="#">
                <span class="glyphicon glyphicon-glyphicon glyphicon-euro"></span> Thống kê
            </a>
        </li>

        <li id='setting' class="dropdown">
            <a href="#">
                <span class="glyphicon glyphicon-cog"></span> Cài Đặt
            </a>
        </li>
    </ul>
    <hr>
    <div style='text-align: center; line-height: 30px;'>
        <a href='#'>Sửa thông tin cá nhân</a>
        <br>
        <a href='#'>Vào Website</a>
    </div>
</nav>