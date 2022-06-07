import {danhSachHuyen, danhSachXa, tinhPhi} from "./thanhtoan";
import { HDTShop } from "../base";
import { VNDFormat} from "../utils";

HDTShop.apis.danhSachHuyen = danhSachHuyen;
HDTShop.apis.danhSachXa = danhSachXa;
HDTShop.apis.tinhPhi = tinhPhi;
HDTShop.utils.VNDFormat = VNDFormat;

window.HDTShop = HDTShop;
