var  $= function(id){
    return document.getElementById(id);
}
var option_list=$("teacher_area").children;
for (var i=0; i<option_list.length; i++){
    

    option_list[i].onclick=function(){
        for(var n=0; n<option_list.length; n++){
            option_list[n].classList.remove("choosen");
        }
        this.classList.add("choosen");
        var id_teacher= this.getAttribute("id_teacher");
        $("input_id_teacher").value=id_teacher;
    }
}
