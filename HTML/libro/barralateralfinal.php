</section>
<!-- partial -->
<script>
  const body = document.querySelector('body'),
sidebar = body.querySelector('nav'),
toggle = body.querySelector(".toggle"),
searchBtn = body.querySelector(".search-box"),
modeSwitch = body.querySelector(".toggle-switch"),
modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
body.classList.toggle("dark");

if(body.classList.contains("dark")){
  modeText.innerText = "Light mode";
}else{
  modeText.innerText = "Dark mode";
  
}
});
  $("#menu a").click(function(event){
    if($(this).next('ul').length){
event.preventDefault();
        $(this).next().toggle('fast');
        $(this).children('i:last-child').toggleClass('fa-caret-down fa-caret-left');
    }
});

</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</html>