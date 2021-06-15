export class menu {
    constructor() {

        document.getElementById('js-menu-open').addEventListener('click', (e) => {
            e.currentTarget.classList.add('active');
            document.getElementById('js-menu').classList.add('active');
        });

        document.getElementById('js-menu-close').addEventListener('click', (e) => {
            e.currentTarget.classList.remove('active');
            document.getElementById('js-menu').classList.remove('active');
            document.getElementById('js-menu-open').classList.remove('active');
        });

    }
}