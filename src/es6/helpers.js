function $$(selector, context = document) {
    /* Credit: Lea Verou <http://lea.verou.me/> */
    let elements = context.querySelectorAll(selector);
    return Array.prototype.slice.call(elements);
}

export { $$ as default }