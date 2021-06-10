const links = document.querySelectorAll('a, input[type="text"], textarea, button');

const toggleFocusMethod = (motion, element)=> {
    if ('add' === motion) {
        element.dataset.focusMethod = 'mouse';
    } else {
        element.removeAttribute('data-focus-method');
    }
}

let preClickElement = {};

for(const ele of links) {
    ele.addEventListener('mousedown', e => {
        if (0 === Object.keys(preClickElement).length) {
            toggleFocusMethod('add', e.currentTarget);
            preClickElement = e.currentTarget;
        }
    });
}

document.documentElement.addEventListener('mouseup', e => {
    console.log(e.target,preClickElement);
    if (e.target != preClickElement) {
        toggleFocusMethod('remove', preClickElement);
    }
});