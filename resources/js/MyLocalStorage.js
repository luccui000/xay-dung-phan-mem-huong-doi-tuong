export default class MyLocalStorage {
    static get(key) {
        return JSON.parse(window.localStorage.getItem(key));
    }
    static add(key, value) {
        window.localStorage.setItem(key, JSON.stringify(value));
    }
    static remove(key) {
        window.localStorage.removeItem(key);
    }
    static clear() {
        window.localStorage.clear();
    }
    static key(index) {
        return window.localStorage.key(index);
    }
    static get length() {
        return window.localStorage.length;
    }
}
