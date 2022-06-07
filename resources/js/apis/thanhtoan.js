
const danhSachHuyen = function (maTinh) {
    return $.ajax({
        'type': 'GET',
        'url': "/api/dia-chi/danh-sach-huyen",
        'data': {
            'ma_tinh': maTinh
        }
    })
}
const danhSachXa = function(maHuyen) {
    return $.ajax({
        'type': 'GET',
        'url': '/api/dia-chi/danh-sach-xa',
        'data': {
            'ma_huyen': maHuyen
        }
    })
}
const tinhPhi = function (maXa, maHuyen) {
    return $.ajax({
        type: "POST",
        url: "/api/giao-hang/tinh-phi",
        data: {
            'ma_huyen': maHuyen,
            'ma_xa': maXa
        }
    })
}
export {
    danhSachHuyen,
    danhSachXa,
    tinhPhi
}
