<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang chủ cửa hàng</title>
    <?php partial('includes/stylesheet.php', 'admin'); ?>
</head>
<body>
<div class="container-scroller">
    <button class="align-self-center" type="button" data-toggle="minimize" id="toggle-menu">
        <span class="fas fa-bars"></span>
    </button>
    <div class="container-fluid page-body-wrapper">
        <div class="theme-setting-wrapper">
            <div id="settings-trigger" class="cursor-pointer"><i class="fas fa-fill-drip"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close fa fa-times"></i>
                <p class="settings-heading">Thiết lập giao diện</p>
                <div class="sidebar-bg-options cursor-pointer selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3 "></div>
                    Sáng
                </div>
                <div class="sidebar-bg-options cursor-pointer" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>
                    Tối
                </div>
            </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close fa fa-times"></i>
            <ul class="nav nav-tabs" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                </li>
            </ul>
        </div>
        <?php includes('includes/sidebar.php') ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        Trang chủ
                    </h3>
                </div>
                <div class="row grid-margin">
                    <div class="col-12">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fa fa-user mr-2"></i>
                                            Số người dùng mới
                                        </p>
                                        <h2><?php echo $current_user_counter; ?></h2>
                                        <label class="badge badge-outline-success badge-pill">
                                            <?php
                                                if($current_user_counter > $previous_user_counter)  {
                                                    echo 'tăng ';
                                                } else {
                                                    echo 'giảm ';
                                                }
                                                echo $precent_user . '% ';
                                            ?>
                                        </label>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                            Tổng số sản phẩm
                                        </p>
                                        <h2><?php echo $product_counter; ?></h2>
                                        <label class="badge badge-outline-success badge-pill">Hiện còn bán</label>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-chart-line mr-2"></i>
                                            Doanh thu tháng này
                                        </p>
                                        <h2><?php echo vnmoney($tong_doanh_thu); ?></h2>
