document.querySelector("div.profile").addEventListener("click", ()=>{
    if(document.querySelector("div.profile-dropdown").style.marginLeft === '0px'){
        document.querySelector("div.profile-dropdown").style.marginLeft = '400px';
    } else {
        document.querySelector("div.profile-dropdown").style.marginLeft = '0px';
    }
}); 