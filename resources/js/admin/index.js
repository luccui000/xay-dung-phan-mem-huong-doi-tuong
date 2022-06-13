import "./trangchu/index";
import "./datatables/config";
import "datatables.net-bs4/css/dataTables.bootstrap4.min.css";
import { handleHinhanhUpload } from "./sanpham/create";
import { toastError, toastSuccess } from "./toast";

const HDTShop = {
    sanpham: {
        handleHinhanhUpload
    },
    toast: {
        toastError,
        toastSuccess
    },
    editor: {
        // makeEditor
    }
}
window.HDTShop = HDTShop;
