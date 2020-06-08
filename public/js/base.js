/**
 * func add classs to a element and remove all others
 * @param {*} el
 * @param {*} className
 * @author NCThanh
 */
function setActiveClass(el, className) {
    // remove all class active
    let allElements = document.querySelectorAll('.' + className);
    for (const item of allElements) {
        item.classList.remove('active');
    }

    // add class active to active item
    el.classList.add('active');
}

BASE_URL = '/filmbooks-v2';
/**
 * func generate router based on root url
 * @param {String} routerName
 * @author NCThanh
 */
function getRouter(routerName) {
    return `${BASE_URL}/${routerName}`;
}