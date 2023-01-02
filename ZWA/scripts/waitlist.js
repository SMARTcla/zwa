function Menu() {
    let el = document.getElementsByClassName('menu-item');
    for(var i=0; i<el.length; i++) {
        el[i].addEventListener("mouseenter", showSub, false);
        el[i].addEventListener("mouseleave", hideSub, false);
    }
}

function showSub() {
    if (this.children.length > 1) {
        this.children[1].style.overflow = 'visible';
        this.children[1].style.opacity = '1';
        this.children[1].style.height = 'auto';
    }
    else {
        return false;
    }
}

function hideSub() {
    if (this.children.length > 1) {
        this.children[1].style.overflow = 'hidden';
        this.children[1].style.opacity = '0';
        this.children[1].style.height = '0';
    }
}