<!--                                        <label class="badge badge-outline-success badge-pill">10% increase</label>-->
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-check-circle mr-2"></i>
                                            Số đơn hàng hoàn thành
                                        </p>
                                        <h2><?php echo $current_order_complete_counter; ?></h2>
                                        <label class="badge badge-outline-success badge-pill">
                                            <?php
                                                 if($current_order_complete_counter > $previous_order_complete_counter)
                                                     echo 'tăng ';
                                                 else
                                                     echo 'giảm ';
                                                 echo $percent_order . ' %';
                                            ?>
                                        </label>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-circle-notch mr-2"></i>
                                            Số đơn hàng đang chờ
                                        </p>
                                        <h2><?php echo $order_pending; ?></h2>
                                        <a href="/admin/don-hang">
                                            <label class="badge badge-outline-danger badge-pill">Đi đến duyệt</label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-gift"></i>
                                    DOANH THU NĂM 2022
                                </h4>
                                <canvas id="orders-chart"></canvas>
                                <div id="orders-chart-legend" class="orders-chart-legend"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">
                                        <i class="fas fa-chart-line"></i>
                                        BÁN HÀNG
                                    </h4>
                                    <div class="d-flex">
                                        <div class="form-group">
                                            <label for="">Ngày bắt đầu</label>
                                            <input name="from" type="date" class="form-control" />
                                        </div>
                                        <div class="form-group ml-2">
                                            <label for="">Ngày kết thúc</label>
                                            <input name="to" type="date" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">
                                    <i class="fas fa-chart-pie"></i>
                                    Trạng thái website
                                </h4>
                                <div class="flex-grow-1 d-flex flex-column justify-content-between">
                                    <canvas id="sales-status-chart" class="mt-3"></canvas>
                                    <div class="pt-4">
                                        <div id="sales-status-chart-legend" class="sales-status-chart-legend"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="far fa-futbol"></i>
                                    Hoạt động cửa hàng
                                </h4>
                                <ul class="solid-bullet-list">
                                    <li>
                                        <h5>4 người đã chia sẻ bài viết
                                            <span class="float-right text-muted font-weight-normal small">8:30 AM</span>
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>Lam đã đăng nội dung lên nhóm
                                            <span class="float-right text-muted font-weight-normal small">11:40 AM</span>
                                        </h5>
                                        <p class="text-muted">Chia sẻ để mọi người tham khảo</p>
                                    </li>
                                    <li>
                                        <h5>Hoàn thành công việc
                                            <span class="float-right text-muted font-weight-normal small">4:30 PM</span>
                                        </h5>
                                        <p class="text-muted">Lên kế hoạch tháng tới</p>
                                    </li>
                                </ul>
                                <div class="border-top pt-3">
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-outline-dark">Xem thêm</button>
                                        <button class="btn btn-primary btn-icon-text">
                                            Thêm mới
                                            <i class="btn-icon-append fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Doanh số hàng ngày
                                </h4>
                                <p class="card-description">Doanh số hằng ngày trong 1 tháng qua</p>
                                <div class="flex-grow-1 d-flex flex-column justify-content-between">
                                    <canvas id="daily-sales-chart" class="mt-3 mb-3 mb-md-0"></canvas>
                                    <div id="daily-sales-chart-legend" class="daily-sales-chart-legend pt-4 border-top"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-table"></i>
                                    Dữ liệu bán hàng
                                </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Tên khách hàng</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Giá trị đơn hàng</th>
                                            <th class="text-center">Trạng thái</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($donhangs as $donhang) { ?>
                                                <tr>
                                                    <td><?php echo $donhang->ho_nguoi_dat . ' ' . $donhang->ten_nguoi_dat; ?></td>
                                                    <td>
                                                        <a href="/admin/don-hang/chi-tiet?id=<?php echo $donhang->ma_don_hang; ?>">
                                                            <?php echo $donhang->ma_don_hang; ?>
                                                        </a>
                                                    <td><?php echo vnmoney($donhang->tong_tien); ?></td>
                                                    <td class="text-center">
                                                        <?php
                                                            if($donhang->trang_thai == \Luccui\Models\DonHang::DANG_CHO_XAC_NHAN)
                                                                echo "<span class='badge badge-warning'>{$donhang->trang_thai}</span>";
                                                            else if($donhang->trang_thai == \Luccui\Models\DonHang::DA_XAC_NHAN)
                                                                echo "<span class='badge badge-primary'>{$donhang->trang_thai}</span>";
                                                            else if($donhang->trang_thai == \Luccui\Models\DonHang::DA_HOAN_THANH)
                                                                echo "<span class='badge badge-success'>{$donhang->trang_thai}</span>";
                                                            else
                                                                echo "<span class='badge badge-danger'>{$donhang->trang_thai}</span>";
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-calendar-alt"></i>
                                    Lịch
                                </h4>
                                <div id="inline-datepicker-example" class="datepicker"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <?php partial('includes/script.php', 'admin'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {

            let labels = [
                "01/03/2022",
                "02/03/2022",
                "03/03/2022",
                "04/03/2022",
                "05/03/2022",
                "06/03/2022",
                "07/03/2022",
                "08/03/2022",
                "09/03/2022",
                "10/03/2022",
                "11/03/2022",
                "12/03/2022",
                "13/03/2022",
                "14/03/2022"
            ];
            let datasets = [
                0,
                0,
                0,
                0,
                0,
                80550000,
                109540000,
                0,
                0,
                0,
                0,
                0,
                0,
                0
            ];

            const chartFilter = new Chart("myChart", {
                type: "bar",
                data: {
                    labels,
                    datasets: [{
                        label: 'Dữ liệu bán hàng',
                        pointBackgroundColor: "rgba(0,0,255,1)",
                        data: datasets
                    }]
                },
                options: {}
            });
            const from = document.querySelector("input[name=from]")
            const to = document.querySelector("input[name=to]")

            to.addEventListener('change', applyFilter)

            function applyFilter() {
                const fromDay = from.value;
                const toDay = to.value;
                if((fromDay != null || fromDay != '') && (toDay != null || toDay != '')) {
                    axios.get(`/api/chart/filter?from=${fromDay}&to=${toDay}`)
                        .then(response => {
                            const { data: datasets, label: labels } = response.data;
                            console.log(datasets)
                            console.log(labels)
                            chartFilter.data.labels = labels;
                            chartFilter.data.datasets[0].data = datasets;
                            chartFilter.update();
                        })
                }
            }
        })
    </script>
</div>
</body>
</html>
