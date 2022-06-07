const VNDFormat = function (money) {
    return new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND'
    }).format(money);
}

export {
    VNDFormat,
}
