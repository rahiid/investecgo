function useredit(x){
    if(x==1){
        document.getElementById("change_name").style.display="block";

        document.getElementById("change_email").style.display="none";
        document.getElementById("change_number").style.display="none";
    }

    else if(x==2){
        document.getElementById("change_email").style.display="block";

        document.getElementById("change_name").style.display="none";
        document.getElementById("change_number").style.display="none";
    }
    else if(x==3){

        document.getElementById("change_number").style.display="block";

        document.getElementById("change_name").style.display="none";
        document.getElementById("change_email").style.display="none";

    }
    else{
        document.getElementById("change_name").style.display="none";
        document.getElementById("change_email").style.display="none";
        document.getElementById("change_number").style.display="none";
    }
    return;
}



function canceledit(y){
    if(y==1){
        document.getElementById("change_name").style.display="none";
    }
    else if(y==2){
        document.getElementById("change_email").style.display="none";
    }
    else if(y==3){
        document.getElementById("change_number").style.display="none";
    }
    else{

    }
}



