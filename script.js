const button=document.querySelector("#user-menu-button")
const menu=document.querySelector("#profile-menu")

button.addEventListener('click', function(){
    menu.classList.toggle("hidden")
})