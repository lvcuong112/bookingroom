// ajaxSetup() là phương thức set giá trị mặc định cho tất cả các request ajax tiếp theo
// Để gửi được request ajax chúng ta cũng cần xác thực csrf giống như Form
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


/* Xóa một row - user */
function destroyUser(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa người dùng ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/admin/user/'+id, // base_url được khai báo ở đầu page == http://webshop.local
            type: 'DELETE',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}
function destroyRoom(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa phòng ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/admin/room/'+id, // base_url được khai báo ở đầu page == http://webshop.local
            type: 'DELETE',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}
function destroyRoomType(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa phòng ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/admin/roomtype/'+id, // base_url được khai báo ở đầu page == http://webshop.local
            type: 'DELETE',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}
