import MyLocalStorage from "./utils/MyLocalStorage";
import apis from "./apis";
import global from "./global";
import config from "./config";
import utils from "./utils";

const HDTShop =  {
    global: global,
    apis: apis,
    config: config,
    utils: utils,
    MyLocalStorage: MyLocalStorage
};

window.HDTShop = HDTShop;
