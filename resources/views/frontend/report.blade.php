<!DOCTYPE html>
<html>
<head>
    <title>Booking room - Login</title>
    <link rel="stylesheet" href="../frontend/login.css">
    <link rel="stylesheet" href="../frontend/register.css">
    <link rel="stylesheet" href="../frontend/report.css">
    <link rel="stylesheet" href="../frontend/lib/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="../frontend/jquery-ui-1.12.1.custom/jquery-ui.min.css">
</head>
<body>
<h2>Booking room</h2>

<!-- Dialog Report -->
<div class="dialog-report" title="Báo cáo" style="display: none" >
    <div class="input-report-content" id="title">
        <label> Tiêu đề (<span id="label-required">*</span>)</label><br>
        <input class="report-input" id="input-report-title" type="text" />
    </div>
    <div class="input-report-content" id="content">
        <label> Nội dung (<span id="label-required">*</span>)</label><br>
        <input class="report-input"  id="input-report-content" type="text" placeholder="Nhập nội dung vào đây" style="height: 200px;"/>
    </div>
    <div class="report-footer">
        <button class="report-button" id="cancel-report"><span class="Cancel-text">Hủy</span></button>
        <button class="report-button" id="send-report"><span class="Save-text">Gửi</span></button>
    </div>
</div>


<script type="text/javascript" src="../frontend/jquery-3.5.1.min.js" ></script>
<script type="text/javascript" src="../frontend/jquery-ui-1.12.1.custom/jquery-ui.js" ></script>
<script type="text/javascript" src="../frontend/jquery-ui-1.12.1.custom/jquery-ui.min.js" ></script>
<script type="text/javascript" src="../frontend/js/js.js" ></script>
</body>
</html>
