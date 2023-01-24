export function mobile () {
    
    let openMobile = document.getElementById("open-mobile");
    let closeMobile = document.getElementById("close-mobile");
    let mobileScreen = document.getElementById("aside-menu-mobile");

    openMobile.addEventListener("click",function() {
        mobileScreen.classList.remove("close");
        mobileScreen.classList.add("active");
        setTimeout(function() {
            mobileScreen.style.display = "block";
        },1000)
    })
    closeMobile.addEventListener("click",function() {
        mobileScreen.classList.remove("active");
        mobileScreen.classList.add("close");
        setTimeout(function() {
            mobileScreen.style.display = "none";
        },1000)
    })

}