document.querySelector("div.section-item.s1").addEventListener("click", ()=>{
    if(document.querySelector("div.toggle-area-1").style.display === 'block'){
        document.querySelector("div.toggle-area-1").style.display = 'none';
        document.querySelector("div.section-item.s1 i").classList = 'fa fa-caret-down';
    } else {
        document.querySelector("div.toggle-area-1").style.display = 'block';
        document.querySelector("div.section-item.s1 i").classList = 'fa fa-caret-up';
    }
});

document.querySelector("div.section-item.s2").addEventListener("click", ()=>{
    if(document.querySelector("div.toggle-area-2").style.display === 'block'){
        document.querySelector("div.toggle-area-2").style.display = 'none';
        document.querySelector("div.section-item.s2 i").classList = 'fa fa-caret-down';
    } else {
        document.querySelector("div.toggle-area-2").style.display = 'block';
        document.querySelector("div.section-item.s2 i").classList = 'fa fa-caret-up';
    }
});

document.querySelector("div.section-item.s5").addEventListener("click", ()=>{
    if(document.querySelector("div.toggle-area-5").style.display === 'block'){
        document.querySelector("div.toggle-area-5").style.display = 'none';
        document.querySelector("div.section-item.s5 i").classList = 'fa fa-caret-down';
    } else {
        document.querySelector("div.toggle-area-5").style.display = 'block';
        document.querySelector("div.section-item.s5 i").classList = 'fa fa-caret-up';
    }
});

