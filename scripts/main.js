function openblog(id){
    document.getElementById(id).style.display='block';
    document.getElementById("read"+id).style.display='none';
    document.getElementById("hide"+id).style.display='inline';
}
function closeblog(id){
    document.getElementById(id).style.display='none';
    document.getElementById("hide"+id).style.display='none';
    document.getElementById("read"+id).style.display='inline';
}
function updateblog(id){
    var modalid = "#modal" + id;
    $(modalid).modal("toggle");
}
function confirmdelete(id){
    var modalid = "#deletemodal" + id;
    $(modalid).modal("toggle");
}
function setpublish(){
    document.getElementById('statussubmit').value = "Published";
}
function setdraft(){
    document.getElementById('statussubmit').value = "Draft";
}
function openinstructions(){
    $("#instructions").modal("toggle");
}
function select(id, category){
    var selectid = "#category" + id;
    $(selectid).val(category);
}
function changestatus(id){
    
    var draftid = "draft" + id;
    var publishedid = "published" + id;
    document.getElementById(draftid).checked = false;
    document.getElementById(publishedid).checked = true;
}
function defaultset(id, category){
    var selectid = "#category" + id;
    document.getElementById(selectid ).value = "Food"
}